@extends('frontend.layout')
@section('title','Video')
@section('content')
<div class="container py-4 my-4">
    <div class="row">
        <div class="col-md-12"></div>
    </div>
</div>
<div class="container" id="sldr">
   @foreach($videos as $video)
   <div class="pphoto1" id="centering">
      <!-- <button class="video-play" data-video-id="T2fNPf3UIY8">Engagement Nada & Kemal</button> -->
      <a href="#" class="video-play" data-video-id="{{ $video->yid }}" data-channel="youtube"><img src="{{ url('/'.$video->path_thumbnail) }}" class="img-fluid" alt="{{ $video->title }}"></a>
      <a href="#" class="video-play" data-video-id="{{ $video->yid }}" data-channel="youtube"><i class="far fa-play-circle fa-8x" aria-hidden="true" id="iconplay"></i></a>
      <h5 class="text-center">{{ $video->title }}</h5>
   </div>
   <div class="container border-bottom m-5 mx-auto" id="linessection"></div>
   @endforeach
</div>
@endsection