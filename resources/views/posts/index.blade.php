@extends('layouts.app')

@section('title', 'Posts')

@section('content')
    <a href="{{ route('posts.create') }}"><button class="btn btn-primary d-block ms-auto mb-4 text-capitalize">Add New
            Post</button></a>
    <div class="row">
        @forelse ($posts as $post)
            <div class="col-md-6 col-lg-4">
                <div class="card py-3 px-4 rounded shadow">
                    <img class="img-fluid mb-3 w-75 d-block m-auto" src="/images/posts/{{ $post->image }}" alt="img" />
                    <a class="mb-3 btn btn-primary text-capitalize" href="{{ route('posts.show', $post) }}">show more detailes</a>
                </div>
            </div>
        @empty
            <h2 class="text-danger text-uppercase text-center">There isn't any Posts</h2>
        @endforelse

    </div>
@endsection
