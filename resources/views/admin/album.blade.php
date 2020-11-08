@extends('admin.layout')

@section('title','Photos')

@section('content')

<style>
  .form-inline {
    display: flex;
    flex-flow: row wrap;
    align-items: center;
  }

  /* Style the input fields */
.form-inline input {
  vertical-align: middle;
  margin: 5px 10px 5px 0;
  padding: 10px;
  background-color: #fff;
  border: 1px solid #ddd;
}

/* Style the submit button */
.form-inline button {
  padding: 10px 20px;
  background-color: dodgerblue;
  border: 1px solid #ddd;
  color: white;
}

.form-inline button:hover {
  background-color: royalblue;
}

/* Add responsiveness - display the form controls vertically instead of horizontally on screens that are less than 800px wide */
@media (max-width: 800px) {
  .form-inline input {
    margin: 10px 0;
  }

  .form-inline {
    flex-direction: column;
    align-items: stretch;
  }
}

.close{
  position: absolute;
  z-index: 2;
  right: 20px;
  top: 10px;
}
img {
  position: relative;
  width: 100%;
}

</style>

  <div id="layoutSidenav_content"><div class="container-fluid">
    <div class="container">

    <h1 class="font-weight-light text-center text-lg-left mt-4 mb-0">ALBUM OF {{ $header->title }}</h1>
      
        <hr class="mt-2 mb-5">
        
        <form class="form-inline" action="{{ route('admin.album-upload',['id' => $header->id]) }}" method="POST" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="">
            <input type="file" name="image" id="UploadFile">
            <input type="submit" value="Upload">
          </div>
        </form>
        
        @if ($errors->any())
          <div class="alert alert-danger" role="alert">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif

        <div class="row text-center text-lg-left mt-4">
        
          @foreach ($albums as $i => $ab)
          {{-- @if ($i % 4 == 0)
          @endif --}}
          
          <div class="col-lg-3 col-md-4 col-6">
            <button onclick="hapus('{{ $ab->id }}')" title="Hapus" class="btn close"><i class="fa fa-times text-danger"></i></button>
            <img class="img-fluid img-thumbnail" src="{{ url('/'.$ab->path) }}" alt="">
          </div>
          
          @if ($i % 4 == 0)
            </div>
            <div class="row text-center text-lg-left mt-4">
          @endif

        @endforeach
      </div>

      </div>
</div>
<script>
  
</script>
@endsection
