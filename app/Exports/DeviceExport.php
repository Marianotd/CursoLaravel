<?php

namespace App\Exports;

use App\Models\Device;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class DeviceExport implements FromView, ShouldAutoSize
{
    public function view(): View
    {
        return view('exports.devices', [
            'devices' => Device::all()
        ]);
    }
}
