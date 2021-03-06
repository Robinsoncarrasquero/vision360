@extends('layout')

@section('title',"Lista de Evaluados")

@section('content')


<div class="container">

    <div class="col-sm-12">

        <h2>Lista de Evaluados</h2>
        <div id="flash-message">
            @include('flash-message')

        </div>
        <div class="text text-sm-right">
            <a  href="{{ route('evaluado.create')}}" class="btn btn-dark"><i class="material-icons">library_add</i> </a>
        </div>
        @if ($evaluados->count())


        <table class="table table-light table-striped ">
            <thead>
                <th>#</th>
                <th>Nombre</th>
                <th></th>
            </thead>
            <tbody>
                @foreach ($evaluados as $evaluado)
                <tr>
                    <td>{{ $evaluado->id }}</td>
                    <td>{{ $evaluado->name }}</td>
                    <td>
                        <form action="{{ route('evaluado.destroy',$evaluado) }}" method="POST">
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
            {{ $evaluados->links() }}

        </div>

        @endif

    </div>

</div>

@endsection
