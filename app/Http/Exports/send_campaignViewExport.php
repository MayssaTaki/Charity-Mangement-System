<?php
namespace App\Http\Exports;
use App\Models\send_campaign;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class send_campaignViewExport implements FromView{
    public function view(): view
    {
        $send_campaign=send_campaign::with('area','campaign')->get();
        return view('send_campaign.export',['send_campaign'=>$send_campaign]);
    }

}