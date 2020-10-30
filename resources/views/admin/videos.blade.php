@extends('admin.layout')

@section('title','Videos')

@section('content')

  <div id="layoutSidenav_content"><div class="container-fluid">
    <div class="card mb-4">
        <div class="card-header"><i class="fas fa-table mr-1"></i>Videos</div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Thumbnail</th>
                            <th>Video</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th style="width:100px; text-align:center;">Edit</th>
                            <th style="width:100px; text-align:center;">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($videos as $vid)
                          <tr>
                              <td><img style="width: 12em" src="{{ url('/').'/'.$vid->path_thumbnail }}" alt=""></td>
                              <td><iframe
                                src="https://www.youtube.com/embed/{{$vid->yid}}">
                                </iframe></td>
                              <td>{{ $vid->title }}</td>
                              <td>{{ $vid->category }}</td>
                              <td class="md-0"><a href="{{ route('admin.post/edit-video',['id' => $vid->id]) }}"><i class="fas fa-pencil-alt"></i></a></td>
                              <td class=""><a href="{{ route('admin.category/delete',['id' => $vid->id]) }}"><i class="far fa-trash-alt"></i></a> </td>
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
