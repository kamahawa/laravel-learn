<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>My site @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('public/template/css/mystyle.css') }}">
</head>
<body>
    <div id="wrapper">
        <div id="header">
            @include('views.marquee', ['mar_content' => 'Chao mung den voi website'])
            @section('sidebar')
                Day la menu

            @show
        </div>
        <div id="content">
            @yield('content')
        </div>
        <div id="footer"></div>
    </div>
</body>
</html>