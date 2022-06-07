<?php

namespace App\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Http\Requests\LoanPeriodRequest;
use App\Models\LoanPeriod;

class LoanPeriodController extends Controller
{
    //
    public function index(){

        $loan_period = LoanPeriod::select('id', 'name', 'interest_rate', 'sort')
        ->orderBy('sort', 'ASC')->get();
        return view('admin.loan_period.index', compact('loan_period'));
    }

    public function edit(LoanPeriod $loan_period){
        return $loan_period->only('id', 'name','interest_rate', 'sort');
    }

    public function store(LoanPeriodRequest $request){
        $data = $request->only(['name','interest_rate', 'sort']);
        $loan_period = LoanPeriod::create($data);

        $render = view('admin.loan_period.row')->with('item', $loan_period)->render();

        return response()->json([
            'status' => 200,
            'message' => 'Thêm danh mục thành công',
            'data' => $render
        ], 200);
    }

    public function update(LoanPeriodRequest $request){
        $data = $request->only(['name','interest_rate', 'sort']);
        
        $loan_period = LoanPeriod::find($request->id);
        $loan_period->update($data);
        $render = view('admin.loan_period.row')->with('item', $loan_period)->render();

        return response()->json([
            'status' => 200,
            'message' => 'Sửa danh mục thành công',
            'replace' => $loan_period->id,
            'data' => $render
        ], 200);
    }

    public function delete(LoanPeriod $loan_period){
        if($loan_period->id != 1){
            $loan_period->delete();
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
                LoanPeriod::whereIn('id', $request->id)->update(['status' => 1]);
            break; 
            case 'hidden': 
                LoanPeriod::whereIn('id', $request->id)->update(['status' => 0]);
            break;
            case 'delete': 
                foreach($request->id as $value){
                    LoanPeriod::find($value)->delete();
                }
            break; 
            default:
                return back()->with('error', 'Thực hiện không thành công');
                
        }
        return back()->with('success', 'Thực hiện thành công');

    }
}
