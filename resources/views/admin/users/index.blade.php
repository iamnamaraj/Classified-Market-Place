@extends('adminlte::page')

@section('title', 'Users List')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title text-bold" style="font-size: 1.3rem;lin-hight: 1.5">Users List</h3>

        <div class="card-tools">
            <a href="{{ route('admin.users.create') }}" class="btn btn-primary btn-sm">Add New</a>
        </div>
    </div>
    <div class="card-body p-0">
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
                        Show | Edit | Delete
                    </td>
                </tr>
                    
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
