@extends('layout.web.app')
@section('content')
    <div class="container mt-5">
        <h4 class="text-center mb-4">📢 Recent Posts</h4>
        <div class="text-right mb-3">
            <a href="{{ route('posts.create') }}" class="btn btn-success">
                <i class="fas fa-plus mr-1"></i> Add Your Own Post
            </a>
        </div>
        @foreach ($posts as $post)
            <div class="card shadow-sm mb-3">
                <div class="card-body ">
                    <h5 class="card-title mb-2">{{ $post->title }}</h5>
                    <p class="card-text text-muted mb-2">{{ Str::limit($post->description, 150) }}</p>

                    <div class="d-flex justify-content-between small text-secondary">
                        <div><i class="fas fa-user mr-1"></i> @ {{ $post->user->name }}</div>
                        <div><i class="far fa-clock mr-1"></i> {{ $post->created_at->diffForHumans() }}</div>
                    </div>

                    <div class="mt-2 text-dark">
                        📞 <strong>Contact:</strong> {{ $post->contact_phone }}
                    </div>
                </div>
            </div>
        @endforeach

        {{ $posts->links() }}
    </div>
@endsection
