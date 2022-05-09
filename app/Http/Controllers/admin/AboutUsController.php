<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\about_us;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{

    function manageAboutUs(){
        $do = isset($_GET['do']) ? $do = $_GET['do'] : 'Manage';
        $content = about_us::select()->get();
        return view('admin.adminManageAboutUsSite', [
            'Content' => $content,
            'do'     => $do
      
     ]);
    }


        function addAboutUsContent(Request $request){

        Validator::validate($request->all(),[
            "description"=>['required', 'string', 'min: 30'],
            "paragraph_one"=>['required', 'string', 'between: 5, 255'],
            "paragraph_two"=>['required', 'string', 'between: 5, 255'],
        ],[
            "paragraph_two.required"=>' هذا الحقل مطلوب ',
            "description.required"=>' هذا الحقل مطلوب ',
            "paragraph_one.required"=>' هذا الحقل مطلوب ',
            "description.string"=>' يحب ان يكون هذا الحقل نص  ',
            "paragraph_one.string"=>' يحب ان يكون هذا الحقل نص  ',
            "paragraph_two.string"=>' يحب ان يكون هذا الحقل نص  ',
            "description.between"=>' يحب ان يكون الحقل  اكبر من 30',
            "paragraph_one.between"=>' يحب ان يكون الحقل  اكبر من 20 حرف واصغر من 255 حرف',
            "paragraph_two.between"=>' يحب ان يكون الحقل  اكبر من 20 حرف واصغر من 255 حرف',
        ]);

        $home=new about_us;
        $home->description = $request->description;
        $home->paragraph_one = $request->paragraph_one;
        $home->paragraph_two = $request->paragraph_two;

        if($home->save())
        return redirect('manage_about_us')
        ->with(['success'=>'تم الاضافه  بنجاح']);
        return back()->with(['error'=>'خطاء لانستطيع الاضفافه ']);
    }

    function editContent(Request $request,$id){
        // return $request;
        $column =  $request->column;
        Validator::validate($request->all(),[
            "$request->column"=>['required', 'string', 'min: 20'],
        ],[
            "$request->column.required"=>' هذا الحقل مطلوب ',
            "$request->column.string"=>' يحب ان يكون هذا الحقل نص  ',
            "$request->column.min"=>' يحب ان يكون الحقل  اكبر من 20 حرف  ',]);

            if($request->column != 'description')
                Validator::validate($request->all(),[
                        "$request->column"=>[ 'between: 5, 255'],
        ],[
            "$request->column.between"=>' يحب ان يكون الحقل  اكبر من 20 حرف واصغر من 255 حرف',]);

        print_r($request->$column) ;

        $home=about_us::find($id);

        $home->$column  = $request->$column;
        if($home->save())

        
        return redirect('manage_about_us')
        ->with(['success'=>'تم التعديل  بنجاح']);
        return back()->with(['error'=>'خطاء لانستطيع التعديل ']);
    }
}