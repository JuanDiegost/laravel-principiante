<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMessageRequest;

class PagesController extends Controller
{

    public function __construct()
    {
        $this->middleware('example',['only'=>['home']]);
    }

    public function home()
    {
        return view('home');
    }

    public function contactos()
    {
        return view('contactos');
    }

    public function mensajes(CreateMessageRequest $request)
    {
        $data= $request->all();
        return back()->with('info','Tu mensaje ha sido enviado');
    }

    public function saludos($nombre="Invitado")
    {
        $html = "<h1>Contenido </h1>";
        $consolas = [
            "play 4",
            "xbox one",
            "nintendo"
        ];
        return view('saludo',compact('nombre','html','consolas'));
    }
}
 