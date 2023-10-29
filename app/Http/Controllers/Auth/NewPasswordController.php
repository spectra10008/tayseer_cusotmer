<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Models\BeneficiaryPasswordReset;
use App\Models\Beneficiary;

class NewPasswordController extends Controller
{
    /**
     * Display the password reset view.
     */
    public function create(Request $request,$token): View
    {
        $check_password_reset = BeneficiaryPasswordReset::where('token',$token)->first();
        if($check_password_reset == null)
        {
            abort(401);
        }
        $beneficiary = Beneficiary::find($check_password_reset->beneficiary_id);


        return view('auth.reset-password', ['request' => $request])->with('phone',$beneficiary->phone);
    }

    /**
     * Handle an incoming new password request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    // public function store(Request $request): RedirectResponse
    // {
    //     $request->validate([
    //         'token' => ['required'],
    //         'email' => ['required', 'email'],
    //         'password' => ['required', 'confirmed', Rules\Password::defaults()],
    //     ]);

    //     // Here we will attempt to reset the user's password. If it is successful we
    //     // will update the password on an actual user model and persist it to the
    //     // database. Otherwise we will parse the error and return the response.
    //     $status = Password::reset(
    //         $request->only('email', 'password', 'password_confirmation', 'token'),
    //         function ($user) use ($request) {
    //             $user->forceFill([
    //                 'password' => Hash::make($request->password),
    //                 'remember_token' => Str::random(60),
    //             ])->save();

    //             event(new PasswordReset($user));
    //         }
    //     );

    //     // If the password was successfully reset, we will redirect the user back to
    //     // the application's home authenticated view. If there is an error we can
    //     // redirect them back to where they came from with their error message.
    //     return $status == Password::PASSWORD_RESET
    //                 ? redirect()->route('login')->with('status', __($status))
    //                 : back()->withInput($request->only('email'))
    //                         ->withErrors(['email' => __($status)]);
    // }


    public function store(Request $request)
    {
        $request->validate([
            'token' => ['required'],
            'phone' => ['required', 'numeric','digits_between:9,12','exists:beneficiaries,phone'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $beneficiary = Beneficiary::where('phone',$request->phone)->first();
        $beneficiary->password = Hash::make($request->password);
        $beneficiary->remember_token = Str::random(60);
        $beneficiary->update();

        return redirect()->route('login');
    }
}
