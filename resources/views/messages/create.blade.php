@extends('layout')

@section('contenido')
<h1>Contactos</h1>

@if (session()->has('info'))
    <h3>{{ session('info') }}</h3>
@else
<form method="POST" action="{{route('messages.store')}}">

    {!! csrf_field() !!}
        <label for="nombre">Nombre
        <input type="text" name="nombre" value="{{old('nombre')}}">
        {!! $errors->first('nombre','<span class=error>:message</span>') !!}
        </label>
        <br>
        <label for="email">
            email
        <input type="email" name="email" value="{{old('email')}}">
        {!! $errors->first('email','<span class=error>:message</span>') !!}
        </label>
        <br>

        <label for="mensaje">
            Mensaje
        <textarea name="mensaje">{{old('mensaje')}}</textarea>
        {!! $errors->first('mensaje','<span class=error>:message</span>') !!}
        </label>
        <br>
        <input type="submit" value="Enviar">
</form>
@endif
@stop