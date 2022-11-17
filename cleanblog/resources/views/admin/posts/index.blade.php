@extends('admin.master')
@section('title', 'All Posts|' . env('APP_NAME'))

@section('styles')

    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .table th,
        .tabletd {
            vertical-align: middle
        }
    </style>
@stop
@section('content')

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">All Posts</h1>

    <form method="GET" action="{{ route('admin.posts.index') }} ">
        <div class="input-group mb-3">
            <input type="text" placeholder="search here.." name="search" class="form-control"
                value="{{ request()->search }} ">
            <select name="count" onchange="document.getElementById('search-form').submet()">
                <option {{ request()->count == 10 ? 'selected' : '' }} value="10">10</option>
                <option {{ request()->count == 15 ? 'selected' : '' }} value="15">15</option>
                <option {{ request()->count == 20 ? 'selected' : '' }} value="20">20</option>
                <option value="{{ $posts->total() }}">All</option>
            </select>
            <button class="btn btn-outline-dark">Button</button>
        </div>
    </form>
    <table class="table table-bordered table-hover table-striped">
        <tr>
            <th>ID</th>
            <th>title</th>
            <th>Image</th>
            <th>Auther</th>
            <th>Created At</th>
            <th>UPdated At</th>
            <th>Actions</th>
        </tr>

        @forelse ($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->title }}</td>
                <td> <img width="100" src="{{asset('storage/'. $post->image) }}" alt=""></td>
                <td>{{ $post->user_id }}</td>
                <td>{{ $post->created_at->format('F d, Y') }}</td>
                <td>{{ $post->updated_at->diffForHumans() }}</td>

                <td>
                    <a href="" class="btn btn-success btn-sm">Show</a>
                    <a href="" class="btn btn-primary btn-sm">Edit</a>

                   {{-- <a href="{{route('admin.posts.destroy',$post->id)}} " class="btn btn-danger btn-sm">Delete</a> --}}
                     <form class="d-inline" action="{{route ('admin.posts.destroy',$post->id)}}"
                        method="POST">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger btn-sm">delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7">No Data Found</td>
            </tr>
        @endforelse

    </table>
    {{-- {{ $posts->appends(['search'=>request()->search,'count'=>request()->count])->links() }} --}}
    {{ $posts->appends($_GET)->links() }}
@stop
