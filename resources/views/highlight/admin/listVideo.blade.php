@extends('layouts.mainLayout')

@section('title', 'List Highlight')

@section('css', '/css/news/admin-news-style.css')

@section('content')
<div class="container mt-5">
    <h1 class="text-white">Daftar Highlight</h1>
    <div class="table-responsive mt-5 list-box">
        @if ($videos->count() == 0)
        <div class="p-2" style="background-color: rgb(2, 60, 94);">
            <h5 class="text-white text-center m-0">Tidak ada highlight</h5>
        </div>
        @else
        <table class="table table-hover table-striped">
            <thead>
                <tr class="text-center">
                    <th scope="col">No</th>
                    <th scope="col">Publisher</th>
                    <th scope="col">Title</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Updated At</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($videos as $value)
                    <tr class="text-center">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $value->admin->name }}</td>
                        <td>{{ $value->title }}</td>
                        <td>{{ $value->created_at }}</td>
                        <td>{{ $value->updated_at }}</td>
                        <td>
                            <div class="d-flex justify-content-center gap-1 align-items-center">
                                <a class="btn btn-primary" href="/highlight/edit/{{ $value->id }}">Edit</a>
                                <form action="/highlight/delete/{{ $value->id }}" method="POST">
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
        @endif
</div>

@endsection
