<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backup;
use App\Jobs\BackupProcess;

class Backups extends Controller
{
  public function index()
  {
    $backups = Backup::all();
    return view('content.pages.backups', ['backups' => $backups]);
  }

  public function create(){
    BackupProcess::dispatch();

    return redirect()->route('pages-backups');
  }
}
