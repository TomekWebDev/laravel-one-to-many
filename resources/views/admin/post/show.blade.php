@extends('layouts.app')

@section('content')
    <div class="card w-25">
        <img src="..." class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{ $item->title }}</h5>
            <p class="card-text">{{ $item->body }}</p>
            <a href="{{ route('admin.post.show', $item->id) }}" class="btn btn-primary">Show</a>
            <a href="{{ route('admin.post.edit', $item->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('admin.post.destroy', $item->id) }}" method="POST">

                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-danger text-danger my-3">
                    Delete
                </button>
        </div>
    </div>
@endsection
