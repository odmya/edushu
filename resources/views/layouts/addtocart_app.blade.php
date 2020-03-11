<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', '中小学生免费借书平台') - 共享书房</title>
    <!-- 样式 -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
<script src="{{ mix('js/app.js') }}"></script>
@section('jssdk')

@show

</head>
<body>
<div id="app" class="{{ route_class() }}-page">
        @include('layouts._header')
        <div class="container wechat_content">
            @yield('content')
        </div>
</div>
        @include('layouts.addtocart_footer')

    <!-- JS 脚本 -->

    @yield('scriptsAfterJs')
</body>
</html>