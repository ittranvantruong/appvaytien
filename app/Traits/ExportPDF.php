<?php
namespace App\Traits;

use PDF;

trait ExportPDF{
    private $fullname = 'Nguyen Van A';
    private $identity_number = '221435466';
    private $loan_limit = '10000000';
    private $loan_period = '12 tháng';
    private $interest_rate = '0.5';

    public function loanContract($data = []){

        $data['fullname'] = $data['fullname'] ?? $this->fullname;
        $data['identity_number'] = $data['identity_number'] ?? $this->fullname;
        $data['loan_limit'] = $data['loan_limit'] ?? $this->loan_limit;
        $data['loan_period'] = $data['loan_period'] ?? $this->loan_period;
        $data['interest_rate'] = $data['interest_rate'] ?? $this->interest_rate;
        $data['created_at'] = $data['created_at'] ?? date('d/m/Y');

        // $pdf = PDF::loadHTML(view('admin.pdf.invoice')->with('invoice', $invoice)->render());
        $pdf = PDF::loadView('public.pdf.loan_contract', compact('data'));
        // $pdf = PDF::loadView('admin.pdf.test');
        // dd($pdf);
    	$pdf->setPaper('a4', 'landscape');
        // return $pdf->stream();
        return $pdf->download('hop-dong-cho-vay.pdf');
    }

    public function streamloanContract($data = []){

        $data['fullname'] = $data['fullname'] ?? $this->fullname;
        $data['identity_number'] = $data['identity_number'] ?? $this->fullname;
        $data['loan_limit'] = $data['loan_limit'] ?? $this->loan_limit;
        $data['loan_period'] = $data['loan_period'] ?? $this->loan_period;
        $data['interest_rate'] = $data['interest_rate'] ?? $this->interest_rate;
        $data['created_at'] = $data['created_at'] ?? date('d/m/Y');

        // $pdf = PDF::loadHTML(view('admin.pdf.invoice')->with('invoice', $invoice)->render());
        $pdf = PDF::loadView('public.pdf.loan_contract', compact('data'));
        // $pdf = PDF::loadView('admin.pdf.test');
        // dd($pdf);
    	$pdf->setPaper('a4', 'landscape');
        // return $pdf->stream();
        return $pdf->stream('hop-dong-cho-vay.pdf');
    }
}