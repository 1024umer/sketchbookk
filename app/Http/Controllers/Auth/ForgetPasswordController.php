<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\{ForgetPasswordTokenRequest,ResetPasswordTokenRequet};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ForgetPasswordController extends Controller
{
    public function index(){
        return view('dashboard.forget')->with('title', 'Forget Password');
    }
    public function reset(ForgetPasswordTokenRequest $request){
        $status = Password::sendResetLink(
            $request->only('email')
        );
        return $status === Password::RESET_LINK_SENT
                ? back()->with(['status' => 'Email sent successfully'])
                : back()->withErrors(['email' => __($status)]);
    }
    public function resetPassword(ResetPasswordTokenRequet $request){
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));
     
                $user->save();
     
                event(new PasswordReset($user));
            }
        );
        if ($status === Password::PASSWORD_RESET) {
            return redirect()->route('login')->with('success', 'Your password has been successfully reset.');
        } else {
            return back()->withErrors(['email' => [$status]]);
        }
    }
}
