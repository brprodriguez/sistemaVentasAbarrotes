<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="Sistema de Abarrotes" />
        <meta name="author" content="BRP" />
        <title>Sistema Ventas - @yield('title')</title>        
        @stack('css') 
        <link href="{{ asset('css/template.css')}}" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        
    </head>
    <body class="sb-nav-fixed">
     
    <x-navigation-header2 />
        <div id="layoutSidenav">
        
        <x-navigation-menu2 />
            <div id="layoutSidenav_content">
                <main>
                    @yield('content')
                </main>
                <x-footer2></x-footer2>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset( 'js/scripts.js' )}}"></script>
        @stack('js')

 
    </body>
</html>
