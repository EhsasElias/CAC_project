<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class PostsAdminController extends Controller
{
    public function showAdminPosts(){
        // $categories = Category::select()->get();
        return view('admin.adminManagePosts');
    }
    public function showauctionDetails(){
        return view('front.auctionDetails');
    }
    
}
