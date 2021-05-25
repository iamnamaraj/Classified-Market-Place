@extends('adminlte::page')

@section('title', 'Update user Info')

@section('content')
<div class="card">

    <div class="card-header">
        <h3 class="card-title text-bold" style="font-size: 1.3rem; line-height: 1.5">
        Update user Info
        </h3>

        <div class="card-tools">
           <a href="{{ route('admin.users.index') }}" class="btn btn-primary btn-sm">Go Back
           </a>

        </div>

    </div>
    <div class="card-body">
        
        <form method="POST" action="{{ route('admin.users.update', $user) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

           <x-input field="name" text="Full Name" :current="$user->name" /> 

            <x-input field="email" text="Email Address" type="email" :current="$user->email" />

            <x-input field="password" text="Password" type="password" />

            <div class="form-group">
                <label for="role">Role </label>
                <select name="role" id="role" class="form-control @error('role') is-invalid @enderror">
                    @foreach ($roles as $role)
                        <option
                            value="{{ $role }}"
                            @if ($user->role == $role) selected @endif>{{ $role }}</option>
                     @endforeach
                </select>
            </div>

            <x-input type="file" field="image" text="Profile Picture" />

            @if($user->image)
                <div class="mb-2">

                    <img src="{{ $user->image }}" height="35px" width="auto" alt="">

                </div>
            @endif


            <button type="submit" class="btn btn-primary">

                <i class="fas fa-fw fa-save mr-2"></i>
                <span>Save</span>
            </button>


        </form>

    </div>

</div>
@endsection
