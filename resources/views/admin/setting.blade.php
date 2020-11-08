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
            <input name="instagram" type="text" class="form-control" id="exampleFormControltitle" placeholder="ex : akundodolan_ tanpa tanda '@'" value="{{ $option->instagram }}" required>
          </div>

          <div class="form-group">
            <label for="exampleFormControltitle">Whatsapp Number</label>
            <input name="whatsapp" type="text" class="form-control" id="exampleFormControlYtId" placeholder="6289572342364 tanpa tanda '+'" value="{{ $option->whatsapp }}" required>
          </div>

          <div class="form-group">
            <label for="exampleFormControltitle">Kontak Email</label>
            <input name="email" type="email" class="form-control" id="exampleFormControlYtId" placeholder="email@mail.com" value="{{ $option->email }}" required>
          </div>
          <br>
          <div class="form-group" style="">
            <label for="exampleFormControltitle">SMTP Email Setting [Gmail Only]</label>
          </div>
          <hr>

          <div class="form-group" style="display: none">
            <label for="exampleFormControltitle">Kontak Telepon</label>
            <input name="telp" type="text" class="form-control" id="exampleFormControlYtId" placeholder="email@mail.com" value="{{ $option->telepon }}">
          </div>

          <div class="form-group">
            <label for="exampleFormControltitle">Email Setting</label>
            <input name="emailkontak" type="text" class="form-control" id="exampleFormControlYtId" placeholder="email@mail.com" value="{{ $option->emailkontak }}" required>
          </div>

          <div class="form-group">
            <label for="exampleFormControltitle">Password Email</label>
            <input name="passwordemail" type="password" class="form-control" id="exampleFormControlYtId" placeholder="email@mail.com" value="{{ $option->passwordemail }}" required>
          </div>

          <button value="submit" class="btn btn-success">Save Setting</button>
        </form>
      </div>
    </div>
  </div>
</div>
</main>

@endsection
