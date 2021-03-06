@extends('frontend.layout')

@section('title','About Us')

@section('content')

<div class="overlay"></div>
    <div class="container py-4 my-4">
    <div class="row">
        <div class="col-md-12">
        </div>
    </div>
</div>

<div class="container" id="sldr">
    @php
    if(count($photos) > 0){
    @endphp
    @foreach($photos as $poto)
    <div class="pphoto1" id="dotssettbl">
        <a href="{{ route('photo.slug',['slug' => $poto->slug]) }}"><img src="{{ url('/'.$poto->path) }}" class="img-fluid" alt="Responsive image"></a>
        <h5 class="text-center">{{ $poto->title }}</h5> 
    </div>   
        <div class="container border-bottom m-5 mx-auto" id="linessection">
    </div>
    @endforeach
    @php
    } else {
    echo "<center>No data</center>";
    }
    @endphp
    <div class="container.">{{ $photos->links('pagination::custom-pagination') }}</div>
    {{-- <div class="container border-bottom mt-5 mx-auto" id="linessectionsubphoto"> --}}
    </div>
</div> 

@endsection