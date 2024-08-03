@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Welcome to Your Dashboard</h2>
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <form method="GET" action="{{ route('posts.search') }}">
        <div class="form-group">
            <input type="text" class="form-control" name="query" placeholder="Search posts">
        </div>
        <button type="submit" class="btn btn-primary">Search</button>
    </form>
    <h3>Your Posts</h3>
        <p><a href="{{ route('posts.create') }}" class="btn btn-primary">投稿する</a></p>
        @if (isset($resultsFound) && !$resultsFound)
        <p>検索結果は0件です。</p>
        @endif
        <table class='table table-hover'>
            <tr>
                <th>投稿者</th>
                <th>投稿内容</th>
                <th>投稿日時</th>
                <th>変更日時</th>
            </tr>
            @foreach($posts as $post)
            <tr>
                <td>{{ $post->user->name }}</td>
                <td>{{ $post->contents }}</td>
                <td>{{ $post->created_at->format('Y-m-d H:i:s') }}</td>
                <td>{{ $post->updated_at->format('Y-m-d H:i:s') }}</td>
                <td><a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">更新</a></td>
                <td>
                    <form method="POST" action="{{ route('posts.destroy', $post->id) }}" style="display: inline;" onsubmit="return confirm('本当に削除しますか？');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">削除</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
</div>
@endsection
