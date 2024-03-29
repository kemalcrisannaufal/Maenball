@extends('layouts.mainLayout')

@section('content')
<div class="container mt-5">
    <h1>Form Tambah Berita</h1>
    <div>
        <form action="/news" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" name="title">
            </div>
            <div class="mb-3">
                <label for="thumbnail" class="form-label">Thumbnail</label>
                <input type="file" class="form-control" id="thumbnail" name="thumbnail">
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea name="content" id="content" cols="30" rows="10" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <button class="btn btn-success" >Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection
