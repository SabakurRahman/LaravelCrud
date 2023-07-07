@extends('product.layout')

@section('title', 'Create Product')

@section('content')
  
    <h1>Create Product</h1>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    <div class="row justify-content-center">
        <div class="col-sm-8">
            <div class="card mt-3 p-3">
                <form method="POST" action="/product/store" enctype="multipart/form-data">
                    @csrf 
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" .>
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                       <textarea class="form-control" rows="4" name="description"></textarea>
                       @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control" />
                        @error('image')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                    </div>
                    <button type="submit" class="btn btn-dark mt-2">Submit</button>
                </form>
            </div>
        </div>

    </div>
    <!-- Additional content specific to the create page -->
@endsection
