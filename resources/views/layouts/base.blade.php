<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
      <meta charset="utf-8">
      <title>EPICI - Marcory</title>
      @yield('style')
      <link rel="stylesheet" href="/css/app.css">
      <link rel="stylesheet" href="/css/plugins/font-awesome.min.css">
      <link rel="stylesheet" type="text/css" href="/css/plugins/datatables.bootstrap.min.css"/>
  </head>
  <body>
      @include('inc.topbar')
      <div class="container-fluid mimin-wrapper">
        @include('inc.sidebar')
        <div id="main-content" class="" style="padding-left:230px;">
          @yield('content')
        </div>
      </div>
      <!-- start: Javascript -->
      <script src="/js/jquery.min.js"></script>
      <script src="/js/jquery.ui.min.js"></script>
      <script src="/js/bootstrap.min.js"></script>
      <script src="/js/plugins/moment.min.js"></script>
      @yield('script')
      <script src="/js/main.js"></script>
  </body>
</html>
