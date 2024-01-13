<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB;

class BlogCommentController extends Controller
{
    //
    public function blogsComment(){
		$data['blog_comments'] = DB::table('blog_comments')->select('blog_comments.id','full_name','comment','blog_title','blog_comments.status','blog_comments.created_at')
        ->join('blogs','blogs.id','=','blog_comments.blog_id')
        ->get();
		return view('admin.blog-comments.index', $data);
	}
}
