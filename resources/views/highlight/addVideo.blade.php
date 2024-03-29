@extends('layouts.mainLayout')

@section('content')

<div class="container mt-5">
    <h1>Form Tambah Video</h1>
    <div>
        <form action="/highlight" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" name="title">
            </div>
            <div class="mb-3">
                <label for="url" class="form-label">Link</label>
                <input type="text" class="form-control" name="url">
            </div>
            <div class="mb-3">
                <label for="thumbnail" class="form-label">Thumbnail</label>
                <input type="file" class="form-control" id="thumbnail" name="thumbnail">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <button class="btn btn-success" >Submit</button>
            </div>
        </form>
    </div>
</div>

@endsection
