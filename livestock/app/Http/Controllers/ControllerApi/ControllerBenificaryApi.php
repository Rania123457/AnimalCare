<?php

namespace App\Http\Controllers;
use App\Models\Benficaryprofile;
use Auth;
use App\Models\Answer;
use App\Models\Ask;
use App\Models\Benificary;
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


///////////////////////////////Register Benificary ////////////////////////////////////////////


    public function FunRegister(Request $request)
    {
        $rules = [
            'phone' => 'required|max:15|unique:benificarys',

        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => "رقم الهاتف موجود مسبقا",
            ]);
        }

        Benificary::create([
            'name' => $request->name,
            'phone' =>   $request->phone,
            'password' => $request->password,
            'special' => $request->special,
        ]);
        return response()->json([
            'status' => true,
        ]);
    }
    ///////////////////////////////////// login Benificary //////////////////////////////////
    public function FunLogin(Request $request)
    {
        $remember_me = $request->has('remember_me')? true:false;
        $Benificary = Benificary::select('id','name','phone','password','special')
        ->where('phone', '=', $request->phone)->where('password', '=', $request->password , $remember_me)->get();

    if ($Benificary->count() > 0)
        return response()->json([
            'status' => true,
            'type' => 'Benificary',
            'Benificary' => $Benificary
        ]);


    if ($Benificary->count() == 0 && $Doctor->count() == 0)
        return response()->json(['status' => false]);
    }

    ///////////////////////////Benificary forget password/////////////////////////////////////////////
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

///////////////////////////////// Benficary Profile ///////////////////////////////////////

public function indexProfile(){

    $Benificary = Auth::Benficary();
    $Benificary = Benificary::select('name','phone','password')->get();
    return response()->json([
        'status' => true,
        'Benificary' => $Benificary


    ]);

}

public function updateProfile(Request $request){

$this->validate($request,[
    'name' => 'required',
    'phone'  => 'required',
    'password' => 'required',
    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
]);


//  $Benificary = Auth::Benficary();

$image_name = time().'.'.$request->image->extension();
$request->image->move(public_path('Benificaries_image'),$image_name);
$path = "Benificaries_image/".$image_name;
$Benificary = Auth::Benficary();
$Benificary->Benficaryprofile->name =  $request->name;
$Benificary->Benficaryprofile->phone =   $request->phone;
$Benificary->Benficaryprofile->password = $request->password;
$Benficaryprofile->image = $path;
$Benificary->save();
$Benificary->Benficaryprofile->save();

return response()->json([

     'status' => true,
     


]);
}

////////////////////////////////





































}
