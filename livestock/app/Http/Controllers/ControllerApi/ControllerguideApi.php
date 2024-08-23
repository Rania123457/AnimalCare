<?php

namespace App\Http\Controllers;
use Auth;
use Password;
use App\Models\guideprofile;
use App\Models\Answer;
use App\Models\Ask;
use App\Models\guide;
use App\Models\Post;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redis;

use function PHPUnit\Framework\isEmpty;

class ControllerContentApi extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
    }
    public function FunLogin(Request $request)
    {

        $remember_me = $request->has('remember_me')? true:false;
     $guide = guide::select('id','name','phone','password','special')
         ->where('phone', '=', $request->phone)->where('password', '=', $request->password , $remember_me)->get();
     if ($guide->count() > 0)
         return response()->json([
             'status' => true,
             'type' => 'guide',
             'guide' => $guide
         ]);

     }


    ///////////////////////////guide forget password/////////////////////////////////////////////

    public function Get_the_code(Request $request){
        $request->validate(['phone' => 'required|phone']);

        $status = Password::sendResetLink(
            $request->only('phone')
        );

        return $status === Password::RESET_LINK_SENT
                    ? response()->json(['status' => $status ])
                    :response()->json(['phone' => __($status)]);
    }


    public function code_confirmation(Request $request){

      if($request===Password::RESET_LINK_SENT){

        return response()->json([
            'status' => true,
        ]);

      }


    }

//////////////////////////////////////// guide Profile /////////////////////////////////
public function indexProfile(){

    $guide = Auth::guide();
    $guide  = guide ::select('name','phone','password')->get();
    return response()->json([
        'status' => true,
        'guide' => $guide


    ]);

}


public function updateProfile(Request $request){

$this->validate($request,[
    'name' => 'required',
    'phone'  => 'required',
    'password' => 'required',
    'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
]);
$image_name = time().'.'.$request->image->extension();
$request->image->move(public_path('guides_image'),$image_name);
$path = "guides_image/".$image_name;

$guide = Auth::guide();
$guide->guideprofile->name =  $request->name;
$guide->guideprofile->phone =   $request->phone;
$guide->guideprofile->password = $request->password;
$guideprofile->image = $path;
$guide->save();
$guide->guideprofile->save();

return response()->json([

     'status' => true,

]);
}





































}
