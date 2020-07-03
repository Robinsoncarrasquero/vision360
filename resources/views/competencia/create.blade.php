@extends('layout')

@section('title',"Creacion de Competencias eva360")

@section('content')


<div class="container">

    <div class="row">

           <h1 class="display-5">Nueva Competencia</h1>

        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('competencia.store') }}" method="POST">
            @csrf

            <div class="table">
                <tr>
                    <td>
                        <div class="form-group">
                            <label for="name">Competencia</label>
                            <input id="name" placeholder="Adaptabilidad" class="form-control" type="text" name="name" value="{{old('name')  }}">
                        </div>
                        <div class="form-group">
                            <label for="description">Descripcion</label>
                            <textarea placeholder="Describa la competencia sus objetivos" type="text" id="description" class="form-control" rows="5"
                             maxlength="1000" name="description">{{ old('description') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="nivelrequerido">Nivel Requerido</label>
                            <input placeholder="Indique el margen requerido entre 0 y 100" id="nivelrequerido" class="form-control" type="text" name="nivelrequerido" value="{{ old('nivelrequerido') }}">
                        </div>


                        <div class="form-group">
                            <label for="tipo">Tipo</label>
                            <select id="tipo" class="form-control" name="tipo" >
                                <option value="G" @if(old('tipo')=='G') selected @endif>General</option>
                                <option value="T" @if(old('tipo')=='T') selected @endif>Tecnica</option>
                                <option value="S" @if(old('tipo')=='S') selected @endif>Supervisor</option>
                                <option value="E" @if(old('tipo')=='E') selected @endif>Especifica</option>

                            </select>
                        </div>

                    </td>
                </tr>

                <tr>
                    <table class="table table-light">
                        <thead>
                            <table class="table table-light">
                                <thead class="thead-light">
                                    <tr>
                                        <th>#</th>
                                        <th>Grado</th>
                                        <th>Pregunta</th>
                                        <th>Ponderacion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($filegrado['Grados'] as $key=>$value)
                                    <tr>
                                        <td>{{ $key }}</td>
                                        <td>
                                            <input type="text" name="gradoName[]" value="{{ old('gradoName.'.$key, $value->grado) }}">
                                        </td>
                                        <td>
                                            <textarea cols="50" rows="4" name="gradoDescription[]">{{ old('gradoDescription.'.$key, $value->description)}}</textarea>
                                        </td>
                                        <td>
                                            <input type="text" name="gradoPonderacion[]" value="{{ old('gradoPonderacion.'.$key, $value->ponderacion)}}">
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>

                        </thead>

                    </table>

                </tr>

            </table>

            <div class="clearfix">
                <a href="{{route('competencia.index')}}" class="btn btn-dark float-left">Back</a>
                <button type="submit" class="btn btn-primary float-right">Crear</button>

            </div>

        </form>


    </div>

</div>

@endsection