<?php
namespace App\Http\Controllers;
use Session;
use App\Post;
use App\Photo;
use App\Category;
use App\Tag;
use App\Video;
use Illuminate\Http\Request;

class AdminController extends Controller
{
   public function __construct()
   {
      $this->middleware('auth');
   }

    // Dashboard
    public function dashboard()
    {
      $post = Post::latest()->get();
      return view('admin.dashboard')->with('posts',$post )
                                    ->with('category', Category::all())
                                    ->with('tags', Tag::all());
    }

    // =============== POST =============== //
    // Post Create
    public function post_create()
    {
      $categories = Category::all();
      if($categories->count() == 0)
      {
        Session::flash('info','You must have some Categories to create a post');
        return redirect()->back();
      }
      else
      {
        return view('admin.create-post')->with('method', ['action'=>'create'])
                                        ->with('categories', Category::all());
      }
    }

    public function post_create_video()
    {
      $categories = Category::all();
      if($categories->count() == 0)
      {
        Session::flash('info','You must have some Categories to create a post');
        return redirect()->back();
      }
      else
      {
        return view('admin.create-post-video')->with('tags', Tag::all())
                                        ->with('categories', Category::all());
      }
    }

    // Post Store
    public function post_store(Request $request)
    {
      // dd($request);
      $this->validate($request,[
        'title'=>'required|max:255',
        'image'=>'required|image',
        'category'=>'required'
      ]);

      $path = 'upload/post/'.str_slug($request->title).'-'.time().'/';

      if($request->hasFile('image')){
        $image = $request->image;
        $image_new_name = time().$image->getClientOriginalName();
        $image->move($path,$image_new_name);

        $post = Photo::create([
          'title'=> $request->title,
          'slug'=> str_slug($request->title),
          'path' => $path. $image_new_name,
          'category' => $request->category,
          'parent' => ''
        ]);

      }else{
        $post = Photo::create([
          'title'=> $request->title,
          'slug'=> str_slug($request->title),
          'path' => $path. $image_new_name,
          'category' => $request->category,
          'parent' => ''
        ]);

      }

      Session::flash('success','Post Successfully Created.');
      return back();
    }

    public function post_store_video(Request $request)
    {
      // dd($request);
      $this->validate($request,[
        'title'=>'required|max:255',
        'image'=>'required|image',
        'category'=>'required',
        'yid'=>'required'
      ]);

      if($request->hasFile('image')){
        $image = $request->image;
        $image_new_name = time().$image->getClientOriginalName();
        $image->move('upload/video/',$image_new_name);

        $post = Video::create([
          'title'=> $request->title,
          'yid'=> $request->yid,
          'path_thumbnail' => 'upload/video/' . $image_new_name,
          'category' => $request->category
        ]);

      }else{
        $post = Video::create([
          'title'=> $request->title,
          'yid'=> $request->yid,
          'path_thumbnail' => 'upload/video/muchmomment.jpeg',
          'category' => $request->category
        ]);

      }

      Session::flash('success','Post Successfully Created.');
      return back();
    }

    // Post Edit
    public function post_edit($id)
    {
      $post = Photo::findOrFail($id);
      return view('admin.create-post')->with('post', $post)
                                    ->with('method', ['action'=>'update'])
                                    ->with('categories', Category::all());
    }

    public function post_edit_video($id)
    {
      $post = Video::findOrFail($id);
      return view('admin.edit-post-video')->with('post', $post)
                                    ->with('categories', Category::all());
    }

    // Post Update
    public function post_update(Request $request, $id)
    {
      $post = Photo::findOrFail($id);

      // $this->validate($request,[
      //   'title'=>'required|max:255',
      //   'image'=>'required|image',
      //   'category'=>'required'
      // ]);

      $path = explode("/",$post->path);
      $path = array_slice($path,0,3);
      $path = implode("/",$path).'/';
      $temp = $post->path;
      if($request->hasFile('image')){
        $image = $request->image;
        $image_new_name = time().$image->getClientOriginalName();
        $image->move($path,$image_new_name);

        $post->path = $path.$image_new_name;
      }

      $post->title = $request->title;
      $post->slug = str_slug($request->title);
      $post->category = $request->category;
      if($post->save()){
        if(file_exists($temp)){
          unlink($temp);
        }
      }

      Session::flash('success','Post has been updated!');
      return redirect()->route('admin.post-edit',['id' => $post->id]);
    }

    public function post_update_video(Request $request, $id)
    {
      $post = Video::findOrFail($id);

      $this->validate($request,[
        'title'=>'required|max:255',
        'image'=>'image',
        'category'=>'required',
        'yid'=>'required'
      ]);

      if($request->hasFile('image')){
        $image = $request->image;
        $image_new_name = time().$image->getClientOriginalName();
        $image->move('upload/video/',$image_new_name);
        if(file_exists($post->path_thumbnail)){
          unlink($post->path_thumbnail);
        }
        $post->path_thumbnail = 'upload/video/' . $image_new_name;
      }

      $post->title = $request->title;
      $post->category = $request->category;
      $post->yid = $request->yid;
      $post->save();

      Session::flash('success','Post has been updated!');
      return redirect()->route('admin.post/edit-video',['id' => $id]);
    }

    // Post trash
    public function post_trash($id)
    {
      $post = Post::findOrFail($id);
      $post->delete();
      return back();
    }

    // Post trashed
    public function post_trashed()
    {
      $posts = Post::onlyTrashed()->latest()->get();
      return view('admin.trash')->with('posts', $posts)->with('categories', Category::all());
    }

    // Post Force Delete
    public function post_forcedelete($id)
    {
      $post = Post::withTrashed()->where('id',$id)->first();
      $post->forcedelete();
      Session::flash('success','Post has deleted!');

      return back();
    }

    // Post restore
    public function post_restore($id)
    {
      $post = Post::withTrashed()->where('id',$id)->first();
      $post->restore();
      Session::flash('info','Post has been Restore!');

      return back();
    }


    // ============== CATEGORY ============= //
    

    // ============== Tag ============= //
    //Tag View
    public function tag()
    {
      return view('admin.tag')->with('tag', Tag::latest()->get());
    }

    // Tag Create
    public function tag_create()
    {
      return view('admin.create-tag');
    }

    // Tsg Store
    public function tag_store(Request $request)
    {
      $this->validate($request,[
        'tag'=> 'required'
      ]);

      $tag = new Tag;
      $tag->tag = $request->tag;
      $tag->save();

      Session::flash('success','Tag has created!');
      return back();
    }

    // Tag Edit
    public function tag_edit($id)
    {
      $tag = Tag::find($id);
      return view('admin.edit-tag')->with('tag',$tag);
    }

    // Tag Update
    public function tag_update(Request $request, $id)
    {
      $tag = Tag::findOrFail($id);
      $tag->tag = $request->tag;
      $tag->save();
      Session::flash('success','Tag has been updated!');

      return redirect()->route('admin.tag');
    }

    // tag Delete
    public function tag_delete($id)
    {
      $tag = Tag::find($id);
      $tag->delete();
      Session::flash('success','Tag has deleted!');

      return back();
    }

    public function videos(){
      $videos = Video::latest()->get();
      return view('admin.videos')->with('videos',$videos);
    }

    public function photos(){
      $photo = Photo::latest()->get();
      return view('admin.photos')->with('photo',$photo);
    }

    public function setting(){
      $option = array(
        'wa' => env('OPTION_WA'),
        'ig' => env('OPTION_INSTAGRAM'),
        'telp' => env('OPTION_TELP'),
        'email' => env('OPTION_EMAIL'),
    );
      return view('admin.setting')->with('option',$option);
    }

    public function setting_save(Request $request){

      // $this->validate($request,[
      //   'ig'=>'required',
      //   'telp'=>'number',
      //   'wa'=>'required|number',
      //   'email'=>'required|email'
      // ]);
      // echo implode("=",json_decode(json_encode($request)));exit;
      $data =[
        'OPTION_WA' =>  $request->wa,
        'OPTION_TELP' =>  $request->telp,
        'OPTION_INSTAGRAM' =>  $request->ig,
        'OPTION_EMAIL' =>  $request->email];

      foreach($data as $i => $dat){
        // var_dump(self::setEnv($i,$dat));
        // echo $i.'='.$dat;
      }
      // \putenv($data);
      // exit();

      Session::flash('success','Setting has been updated!');
      return redirect()->route('admin.setting');
    }

    public function setEnv($name, $value)
    {
        $path = base_path('.env');
        if (file_exists($path)) {
            file_put_contents($path, str_replace(
                $name . '=' . env($name), $name . '=' . $value, file_get_contents($path)
            ));
        }
    }

}