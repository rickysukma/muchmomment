
@extends('frontend.layout')

@section('title','Contact Us')

@section('content')<!-- CONTACT US-->
<div class="container" id="sldr">
  <form action="{{ route('home.send-email') }}" method="POST">
        {{ csrf_field() }}
        <h2 class="titlecontactus" id="titlecontactteks">Contact Us</h2>
        <div class="form-group">
          <label for="exampleFormControlInput1">Name</label>
          <input type="text" name="name" class="form-control" placeholder="Enter your name">
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Email</label>
          <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="Enter your email address">
        </div>
        <div class="form-group">
          <label for="exampleFormControlSelect1">Service</label>
          <select name="service" class="form-control" id="exampleFormControlSelect1">
            <option>Photography</option>
            <option>Videography</option>
          </select>
        </div>
        <div class="form-group">
          <label for="exampleFormControlSelect1">Type Service</label>
          <select name="typeservice" class="form-control" id="exampleFormControlSelect1">
            <option>Engagement</option>
            <option>Prewedding</option>
            <option>Wedding</option>
            <option>Photobooth</option>
          </select>
        </div>
        <!-- <br> -->
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Messages</label>
          <textarea name="message" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Your message…"></textarea>
        </div>
        <!-- <br> -->
        <button type="submit" class="btn btn-submt" id="btnsubmitcustom">Submit</button>
      </form>  
      </div>

    <!-- CONTACT US-->
    @endsection