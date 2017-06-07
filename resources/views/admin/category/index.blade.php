@extends('admin/layouts/admin_layout')
@section('content')
<table class="table table-striped table-hover table-responsive">
    <theah>
        <tr>
            <th>id</th>
            <th>分类标题</th>
            <th>发布时间</th>
            <th>更新时间</th>
            <th>更改</th>
            <th>删除</th>
        </tr>
        </theah>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->title }}</td>
                <td>{{ $category->author }}</td>
                <td>{{ $category->published_time }}</td>
                <td>{{ $category->updated_time }}</td>
                <td><a href="{{ route('Admin::category_edit', ['id' => $category->id]) }}">更改</a></td>
                <td>
                    <form action="{{ route('Admin::delete_category') }}" method="category">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{ $category->id }}">
                    </form>删除
                </td>
            </tr>
            @endforeach
        </tbody>
    </theah>
</table>
@stop