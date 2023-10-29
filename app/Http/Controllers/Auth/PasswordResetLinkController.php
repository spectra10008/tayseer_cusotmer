<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;
use App\Models\BeneficiaryPasswordReset;
use App\Models\Beneficiary;
use Carbon\Carbon;
use Str;
class PasswordResetLinkController extends Controller
{
    /**
     * Display the password reset link request view.
     */
    public function create(): View
    {
        return view('auth.forgot-password');
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status == Password::RESET_LINK_SENT
                    ? back()->with('status', __($status))
                    : back()->withInput($request->only('email'))
                            ->withErrors(['email' => __($status)]);
    }

    public function beneficiary_store(Request $request): View
    {
        $request->validate([
            'phone' => ['required', 'numeric', 'digits_between:9,12' ,'exists:beneficiaries,phone'],
        ]);

        $beneficiary = Beneficiary::where('phone',$request->phone)->first();
        $check_password_reset = BeneficiaryPasswordReset::where('beneficiary_id',$beneficiary->id)->first();

        if($check_password_reset)
        {
            $check_password_reset->token = Str::random(30);
            $check_password_reset->update();
        }else
        {
            $password_reset = new BeneficiaryPasswordReset();
            $password_reset->beneficiary_id = $beneficiary->id;
            $password_reset->token = Str::random(30);
            $password_reset->save();
        }

        return view('auth.link_sended')
        ->with('phone',$request->phone)
        ;
    }
}
