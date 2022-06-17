<?php
namespace App\Traits;

use PDF;

trait ExportPDF{
    private $fullname = 'Nguyen Van A';
    private $identity_number = '221435466';
    private $loan_amount_limit = '10000000';
    private $loan_preiod_name = '12 tháng';
    private $interest_rate = '0.5';
    public function loanContract($data = []){

        $data['fullname'] = $data['fullname'] ?? $this->fullname;
        $data['identity_number'] = $data['identity_number'] ?? $this->fullname;
        $data['loan_registration_date'] = $data['loan_registration_date'] ?? now()->format('d-m-Y');
        $data['loan_amount_limit'] = $data['loan_amount_limit'] ?? $this->loan_amount_limit;
        $data['loan_preiod_name'] = $data['loan_preiod_name'] ?? $this->loan_preiod_name;
        $data['interest_rate'] = $data['interest_rate'] ?? $this->interest_rate;
        // $pdf = PDF::loadHTML(view('admin.pdf.invoice')->with('invoice', $invoice)->render());
        $pdf = PDF::loadView('public.pdf.loan_contract', compact('data'));
        // $pdf = PDF::loadView('admin.pdf.test');
        // dd($pdf);
    	$pdf->setPaper('a4', 'landscape');
        // return $pdf->stream();
        return $pdf->download('hop-dong-cho-vay.pdf');
    }
}