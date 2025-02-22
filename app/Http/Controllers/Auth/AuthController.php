<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\UserLoginRequest ;
use App\Http\Requests\Auth\UserRegisterRequest ;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * Handles the login function for API through sanctum
     *
     * @param UserLoginRequest $request
     * @return JsonResponse
     * @throws ValidationException
     */
    public function login(UserLoginRequest $request): JsonResponse
    {
        if ($this->checkCredentials($request->validated())) {
            $user = Auth::user();

            return response()->json([
                'user' => $user,
                'token' => $user->createToken('API Login')->plainTextToken
            ]);
        }

        throw ValidationException::withMessages(['email' => ['Credentials are not matching for active user']]);
    }



    /**
     *
     * @param UserRegisterRequest $request
     * @return JsonResponse
     */
    public function register(UserRegisterRequest $request): JsonResponse
    {
        $user = User::query()->create($request->validated());

        Auth::login($user);

        return response()->json([
            'user' => $user,
            'token' => $user->createToken('API Login')->plainTextToken
        ]);
    }


    /**
     * Check whether user credentials are correct with Models/User
     *
     * @param array $data
     * @return bool
     */
    private function checkCredentials(array $data): bool
    {
        return Auth::attempt($data);
    }


}
