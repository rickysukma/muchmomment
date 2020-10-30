@extends('admin.layout')

@section('title','Create Post')

@section('content')

<div id="layoutSidenav_content"><div class="container-fluid">
  <h1 class="mt-4">Create Post</h1>
  <div class="row ml-2">
    <div class="card col-sm-8 shadow p-3 mb-5 bg-white rounded">
      <div class="card-body">
      @include('layouts/errors')
      <form action="{{ route('admin.post/store-video') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}

          <div class="form-group">
            <label for="exampleFormControltitle">Title</label>
            <input name="title" type="text" class="form-control" id="exampleFormControltitle" placeholder="Enter title of the post..." value="{{ old('title') }}" required>
          </div>

          <div class="form-group">
            <label for="exampleFormControltitle">Youtube Id</label>
            <input name="yid" type="text" class="form-control" id="exampleFormControlYtId" placeholder="Enter youtubr id ex : xV2mBs9" value="{{ old('title') }}" required>
          </div>

          <div class="form-group">
            <label for="exampleFormControlSelect1">Select Category</label>
            <select name="category" class="form-control" id="exampleFormControlSelect1">
              @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="exampleFormControlFile1">Upload Thumbnail</label>
            <input name="image" type="file" class="form-control-file form-control" id="exampleFormControlFile1" style="height:2.8rem;">
          </div>

          <button value="submit" class="btn btn-success">Publish Post</button>
        </form>
      </div>
    </div>
  </div>
</div>
</main>

@endsection
