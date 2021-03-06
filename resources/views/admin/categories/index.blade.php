@extends('adminlte::page')

@section('title', 'Category List')

@section('content')

<x-alert />
<x-delete />
<div class="card">
    <div class="card-header">
        <h3 class="card-title text-bold" style="font-size: 1.3rem;lin-hight: 1.5">Categories List</h3>

        <div class="card-tools">
            <a href="{{ route('admin.categories.create') }}" class="btn btn-primary btn-sm">Add New</a>
        </div>
    </div>
    <div class="card-body p-0">
        @if (count($categories) > 0)
            

        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Parent</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->slug }}</td>
                        <td>

                            @if ($category->category_id)
                            <a href="{{ Route('admin.categories.show', $category->category_id)}}">
                                {{ $category->parentCategory->name }}
                            </a>
                                
                            @endif

                        </td>
                        
                        <td> 
                            <a href="{{ route('admin.categories.show', $category) }}" class="btn btn-primary btn-sm">Show</a>    
                            <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-success btn-sm">Edit</a>    
                            <a href="#!" onclick="confirmDelete({{ $category->id }})" class="btn btn-danger btn-sm">Delete</a>

                            <!--Delete form -->
                            <form id="delete-form-{{ $category->id }}"
                                action="{{ route('admin.categories.destroy', $category) }}" method="post">
                                @csrf
                                @method('DELETE')

                                </form>
                        </td>
                    </tr>
                    
                @endforeach
            </tbody>
        </table>

        @else
        <div class="alert alert-warning mb-0 text-center">

            There are no items in the Table.

        </div>
            
        @endif
    </div>

    @if ($categories->perpage() < $categories->total())
      <div class="card-footer">
        {{ $categories->links() }}      
    </div>  
    @endif

</div>
@endsection
