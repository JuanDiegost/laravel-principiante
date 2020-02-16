@extends('layout')

@section('contenido')
    <h1>hola {{  $nombre  }}</h1>
    <ul>

        @forelse ($consolas as $consola)
            <li>{{$consola}}</li>
        @empty
            <p>No hay</p>
        @endforelse
    </ul>
@stop