@extends('adminlte::page')

@section('title', 'User Details')

@section('content')
<div class="card">

    <div class="card-header">
        <h3 class="card-title text-bold" style="font-size: 1.3rem; lin-height: 1.5">
        User Details
        </h3>

        <div class="card-tools">
           <a href="{{ route('admin.users.index') }}" class="btn btn-primary btn-sm">Go Back
           </a>

        </div>

    </div>
    <div class="card-body p-0">
        <table class="table table-bordered">
            <tr>
                <th style="width: 10%">ID</th>
                <td>{{  $user->id }}</td>
            </tr>
            <tr>
                <th>Name</th>
                <td>{{ $user->name }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $user->email }}</td>
            </tr>
            <tr>
                <th>Role</th>
                <td>{{$user->role  }}</td>
            </tr>
            <tr>
                <th>Image</th>
                <td>
                    @if($user->image)
                    <img src="{{ $user->image }}" height="100px"  alt="">
                    @endif
                </td>
            </tr>
        </table>

    </div>

</div>
@endsection
