@extends('layout.admin.app')

@section('content')
    <form method="POST" action="{{ route('admin.posts.store') }}">
        @csrf
        <div class="card-body">
            
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" placeholder="Enter Post Title" value="{{ old('title') }}">
                
                @error('title')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" placeholder="Post Description">{{ old('description') }}</textarea>
                
                @error('description')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="contact_phone">Contact Phone</label>
                <input type="text" name="contact_phone" class="form-control" placeholder="Enter Contact Phone" value="{{ old('contact_phone') }}">
                
                @error('contact_phone')
                    <div class="text-danger mt-2">{{ $message }}</div>
                @enderror
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
@endsection
