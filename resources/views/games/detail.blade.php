@extends('layouts/main')

@section('css-libraries')
  <!-- CSS Libraries -->
  <link rel="stylesheet" href="../node_modules/jqvmap/dist/jqvmap.min.css">
  <link rel="stylesheet" href="../node_modules/weathericons/css/weather-icons.min.css">
  <link rel="stylesheet" href="../node_modules/weathericons/css/weather-icons-wind.min.css">
  <link rel="stylesheet" href="../node_modules/summernote/dist/summernote-bs4.css">
  
@endsection

@section('header-title', 'Game Account')

@section('content-body')
    <div class="row">
      <div class="col-lg-6">
        <div class="card">
          <div class="card-header text-primary m-4">
            <h4>Detail Data Akun Game</h4>
          </div>
          <form action="{{ url('games/'.$game->id) }}" method="post" enctype='multipart/form-data'>
          @method('put')
            @csrf
          <div class="card-body">
            <input type="hidden" name="users_id" value="{{ auth()->user()->id }}">
            <input type="hidden" name="id" value="{{ $game->id }}">
            <div class="form-group row mb-4">
              <h5 class="text-md-right col-12 col-md-3 col-lg-3 mt-1">Nama Game :</h5>
              <div class="col-sm-12 col-md-7">
                <h5 class="mt-1">{{ $game->title }}</h5>
              </div>
            </div>
            <div class="form-group row mb-4">
              <h5 class="text-md-right col-12 col-md-3 col-lg-3 mt-1">Game Level :</h5>
              <div class="col-sm-12 col-md-7">
                <h5 class="mt-1">{{ $game->game_level }}</h5>
              </div>
            </div>
            <div class="form-group row mb-4">
              <h5 class="text-md-right col-12 col-md-3 col-lg-3 mt-1">Username :</h5>
              <div class="col-sm-12 col-md-7">
                <h5 class="mt-1">{{ $game->username }}</h5>
              </div>
            </div>
            <div class="form-group row mb-4">
              <h5 class="text-md-right col-12 col-md-3 col-lg-3 mt-1">Password :</h5>
              <div class="col-sm-12 col-md-7">
                <h5 class="mt-1">{{ $game->password }}</h5>
              </div>
            </div>
            <div class="form-group row mb-4">
              <h5 class="text-md-right col-12 col-md-3 col-lg-3 mt-1">Note :</h5>
              <div class="col-sm-12 col-md-7">
                <h5 class="mt-1">{{ $game->note }}</h5>
              </div>
            </div>
          </div>
          </form>
        </div>
      </div>

      <div class="col-lg-6" style="height: 740px!important;">
        <img src="{{ asset('img/'.$game->gambar) }}" class="img-fluid" alt="gambar-menu" style="height: 460px!important;">
      </div>
  @endsection
  <!-- General JS Scripts -->
  <!-- <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="../assets/js/stisla.js"></script> -->

  <!-- JS Libraies -->
  <!-- <script src="../node_modules/simpleweather/jquery.simpleWeather.min.js"></script>
  <script src="../node_modules/chart.js/dist/Chart.min.js"></script>
  <script src="../node_modules/jqvmap/dist/jquery.vmap.min.js"></script>
  <script src="../node_modules/jqvmap/dist/maps/jquery.vmap.world.js"></script>
  <script src="../node_modules/summernote/dist/summernote-bs4.js"></script>
  <script src="../node_modules/chocolat/dist/js/jquery.chocolat.min.js"></script> -->

  <!-- Template JS File -->
  <!-- <script src="../assets/js/scripts.js"></script>
  <script src="../assets/js/custom.js"></script> -->

  <!-- Page Specific JS File -->
  <!-- <script src="../assets/js/page/index-0.js"></script>
</body> -->
