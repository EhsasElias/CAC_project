<?php
namespace App\Http\Controllers\admin;
use App\Models\Models;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoriesAdminController extends Controller
{
    function showAdminCategories(){
        $do = isset($_GET['do']) ? $do = $_GET['do'] : 'Manage';
        $categories = Category::select()->get();
        return view('admin.adminCategories', [
            'category' => $categories,
            'do'     => $do
        ]);
    }


    function showAdminaddCategory(){
        return view('admin.adminCategories#addCategory');
    }


    function addAdminCategory(Request $request){
        return request();
        Validator::validate($request->all(),[
            'category'=>'required|string'
        ],[
            'category.required'=>'جميع الحقول  مطلوبة',
            'category.string'=>'لا يمكنك ادخال ارقام يمكنك ادخال ابيانات كنص',
        ]);
        $category = new Category;
        $category->name = $request->name;

        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('Image'), $filename);
            $category['image']= $filename;
        }
        if($category->active==null)
        $category->active=0;
        else 
        $category->is_active=1;
        if($category->save())
        return redirect('adminCategories')
        ->with(['success'=>'تم اضافة التصنيف بنجاح']);
        return back()->with(['error'=>'خطاء لانستطيع اضافة التصنيف']);
    }

    
    function editAdminCategory(Request $request){
        Validator::validate($request->all(),[
            'category'=>'required|string'
        ],[
            'category.required'=>'هدا الحقل مطلوب',
            'category.string'=>'لا يمكنك ادخال ارقام يمكنك ادخال ابيانات كنص',
        ]);
        
        $id = $request->categoryid;
        $name = $request->name;
        $model = Models::where('id', $id)->update(['name' => $name]);
        if($model)
        return redirect('adminModels')
        ->with(['success'=>'تم التعديل بنجاح']);
        return back()->with(['error'=>'can not create user']);
    }
    function activeCategory(Request $request){
        $modelid = $request->modelid;
        $models = Models::select()->where('id', $modelid)->find($modelid);
        if($models->is_active == 1){
            $active = Models::where('id', $models->id)->update(['is_active' => 0]);
        }else{
            $active = Models::where('id', $models->id)->update(['is_active' => 1]);
        }
        return redirect('adminModels')
            ->with(['success'=>'تم التعديل بنجاح']);
    }
}
