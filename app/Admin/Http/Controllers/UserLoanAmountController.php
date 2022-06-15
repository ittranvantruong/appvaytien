<?php

namespace App\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserLoanAmount;
use \DB;

class UserLoanAmountController extends Controller
{
    //

    public function index(Request $request){
        $user_loan_amount = UserLoanAmount::select('id', 'code', 'user_id', 'fullname', 'phone', 'loan_amount', 'loan_period', 'interest_rate', 'status', 'created_at');
        if($request->filled('status')){
            $status = $request->status;
            $user_loan_amount = $user_loan_amount->whereStatus($status);
        }
        $user_loan_amount = $user_loan_amount->orderBy('id', 'desc')->get();
        return view('admin.user_loan_amount.index', compact('user_loan_amount'));
    }

    public function edit(UserLoanAmount $user_loan_amount){
        $user_loan_amount = $user_loan_amount->load(['user' => function ($query){
            $query->select('id', 'phone');
            $query->with(['info', 'bank']);
        }]);
        // dd($user_loan_amount);
        return view('admin.user_loan_amount.edit', compact('user_loan_amount'));
    }

    public function update(Request $request, UserLoanAmount $user_loan_amount){
        $this->validate($request, [
            'loan_limit' => ['required', 'numeric', 'min:0']
        ]);
        $data = $request->only(['loan_limit']);
        $data['status'] = 1;

        $user_loan_amount->user->wallet()->update([
            'amount' => DB::raw('amount + '.$data['loan_limit']),
        ]);
        $user_loan_amount->update($data);
        return back()->with('success', 'Thực hiện thành công');
    }

    public function delete(Request $request, UserLoanAmount $user_loan_amount){
        $user_loan_amount->delete();
        if($request->ajax()){
            return response()->json([
                'status' => 200,
                'message' => 'Thực hiện thành công'
            ], 200);
        }
        return redirect()->route('admin.user.loan.amount.index')->with('success', 'Xóa thành công');
    }

}
