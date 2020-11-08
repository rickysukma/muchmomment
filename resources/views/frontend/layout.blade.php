<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Much Moments Website</title>
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}"/>

    <!-- Custom Fonts -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/fonts/montserrat/montserrat.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/fontawesome/css/all.min.css')}}">

    <!-- Css External -->
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}"/>
    <link rel="stylesheet" href="{{ asset('frontend/css/modal-video.min.css') }}"/>

    <!-- Css Inline -->
    <style>
      code {
        display: inline-block;
      }
  
      code,
      .hamburger {
        vertical-align: middle;
      }
 
    </style>
    <!-- Css 3rd Party -->
      <link rel="stylesheet" href="{{ asset('frontend/css/hamburgers.css') }}">

    <!-- Owl Carousel-->
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.theme.default.css') }}">
  </head>

  <body>

    <!-- START NAVBAR-->
      <!-- Start Navbar Brand-->     
      <!-- <div class="container mx-auto fixed-top" style="width: 200px;"> -->
      <div class="container mx-auto" style="width: 200px;">
        <img src="{{ asset('frontend/images/muchmomentlogo.png') }}" class="brand" alt="..." id=logo>
      </div>
      <!-- End Navbar Brand-->  

      <!-- Start Navbar Brand Hidden & Hamburger Menu-->     
      <!-- <nav class="navbar navbar-expand-lg navbar-white bg-white justify-content-sm-start fixed-top"> -->
  <nav class="navbar navbar-expand-lg navbar-white bg-white justify-content-center fixed-top">
        <span class=" border-top" id="linetop"> 
        <div class="container border-bottom">
          <img src="{{ asset('frontend/images/muchmomentlogo.png') }}" class="brand" alt="..." hidden>
          <button class="navbar-toggler align-self-start" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <div class="hamburger hamburger--3dx-r" id="iphone5set">
              <div class="hamburger-box">
                <div class="hamburger-inner"></div>
              </div>
            </div>
          </button>
          <!-- End Navbar Brand Hidden & Hamburger Menu-->     
          
          <!-- Start Navbar Dropdown Menu-->
          <div class="collapse navbar-collapse bg-white justify-content-lg-end d-flex flex-column flex-lg-row flex-xl-row mobileMenu onRight"
          id="navbarSupportedContent">
          <!-- <div class="collapse navbar-collapse bg-white p-3 p-lg-0 mt-5 mt-lg-0 justify-content-lg-end  d-flex flex-column flex-lg-row flex-xl-row mobileMenu onRight"
            id="navbarSupportedContent"> -->
            <ul class="navbar-nav align-self-stretch">
              <!-- <li class="nav-item active"><a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
              </li> -->
              
              <li class="nav-item">
                <a class="nav-link" href="/" tabindex="-1" >Home</a>
              </li>

              <!-- Start Dropdown Photography Menu-->
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#Photography" id="navbarDropdown"
                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Photography
              </a>
              <div class="dropdown-menu active" aria-labelledby="navbarDropdown">
                @foreach($categories as $category)

                @php $str = strtolower($category->name) @endphp
                <a class="dropdown-item" href="{{ route('photo',['id' => $str ]) }}">{{ $category->name }}</a>
                @endforeach
              </div>
            </li>
            <!-- End Dropdown Photography Menu-->
            
            <!-- Start Dropdown Videography Menu-->
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#Videography" id="navbarDropdown"
              role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Videography
            </a>
            <div class="dropdown-menu active" aria-labelledby="navbarDropdown">
                @foreach($categories as $category)

                @php $str = strtolower($category->name) @endphp
                <a class="dropdown-item" href="{{ route('videos',['id' => $str ]) }}">{{ $category->name }}</a>
                @endforeach
              </div>
          </li>
          <!-- End Dropdown Videography Menu-->
          
          <li class="nav-item">
            <a class="nav-link" href="{{ route('about') }}" tabindex="-1" >About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{  route('contact') }}" tabindex="-1" >Contact Us</a>
          </li>
          </ul>
          <!-- <form class="form-inline my-2 my-lg-0 align-self-stretch">
            <input
            class="form-control mr-sm-2"
            type="search"
            placeholder="Search"
            aria-label="Search"
            />
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
              Search
            </button>
          </form> -->
     
        </div>
  </nav>
  <div class="container border-bottom fixed-top"></div>
  

      <!-- Overlay dark Nav sidebar-->
      <div class="overlay"></div>
    <!-- END NAVBAR-->
    @yield('content')
    <br><br>
    </div>
    <!-- START FOOTER -->
    <!-- <div class="d-flex align-content-start flex-wrap justify-content-center">
      <i class="fa-1x fab fa-whatsapp text-grey ml-2"></i>
      <a href="#" id="captionfooter">+62 812 1880 0023</a>
      <i class="fa-1x fab fa-instagram text-grey ml-2"></i>
      <a href="#" id="captionfooter">muchmoments</a>
      <i class="fa-1x far fa-envelope text-grey ml-2"></i>
      <a href="#" id="captionfooter">muchmoments@gmail.com</a>
    </div> -->
  <div class="container">
    <div class="d-flex flex-column bd-highlight mb-1">
      <div class="ml-3 bd-highlight">
        <i class="fa-1x fab fa-whatsapp text-grey ml-2"></i>
        <a href="https://wa.me/{{ $option['wa'] }}?text=Halo%20Muchmoments!%20boleh%20dikirimkan%20price%20list%20" target="_blank" id="captionfooter">+{{ $option['wa'] }}</a>
      </div>
      <div class="ml-3 bd-highlight">
        <i class="fa-1x fab fa-instagram text-grey ml-2"></i>
        <a href="https://www.instagram.com/{{ $option['ig'] }}/?hl=id" id="captionfooter">{{ $option['ig'] }}</a>
      </div>
      <div class="ml-3 bd-highlight">
        <i class="fa-1x far fa-envelope text-grey ml-2"></i>
        <a href="mailto:{{ $option['email'] }}?subject = Feedback&body = Message" id="captionfooter">{{ $option['email'] }}</a>
      </div>
      <br><br>
    </div>
  </div>
    <!-- <div class="container mx-auto">
      <div class="row justify-content-center">
        <div class="col-6 col-md-4 ">
          <div class="float-right" id="ikonkiri">
            <i class="fa-1x fab fa-whatsapp text-grey ml-2"></i>
            <a href="#" id="captionfooter">+62 812 1880 0023</a>
          </div>
        </div>
        <div class="col-6 col-md-4">
          <div class="text-center" id="ikontengah">
            <i class="fa-1x fab fa-instagram text-grey ml-2"></i>
            <a href="#" id="captionfooter">muchmoments</a>
          </div>  
        </div>
        <div class="col-12 col-md-4">
          <div class="float-left" id="ikonkanan">
            <i class="fa-1x far fa-envelope text-grey ml-2"></i>
            <a href="#" id="captionfooter">muchmoments@gmail.com</a>
          </div>
        </div>
      </div>
      <br><br>
    </div> -->
    

    
    
    <!-- END FOOTER -->

    <!-- Optional JavaScript -->
      <!-- jQuery first, then Popper.js, then Bootstrap JS -->
      <script src="{{ asset('frontend/js/jquery-3.4.1.slim.min.js') }}"></script>
      <script src="{{ asset('frontend/js/popper.min.js') }}"></script>
      <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>

    <!-- Custom JavaScript -->
      <script src="{{ asset('frontend/js/script.js') }}"></script>

    <!-- Custom JavaScript IG Feed-->
    <script src="{{ asset('frontend/js/InstagramFeed.min.js') }}"></script>
    <script>
        (function(){
            new InstagramFeed({
                'username': '{{ $option['ig'] }}',
                'container': document.getElementById("instagram-feed2"),
                'display_profile': false,
                'display_biography': false,
                'display_gallery': true,
                'callback': null,
                'styling': true,
                'items': 6,
                'items_per_row': 3,
                'margin': 1 
            });
        })();
    </script>

    <!-- Custom JavaScript -->
      <script>
          var forEach=function(t,o,r){if("[object Object]"===Object.prototype.toString.call(t))for(var c in t)Object.prototype.hasOwnProperty.call(t,c)&&o.call(r,t[c],c,t);else for(var e=0,l=t.length;l>e;e++)o.call(r,t[e],e,t)};
      
          var hamburgers = document.querySelectorAll(".hamburger");
          if (hamburgers.length > 0) {
            forEach(hamburgers, function(hamburger) {
              hamburger.addEventListener("click", function() {
                this.classList.toggle("is-active");
              }, false);
            });
          }
        </script>
    <!-- Custom OWL Slider -->
    <script src="{{ asset('frontend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/js/owl.carousel.js') }}"></script>
    <script>
      const prevIcon = "<img src='{{ asset('frontend/images/prev.svg') }}'>";
      const nextIcon = "<img src='{{ asset('frontend/images/next.svg') }}''>";
      $(document).ready(function() {
        var owl = $('.owl-carousel');
        owl.owlCarousel({
          autoplay: true,
          margin: 10,
          nav: true,
          loop: true,
          navText: [
            prevIcon,
            nextIcon
          ],
          responsive: {
            0: {
              items: 1
            },
            600: {
              items: 1
            },
            1000: {
              items: 1
            }
          }
        })
      })
    </script>    
    <script type="text/javascript">
      $(document).on('click', 'div a', function(){
        $(this).removeClass('active').siblings()
      })
    </script>
    <!-- Youtube -->
    <script src="{{ asset('frontend/js/jquery-modal-video.min.js') }}"></script>
    <script>
      $(".video-play").modalVideo();

    </script>
  </body>
</html>
