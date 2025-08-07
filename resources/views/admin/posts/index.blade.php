@extends('layout.admin.app')
@section('content')
    <h3>Posts</h3>
    <a href="{{ route('admin.posts.create') }}" class="btn btn-primary my-3">Create New Post</a>
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th style="width: 10px">#</th>
                <th>title</th>
                <th style="width: 50%">description</th>
                <th>user</th>
                <th>contact mobile</th>
                <th style="width: 180px">actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr @if ($post->trashed()) class="table-danger" @endif>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $post->title ?? '' }}</td>
                    <td>{{ $post->description ?? '' }}</td>
                    <td>{{ $post->user->name ?? '-' }}</td>
                    <td>{{ $post->contact_phone ?? '-' }}</td>
                    <td>
                        @if ($post->trashed())
                            <!-- Restore Button -->
                            <form action="{{ route('admin.posts.restore', $post->id) }}" method="POST"
                                style="display:inline;">
                                @csrf @method('PATCH')
                                <button class="btn btn-sm btn-success"
                                    onclick="return confirm('Restore this post?')">Restore</button>
                            </form>
                        @else
                            <a href="{{ route('admin.posts.show', $post->id) }}" class="btn btn-sm btn-secondary">View</a>
                            <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-sm btn-info">Edit</a>
                            <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST"
                                style="display:inline;">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this post?')">Delete</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
    {{ $posts->links() }}
@endsection
