<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
class DashboardController extends Controller
{	

    public function index()
    {
    	return  view('admin.index',[
    		'system'=>Session::get('system_list')
    	]);
    }

  
}
