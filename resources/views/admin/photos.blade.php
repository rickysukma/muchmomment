@extends('admin.layout')

@section('title','Photos')

@section('content')

  <div id="layoutSidenav_content"><div class="container-fluid">
    <div class="card mb-4">
        <div class="card-header"><i class="fas fa-table mr-1"></i>Photos</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Thumbnail</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th style="width:100px; text-align:center;">Albums</th>
                            <th style="width:100px; text-align:center;">Edit</th>
                            <th style="width:100px; text-align:center;">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($photo as $pot)
                          <tr>
                              <td><img style="width: 12em" src="{{ url('/').'/'.$pot->path }}" alt=""></td>
                              <td>{{ $pot->title }}</td>
                              <td>{{ $pot->category }}</td>
                              <td class="md-0"><a href="{{ route('admin.album',['id' => $pot->id]) }}"><i class="fas fa-image"></i></a></td>
                              <td class="md-0"><a href="{{ route('admin.post/edit-photo',['id' => $pot->id]) }}"><i class="fas fa-pencil-alt"></i></a></td>
                              <td class=""><a href="{{ route('admin.post/forcedelete',['id' => $pot->id]) }}"><i class="far fa-trash-alt"></i></a> </td>
                          </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</main>

@endsection
