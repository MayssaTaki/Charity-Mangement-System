<?php
namespace App\Http\Exports;
use App\Models\Cach_payment;
use App\Models\campaign;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class Cach_paymentViewExport implements FromView{
    public function view(): view
    {
        $Cach_payment=Cach_payment::all();
        return view('Cach_payment.export',['Cach_payment'=>$Cach_payment]);
    }

}