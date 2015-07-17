<?php

namespace App\Http\Controllers;
use Auth;
use Hash;
use App\User;
use Bican\Roles\Models\Role;
use Illuminate\Http\Request;
use Bican\Roles\Models\Permission;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class attachRole extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }
    public function signup()
    {
        $role =Role::all();
        //return $role;
        return view('signup')->with('role',$role);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $user = new User();
        $user->name ='normal';
        $user->email = 'normal@gmail.com';
        $user->password ='normal';
        $user->save();
        return view('welcome');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store()
    {
        $createUsersPermission = Permission::create([
                'name' => 'Create users',
                'slug' => 'create.users',
                'description' => '', // optional
            ]);
        $deleteUsersPermission = Permission::create([
                'name' => 'Delete users',
                'slug' => 'delete.users',
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $user = User::find($id);
     
        
        $user->attachRole('3');
            //return $user->is('admin');
        //return view('view')->with('user',$user);
        if ($user->hasRole('forum.moderator')) { // you can pass an id or slug
            return 'admin';
        }else {
            return 'not admin';
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($roleId)
    {
        //role admin id 3
        $allUsersPermission = Permission::create([
                'name' => 'all Create users',
                'slug' => 'all.create.users',
                'description' => 'all permition', // optional
            ]);
        $role = Role::find($roleId);
        $role->attachPermission($allUsersPermission); 
    }
    public function validrole($roleId)
    {
        // $deleteUsersPermission = Permission::create([
        //     'name' => 'all.Delete users',
        //     'slug' => 'all.delete.users',
        // ]);
        // $user = User::find($roleId);
        // $user->attachPermission($deleteUsersPermission); 
        $per = User::find($roleId);
        //return $per;
        if($per->can('create.users'))
        {
            return 'all permition'; 
        }
        else
        {
            return 'not all permition';    
        }
   

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function saveuser(Request $request)
    {
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $save_successfully=$user->save();
        if(isset($user->id)){ 
            $id=$user->id;
            $user_new = User::find($id);
            $user_new->attachRole($request->role);
            //return $user_new;
            $user_new = User::find($id);
            if($user_new->hasRole('admin')){
                $user_new->role='admin';
                if($user_new->can('create.users'))
                {
                $user_new->permition='create.users';
                }
                else if($user_new->can('all.create.users'))
                {
                    $user_new->permition='all.create.users';      
                }
                else
                {
                    $user_new->permition='nothing';   
                }

            }else{
                $user_new->role='forum modrator';
                if($user_new->can('create.users'))
                {
                    $user_new->permition='create.users';
                }
                else if($user_new->can('all.create.users'))
                {
                    $user_new->permition='all.create.users';      
                }
                else
                {
                    $user_new->permition='nothing';   
                }
            }
            //return $user_new;
            //return $user_new;
            return view('/testpermition')->with('user_new',$user_new);
        }
        

        // Session::flash('message','students save');
        //$status='Data inserted Successfull!!!!';
        
    }
    // public function up()
    // {
    //     $user = User::find(39);
    //     $user->password = Hash::make('mahesh');
    //     $user->save();
    //     return 'saved';
    // }
    public function authenticate(Request $request)
    {
        //$user = Auth::user();
      $email=$request->input('email');
      $password=$request->input('password');
      $crede = array(
                    'email'    => $email,
                    'password' => $password
                    );
        //$user=Auth::attempt(['email' => $request->email, 'password' => $request->password]);
        //echo $user.'skcksdbck';
        if(Auth::attempt($crede))
        {
            return 'valid user';
        }else
        {
            return 'Enter valid user name and password';
        }

        // if($request->user())
        // {
        //     return view('welcome');
        // }else
        // {
        //     return 'Enter valid user name and password';
        // }
    }    
}
