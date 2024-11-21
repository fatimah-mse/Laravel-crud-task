@extends('layouts.app')

@section('title' , 'Add Post')

@section('content')
    <h2 class="text-primary text-uppercase text-center mb-5">add new post</h2>
    <form class="d-flex flex-column gap-3" action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input class="px-3 py-2 rounded" type="text" name="title" placeholder="Title">
        <textarea class="px-3 py-2 rounded" name="description" rows="6" placeholder="description"></textarea>
        <input class="px-3 py-2 rounded border" type="file" name="image">
        <input class="px-3 py-2 btn btn-success" type="submit" value="Add New Post">
    </form>
    <a href="{{ route('posts.index') }}" class="btn btn-secondary mt-5">Return</a>
@endsection