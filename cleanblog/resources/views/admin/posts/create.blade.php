@extends('admin.master')
@section('title', 'All Posts|' . env('APP_NAME'))


@section('content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">add New Post</h1>

@include('admin.errors')


    <form action="{{ route('admin.posts.store') }} " method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" placeholder="title" class="form-control" @error('title') is-invalid @enderror>

            @error('title')
            <small class="invilid-feedback">{{$message}}</small>
            @enderror
        </div>

         <div class="mb-3">
            <label>Image</label>
            <input type="file" name="image"  class="form-control" @error('image') is-invalid @enderror>
             @error('image')
            <small class="invilid-feedback">{{$message}}</small>
            @enderror
        </div>

         <div class="mb-3">
            <label>Content</label>
            <textarea name="content" placeholder="content" class="form-control" @error('content') is-invalid @enderror></textarea>
             @error('content')
            <small class="invilid-feedback">{{$message}}</small>
            @enderror
        </div>
<button class="btn btn-success px-5">+ Add</button>
    </form>
@stop
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.2.0/tinymce.min.js" referrerpolicy="origin"></script>
 <script>
      tinymce.init({
        selector: 'textarea'
      });
    </script>
@stop

