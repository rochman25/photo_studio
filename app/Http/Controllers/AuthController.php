<?php

namespace App\Http\Controllers;

use App\Repositories\RoleRepository;
use App\Repositories\UserRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    protected $userRepository,$roleRepository;

    public function __construct(UserRepository $userRepository, RoleRepository $roleRepository)
    {
        $this->userRepository = $userRepository;
        $this->roleRepository = $roleRepository;
    }

    public function loginView()
    {
        return view('pages.admin.login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required'
        ]);

        try {
            //code...
            // dd($request);
            $credentials = $request->only('name', 'password');

            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                return response()->json(["status" => true, "message" => route('view.home')]);
            } else {
                return response()->json([
                    "status" => false, "message" => "Mohon maaf username dan password tidak dapat kami kenali."
                ]);
            }
        } catch (Exception $e) {
            //throw $th;
            // dd($e);
            return response()->json(['status' => false, "message" => $e->getMessage()]);
            // return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function registerView(Request $request){
        return view('pages.user.auth.register');
    }

    public function registerNewUser(Request $request){
        $request->validate([
            "username" => "required|alpha_dash|unique:users,name|min:6",
            "email" => "required|email|unique:users,email",
            "password" => "required|confirmed|min:6"
        ]);

        try{
            DB::beginTransaction();
            $roleUser = $this->roleRepository->getByName("user");
            $dataUser = [
                "name" => $request->input('username'),
                "email" => $request->input('email'),
                "password" => Hash::make($request->input('password'))
            ];
            $user = $this->userRepository->create($dataUser);
            $this->userRepository->assignUserToRole([
                "role_id" => $roleUser->id,
                "user_id" => $user->id
            ]);
            DB::commit();
            return response()->json([
                "status" => true, "message" => "Terima Kasih. Silahkan masuk untuk melanjutkan."
            ]);
        }catch(Exception $e){
            DB::rollBack();
            // dd($e);
            return response()->json(['status' => false, "message" => $e->getMessage()]);
        }

    }

}
