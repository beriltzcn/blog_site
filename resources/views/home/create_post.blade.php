<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    @extends('frontend.layouts.master')
    @section('title','Create Post')
    @section('content')
    <div class="div_deg">
        <h3>Add Post</h3>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{route('post.create')}}" method="POST" enctype="multipart/form-data">
            @csrf

            @if(session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
            @endif

            <div class="form-group">
                <label for="">Title</label>
                <input type="text" name="title" class="form-control" id="" aria-describedby="" placeholder="">
            </div>
            <div class="form-group">
                <label for="">Image</label>
                <input type="file" class="form-control" name="image" placeholder="">
            </div>
            <div class="col-md-3">
                <div class="mb-3">
                    <div class="form-label">Post Category</div>
                    <select class="form-select" name="post_category">
                        <option value="">No Selected</option>
                        @foreach(\App\Models\Category::all() as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="">Content</label>
                <textarea class="form-control" name="content" id="" rows="3"></textarea>
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Add Post</button>
            <br>
            <br>
            <br>
        </form>
    </div>
</body>

</html>
@endsection
