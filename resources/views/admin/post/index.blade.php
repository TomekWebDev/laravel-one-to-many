@extends('layouts.app')

@section('content')
    <a href="{{ route('admin.post.create') }}" class="btn btn-primary mb-5">
        Scrivi nuovo post
    </a>

    <h4 class="mb-5">Lista post dello user: {{ $user->name }} con id: {{ $user->id }}</h4>

    @foreach ($posts as $item)
        <div class="card w-25 m-1">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
                <h4 class="card-title">{{ $item->title }}</h4>

                <p class="card-text">{{ $item->body }}</p>

                @if ($item->category)
                    <h6 class="">{{ $item->category->name }}</h6>
                @endif

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
    @endforeach

    {{-- {{ $posts->links() }} --}}
@endsection
