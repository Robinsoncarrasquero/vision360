@extends('layout')

@section('title',"Responder la Prueba")

@section('content')

<div class="container">
    <div id="flash-message">
        @include('flash-message')
    </div>

    <div class="mb3">
        <div class="panel">
            <b class="text text-center">Estimado evaluador {{  $evaluacion->evaluador->name }}, analice con criterio y determinacion las siguientes conductas de
            <span class="text text-danger">{{ $evaluacion->evaluador->evaluado->name }}</span>.</b>
        </div>
    </div>

    <div class="panel">
        <h4 class="text text-center mt-2"><strong> {{ $evaluacion->competencia->name }}</strong></h4>
        <h6 class="description" >{{ $evaluacion->competencia->description}}</h6>
    </div>


    @if ($evaluacion->competencia->grados->isNotEmpty())
        <form action="{{ route('evaluacion.store',$evaluacion) }}" method="POST" id="form-select">
        {{ csrf_field() }}
            <div class="form-row">
                <div class="form-group col-sm-12">
                    <table class="table  table-striped table-table">
                        <thead class="table-preguntas">
                            <th scope="col">#</th>
                            <th scope="col">Pregunta</th>
                            <th scope="col">Opcion</th>
                            <th scope="col">Frecuencia</th>
                        </thead>
                        <tbody>

                        @foreach ($evaluacion->competencia->grados as $grado)
                            <tr data-id="{{"$grado->id"}}" class="filas" >
                                <th scope="row">{{ $grado->grado }}</th>
                                <td>{{$grado->description}}</td>
                                <td>
                                    @if($evaluacion->grado===$grado->grado)
                                        <div class="xform-check">
                                            <input type="radio" class="check-select radiogrado" id="{{"radiogrado$grado->id"}}"
                                            value="{{"$grado->id"}}" name="gradocheck[]" checked
                                            @if ($evaluacion->evaluador->status==2)
                                                disabled
                                            @endif>
                                        </div>
                                    @else
                                        <div class="xform-check">
                                            <input type="radio" class="check-select" id="{{"radiogrado$grado->id"}}"
                                            value="{{"$grado->id"}}" name="gradocheck[]"
                                            @if ($evaluacion->evaluador->status==2)
                                                disabled
                                            @endif>
                                        </div>

                                    @endif

                                </td>
                                <td>
                                    @foreach ($frecuencias  as $frecuencia)

                                    <div class="xform-check ">
                                        <label for="frecuencia[]" class="form-check-label">{{ $frecuencia->name}}</label>
                                        @if($evaluacion->frecuencia===$frecuencia->valor && $evaluacion->grado===$grado->grado)
                                            <input type="radio" class="radiofrecuencia" id="{{"radiofrecuencia$grado->id"}}"
                                            value="{{"$frecuencia->id"}}" name="frecuenciacheck[]" checked
                                            @if ($evaluacion->evaluador->status==2)
                                                disabled
                                            @endif>
                                        @else
                                            <input type="radio" class="radiofrecuencia" id="{{"radiofrecuencia$grado->id"}}"
                                            value="{{"$frecuencia->id"}}" name="frecuenciacheck[]"
                                            @if ($evaluacion->evaluador->status==2)
                                               disabled
                                            @endif>
                                        @endif
                                    </div>

                                    @endforeach
                                </td>


                            </tr>
                        @endforeach

                        </tbody>
                    </table>

                </div>

            <div class="col-md-4 ">
                <div id="divtodo">

                </div>
            </div>

    </div>

    <div class="clearfix">
        <span class="float-left"><a href="{{url()->previous()}}" class="btn btn-dark btn-lg">Back</a></span>
        @if ($evaluacion->evaluador->status!=2)
           <button type="submit" class="btn btn-dark btn-lg float-right" value="Next" >Next</button>
        @endif

    </div>

    </form>


    @else
        <div class="col-md-12">
            <p>No datos disponible para evaluaciones</p>
        </div>
    @endif


</div>

@endsection


@section('sidebar')


@endsection


@section('scripts')
<script src="{{ asset('js/responder.js') }}">

</script>
@endsection
