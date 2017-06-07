@extends('admin/layouts/admin_layout')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif
    <form class="form-horizontal" action="{{ route('Admin::save_post') }}" method="post">
        {{csrf_field()}}
        <input type="hidden" name="id" value="{{ !empty($category->id)?$category->id:'' }}">
        <div class="form-group">
            <label>文章标题</label>
            <input type="input" class="form-control" name="title" value="{{ old('title')?old('title'):(!empty($post->title)?$post->title:'') }}">
        </div>
        <div class="form-group">
            <label>作者</label>
            <input type="input" class="form-control" name="author" value="{{ old('author')?old('author'):(!empty($post->author)?$post->author:'') }}">
        </div>
        <div class="form-group">
            <label>文章分类</label>
            <select>
                <option>请选择分类</option>
                @foreach($categories as $cate)
                <option value="$cate->id" {{$post->category == $cate->id?'checked':''}}>$cate->title</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>文章内容</label>
            <textarea type="input" class="form-control" name="content" value="{{ old('content')?old('content'):(!empty($post->content)?$post->content:'') }}"></textarea>
        </div>
        <div class="form-group">
            <input class="btn btn-primary" type="submit">
        </div>
    </form>
@stop
