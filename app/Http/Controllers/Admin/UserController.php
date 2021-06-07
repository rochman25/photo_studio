<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use App\Models\UserRole;
use App\Repositories\UserRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::whereHas('role.role',function($query){
            $query->where('name','user');
        })->get();
        return view('pages.admin.user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('pages.admin.user.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|unique:users,name|min:4|alpha_dash",
            "email" => "required|email|unique:users,email",
            "password" => "required|confirmed|min:4",
            "role_id" => "required",
        ]);
        try{
            DB::beginTransaction();
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();

            UserRole::insert([
                "user_id" => $user->id,
                "role_id" => $request->role_id
            ]);
            
            DB::commit();
            return redirect()->route('user.index')->with("success","Data berhasil disimpan");
        }catch(Exception $e){
            dd($e);
            DB::rollBack();
            return redirect()->back()->withErrors(["Error Code"=>$e->getCode()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles = Role::all();
        $user = User::with('role')->find($id);
        return view('pages.admin.user.edit',compact('roles','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            "name" => "required|min:4|alpha_dash|unique:users,name,".$id,
            "email" => "required|email|unique:users,email,".$id,
            "password" => "nullable|confirmed|min:4",
            "role_id" => "required",
        ]);
        try{
            DB::beginTransaction();
            $user = User::find($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();

            if($user->role->role_id != $request->role_id){
                UserRole::where('user_id',$id)->update(["role_id" => $request->role_id]);
            }
            // dd($user);
            DB::commit();
            return redirect()->route('user.index')->with("success","Data berhasil disimpan");
        }catch(Exception $e){
            dd($e);
            DB::rollBack();
            return redirect()->back()->withErrors(["Error Code"=>$e->getCode()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            DB::beginTransaction();
            $user = User::where('id',$id)->first();
            UserRole::where('user_id',$id)->delete();
            $user->delete();
            DB::commit();
            $success = true;         
            return response()->json(['success'=>$success]);
        }catch(Exception $e){
            DB::rollBack();
            return response()->json(['success' => false,'errors' => $e->getMessage()]);
        }
    }

    public function resetPassword(Request $request, $id){
        try{
            DB::beginTransaction();
            $user = $this->userRepository->resetPassword($id);
            DB::commit();
            $success = $user;         
            return response()->json(['success'=>$success]);
        }catch(Exception $e){
            // dd($e);
            DB::rollBack();
            return response()->json(['success' => false,'errors' => $e->getMessage()]);
        }
    }

}
