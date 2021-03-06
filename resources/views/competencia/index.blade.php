@extends('layout')

@section('title',"Lista de Competencias eva360")

@section('content')


<div class="container">


        <div id="flash-message">
            @include('flash-message')

        </div>
        <div class="mt-1 text-center">
            <h3>Lista de Competencias</h3>
        </div>
        <div class="text text-sm-right">
            <a  href="{{ route('competencia.create')}}" class="btn btn-dark"><i class="material-icons">library_add</library-add></i> </a>
        </div>

        <table class="table table-light table-striped ">
            <thead>
                <th>#</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Margen</th>
                <th>Tipo</th>
                <th></th>
                <th></th>
            </thead>
            <tbody>
                @foreach ($competencias as $competencia)
                <tr>
                    <td>{{ $competencia->id }}</td>
                    <td>{{ $competencia->name }}</td>
                    <td >{{ substr($competencia->description,0,100) }} ....</td>
                    <td>{{ $competencia->nivelrequerido }}</td>
                    <td>{{ $competencia->tipo->tipo}}</td>
                    <td><a href="{{ route('competencia.edit',$competencia) }}" class="btn btn-dark"><i class="material-icons">create</i></a></td>
                    <td>
                        <form  action="{{ route('competencia.destroy',$competencia) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"> <i class="material-icons">delete</i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
                </tbody>
        </table>
        <div class=" d-flex justify-content-center">
            {{ $competencias->links() }}

        </div>
</div>

@endsection
