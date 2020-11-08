@extends('frontend.layout')

@section('title','Album of '.$header->title)

@section('content')

<div class="overlay"></div>
    <div class="container py-4 my-4">
    <div class="row">
        <div class="col-md-12">
        </div>
    </div>
</div>

<!-- START DETAIL PHOTO ENGAGEMENT3 -->
<div class="container" id="sldr">
  <div class="d-flex justify-content-center">
      @foreach ($album as $key => $item)
      <div class="pphotodl1" id="padingsetfotokiri">
        <img src="{{ url('/'.$item->path) }}" class="img-fluid" alt="Responsive image">
      </div>

      @if ($key % 2 == 0)
        </div>
        <div class="d-flex justify-content-center">
      @endif

    @endforeach
  </div>
    <!-- portrait -->
    {{-- <div class="d-flex justify-content-center">
      <div class="pphotod1" id="padingsetfotokiri">
        <img src="../images/engagement/e1/e11.jpg" class="img-fluid" alt="Responsive image">
      </div>   
      <div class="pphotd1" id="padingsetfotokanan">
        <img src="../images/engagement/e1/e14.jpg" class="img-fluid" alt="Responsive image">
      </div>   
    </div> --}}

    <!-- landscape -->  
    {{-- <div class="pphotodl1">
      <img src="../images/engagement/e1/e13.jpg" class="img-fluid" alt="Responsive image">
    </div> --}}

    <!-- portrait -->
    {{-- <div class="d-flex justify-content-center">
      <div class="pphotod1" id="padingsetfotokiri">
        <img src="../images/engagement/e1/e14.jpg" class="img-fluid" alt="Responsive image">
      </div>   
      <div class="pphotd1" id="padingsetfotokanan">
        <img src="../images/engagement/e1/e16.jpg" class="img-fluid" alt="Responsive image">
      </div>   
    </div> --}}

    <!-- landscape -->
    {{-- <div class="pphotodl1">
      <img src="../images/engagement/e1/e15.jpg" class="img-fluid" alt="Responsive image">
    </div> 
    <div class="pphotodl1">
      <img src="../images/engagement/e1/e14.jpg" class="img-fluid" alt="Responsive image">
    </div>      --}}
    <h5 class="text-center">{{ $header->title }}</h5> 
    <div class="container border-bottom mt-5 mx-auto" id="linessectionsubphotodetail">
    </div>
  </div>     
<!-- END DETAIL PHOTO ENGAGEMENT3 -->

@endsection