@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-center">
                <div class="card-body p-0">
                    <comment-create-form-component></comment-create-form-component>
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
            <div class="card text-center mt-3">
                <div class="card-body p-0">
                    <form action="{{ route('comments.store') }}" method="post">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <table class='table m-0'>
                            <thead>
                                <tr>
                                    <th>投稿内容</th>
                                    <th>投稿</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class='form-group'>
                                        <textarea name="body" class='form-control mh-100'></textarea>
                                    </td>
                                    <td class='form-group align-middle'>
                                        <input type="submit" value="投稿" class='form-control btn btn-primary mh-100'>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
            @endauth
        </div>
    </div>
</div>
@endsection