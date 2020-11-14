 <!-- START PHOTO ABOUT-->
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
    <h2 class="titleabout" id="titleaboutteks">About Us</h2>
    <h6 class="textabout" id="aboutteks">We are wedding photographer based in jakarta. Muchmoments specializes in the use of medium format cameras, in natural light, and incredible landscapes. We have been in business since 2017 and shoot many weddings per year. Whether you are looking for an entertaining Highlights Photo and Video, a full Documentary or a breathtaking Cinematic Wedding Day Highlight Photo and Video, we have the passion.
    <!-- <br><br> -->
    </h6> 
    <!-- <h6 class="textabout" id="aboutteks2">We have been in business since 2017 and shoot many weddings er year. Whether you are looking for an entertaining Highlights Photo and Video, a ful Documentary or a breathtaking Cinematic Wedding Day Highlight Photo and Video, we have the passion.
    </h6>  -->
    <!-- portrait -->
    <div class="d-flex justify-content-center">
    <div class="pphotod1" id="padingsetfotokiri">
        <img src="{{ asset('frontend/images/wedding/w2/w21.jpg') }}" class="img-fluid" alt="Responsive image">
        <!-- <h5 class="text-center">Prewedding of T & E</h5>  -->
    </div>   
    <div class="pphotd1" id="padingsetfotokanan">
        <img src="{{ asset('frontend/images/prewedding/p3/ptr2.jpg') }}" class="img-fluid" alt="Responsive image">
        <!-- <h5 class="text-center">Prewedding of Tantya & Erwin</h5>  -->
    </div>   
</div>
    <!-- END PHOTO ABOUT-->
@endsection