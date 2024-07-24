<?php
namespace App\Http\Exports;
use App\Models\Cach_payment;
use Maatwebsite\Excel\Concerns\FromCollection;

class Cach_paymentExport implements FromCollection{
    public function collection()
    {
        return Cach_payment::all();
    }

}