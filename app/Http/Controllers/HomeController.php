<?php

namespace App\Http\Controllers;
use App\Category;
use App\Banner;
use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }


    public function index()
    {
        return view('welcome');
    }

    public function test()
    {
        return view('frontend.home');
        // return view('frontend/layout');
    }

    public function about(){
        return view('frontend.aboutus');
    }

    public function contact(){
        return view('frontend.contactus');
    }

    public function photo($cat = null, $slug = null){
        if($cat == null){

        }elseif(!empty($cat) && $slug == null){
            $photo = DB::table('photos')
                    ->join('categories','categories.id','=','photos.category')
                    ->where('categories.name',ucfirst($cat))->get();
        }
        return view('frontend.photo')->with('photos',$photo);
    }

    public function videos($cat = null, $slug = null){
        if($cat == null){

        }elseif(!empty($cat) && $slug == null){
            $videos = DB::table('videos')
                    ->join('categories','categories.id','=','videos.category')
                    ->where('categories.name',ucfirst($cat))->get();
        }
        return view('frontend.video')->with('videos',$videos);
    }

    public function photo_slug($slug){
        return view('frontend.photo-detail');
    }

}
