<?php
namespace App\Http\Controllers\Auth;
namespace App\Http\Controllers\Admin\UserManagment;

use App\User; 
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users  = User::paginate(3, ['*'], 'users');
        if ($request->ajax()) {
            return view('admin.user_managment.users.load', ['users' => $users])->render();  
        }
        return view('admin.user_managment.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user_managment.users.create', [
            'user' => []
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
    * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        $validator = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/|confirmed',
        ]);

         $user = User::create([
             'name' => $request['name'],
             'email' => $request['email'],
             'password' => bcrypt($request['password']),
             'role_id' =>$request['role_id'],
         ]);

        $user_id=$user->id; 
        $role_id=$request['role_id']; 
        // $input = $request->all(); 
        // $user = User::create($input);
        $role = Role::find($role_id);
        $user->roles()->attach( $role);      

        return redirect()->route('admin.user_managment.user.index')->with('success','User updated successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.user_managment.users.edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validator = $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                \Illuminate\Validation\Rule::unique('users')->ignore($user->id),
            ],
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        $user->name = $request['name'];
        $user->email = $request['email'];
        $request['password'] == null ?: $user->password = bcrypt($request['password']);
        $user->role_id = $request['role_id'];
        $user->save();


        $user_id=$user->id; // get user id from post request
        $role_id=$request['role_id']; // get  Role id from post request

        /* Todo request validation*/
        $user = User::find($user_id);
        $role = Role::find($role_id);

        // $user->roles()->detach($role);
        // $user->roles()->attach($role);              
        $user->roles()->sync([$request->input('role_id')]);
        
        return redirect()->route('admin.user_managment.user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.user_managment.user.index');
    }

    public function deleteuser(Request $req) {
        User::find($req->id)->delete();
        return response()->json();
    }




}
