<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$title}} | Sawahku  </title>
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/perfect-scrollbar.css" rel="stylesheet">
    @stack('head')
  </head>
  <body class="bg-secondary text-white">
    <x-layout.components.navbar></x-layout.components.navbar>
    <div class="container-fluid">
      <div class="sidebar">
        <x-layout.components.sidebar :activeLoc="$location" :activeMenu="$category"></x-layout.components.sidebar>
      </div>
      <div class="main mt-4 ms-4">
        {{$slot}}
      </div>
    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="/js/app.js" type="text/javascript"></script>
    @stack('script')
  </body>
</html>