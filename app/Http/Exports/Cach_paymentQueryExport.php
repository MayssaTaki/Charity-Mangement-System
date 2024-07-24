<?php
namespace App\Http\Exports;
use App\Models\Cach_payment;
use Maatwebsite\Excel\Concerns\FromQuery;

class Cach_paymentQueryExport implements FromQuery{
    public function query()
    {
        return Cach_payment::query()->where('Name','=','heba');
    }

}