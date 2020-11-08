<?php

namespace App\Http\Controllers;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

use App\Category;
use App\Banner;
use App\Photo;
use App\Album;
use App\Option;
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
                    ->where('categories.name',ucfirst($cat))->paginate(2)->onEachSide(3);
        }
        return view('frontend.photo')->with('photos',$photo);
    }

    public function videos($cat = null, $slug = null){
        if($cat == null){

        }elseif(!empty($cat) && $slug == null){
            $videos = DB::table('videos')
                    ->join('categories','categories.id','=','videos.category')
                    ->where('categories.name',ucfirst($cat))->paginate(2);
        }
        return view('frontend.video')->with('videos',$videos);
    }

    public function photo_slug($slug){
        $header = Photo::where('slug',$slug)->first();
        // print_r($header);exit;
        return view('frontend.photo-detail')->with('header',$header)->with('album',Album::where('parent',$header->id)->get());
    }

    public function send_email(Request $req){
        // print_r($req);
        $mail = new PHPMailer(true);

        $this->validate($req,[
            'name' => 'required',
            'email' => 'required|email',
            'service' => 'required',
            'typeservice' => 'required',
            'message' => 'required',
        ]);
        
        self::mailersend($req);

    }

    public function mailersend($data){
        $mail = new PHPMailer();
        $mail->isSMTP();

        $option = Option::where('id',1)->first();

        $body = "<table>
        <tr>
            <td colspan=5><center>FORM PESAN MASUK</center></td>
        </td>
        <tr>
            <td>Nama</td><td>:</td><td> ".$data->name."</td>
            <td>Email</td><td>:</td><td> ".$data->email."</td>
            <td>Service</td><td>:</td><td> ".$data->service."</td>
            <td>Tipe Service</td><td>:</td><td> ".$data->typeservice."</td>
            <td>Pesan</td><td>:</td><td> ".$data->message."</td>
        </tr>
        </table>";

        //Enable SMTP debugging
        // SMTP::DEBUG_OFF = off (for production use)
        // SMTP::DEBUG_CLIENT = client messages
        // SMTP::DEBUG_SERVER = client and server messages
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;

        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;

        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->SMTPAuth = true;
        $mail->Username = $option->email;
        $mail->Password = $option->passwordemail;
        $mail->setFrom($fromemail, $from);
        $mail->addAddress($option->emailkontak, 'Muchmomment');
        $mail->Subject = '[Notification] Request Service of '.$from;
        $mail->Body = $body;

        //send the message, check for errors
        if (!$mail->send()) {
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'Message sent! Soon your message will be reply';
        }
    }

}
