@extends('layout.web.app')
@section('content')
    <div class="container mt-4">
        <h2 class="mb-4">📝 My Posts</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="text-right mb-3">
            <a href="{{ route('posts.create') }}" class="btn btn-success">
                <i class="fas fa-plus mr-1"></i> Create new post
            </a>
        </div>

        @forelse($posts as $post)
            <div class="card mb-3 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text">{{ $post->description }}</p>
                    <p class="text-muted mb-1">Contact: {{ $post->contact_phone }}</p>
                    <p class="text-muted">Posted: {{ $post->created_at->diffForHumans() }}</p>

                    <div class="d-flex gap-2">
                        <a href="{{ route('posts.edit', $post) }}" class="btn btn-sm btn-primary">✏️ Edit</a>

                        <form action="{{ route('posts.destroy', $post) }}" method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this post?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">🗑️ Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="alert alert-info">You haven't created any posts yet.</div>
        @endforelse

        {{ $posts->links() }}
    </div>
@endsection
