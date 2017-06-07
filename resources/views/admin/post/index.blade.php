@extends('admin/layouts/admin_layout')
@section('content')
<table class="table table-striped table-hover table-responsive">
    <theah>
        <tr>
            <th>id</th>
            <th>文章标题</th>
            <th>作者</th>
            <th>发布时间</th>
            <th>更新时间</th>
            <th>详情</th>
            <th>更改</th>
            <th>删除</th>
        </tr>
        </theah>
        <tbody>
            @foreach($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->author }}</td>
                <td>{{ $post->published_time }}</td>
                <td>{{ $post->updated_time }}</td>
                <td><a href="{{ route('Admin::post_single', ['id' => $post->id]) }}">详情</a></td>
                <td><a href="{{ route('Admin::post_edit', ['id' => $post->id]) }}">更改</a></td>
                <td>
                    <form action="{{ route('Admin::delete_post') }}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{ $post->id }}">
                    </form>删除
                </td>
            </tr>
            @endforeach
        </tbody>
    </theah>
</table>
@stop