<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginUser as LoginUserRequest;

use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Handles the login function for API through sanctum
     * @param LoginUserRequest $request
     * @return bool
     */
    public function login(LoginUserRequest $request):bool
    {
        $auth = Auth::attempt($request->validated());

//        if($auth){
//            return
//        }else {
//
//        }
        return true;
    }


}
