<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        .active{
            text-decoration: none;
            color: green;
        }
        .error{
            color: red;
        }
    </style>
    <title>Document</title>
</head>
<body>
    <header>
        <?php function activeMenu($url){
            return request()->is($url) ? 'active' : '';
        }?>
        <nav>
            <a class="{{ activeMenu('/') }}" href="{{ route('home') }}">Inicio</a>
            <a class="{{ activeMenu('saludos/*') }}" href="{{ route('saludos','juan') }}">Saludos</a>
            <a class="{{ activeMenu('mensajes/create') }}" href="{{ route('messages.create') }}">Contacto</a>
            <a class="{{ activeMenu('mensajes') }}" href="{{ route('messages.index') }}">Mensajes</a>
        
        </nav>
    </header>
    @yield('contenido')
    <footer>Copyright {{date('Y')}}</footer>
</body>
</html>