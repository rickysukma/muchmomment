@extends('admin.layout')

@section('title','Setting')

@section('content')

<div id="layoutSidenav_content"><div class="container-fluid">
  <h1 class="mt-4">Setting</h1>
  <div class="row ml-2">
    <div class="card col-sm-8 shadow p-3 mb-5 bg-white rounded">
      <div class="card-body">
      @include('layouts/errors')
      <form action="{{ route('admin.setting-save') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}

          <div class="form-group">
            <label for="exampleFormControltitle">Instagram Username</label>
            <input name="ig" type="text" class="form-control" id="exampleFormControltitle" placeholder="ex : akundodolan_ tanpa tanda '@'" value="{{ $option['ig'] }}" required>
          </div>

          <div class="form-group">
            <label for="exampleFormControltitle">Whatsapp Number</label>
            <input name="wa" type="text" class="form-control" id="exampleFormControlYtId" placeholder="6289572342364 tanpa tanda '+'" value="{{ $option['wa'] }}" required>
          </div>

          <div class="form-group">
            <label for="exampleFormControltitle">Kontak Email</label>
            <input name="email" type="email" class="form-control" id="exampleFormControlYtId" placeholder="email@mail.com" value="{{ $option['email'] }}" required>
          </div>

          <div class="form-group" style="display: none">
            <label for="exampleFormControltitle">Kontak Telepon</label>
            <input name="telp" type="text" class="form-control" id="exampleFormControlYtId" placeholder="email@mail.com" value="{{ $option['telp'] }}" required>
          </div>

          <button value="submit" class="btn btn-success">Save Setting</button>
        </form>
      </div>
    </div>
  </div>
</div>
</main>

@endsection
