@extends('layouts.app')

@section('title', 'Show Post')

@section('content')
        <div class="col-6 m-auto">
            <div class="card py-3 px-4 rounded shadow mb-5">
                <img class="img-fluid mb-3 w-50 d-block m-auto" src="/images/posts/{{ $post->image }}" alt="img" />
                <h2 class="text-primary text-uppercase text-center">{{ $post->title }}</h2>
                <p class="text-capitalize text-center">{{ $post->description }}</p>
                <a class="mb-3 btn btn-primary text-capitalize" href="{{ route('posts.edit', $post) }}">edit</a>
                <form action="{{ route('posts.delete', $post->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger text-capitalize w-100">delete</button>
                </form>
            </div>
        </div>

        <a href="{{ route('posts.index') }}" class="btn btn-secondary">Return</a>
@endsection