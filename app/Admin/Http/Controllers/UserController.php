<?php

namespace App\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Http\Requests\UserRequest;
use App\Models\User;
use \DB;

class UserController extends Controller
{
    //
    public function index(Request $request){
        $users = User::select('id', 'phone', 'verified');
        if($request->filled('type')){
            $type = $request->type;
            $users = $users->whereVerified($type);
        }
        $users = $users->with(['info'])->get();
        return view('admin.user.index', compact('users'));
    }

    public function create(){
        return view('admin.user.create');
    }

    public function edit(User $user){
        $user = $user->load(['info', 'bank', 'wallet:user_id,amount']);
        $verify = $user->checkVerified();
        return view('admin.user.edit', compact('user', 'verify'));
    }

    public function store(UserRequest $request){
        //thông tin tài khoản
        $data = $request->only(['phone', 'password']);
        $data['password'] = bcrypt($data['password']);
        $user = User::create($data);
        
        //thông tin cá nhân
        $data_info = $request->only(['fullname', 'identity_number', 'education', 'personal_income', 'purpose']);
        $data_info['private_apartment'] = $request->filled('private_apartment') ? 1 : 0;
        $data_info['private_car'] = $request->filled('private_car') ? 1 : 0;
        $user->info()->create($data_info);
        
        //thông tin tài khoản ngân Hàng
        $data_bank = $request->only(['name_owner', 'name', 'number']);
        $data_bank['identity_number'] = $request->identity_number_b;
        $user->bank()->create($data_bank);

        //tạo Ví
        $user->wallet()->create();
        
        //tạo xác minh
        $user->verify()->create();
        
        return redirect()->route('admin.user.edit', $user->id)->with('success', 'Thêm thành công');
    }

    public function update(UserRequest $request){
        $data = $request->only(['phone']);

        if($request->filled('password')){
            $data['password'] = bcrypt($request->password);
        }
        $user = User::find($request->id);
        $user->update($data);

        //thông tin cá nhân
        $data_info = $request->only(['fullname', 'identity_number', 'education', 'personal_income', 'purpose']);
        $data_info['private_apartment'] = $request->filled('private_apartment') ? 1 : 0;
        $data_info['private_car'] = $request->filled('private_car') ? 1 : 0;
        $user->info()->update($data_info);

        //thông tin tài khoản ngân Hàng
        $data_bank = $request->only(['name_owner', 'name', 'number']);
        $data_bank['identity_number'] = $request->identity_number_b;
        $user->bank()->update($data_bank);

        return back()->with('success', ' Cập nhật thành công');
    }

    public function delete(Request $request, User $user){
        $user->delete();
        if($request->ajax()){
            return response()->json([
                'status' => 200,
                'message' => 'Thực hiện thành công'
            ], 200);
        }
        return redirect()->route('admin.user.index')->with('success', 'Xóa thành công');
    }

    public function verify(User $user){
        $user->update(['verified' => 1]);
        $user->verified();
        return back()->with('success', ' Xác minh thành công');
    }
}
