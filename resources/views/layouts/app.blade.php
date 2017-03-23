<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', '无标题') - Laravel 简易相册</title>

    <!-- 加载 CSS -->
    <link href="/css/app.css" rel="stylesheet">
</head>
<body>

    <!-- bootstrap 导航条 -->
    <nav class="navbar navbar-default">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!-- LOGO 首页跳转按钮 -->
          <a class="navbar-brand" href="{{ route('home') }}">Laravel 简易相册</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <!-- 导航按钮 此网站不需要 -->
            <!-- <li><a href="#">Link</a></li> -->
          </ul>
        </div>
      </div>
    </nav>

    <!-- bootstrap 容器 -->
    <div class="container">
        <!-- 显示提示消息 -->
        @include('shared.messages')
        <!-- 网站主体内容 -->
        @yield('content')
    </div>

    <!-- 加载 CSS -->
    <script src="/js/app.js"></script>
    @yield('script')
</body>
</html>
