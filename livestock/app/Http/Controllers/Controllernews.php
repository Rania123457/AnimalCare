<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Manager;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use PhpParser\Comment\Doc;
class Controllernews extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct(){

    }
////////////////////////////// showposts //////////////////////////////
    public function showposts(){

        // if (!session()-> has('password')) {return redirect()->route('admin.login');}

        if (!Session()-> has('password'))
  {
    return redirect() -> route('login') ;
   }
//     $post = Post::all();
//    return view('admin.posts.show',compact('post'));
}

////////////////////////////// deletepost //////////////////////////////

// public function deletenews($id){

//     $post = post::find($id);
//     $post->delete();
//     return redirect()-> route('showpost');

// }

////////////////////////////// loginManager //////////////////////////////
public function login(){
    return view('admin.binfit.login');
}


public function CreateLogin(Request $request){

    // where(['email' => $request-> email,'password' => $request->password]) -> get();
    // remember_me

    $remember_me = $request->has('remember_me')? true:false;
    $manager = Manager::where('phone', '=',  $request-> phone) -> where('password', '=', $request->password , $remember_me)->get();

          if($manager->count() > 0){
            session::put('phone' ,$request -> phone);
            session::put('password' ,$request -> password);
         return redirect()->route('admin.home');
        }

          if($manager->count() == 0){
            return redirect() -> back() -> with(['error'=>'البيانات المدخلة خاطءة']);

          }

  }
///////////////////////////Admin forget password/////////////////////////////////////////////
                public function Get_the_code(Request $request){
                  $request->validate(['phone' => 'required|phone']);

                  $status = Password::sendResetLink(
                      $request->only('phone')
                  );

                  return $status === Password::RESET_LINK_SENT
                              ?  view('code_verification')->with(['status' => __($status)])
                              : back()->withErrors(['phone' => __($status)]);
              }


              public function code_confirmation(Request $request){

                if($request===Password::RESET_LINK_SENT){

                 return view('login');

                }


              }

//////////////////////////


                    public function funExit(){

                    session()->forget('password');

                    return redirect()->route('login');
                    }

}
