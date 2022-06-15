@extends('admin.layouts.app')
@section('page_title')
<div class="row mb-2">
    <div class="col-sm-6">
        <h1>Category</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Category</li>
        </ol>
    </div>
</div>
@endsection
@section('content')
<div class="card">

    <div class="card-header">
        <h3 class="card-title">Category List</h3>
        <div class="card-tools">

            <a class="btn btn-success pull-right" href="{{ url('/admin/categories/create') }}">Add New Category</a>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <td>Name</td>
                <td>Main Category</td>
            </tr>
            @foreach ($category_list as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>{{ App\Enums\MainCategory::getDescription($item->main_category_id) }}</td>
                <td>
                    @foreach ($item->products() as $p)
                    {{ $p->name }}
                    @endforeach
                </td>  
                <td>
                    <a href="{{ url("/admin/categories/$item->id/edit") }}" class="btn btn-info">Edit</a>
                    {{-- <a href="{{ route('categories.edit', ['category'=>$item->id]) }}" class="btn btn-info">Edit</a>
                    --}}
                    <form action="{{ url("/admin/categories/$item->id") }}" method="post" style="display:inline"
                        onSubmit="return confirm('Are you sure you want to delete?')">
                        @csrf
                        @method("delete")
                        <input type="submit" class="btn btn-info" value="Delete">
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
    </div>
    <!-- /.card-footer-->
</div>
@endsection
