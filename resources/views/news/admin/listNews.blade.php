@extends('layouts.mainLayout')

@section('title', 'List News')

@section('css', '/css/news/admin-news-style.css')

@section('content')
<div class="container mt-5">
    <h1 class="text-white">List Berita</h1>
    <div class="table-responsive mt-5 list-box">
        <table class="table table-hover table-striped">
            <thead>
                <tr class="text-center">
                    <th scope="col">No</th>
                    <th scope="col">Publisher</th>
                    <th scope="col">Title</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($news as $value)
                    <tr class="text-center">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $value->admin->name }}</td>
                        <td>{{ $value->title }}</td>
                        <td>
                            <div class="d-flex justify-content-center gap-1 align-items-center">
                                <a class="btn btn-primary" href="/news/edit/{{ $value->id }}">Edit</a>
                                <form action="/news/delete/{{ $value->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" href="/news/delete/{{ $value->id }}">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>

@endsection
