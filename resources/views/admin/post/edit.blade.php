@extends('layouts.app')

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger my-3">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form method="POST" action="{{ route('admin.post.update', $post_to_edit->id) }}" class="mx-5 my-3">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Title</label>
            <input value="{{ $post_to_edit->title }}" name="title" type="string"
                class="form-control @error('title') is-invalid @enderror" id="">
            {{-- Errori inline --}}
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Body</label>
            <textarea name="body" class="form-control" id="">
            {{ $post_to_edit->body }}
        </textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Category</label>
            <select class="form-control" name="category_id" id="">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ $category->id == old('category_id', $post_to_edit->category_id) ? 'selected' : '' }}>

                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Tags</label>

            @foreach ($tags as $tag)
                <label for="">
                    <input type="checkbox" name="tags[]" value="{{ $tag->id }}"
                        {{ $post_to_edit->tags->contains($tag) ? 'checked' : '' }}>
                    {{ $tag->name }}
                </label>
            @endforeach

        </div>

        <button type="submit" class="btn btn-primary">Edit post</button>
    </form>

@endsection
