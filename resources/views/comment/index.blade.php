@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-center">
                <comment-list-component :url='@json(route("api.comments.index"))' :data='@json($comments)' :msg='@json($msg)'></comment-list-component>
                <div class="row justify-content-center">{{ $comments->links('vendor.pagination.simple-bootstrap-4-comments') }}</div>
            </div>
            @auth
            <comment-create-form-component :url='@json(route("api.comments.store"))' :user_id='@json(Auth::user()->id)'></comment-create-form-component>
            @endauth
        </div>
    </div>
</div>
@endsection