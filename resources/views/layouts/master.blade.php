<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="{{ asset('assets/images/logo.png') }}" />

</head>

<body id="body">

    @include('layouts.inc.admin-navbar')
    @include('layouts.inc.admin-sidebar')
    <main id="main" style="margin-left: 150px">
        @yield('content')
    </main>

    <script src="{{asset('assets/js/script.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        if (!localStorage.getItem("sidebarState")) {
        localStorage.setItem("sidebarState", "collapsed");
    }
    
    document.addEventListener("DOMContentLoaded", function () {
        const sidebarState = localStorage.getItem("sidebarState");
        if (sidebarState == "expanded") {
            menu_toggler();
            
        }
    });

    if (!localStorage.getItem("theme")) {
        localStorage.setItem("theme", "light");
    }
    
    document.addEventListener("DOMContentLoaded", function () {
        const theme = localStorage.getItem("theme");
        if (theme == "dark") {
            themeChange();
            localStorage.setItem("theme","dark")
        }
    });
    </script>

    @yield('scripts')

</body>
</html>