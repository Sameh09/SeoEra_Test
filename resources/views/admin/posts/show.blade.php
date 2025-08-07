@extends('layout.admin.app')

@section('content')
    <div class="post-details">

        @if(session('success'))
            <div class="alert alert-success my-2">
                {{ session('success') }}
            </div>
        @endif


        <h2>{{ $post->title }}</h2>
        <p>{{ $post->description }}</p>

        <p>Posted by: {{ $post->user->name }}</p>

        <p>Created at: {{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</p>

        <p>Contact Mobile: {{ $post->contact_phone }}</p>

        <a href="{{ url()->previous() }}" class="btn btn-sm btn-secondary">Back</a>

        <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-sm btn-primary">Edit</a>
    </div>
@endsection
