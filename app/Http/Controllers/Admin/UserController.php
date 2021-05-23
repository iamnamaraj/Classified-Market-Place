<?php

namespace App\Http\Controllers\Admin;

use App\Models\user;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Services\MediaService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\Types\Nullable;

class UserController extends Controller
{

    protected $roles = [
        'Admin', 'User',
    ];


   public function index(): View
   {
       $users = user::paginate(20);

       return view('admin.users.index', compact('users'));
   }
    



    public function create(): View
    {
        $roles = $this->roles;
        return view('admin.users.create', compact('roles'));
    }

   


    public function store(Request $request):RedirectResponse
    {
       $data = $request->validate([

            'name'=> ['required', 'max:100'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:6'],
            'role' => ['required', Rule::in($this->roles)],
            'image' => ['nullable', 'image', 'mimes:jpeg,gif,png'],
        ]);
        $data['password']=bcrypt($data['password']);
        //unset($data['image']);

        if($request->hasFile('image')) {
            $data['media_id'] = (new MediaService)->upload($request->file('image'), "users");
        }

        User::create($data);


        return redirect()->route('admin.users.index')
        ->with('success', 'New User Created Successfully!');
    }



    
    public function show(user $user): View
    {
        return view('admin.users.show', compact('users'));
    }

    


    public function edit(user $user): View
    {
        $roles = $this->roles;
        return view('admin.users.edit', compact('users'));
    }



   
    public function update(Request $request, user $user): RedirectResponse
    {
        $data = $request->validate([

            'name' => ['required', 'max:100'],
            'email' => ['required', 'email', 'unique:users,email,' . $user->id],
            'password' => ['nullable', 'min:6'],
            'role' => ['reuired', Rule::in($this->roles)],
            'image' => ['nullable', 'image', 'mimes:jpeg,gif,png'],
        ]);
        if(!empty($passwprd)) {

            $data['password'] = bcrypt($data['passsword']);

        } else {
            unset($data['password']);
        }



        if ($request->hasFile('image')) {

            if($user->media_id && $user->media) {
                
                Storage::delete('public/' . $user->media->path);
            }
            $data['media_id'] = (new MediaService)->upload($request->file('image'), "users");
        }

       

        $user->update($data);


        return redirect()->route('admin.users.index')
        ->with('success', 'User Updated Successfully!');
    }

    


    public function destroy(user $user): RedirectResponse
    {
        $user->delete();
        return redirect()->route('admin.users.index')
        ->with('success', 'User Deleted Successfully!');
    }
}