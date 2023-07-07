@extends('product.layout')

@section('title', 'Product')

@section('content')
    <a class="btn btn-success mt-2" href="/product/create">Create Product</a>
    <h1>Product</h1>
    @if(session('success'))
    <div class="alert alert-danger">
        {{ session('success') }}
    </div>
@endif
    <!-- Additional content specific to the index page -->
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Description</th>
      <th scope="col">image</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($product as $products)
    <tr>
      <th scope="row">{{$loop->index+1}}</th>
      <td>{{$products->name}}</td>
      <td>{{$products->description}}</td>
      <td>
        <img src="images/{{$products->image}}" class="rounded-circle" width="50" hight="50" />
      </td>
      <td><a href="product/{{$products->id}}/edit" class="btn btn-success">Edit</a></td>
      <td><a href="product/{{$products->id}}/delete" class="btn btn-danger">delete</a></td>
    </tr>
    @endforeach
    
  </tbody>
</table>
@endsection
