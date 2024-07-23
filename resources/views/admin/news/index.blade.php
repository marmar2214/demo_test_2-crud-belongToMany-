
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>News List</h1>
    <a href="{{ route('backend.news.create') }}" class="btn btn-primary">Create News</a>
    <ul class="list-group mt-3">
        @foreach($news as $item)
            <li class="list-group-item">
                <a href="{{ route('backend.news.show', $item) }}">{{ $item->title }}</a>
                <a href="{{ route('backend.news.edit', $item) }}" class="btn btn-sm btn-warning float-right">Edit</a>
                <form action="{{ route('backend.news.destroy', $item) }}" method="POST" class="float-right mr-2">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
</div>
@endsection
