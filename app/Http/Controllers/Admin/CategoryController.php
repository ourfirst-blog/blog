<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Session;
use Validator;

class CategoryController extends Controller
{

    public function show()
    {
    	return  view('admin.index',[
    		'system'=>Session::get('system_list')
    	]);
    }

    public function index()
    {
        return view('admin.category.index', [
            'categories' => Category::get(),
            ]);
    }

    public function add()
    {
        return view('admin.category.add');
    }

    public function edit(Request $requset)
    {
        $category = Category::find($requset->id);
        return view('admin.category.add', [
            'category' => $category,
            ]);
    }

    public function store(Request $requset)
    {
        dd($requset);
        $category = new Category();
        if (!empty($requset->id)&&is_numeric($requset->id)) {
            $category = Category::find($requset->id);
        }
        dd($category);
        $validate = Validator::make($requset->all(), [
            'title' => 'required',
            ], [
            'required' => ':attribute不能为空',
            ], [
            'title' => '分类名称',
            ]);
        if ($validate->fails()) {
            return redirect()->back()->withinput()->withErrors($validate);
        }
        $category->title = $request->title;
        dd($category);
        $res = $category->save();
        if ($res) {
            return view('admin.category.index');
        } else {
            return redirect()->back()->withinput()->with('message', '创建文章分类失败');
        }
    }

    public function delete(Request $request)
    {
        if ($request->isMethod('POST')) {
            $category = Category::find($request->id);
            $res = $category->delete();
            if ($res) {
                return view('admin.category.index');
            } else {
                return redirect()->back()->with('message', '删除失败');
            }
        }
    }
}
