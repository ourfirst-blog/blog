@extends('admin/layouts/admin_layout')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif
    <form class="form-horizontal" action="{{ route('Admin::save_category') }}" method="psot">
        {{csrf_field()}}
        <input type="hidden" name="id" value="{{ !empty($category->id)?$category->id:'' }}">
        <div class="form-group">
            <label>分类标题</label>
            <input type="input" class="form-control" name="title" value="{{ old('title')?old('title'):(!empty($category->title)?$category->title:'') }}">
        </div>
        <div class="form-group">
            <input class="btn btn-primary" type="submit">
        </div>
    </form>
@stop
