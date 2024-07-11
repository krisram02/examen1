<!-- resources/views/apuestas/create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Apuesta</h1>
    <form action="{{ route('apuestas.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="id_juego">Juego</label>
            <select name="id_juego" id="id_juego" class="form-control">
                @foreach($juegos as $juego)
                    <option value="{{ $juego->id }}">{{ $juego->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="fecha">Fecha</label>
            <input type="datetime-local" name="fecha" id="fecha" class="form-control">
        </div>
        <div class="form-group">
            <label for="monto">Monto</label>
            <input type="number" name="monto" id="monto" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Crear</button>
    </form>
</div>
@endsection
