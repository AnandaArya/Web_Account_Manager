@extends('layouts/main')

@section('css-libraries')
  <!-- CSS Libraries -->
  <link rel="stylesheet" href="../node_modules/jqvmap/dist/jqvmap.min.css">
  <link rel="stylesheet" href="../node_modules/weathericons/css/weather-icons.min.css">
  <link rel="stylesheet" href="../node_modules/weathericons/css/weather-icons-wind.min.css">
  <link rel="stylesheet" href="../node_modules/summernote/dist/summernote-bs4.css">
@endsection

@section('header-title', 'Web Account')

@section('content-body')
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-headers text-center text-primary m-4">
            <h4>Ubah Data Akun web</h4>
          </div>
          <form action="{{ url('webs/'.$web->id) }}" method="post" enctype='multipart/form-data'>
          @method('put')
            @csrf
          <div class="card-body">
            <input type="hidden" name="users_id" value="{{ auth()->user()->id }}">
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
              <div class="col-sm-12 col-md-7">
                <input type="text" name="title" class="form-control" value="{{ $web->title }}" required="required">
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Url</label>
              <div class="col-sm-12 col-md-7">
                <input type="text" name="url" class="form-control" value="{{ $web->url }}" required="required">
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
              <div class="col-sm-12 col-md-7">
                <input type="text" name="email" class="form-control" value="{{ $web->email }}" required="required">
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Password</label>
              <div class="col-sm-12 col-md-7">
                <input type="text" name="password" class="form-control" value="{{ $web->password }}" required="required">
              </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Note</label>
              <div class="col-sm-12 col-md-7">
                <textarea name="note" class="summernote-simple col-12 py-4" required="required">{{ $web->title }}</textarea>
              </div>
            </div>
            </div>
            <div class="form-group row mb-4">
              <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
              <div class="col-sm-12 col-md-7">
                <button type="submit" class="btn btn-primary">Ubah</button>
              </div>
            </div>
          </div>
          </form>
        </div>
      </div>
    </div>
  @endsection
