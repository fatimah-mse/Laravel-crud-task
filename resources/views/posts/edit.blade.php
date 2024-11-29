@extends('layouts.app')

@section('title' , 'Edit Post')

@section('content')
    <h2 class="text-primary text-uppercase text-center mb-5">edit post</h2>
    <form class="d-flex flex-column gap-3" action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input class="px-3 py-2 rounded" type="text" name="title" placeholder="Title" value="{{ old('title', $post->title) }}">
        <textarea class="px-3 py-2 rounded" name="description" rows="6" placeholder="description">{{ old('description', $post->description) }}</textarea>
        <input class="px-3 py-2 rounded border" type="file" name="images[]" multiple>
        @foreach($post->image as $image)
            <img class="img-fluid mb-3 w-75 d-block m-auto" src="/images/posts/{{ $image }}" alt="img" />
        @endforeach
        <input class="px-3 py-2 btn btn-success" type="submit" value="Update Post">
    </form>
    <a href="{{ route('posts.index') }}" class="btn btn-secondary mt-5">Return</a>
@endsection