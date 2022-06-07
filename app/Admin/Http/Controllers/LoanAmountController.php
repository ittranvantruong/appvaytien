<?php

namespace App\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Http\Requests\LoanAmountRequest;
use App\Models\LoanAmount;

class LoanAmountController extends Controller
{
    //
    public function index(){

        $loan_amount = LoanAmount::select('id', 'name', 'sort')
        ->orderBy('sort', 'ASC')->get();
        return view('admin.loan_amount.index', compact('loan_amount'));
    }

    public function edit(LoanAmount $loan_amount){
        return $loan_amount->only('id', 'name', 'sort');
    }

    public function store(LoanAmountRequest $request){
        $data = $request->only(['name', 'sort']);
        $loan_amount = LoanAmount::create($data);

        $render = view('admin.loan_amount.row')->with('item', $loan_amount)->render();

        return response()->json([
            'status' => 200,
            'message' => 'Thêm danh mục thành công',
            'data' => $render
        ], 200);
    }

    public function update(LoanAmountRequest $request){
        $data = $request->only(['name', 'sort']);
        
        $loan_amount = LoanAmount::find($request->id);
        $loan_amount->update($data);
        $render = view('admin.loan_amount.row')->with('item', $loan_amount)->render();

        return response()->json([
            'status' => 200,
            'message' => 'Sửa danh mục thành công',
            'replace' => $loan_amount->id,
            'data' => $render
        ], 200);
    }

    public function delete(LoanAmount $loan_amount){
        if($loan_amount->id != 1){
            $loan_amount->delete();
        }
        return response()->json([
            'status' => 200,
            'message' => 'Thực hiện thành công'
        ], 200);
    }

    public function multiple(Request $request){
        // dd($request);
        if (!$request->filled('action') || !$request->filled('id') || in_array(1, $request->id) || !in_array($request->action, ['show', 'hidden', 'delete'])) {
            return back()->with('error', 'Thực hiện không thành công');
        }
        switch ($request->action) { 
            case 'show': 
                LoanAmount::whereIn('id', $request->id)->update(['status' => 1]);
            break; 
            case 'hidden': 
                LoanAmount::whereIn('id', $request->id)->update(['status' => 0]);
            break;
            case 'delete': 
                foreach($request->id as $value){
                    LoanAmount::find($value)->delete();
                }
            break; 
            default:
                return back()->with('error', 'Thực hiện không thành công');
                
        }
        return back()->with('success', 'Thực hiện thành công');

    }

}
