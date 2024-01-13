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

class AppController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }


    ## Function to change status
    public function updateStatus($table, $id, $value)
    {
        $param = array('status' => $value);
        $where = array('id' => $id);
        $update = DB::table($table)->where('id', $id)->update($param);
        if ($update) {
            $action = ($value == 'active') ? 'activated' : 'inactivated';
            return redirect()->back()->withStatus("Record has been successfully " . $action);
        } else {
            return redirect()->back()->withError("Something went wrong, please try again");
        }
    }





}
