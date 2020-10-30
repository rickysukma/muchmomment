@extends('frontend.layout')

@section('title','Home')

@section('content')
<div class="container py-4 my-4">
        <div class="row">
          <div class="col-md-12">
          </div>
        </div>
      </div>
    <!-- START SLIDER-->
    <div class="container" id="sldr">
        <div class="main-slider" id="dotssettbl">
          <div class="owl-carousel owl-theme">
            <div class="item">
              <div class="slider-img-main">
                <img src="{{ asset('frontend/images/slider3.jpg') }}">
                <div class="judulslider" id="title">
                  <hr class="new1" id="linesettbl">
                    The Wedding of Yasmine
                </div>
              </div>
            </div>
            <div class="item">
              <div class="slider-img-main">
                <img src="{{ asset('frontend/images/slider6.jpg') }}">
                <div class="judulslider" id="title">
                  <hr class="new1" id="linesettbl">
                  Pre Wedding of Irene & Stephan
                </div>
              </div>
            </div>
            <div class="item">
              <div class="slider-img-main">
                <img src="{{ asset('frontend/images/slider10.jpg') }}">
                <div class="judulslider" id="title">
                  <hr class="new1" id="linesettbl">
                    The Wedding of Martumpol & Lina
                </div>
              </div>
            </div>
            <div class="item">
              <div class="slider-img-main">
                <img src="{{ asset('frontend/images/prewedding/p6/p63.jpg') }}">
                <div class="judulslider" id="title">
                  <hr class="new1" id="linesettbl">
                  Prewedding of E & Mela & Hanung
                </div>
              </div>
            </div>

        </div>
      </div>
    <!-- END SLIDER-->
    
    <div class="container border-bottom m-5 mx-auto" id="linessection">
    </div>

    <!-- START IG FEED -->
      <div class="container">
        <h4 class="text-center" id="titleig">Latest updates from instagram</h4>
        <div id="instagram-feed2"></div>
      </div>
    <!-- END IG FEED -->
    <div class="container border-bottom m-3 mx-auto" id="linessection2">
    @endsection