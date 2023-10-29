<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Bank;
use App\Models\Beneficiary;
use App\Models\SocialSituation;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */

    public function edit(Request $request): View
    {
        $statuses = SocialSituation::all();
        $banks = Bank::all();
        return view('profile.edit', [
            'user' => $request->user(),
            'statuses' => $statuses,
            'banks' => $banks,
        ]);
    }

    public function complete(Request $request): View
    {
        $statuses = SocialSituation::all();
        $banks = Bank::all();
        return view('profile.complete', [
            'user' => $request->user(),
            'statuses' => $statuses,
            'banks' => $banks,
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $beneficiary = Beneficiary::findOrFail(Auth::guard('beneficiaries')->id());
        $beneficiary->name = $request->name;
        $beneficiary->gender = $request->gender;
        $beneficiary->email = $request->email;
        $beneficiary->age = $request->age;
        $beneficiary->id_number = $request->id_number;
        $beneficiary->social_situation_id = $request->social_situation_id;
        $beneficiary->children_no = $request->children_no;
        $beneficiary->address = $request->address;
        $beneficiary->is_bank_account = $request->is_bank_account;
        $beneficiary->location_on_map = $request->latitude . ',' . $request->longitude;
        if (isset($request->password) && $request->password != null) {
            $beneficiary->password = Hash::make($request->password);
        }
        if ($request->is_bank_account == 1) {
            $beneficiary->bank_id = $request->bank_id;
            $beneficiary->branch_name = $request->branch_name;
            $beneficiary->account_no = $request->account_no;
        }
        // store files
        if (isset($request->image) && $request->image != null) {
            $image_path = $request->file('image')->store(
                'beneficiaries/' . $beneficiary->id, 'public'
            );
            $beneficiary->image = $image_path;
        }
        if (isset($request->id_image) && $request->id_image != null) {

            $id_image_path = $request->file('id_image')->store(
                'beneficiaries_ids/' . $beneficiary->id, 'public'
            );
            $beneficiary->id_image = $id_image_path;

        }
        // $image_path = $request->file('image')->store('public/beneficiaries');
        // $id_image_path = $request->file('id_image')->store('public/beneficiaries_ids');

        $beneficiary->is_sign_up = 1;
        // end
        $beneficiary->update();

        return Redirect::route('dashboard')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
