<h2> Daily Report ({{ now()->format('Y-m-d') }})</h2>

<h3> New Users:</h3>
@if ($newUsers->count())
    <ul>
        @foreach ($newUsers as $user)
            <li>{{ $user->name }} ({{ $user->email }})</li>
        @endforeach
    </ul>
@else
    <p>No new users today.</p>
@endif

<h3> New Posts:</h3>
@if ($newPosts->count())
    <ul>
        @foreach ($newPosts as $post)
            <li>{{ $post->title }} by {{ $post->user->name }}</li>
        @endforeach
    </ul>
@else
    <p>No new posts today.</p>
@endif
