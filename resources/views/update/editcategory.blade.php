@extends('layouts.base')
@section('content')

<div class="container">

<h3>Edit Category</h3>
@if(count($errors)>0)<!--error is greater than 0/ $errors is already defined in laravel -->
    <ul>
      @foreach($errors->all() as $error)<!-- to loop through each error and show them -->
      <li class="alert alert-danger">{{$error}}</li>
      @endforeach
    </ul>
  @endif
<form action="/{{$category->id}}" method="POST" enctype="multipart/form-data"><!-- to submit the data /send post request to url categories -->
        {{ csrf_field() }}
        {{method_field('PUT')}}

    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <div class="form-group">
        <label for="name" placeholder="Enter new category"><strong>Category Name:</strong></label>
        <input class="form-control" type="text" name="name" placeholder="Change category name">
    </div>
    <div class="form-group">
        <label for="image"><strong>Image:</strong></label>
        <input class="form-control" type="file" name="icons">

    </div>
    
    <input class="btn btn-primary" type="submit" value="Update Category" ></input>
</form>
</div>

@endsection
