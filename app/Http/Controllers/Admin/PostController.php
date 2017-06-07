<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use Validator;

class PostController extends Controller
{
    public function index()
    {
        return view('admin.post.index', [
            'posts' => Post::get(),
            ]);
    }

    public function add()
    {
        return view('admin.post.add', [
            'categories' => Category::all()
            ]);
    }

    public function edit(Request $requset)
    {
        $post = Post::find($requset->id);
        return view('admin.post.add', [
            'post' => $post,
            'categories' => Category::all()
            ]);
    }

    public function store(Request $requset)
    {
        $post = new Post();
        if (!empty($requset->id)&&is_numeric($requset->id)) {
            $post = Post::find($requset->id);
        }
        $validate = Validator::make($requset->all(), [
            'title' => 'required',
            'content' => 'required',
            'author' => 'required',
            'category' => 'required'
            ], [
            'required' => ':attribute不能为空',
            ], [
            'title' => '文章标题',
            'content' => '文章内容',
            'author' => '文章作者',
            'category' => '文章分类',
            ]);
        if ($validate->fails()) {
            return redirect()->back()->withinput()->withErrors($validate);
        }
        $post->title = $request->title;
        $post->content = $request->conent;
        $post->category = $request->category;
        $post->author = $request->author;
        $res = $post->save();
        if ($res) {
            return view('admin.post.index');
        } else {
            return redirect()->back()->withinput()->with('message', '创建文章失败');
        }
    }

    public function delete(Request $request)
    {
        if ($request->isMethod('POST')) {
            $post = Post::find($request->id);
            $res = $post->delete();
            if ($res) {
                return view('admin.post.index');
            } else {
                return redirect()->back()->with('message', '删除失败');
            }
        }
    }
}
