<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\guide;
use Illuminate\Support\Facades\Validator;
use PhpParser\Comment\Doc;

class Controllerguide extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct(){

    }

 public function home(){

  if (!Session()-> has('password'))
  {
    return redirect() -> route('login') ;
   }

    return view(view:'admin.home');
 }





    public function create(){
      // if (!session()-> has('password')) {return redirect()->route('admin.login');}
      if (!Session()-> has('password'))
  {
    return redirect() -> route('login') ;
   }

        return view(view:'admin.guide.create');
      }

      public function store(Request $request){
        $rules = [
            'name' => 'required|max:100|unique:guides',
            'phone'=> 'required',
            'password' =>'required',
            'photo'=> 'required',
            'special' =>'required',
        ];
$messages = [
    'name.required'=>'الاسم مطلوب',
    'name.max'=>'الاسم اطول من 100 حرف',
    'name.unique'=>'الاسم موجود مسبقا',
    'phone.required'=>'رقم الهاتف مطلوب',
    'password.required'=>'كلمة المرور مطلوبة',
    'photo.required'=>'الصورة مطلوبة',
    'special.required'=>'التخصص مطلوب',
];

     $validator = Validator::make($request->all(),$rules,$messages);

    //   if($validation->fails()){
    //     return redirect()->back()->withErrors($validation)->withInput($request->all());
    //   }

    if($validator->fails()){
        return redirect()->back()
                    ->withErrors($validator)
                    ->withInput($request->all());
    }



      //insert
      guide::create([
        'name'=> $request -> name ,
        'phone'=> $request -> phone ,
        'password'=> $request -> password,
        'special'=> $request -> special,
        ]);
        return redirect()->back()->with(['success'=>'تم الاضافة بنجاح']);

    }
    //   public function view(){
    //     return view(view:'admin.guide.view');
    //   }
      //show data

      public function getalldata(){

            $guides = guide::select('id','name','phone','password','special')->get();
            return view('admin.guide.view',compact('guides'));
      }

      public function edit($guide_id){
        $guides = guide::find($guide_id);
        if(!$guides)
        return redirect()->back();

        $guide = guide::select('id','name','phone','password','special')->find($guide_id);

          return view('admin.guide.edit',compact('guides'));
      }
//delete data



      public function delete($guide_id){
        //check if offer id is exists
        $offer = guide::find($guide_id);

        if(!$offer)
        return redirect()
        ->back()
        ->with(['error' => 'العنصر غير موجود']);


       $offer -> delete();
        return redirect()
        ->back()
        ->with(['successd' => 'تم الحذف بنجاح']);
      }


public function updateguide(Request $request,$guide_id){

    $offer = guide::find($guide_id);

    if(!$offer)
    return redirect()
    ->back()
    ->with(['error' => 'العنصر غير موجود']);


   $offer -> update($request->all());
    return redirect()
    ->route('admin.view')
    ->with(['successd' => 'تم التعديل بنجاح']);


}




}
