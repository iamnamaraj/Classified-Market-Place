@extends('adminlte::page')

@section('title', 'Users List')

@section('content')

<x-alert />
<x-delete />
<div class="card">
    <div class="card-header">
        <h3 class="card-title text-bold" style="font-size: 1.3rem;lin-hight: 1.5">Users List</h3>

        <div class="card-tools">
            <a href="{{ route('admin.users.create') }}" class="btn btn-primary btn-sm">Add New</a>
        </div>
    </div>
    <div class="card-body p-0">
        @if (count($users) > 0)
            

        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Resisterd At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td> 
                        <a href="{{ route('admin.users.show', $user) }}" class="btn btn-primary btn-sm">Show</a>    
                        <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-success btn-sm">Edit</a>    
                        <a href="#!" onclick="confirmDelete({{ $user->id }})" class="btn btn-danger btn-sm">Delete</a>

                        <!--Delete form -->
                        <form id="delete-form-{{ $user->id }}"
                             action="{{ route('admin.users.destroy', $user) }}" method="post">
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

    @if ($users->perpage() < $users->total())
      <div class="card-footer">
        {{ $users->links() }}      
    </div>  
    @endif

</div>
@endsection
