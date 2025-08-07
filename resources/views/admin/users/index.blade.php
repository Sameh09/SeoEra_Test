@extends('layout.admin.app')

@section('content')
    <h3>Users</h3>

    @if (session('success'))
        <div class="alert alert-success my-2">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('admin.users.create') }}" class="btn btn-primary my-3">Add New</a>

    <table class="table mt-3">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Admin</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr @if ($user->trashed()) class="table-danger" @endif>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->is_admin ? 'Yes' : 'No' }}</td>
                    <td>
                        @if ($user->trashed())
                            <!-- Restore button -->
                            <form action="{{ route('admin.users.restore', $user->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('PATCH')
                                <button class="btn btn-sm btn-success"
                                    onclick="return confirm('Are you sure you want to restore this user?')">Restore</button>
                            </form>
                        @else
                            <!-- Edit button -->
                            <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-sm btn-info">Edit</a>

                            <!-- Delete (soft delete) button -->
                            <form action="{{ route('admin.users.destroy', $user) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $users->links() }}
@endsection
