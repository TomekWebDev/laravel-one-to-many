@extends('layouts.app')

@section('main')

    @if ($errors->any())
        <div class="alert alert-danger my-3">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form method="POST" action="{{ route('admin.post.store') }}" class="mx-5 my-3">

        @csrf

        <div class="mb-3">
            <label class="form-label">Title</label>
            <input name="title" type="string" class="form-control @error('title') is-invalid @enderror" id="">
            {{-- Errori inline --}}
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Body</label>
            <textarea name="body" class="form-control" id="">

        </textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Category</label>
            <select class="form-control" name="category_id" id="">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
