@extends('adminlte::page')

@section('title', 'Category Details')

@section('content')
<div class="card">

    <div class="card-header">
        <h3 class="card-title text-bold" style="font-size: 1.3rem; lin-height: 1.5">
        Category Details
        </h3>

        <div class="card-tools">
           <a href="{{ route('admin.categories.index') }}" class="btn btn-primary btn-sm">Go Back
           </a>

        </div>

    </div>
    <div class="card-body p-0">
        <table class="table table-bordered">

            <tr>
                <th style="width: 10%">Name</th>
                <td>{{ $category->name }}</td>
            </tr>
            <tr>
                <th>URL Slug</th>
                <td>{{ $category->slug }}</td>
            </tr>
            <tr>
                <th>Parent Category</th>
                <td>{{  $category->parentCategory->name }}</td>
            </tr>

            
        </table>

    </div>

</div>
@endsection

