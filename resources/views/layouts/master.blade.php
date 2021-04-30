<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="{{ asset('externalAssets') }}/css/bootstrap.min.css" >

    <title>{{ env('APP_NAME') }}</title>

    <style>
      #footer {
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
        background-color: #95bfc7;
        color: white;
        padding: 5px 15px;
      }
    </style>

    @livewireStyles

    @yield('css')
    @stack('css')
  </head>
  <body style="background-color: #efefef;">    
    <section id="navbar">
      <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #95bfc7;">
        <div class="container">
          <a class="navbar-brand" href="{{ route('home') }}" style="border-right: 1px solid #000000; padding-right: 30px;">{{ env('APP_NAME') }}</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            @include('layouts.navbar-menu')
          </div>
        </div>
      </nav>
    </section>

    <section id="content" style="padding: 20px 0px;">
      <div class="container">
        <div class="row">
          <div class="col-12">
            @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Berhasil !</strong> <br>
              {{ session('success') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            @endif
            @if (session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>Terjadi Kesalahan !</strong> <br>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            @endif
            @if (session()->has('warning'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
              <strong>Peringatan !</strong> <br>
              {{ session('warning') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            @endif
            @if (session()->has('info'))
            <div class="alert alert-info alert-dismissible fade show" role="alert">
              <strong>Pemberitahuan !</strong> <br>
              {{ session('info') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            @endif
          </div>
          @yield('content')
        </div>
      </div>
    </section>

      
    <section id="footer">
      <h6 class="font-weight-normal text-right m-0">CSS Framework - <a href="https://getbootstrap.com/docs/4.6/getting-started/introduction/" style="text-decoration: none; color: inherit;">Bootstrap v.4.6</a> | M. Gilang R < / > Test Tahap ke-2</h6>
    </section>

    <script src="{{ asset('externalAssets') }}/js/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('externalAssets') }}/js/popper.min.js"></script>
    <script src="{{ asset('externalAssets') }}/js/bootstrap.min.js"></script>

    @livewireScripts

    @yield('script')
    @stack('script')
  </body>
</html>