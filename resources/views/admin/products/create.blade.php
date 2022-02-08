@extends('admin.layouts.app')
@section('page_title')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1>Product</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Product</li>
        </ol>
    </div>
</div>
@endsection
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Product </h3>
        <div class="card-tools">
        </div>
    </div>
    <div class="card-body">
        <div class="card-header">
            <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
                @csrf
    {{-- Product name --}}
    <div class="form-group">
        <label for="exampleInputEmail1">Product Name</label> 
        <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Enter Product Name">
    </div>
   {{-- Category id --}}
    <div class="form-group">
        <label for="exampleInputEmail1">Product Category</label>
        <select name="category_id" class="form-control">
            @foreach ($categories as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
    </div>
    {{-- Product Price --}}
    <div class="form-group">
        <label for="exampleInputEmail1">Product Price</label>
        <input type="text" name="price" value="{{ old('price') }}" class="form-control"
            placeholder="Enter Product Price">
    </div>
    {{-- Discount Amount --}}
    <div class="form-group">
        <label for="exampleInputEmail1">Discount Amount</label>
        <input type="number" name="discount_amount" value="{{ old('discount_amount') }}" class="form-control"
            placeholder="Enter Discount Amount">
    </div>
    {{-- Stock --}}
    <div class="form-group">
        <label for="exampleInputEmail1">Remaing Stock</label>
        <input type="number" name="stock" value="{{ old('stock') }}" class="form-control" placeholder="Enter Stock">
    </div>
    {{-- description --}}
    <div class="form-group">
        <label for="exampleInputEmail1">Description</label>
        <textarea name="description" class="form-control"
            placeholder="Add description">{{ old('description') }} </textarea>
    </div>
    {{-- Featured  Image --}}

    <div class="form-group">
        <label for="exampleInputEmail1">Featured Image</label>
        <input type="file" name="featured_image">
    </div>

    {{-- Images --}}

    <div class="form-group">
        <label for="exampleInputEmail1"> Images</label>
        <input type="file" name="file" multiple>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Create</button>
    </div>
    </form>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</div>
</div>
<!-- /.card-body -->
<div class="card-footer">
</div>
<!-- /.card-footer-->
</div>
@endsection
