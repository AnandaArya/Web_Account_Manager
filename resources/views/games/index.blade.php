@extends('layouts/main')

@section('css-libraries')
  <!-- CSS Libraries -->
  <link rel="stylesheet" href="../node_modules/jqvmap/dist/jqvmap.min.css">
  <link rel="stylesheet" href="../node_modules/weathericons/css/weather-icons.min.css">
  <link rel="stylesheet" href="../node_modules/weathericons/css/weather-icons-wind.min.css">
  <link rel="stylesheet" href="../node_modules/summernote/dist/summernote-bs4.css">
@endsection

@section('header-title', 'Game Accounts')

@section('content-body')
    <div class="col-lg col-md-12 col-12 col-sm-12">
      <div class="card">
        <div class="card-header">
          <h4 class="text-info">Searching</h4>
        </div>
        <div class="card-body p-0">
          <div class="row px-4 py-3">
              <div class="col-8">
              <form action="{{ url('games/search') }}" method="get">
                  <input type="text" class="form-control" name="search" id="search" placeholder="Masukan Pencarian...">
              </div>
              <div class="col-4">
                  <button type="submit" class="btn btn-info p-2">Search</button>
              </form>
              </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg col-md-12 col-12 col-sm-12">
      <div class="card">
        <div class="card-header">
          <h4>Latest Posts</h4>
          <div class="card-header-action">
            <a href="{{ url('/games/create') }}" class="btn btn-primary px-1">+ Tambah</a>
          </div>
        </div>
        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table table-striped mb-0">
              <thead>
                <tr>
                  <th>Nama Game</th>
                  <th>Gambar</th>
                  <th>Username</th>
                  <th>Level</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              @foreach($games as $game)
                <tr>
                  <td>{{ $game->title }}</td>
                  <td>
                    <a href="#" class="font-weight-600"><img src="{{ asset('img/'.$game->gambar) }}" alt="avatar" width="200" class="mr-1 my-2"></a>
                  </td>
                  <td>{{ $game->username }}</td>
                  <td>{{ $game->game_level }}</td>
                  <td>
                    <a href="{{ url('games/'.$game->id.'/detail') }}" class="btn btn-success btn-action" data-toggle="tooltip" title="Detail"><i class="fas fa-eye"></i></a>
                    <a href="{{ url('games/'.$game->id.'/edit') }}" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                    <form action="{{ url('games/'.$game->id) }}" method="post" class="d-inline">
                                @method('DELETE')
                                @csrf
                      <!-- <button type="submit" class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete" data-confirm="Apa anda yakin ingin menghapus data?" data-confirm-yes="alert('Deleted')"><i class="fas fa-trash"></i></button> -->
                      <button type="submit" class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete"><i class="fas fa-trash"></i></button>
                    </form>
                  </td>
                </tr>
              @endforeach
                <!-- <tr>
                  <td>
                    Genshin Impact
                  </td>
                  <td>
                    <a href="#" class="font-weight-600"><img src="{{ asset('img/games.png') }}" alt="avatar" width="200" class="mr-1"></a>
                  </td>
                  <td>genshinImpact@gmail.com</td>
                  <td>Adventure RANK 55</td>
                  <td>
                    <a class="btn btn-success btn-action" data-toggle="tooltip" title="Update"><i class="fas fa-eye"></i></a>
                    <a class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                    <a class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete" data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?" data-confirm-yes="alert('Deleted')"><i class="fas fa-trash"></i></a>
                  </td>
                </tr> -->

              </tbody>
              {{ $games->links() }}
            </table>
          </div>
        </div>
      </div>
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
