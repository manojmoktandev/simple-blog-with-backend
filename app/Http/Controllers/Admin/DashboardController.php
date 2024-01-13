<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Blog;

use Exception;
use Auth;
use DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    ## Dashboard
    public function index()
    {
        $data['categories'] = Category::select('id')->get()->count();
        $data['blogs'] = Blog::select('id')->get()->count();
        $data['comments'] = DB::table('blog_comments')->select('id')->get()->count();
        $data['today_blogs'] = Blog::select('id')->whereDate('created_at', Carbon::today())
            ->get()->count();

        $data['recent_blogs_comment'] = DB::table('blog_comments')->select('blog_comments.id','full_name','comment','blog_title','blog_comments.status','blog_comments.created_at')
        ->join('blogs','blogs.id','=','blog_comments.blog_id')
        ->get();

        return view('admin.dashboard', $data);
    }
}
