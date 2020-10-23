@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-center">
                <div class="card-body p-0">
                    <table class='table'>
                        <thead>
                            <tr>
                                <th>投稿者</th>
                                <th>投稿内容</th>
                                <th>投稿日時</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($msg)
                            <tr>
                                <td colspan="3" class='text-primary text-center'>
                                    {{ $msg }}
                                </td>
                            </tr>
                            @endif
                            @foreach($comments as $comment)
                            <tr>
                                <td>{{ $comment->user->name }}</td>
                                <td>{{ Illuminate\Support\Str::limit($comment->body, 50) }}</td>
                                <td>
                                    {{ $comment->created_at->format('Y年m月d日') }}</br>
                                    {{ $comment->created_at->format('H時i分s秒') }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row justify-content-center">{{ $comments->links('vendor.pagination.simple-bootstrap-4-comments') }}</div>
            </div>
            @auth
            <comment-create-form-component :url='@json(route("api.comments.store"))' :user_id='@json(Auth::user()->id)'></comment-create-form-component>
            @endauth
        </div>
    </div>
</div>
@endsection