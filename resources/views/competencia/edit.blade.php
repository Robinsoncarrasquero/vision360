@extends('layout')

@section('title',"Editar Competencia")

@section('content')

<div class="container">
    <div id="flash-message">
        @include('flash-message')
    </div>

    <div class="text text-center">
        <h3 >Actualizar Competencia</h3>
    </div>

    <form action="{{route('competencia.update',$competencia)  }}" method="post">

        @csrf
        @method('PATCH' )

        <div class="col-sm-6">
            <label for="name">Nombre</label>
            <input id="name" class="form-control" type="text" name="name" value="{{$competencia->name }}">
        </div>

        <div class="col-sm-12">
            <label for="description">Descripcion</label>
            <textarea id="description" class="form-control"  name="description" rows="4" >{{$competencia->description }}</textarea>
        </div>


        <div class="col-sm-6">
            <label for="nivelrequerido">Nivel Requerido</label>
            <input id="nivelrequerido" class="form-control" type="text" name="nivelrequerido" value="{{ $competencia->nivelrequerido}}">
        </div>

        <div class="col-sm-6">
            <label for="tipo">Tipo</label>
            <select id="tipo" class="form-control" name="tipo">

                @foreach ($tipos as $tipo)
                    @if ($competencia->tipo==$tipo)
                        <option selected value="{{$tipo->id}}">{{ $tipo->tipo }}</option>
                    @else
                        <option          value="{{$tipo->id}}">{{ $tipo->tipo }}</option>

                    @endif
                @endforeach

            </select>
        </div>

        <table class="table table-table">
            <thead class="table-thead">
                <th>#</th>
                <th>Grado</th>
                <th>Pregunta</th>
                <th>Ponderacion</th>
            </thead>
            <tbody>
                @foreach ($competencia->grados as $key=>$value)
                <tr>
                    <td>
                        {{ $key }}
                        <input class="col-sm-2" hidden type="text" name="gradoid[]" value="{{ $value->id }}">
                    </td>
                    <td>
                        <input class="col-sm-2" type="text" name="gradoName[]" value="{{ old('gradoName.'.$key, $value->grado) }}">
                    </td>
                    <td>
                        <textarea class="col-sm-12" cols="50" rows="4" name="gradoDescription[]">{{ old('gradoDescription.'.$key, $value->description)}}</textarea>
                    </td>
                    <td>
                        <input class="col-sm-4" type="text" name="gradoPonderacion[]" value="{{ old('gradoPonderacion.'.$key, $value->ponderacion)}}">
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="clearfix">
            <a href="{{route('competencia.index')}}" class="btn btn-dark float-left">Back</a>
            <button type="submit" class="btn btn-dark float-right">Save</button>
        </div>
    </form>
</div>

@endsection
