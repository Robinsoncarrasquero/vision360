@extends('layout')

@section('title',"Panel de control")

@section('content')

<div class="container">

    <div class="panel panel-default">

        <div class="col-sm-12">

            <div id="flash-message">
                @include('flash-message')

            </div>

            <div class="panel panel pb-1">
                <div class="clearfix">

                    <div class="text text-center titulo">
                        <h4>Panel de evaluados</h4>
                    </div>

                     <form class="form-inline mt-2 mt-md-0 float-left col-sm-6">
                        <input class="form-control mr-sm-2" type="text" placeholder="Nombre" aria-label="Searh" name="buscarWordKey">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                    </form>

                </div>
            </div>

            <div class=" float-right">
                <a  href="{{ route('json.fileindex')}}" class="btn btn-dark"><i class="material-icons">attachment person_add</library-add></i> </a>
                <a  href="{{ route('evaluado.create')}}" class="btn btn-dark"><i class="material-icons">person_add</library-add></i> </a>
            </div>

            @if($evaluados->count())

            <div class="panel-body">

                <div class="table table-table">
                    <table id="mytable" class="table  table-bordred table-striped">
                    <thead>
                    <th>Nombre</th>
                    <th>Cargo</th>
                    <th>Status</th>
                    <th>Lanzar<br>Modelo</th>
                    <th>Lanzar<br>Filtro</th>
                    <th>Prueba</th>
                    <th>Resultado</th>
                    <th>Grafica</th>
                   </thead>
                    <tbody>
                    @foreach($evaluados as $evaluado)
                    <tr>
                        <td>{{$evaluado->name}}</td>
                        <td>{{$evaluado->cargo}}</td>
                        <td>
                            <div class="status-progress">
                                @if(Helper::estatus($evaluado->status)=='Finalizada')
                                    <span id="inicio" class="radio-checkeado" ></span>
                                    <span id="medio" class="radio-checkeado" ></span>
                                    <span id="final" class="radio-checkeado" ></span>
                                @endif

                                @if(Helper::estatus($evaluado->status)=='Inicio')
                                    <span id="inicio" class="radio-checkeado" ></span>
                                    <span id="medio" class="radio-no-checkeado" ></span>
                                    <span id="final" class="radio-no-checkeado"></span>
                                @endif

                                @if(Helper::estatus($evaluado->status)=='Lanzada')
                                    <span id="inicio" class="radio-checkeado"></span>
                                    <span id="medio" class="radio-checkeado"></span>
                                   <span id="final" class="radio-no-checkeado"></span>
                                @endif
                            </div>
                            <span>{{ Helper::estatus($evaluado->status) }}</span>
                        </td>
                        <td>
                            @if(Helper::estatus($evaluado->status)!='Finalizada')
                                <a href="{{ route('lanzar.seleccionarmodelo',$evaluado->id) }}"><span><i class="material-icons">select_all</i></span></a>
                            @else
                                <a href="{{ route('lanzar.seleccionarmodelo',$evaluado->id) }}"><span><i class="material-icons">select_all muted</i></span></a>
                            @endif
                        </td>
                        <td>
                            @if(Helper::estatus($evaluado->status)!='Finalizada')
                                <a href="{{route('lanzar.seleccionar',$evaluado->id)}}"><span><i class="material-icons">filter_list</i></span></a>
                            @else
                                <a href="{{route('lanzar.seleccionar',$evaluado->id)}}"><span><i class="material-icons">filter_list muted</i></span></a>
                            @endif
                        </td>
                        <td>
                            @if(Helper::estatus($evaluado->status)=='Finalizada')
                                <a href="{{route('resultados.evaluacion', $evaluado->id)}}" >
                                <span><i class="material-icons ">question_answer</i></span>
                            @else
                                <a href="{{route('resultados.evaluacion', $evaluado->id)}}" >
                                <span><i class="material-icons text-dark ">question_answer</i></span>
                            @endif

                        </td>
                        <td>
                            @if(Helper::estatus($evaluado->status)=='Finalizada')
                                <a href="{{route('resultados.finales', $evaluado->id)}}" >
                                <span><i class="material-icons ">score</i></span>
                            @else
                                <a href="{{route('resultados.finales', $evaluado->id)}}" >
                                <span><i class="material-icons text-dark ">score</i></span>
                            @endif

                        </td>
                        <td>
                            @if(Helper::estatus($evaluado->status)=='Finalizada')
                                <a href="{{route('resultados.graficas', $evaluado->id)}}" >
                                <span><i class="material-icons ">pie_chart</i></span>
                            @else
                              <a href="{{route('resultados.graficas', $evaluado->id)}}" >
                                <span><i class="material-icons md-24 text-dark">pie_chart</i></span>
                            @endif

                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                    </table>
                </div>

            </div>

            @else

            <div class="d-flex alert alert-info">
                <p> hay usuarios registrados para lanzar una evaluacion</p>
            <div>

            @endif

            <div class=" d-flex justify-content-center">
                {{ $evaluados->links() }}
                {{-- {{ $evaluados->appends(["name"=>$evaluado->name])  }} --}}

            </div>

        </div>

    </div>

</div>


@endsection
