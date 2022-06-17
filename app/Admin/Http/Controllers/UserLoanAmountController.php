<?php

namespace App\Admin\Http\Controllers;

use \DB;
use App\Traits\ExportPDF;
use Illuminate\Http\Request;
use App\Models\UserLoanAmount;
use App\Http\Controllers\Controller;

class UserLoanAmountController extends Controller
{
    //
    use ExportPDF;

    public function index(Request $request){
        $user_loan_amount = UserLoanAmount::select('id', 'code', 'user_id', 'fullname', 'phone', 'loan_amount','loan_limit', 'loan_period', 'interest_rate', 'status', 'created_at');
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
    
    public function exportContract(UserLoanAmount $user_loan_amount){
        $data = $user_loan_amount->only('fullname', 'identity_number', 'loan_limit', 'loan_period', 'interest_rate');
        $data['created_at'] = date('d/m/Y', strtotime($user_loan_amount->created_at));
        return $this->streamloanContract($data);
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

    public function updateLoanLimit(Request $request, UserLoanAmount $user_loan_amount){
        $this->validate($request, [
            'loan_limit' => ['required', 'numeric', 'min:0']
        ]);
        $data = $request->only(['loan_limit']);
        $user = $user_loan_amount->user()->first();
        $wallet = $user->wallet()->first();
        $new_wallet_amount = $wallet->amount - $user_loan_amount->loan_limit + $request->loan_limit;
        if($new_wallet_amount < 0){
            return back()->with('error', 'Hạn mức phải lớn hơn '.number_format($user_loan_amount->loan_limit - $wallet->amount));
        }
        $wallet->amount = $new_wallet_amount;
        $wallet->save();
        $user_loan_amount->update($data);
        return back()->with('success', 'Thực hiện thành công');
    }

    public function delete(Request $request, UserLoanAmount $user_loan_amount){
        $user = $user_loan_amount->user()->first();
        $wallet = $user->wallet()->first();
        if($wallet->amount < $user_loan_amount->loan_limit){
            if($request->ajax()){
                return response()->json([
                    'status' => 200,
                    'message' => 'Không thể xoá do số dư ví đang bé hơn khoản vay'
                ], 200);
            }else{
                return back()->with('error', 'Không thể xoá do số dư ví đang bé hơn khoản vay');
            }
        }else{
            $user_loan_amount->delete();
            $wallet->amount = $wallet->amount - $user_loan_amount->loan_limit;
            $wallet->save();
            if($request->ajax()){
                return response()->json([
                    'status' => 200,
                    'message' => 'Thực hiện thành công'
                ], 200);
            }
            return redirect()->route('admin.user.loan.amount.index')->with('success', 'Xóa thành công');
        }

       
    }

}
