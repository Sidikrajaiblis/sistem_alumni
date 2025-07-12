<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;
use Illuminate\Support\Facades\Auth;

class LoginResponse implements LoginResponseContract
{
    public function toResponse($request) 
    {
        $role = Auth::user()?->role;

        switch ($role) {
            case 'admin':
                $redirect = '/admin/dashboard';
                break;
            case 'moderator':
                $redirect = '/moderator/dashboard';
                break;
            default:
                $redirect = '/user/dashboard';
                break;
        }

        return redirect()->intended($redirect);
    }
}
