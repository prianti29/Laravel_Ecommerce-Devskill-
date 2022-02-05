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
            <form method="POST" action="{{ route('products.store') }}">
                @csrf
                {{-- <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Main Category</label>
                        <select name="main_category_id" class="form-control">
                            @foreach ($main_category as $key => $item)
                            <option value="{{ $key }}" {{ old('main_category_id') == strval($key) ? 'selected' : '' }}>
                {{ $item }}</option>
                @endforeach
                </select>
        </div>
    </div> --}}
    {{-- Product name --}}
    <div class="card-body">
        <div class="form-group">
            <label for="exampleInputEmail1">Product Name</label>
            <input type="text" name="name" value="{{ old('name') }}" class="form-control"
                placeholder="Enter Product Name">
        </div>
    </div>
    {{-- Product Price --}}
    <div class="card-body">
        <div class="form-group">
            <label for="exampleInputEmail1">Product Price</label>
            <input type="text" name="price" value="{{ old('price') }}" class="form-control"
                placeholder="Enter Product Price">
        </div>
    </div>
    {{-- Discount Amount --}}
    <div class="card-body">
        <div class="form-group">
            <label for="exampleInputEmail1">Discount Amount</label>
            <input type="number" name="discount_amount" value="{{ old('discount_amount') }}" class="form-control"
                placeholder="Enter Discount Amount">
        </div>
    </div>
    {{-- Featured  Image --}}
    {{-- <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Featured Image</label>
                        <input type="number" name="featured_image" value="{{ old('featured_image') }}"
    class="form-control"
    placeholder="Enter Featured Image">
</div>
</div> --}}
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
