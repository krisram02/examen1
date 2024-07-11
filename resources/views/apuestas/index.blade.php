@extends('layouts.app')

@section('title', 'Lista de Apuestas')

@section('content')
<div class="card">
    <div class="card-header">
        <h1>Lista de Apuestas</h1>
        <a href="{{ route('apuestas.create') }}" class="btn btn-primary">Nueva Apuesta</a>
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Juego</th>
                    <th>Fecha</th>
                    <th>Monto</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($apuestas as $apuesta)
                <tr>
                    <td>{{ $apuesta->id }}</td>
                    <td>{{ $apuesta->juego->nombre }}</td>
                    <td>{{ $apuesta->fecha }}</td>
                    <td>{{ $apuesta->monto }}</td>
                    <td>
                        <a href="{{ route('apuestas.edit', $apuesta->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        <form action="{{ route('apuestas.destroy', $apuesta->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection