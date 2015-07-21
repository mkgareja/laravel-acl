<?php

namespace App\Http\Controllers;
use Auth;
use Hash;
use View;
use Session;
use Validator;
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    //this method use for give permition to role.
    public function savepermition_role(Request $request)
    {
        $roleid = $request->input('role');
        $permitionid = $request->input('permition');
        $role = Role::find($roleid);
        $role->attachPermission($permitionid);
        return view('welcome'); 
    }
    //this method use for give new peermition to user
    public function savepermition_user(Request $request)
    {
        $userid = $request->input('user');
        $permitionid = $request->input('permition');
        $role = User::find($userid);
        $role->attachPermission($permitionid);
        return view('welcome'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    //this method use for add new user with role.
    public function saveuser(Request $request)
    {
        $v = Validator::make($request->all(),
            [
              'name' => 'required|min:5',
              'email' => 'required|email',
              'password' => 'required'
            ]);
        if($v->fails())
        {
          return redirect ('/signup')->withErrors($v)->withInput();
        }
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
    public function authenticate(Request $request)
    {
      $validatore = Validator::make($request->all(),
        [
          'email' => 'required|email',
          'password' => 'required'
        ]
        );
      if($validatore->fails())
      {
        return redirect('/signin')->withErrors($validatore)->withInput();
      }
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
            // echo "<pre>";
            // print_r(Auth::user());exit();
            // $data['data1']='data1';
            // $data['data2']='data2';
            // //Session::put('session_pass','password');
            // $email = 
            // Session::put('email',$email);

           

            //print_r(session::get('data'));
            //$request->session()->put('key', 'value');
            //$request->session()->get('mahesh', 'gareja');
            return view('welcome')->with('email',$email);
        }else
        {
            //return                                                                                                                                                            
            $alert='Enter valid user name and password';
            return view('welcome')->with('alert',$alert);
        }


        // if($request->user())
        // {
        //     return view('welcome');
        // }else
        // {
        //     return 'Enter valid user name and password';
        // }
    }
    //this method use for creating new role
    public function saverole(Request $request)
    {
        $role=new Role();
        $role->name = $request->input('role');
        $role->slug = $request->input('role_slug');
        $role->level = $request->input('level');
        $role->save();
        return view('welcome');
    } 
    //this method use to create new permition
    public function savepermition(Request $request)
    {
        $createUsersPermission = Permission::create([
                'name' => $request->input('permition'),
                'slug' => $request->input('permition_slug'),
                'description' => '', // optional
            ]);
        return view('welcome');
        // $role=new Permission();
        // $role->name = $request->input('permition');
        // $role->slug = $request->input('permition_slug');
        // $role->level = $request->input('level');
        // $role->save();
        // return view('welcome');
    }
    //this method is use for add permition to the particular role.
    public function view_addper_role()
    {
      $role = Role::all();
      $permition = Permission::all();
      return view('/add_role_permition', compact('role', 'permition'));
      //return view('/add_role_permition')->with('role,permition','$role,$permition);

    }
    //this method use for adding permition to particilar user.
    public function view_addper_user()
    {
      $user = User::all();
      $permition = Permission::all();
      return view('/add_user_permition', compact('user', 'permition'));
      //return view('/add_user_permition')->with('user',$user);
    }    
}
