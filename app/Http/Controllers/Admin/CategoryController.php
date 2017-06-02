<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;

class CategoryController extends Controller
{	

    public function show()
    {
    	return  view('admin.index',[
    		'system'=>Session::get('system_list')
    	]);
    }

  
}
