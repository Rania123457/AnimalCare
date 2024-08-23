<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\Answer;
use App\Models\Ask;
use App\Models\Doctor;
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
        $Doctor = Doctor::select('id','name','phone','password','special')
            ->where('phone', '=', $request->phone)->where('password', '=', $request->password , $remember_me)->get();
        if ($Doctor->count() > 0)
            return response()->json([
                'status' => true,
                'type' => 'Doctor',
                'Doctor' => $Doctor
            ]);

        }


    ///////////////////////////Doctor forget password/////////////////////////////////////////////

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


    ///////////////////////////////// Doctor Profile ///////////////////////////////////////

public function indexProfile(){

    $Doctor = Auth::Doctor();
    $Doctor  = Doctor ::select('name','phone','password')->get();
    return response()->json([
        'status' => true,
        'Doctor' => $Doctor


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
$request->image->move(public_path('Doctors_image'),$image_name);
$path = "Doctors_image/".$image_name;
$Doctor= Auth::Doctor();
$Doctor->Doctorprofile->name =  $request->name;
$Doctor->Doctorprofile->phone =   $request->phone;
$Doctor->Doctorprofile->password = $request->password;
$Doctorprofile->image = $path;
$Doctor->save();
$Doctor->Doctorprofile->save();

return response()->json([

     'status' => true,

]);
}















}
