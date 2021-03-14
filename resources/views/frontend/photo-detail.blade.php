@extends('frontend.layout')

@section('title','Album of '.$header->title)

@section('content')

@php
    $arr = [];
@endphp

@foreach ($album as $item)
  @php 
    list($width, $height) = getimagesize($item->path);

    if ( $width > $height ) {
    // Landscape image
    $arr['landscape'][] = $item;

    }
    elseif ( $width < $height ) {
    // Portrait
    if(count($arr['potrait'] >= 2)){
      $arr['nextpotrait'][] = $item;
      continue;
    }
    $arr['potrait'][] = $item;
    }
    else {
    }
  @endphp
@endforeach
@php
    
print_r($arr)

@endphp

<div class="overlay"></div>
    <div class="container py-4 my-4">
    <div class="row">
        <div class="col-md-12">
        </div>
    </div>
</div>

<!-- START DETAIL PHOTO ENGAGEMENT3 -->
<div class="container" id="sldr">
  {{-- <div class="d-flex justify-content-center"> --}}
      {{-- @foreach ($album as $key => $item)
      <div class="pphotodl1" id="padingsetfotokiri">
        <img src="{{ url('/'.$item->path) }}" class="img-fluid" alt="Responsive image">
      </div>

      @if ($key % 2 == 0)
        </div>
        <div class="d-flex justify-content-center">
      @endif

    @endforeach --}}
  {{-- </div> --}}
    <!-- portrait -->
    @if (!empty($arr['potrait']))
    <div class="d-flex justify-content-center">
      @php
          $genap = true;
      @endphp
      
      @foreach ($arr['potrait'] as $key => $item)
      @if ($key % 2 != 0)
          @php
              $genap = false;
              $padding = 'padingsetfotokanan';
          @endphp
      @else
          @php
              $genap = true;
              $padding = 'padingsetfotokiri';
          @endphp
      @endif
      
      <div class="pphotodl1" id="{{$padding}}">
        <img src="{{ url('/'.$item->path) }}" class="img-fluid" alt="Responsive image">
      </div>

      @if (!$genap)
        </div>
        <div class="d-flex justify-content-center">
      @endif

      @if($key == count($arr['potrait'])-1)
        </div>
      @endif

      @endforeach
    @endif
    
    {{-- landscapr --}}
    @if (!empty($arr['landscape']))
    @foreach ($arr['landscape'] as $i => $land)

      @if ($i == 1)
          <div class="d-flex justify-content-center">
            <div class="pphotod1" id="padingsetfotokiri">
              <img src="{{ url('/'.$land->path) }}" class="img-fluid" alt="Responsive image">
            </div>   
      @elseif($i == 2)
            <div class="pphotd1" id="padingsetfotokanan">
              <img src="{{ url('/'.$land->path) }}" class="img-fluid" alt="Responsive image">
            </div>   
          </div>
      @else
      
      @if (!empty($arr['nextpotrait']))
        <div class="d-flex justify-content-center">
      @php
          $genap = true;
      @endphp
      
      @foreach ($arr['nextpotrait'] as $key => $item)
      @if ($key % 2 != 0)
          @php
              $genap = false;
              $padding = 'padingsetfotokanan';
          @endphp
      @else
          @php
              $genap = true;
              $padding = 'padingsetfotokiri';
          @endphp
      @endif
      
      <div class="pphotodl1" id="{{$padding}}">
        <img src="{{ url('/'.$item->path) }}" class="img-fluid" alt="Responsive image">
      </div>

      @if (!$genap)
        </div>
        <div class="d-flex justify-content-center">
      @endif

      @if($key == count($arr['nextpotrait'])-1)
        </div>
      @endif
      
      @endforeach
    @endif


        <div class="pphotodl1">
          <img src="{{ url('/'.$land->path) }}" class="img-fluid" alt="Responsive image">
        </div>
      @endif
    @endforeach
    @endif

    <h5 class="text-center">{{ $header->title }}</h5> 
    <div class="container border-bottom mt-5 mx-auto" id="linessectionsubphotodetail">
    </div>
  </div>     
<!-- END DETAIL PHOTO ENGAGEMENT3 -->

@endsection