@extends('layouts/main')

@section('css-libraries')
  <!-- CSS Libraries -->
  <link rel="stylesheet" href="../node_modules/jqvmap/dist/jqvmap.min.css">
  <link rel="stylesheet" href="../node_modules/weathericons/css/weather-icons.min.css">
  <link rel="stylesheet" href="../node_modules/weathericons/css/weather-icons-wind.min.css">
  <link rel="stylesheet" href="../node_modules/summernote/dist/summernote-bs4.css">
@endsection

@section('header-title', 'Web Accounts')

@section('content-body')
    <div class="col-lg col-md-12 col-12 col-sm-12">
      <div class="card">
        <div class="card-header">
          <h4 class="text-info">Searching</h4>
        </div>
        <div class="card-body p-0">
          <div class="row px-4 py-3">
              <div class="col-8">
              <form action="{{ url('webs/search') }}" method="get">
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
            <a href="{{ url('/webs/create') }}" class="btn btn-primary px-1">+ Tambah</a>
          </div>
        </div>
        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table table-striped mb-0">
              <thead>
                <tr>
                  <th>Title</th>
                  <th>Url</th>
                  <th>Email</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              @foreach($webs as $web)
                <tr>
                  <td>{{ $web->title }}</td>
                  <td><a href="{{ $web->url }}" target="blank">{{ $web->url }}</a></td>
                  <td>{{ $web->email }}</td>
                  <td>
                    <a href="{{ url('webs/'.$web->id.'/detail') }}" class="btn btn-success btn-action" data-toggle="tooltip" title="Detail"><i class="fas fa-eye"></i></a>
                    <a href="{{ url('webs/'.$web->id.'/edit') }}" class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                    <form action="{{ url('webs/'.$web->id) }}" method="post" class="d-inline">
                                @method('DELETE')
                                @csrf
                      <!-- <button type="submit" class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete" data-confirm="Apa anda yakin ingin menghapus data?" data-confirm-yes="alert('Deleted')"><i class="fas fa-trash"></i></button> -->
                      <button type="submit" class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete"><i class="fas fa-trash"></i></button>
                    </form>
                  </td>
                </tr>
              @endforeach

              </tbody>
                {{ $webs->links() }}
            </table>
          </div>
        </div>
      </div>
    </div>
  @endsection
