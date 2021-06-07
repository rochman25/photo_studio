<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //

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
                return response()->json(["status" => true,"message" => route('view.home')]);
            }else{
                return response()->json(["status" => false,"message" => Auth::attempt($credentials)
                // "Mohon maaf username dan password tidak dapat kami kenali."
                ]);
            }
        } catch (Exception $e) {
            //throw $th;
            // dd($e);
            return response()->json(['status' => false, "message" => $e->getMessage()]);
            // return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function logout(Request $request){
        Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/');
    }

}
