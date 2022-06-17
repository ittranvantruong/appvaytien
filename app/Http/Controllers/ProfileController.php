<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\ProfileRequest;

class ProfileController extends Controller
{
    //
    public function index() {
        $user = auth()->user()
            ->load('wallet:user_id,amount','info:user_id,fullname');
        
        return view('public.profile.index', compact('user'));
    }

    public function verify() {
        $user = auth()->user()->load('bank', 'info');
        return view('public.profile.info_verify', compact('user'));
    }

    public function infoPersional() {
        $user = auth()->user()->load('info:user_id,fullname,identity_number,identity_front,identity_back');

        return view('public.profile.info_persional', compact('user'));
    }

    public function UpdateInfoPersional(ProfileRequest $request) {

        $data = $request->only('fullname', 'identity_number');

        $user = auth()->user();
        $user->update([
            'email' => $request->email
        ]);
        $user->info()->update($data);
        return back()->with('success', 'Thực hiện thành công');
    }

    public function info() {
        $user = auth()->user()->load('info:user_id,education,personal_income,purpose,private_apartment,private_car');

        return view('public.profile.info', compact('user'));
    }

    public function updateInfo(Request $request) {
        $user = auth()->user();
        $data = $request->only('education', 'personal_income', 'purpose', 'private_apartment', 'private_car');

        $user->info()->update($data);

        return back()->with('success', 'Thực hiện thành công');
    }

    public function cardBank() {
        $user = auth()->user()->load('bank');
        return view('public.profile.bank', compact('user'));
    }

    public function updateCardBank(Request $request) {
        $user = auth()->user();
        $data = $request->only('name_owner', 'identity_number', 'name', 'number');
        $user->bank()->update($data);
        return back()->with('success', 'Thực hiện thành công');
    }

    public function phone() {
        $user = auth()->user();
        return view('public.profile.phone', compact('user'));
    }

}
