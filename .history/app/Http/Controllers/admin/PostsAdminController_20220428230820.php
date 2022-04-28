<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class PostsAdminController extends Controller
{
    public function showAdminPosts(){
        
        $postsAll=Post::with(['users'])->get();
        $posts=post::with(['users'])->get();
        $user=User::with(['posts'])->get();
       
        
        $postsAll = Post::select('posts.*','categories.name as category_name')
                            ->join("categories", "categories.id", "=", "posts.category_id");
        
        $route = Route::current()->getName();
        if($route == 'admin_posts'){
            return view('admin.adminManagePosts', [
                'postsAll' => $postsAll,
            ]);
        }elseif($route == 'Start_auction'){
            return view('admin.adminManageStartedAuction', [
                'postsAll' => $posts->where('posts.is_active', 1)
                                        ->where('end_date', '>=', date('Y-m-d'))
            ]);
        }
    }

    public function editActive(Request $request){
        $id = $request->postid;
        $active = Post::where('id', $id)->update(['is_active' => 1]);
        if($active){
            return redirect('admin_posts')
            ->with(['success'=>'تم الموافقة بنجاح']);
        }else{
            return back()->with(['error'=>'خطاء هناك مشكلة في عملية الموافقة على المزاد']);
        }
    }
 
}