<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Report;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Device;

class Reports extends Controller
{
  public function index()
  {
    $reports = Report::all();
    return view('content.pages.reports', ['reports' => $reports]);
  }

  public function create()
  {
    $devices = Device::all();

    $date = date('Y-m-d');
    $pdf = Pdf::loadView('pdf.devices', compact('devices'));
    Storage::put('public/pdf/'.$date.'.pdf', $pdf->output());
    
    $report = new Report();
    $report->url = $date. ".pdf";
    $report->save();

    return redirect()->route('pages-reports');
  }

  public function destroy($report_id){
    $report = Report::find($report_id);
    Storage::delete('public/pdf/'. $report->url);

    $report->delete();

    return redirect()->route('pages-reports');
  }
}
