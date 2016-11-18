@extends('layouts.base')
@section('content')
<div class="container">

<h4>Add New Category</h4>
@if(count($errors)>0)<!--error is greater than 0/ $errors is already defined in laravel -->
    <ul>
      @foreach($errors->all() as $error)<!-- to loop through each error and show them -->
      <li class="alert alert-danger">{{$error}}</li>
      @endforeach
    </ul>
  @endif
<form action="/" method="POST" enctype="multipart/form-data"><!-- to submit the data /send post request to url categories -->
        {{ csrf_field() }}
    <input type="hidden" name="_token" value="{{ csrf_token() }}">

    <div class="form-group">
        <label for="name" ><strong>Category Name:</strong></label>
        <input  class="form-control" type="text" name="name" placeholder="Enter new category" required>
    </div>
    <div class="form-group">
        <label for="image"><strong>Image:</strong></label>
        <input  class="form-control" type="file" name="icons" required>

    </div>
    
    <input class="btn btn-primary" type="submit" value="Add Category" ></input>
</form>
</div>
<p>
  
  <div class="container " >

        
        <div class="col-sm-9 col-md-8  main">
        <h4>View Categories</h4>
        {{ csrf_field() }}
        
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                  <th>Id</th>
                  
                  <th>Category Photo</th>
                  <th>Category Name</th>
                  <th>Edit Category</th>
                  <th>Delete Category</th>
                 
                </tr>
            </thead>
            <tbody>
              @foreach($categories as $category)<!-- to loop database records with variable $categories of controller to new variable $category of this page-->
   
                   
                <tr>
                  <!-- to display the category field in the table using $category variable -->
                  <td>{{$category->id}}</td>
                  <td><img src='{{$category->icons}}' alt='' width='50' height='50'></td>  
                  <td>{{$category->name}}</td>
                  <td><a href="/{{$category->id}}">Edit</a></td> 
                  <td>

                  <form action="/{{$category->id}}" class="pull-xs-right5 card-link" method="POST" style="display:inline">
                  {{ csrf_field() }} <!-- to solve token missmatch error-->
                  {{method_field('DELETE')}}<!-- for using delete method -->
                  <input class="btn btn-sm btn-danger" type="submit" value="Delete"></form></td> 

                </tr>
             @endforeach 
                
            </tbody>
        </table>
    </div>
    </div>

</div>
</p>
    <!-- /container -->
@endsection

    