<?php

namespace App\Http\Controllers;


use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;


class CustomerController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function customerLogin(Request $request){

        $this->validate($request, [
            'email' => 'required',
            'password' => 'required|min:8',
        ]);
        
        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        if (Auth::attempt($credentials, true)) {
            return redirect()->intended('/');
        }

        return redirect('login')->with('result', ['danger', 'Incorrect email or password!']);

    }

    public function customerRegister(Request $request){

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:customers',
            'password' => 'required|min:8',
        ]);

        Customer::create([
            'UID' => generateUniqueMongoId('customers'),
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => password_hash($request->input('password'), PASSWORD_DEFAULT),
            'status' => false,
        ]);

        return redirect('login')->with('result', ['success', 'Your account has been created!']);

    }
}
