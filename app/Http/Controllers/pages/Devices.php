<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Device;
use App\Models\So;
use App\Models\Type;
use Illuminate\Support\Facades\Hash;

class Devices extends Controller
{
  public function index()
  {
    $devices = Device::all();

    return view('content.pages.devices', ['devices' => $devices]);
  }

  public function create()
  {
    $sos = So::where('active', true)->get();
    $types = Type::where('active', true)->get();
    return view('content.pages.devices-create', ['sos' => $sos, 'types' => $types]);
  }

  public function store(Request $request)
  {
    $validator = $request->validate([
      'name' => 'required',
    ]);

    $device = new Device();
    $device->name = $request->name;
    $device->description = $request->description;
    $device->sos_id = $request->sos_id;
    $device->type_id = $request->type_id;
    $device->serial_number = $request->serial_number ?? null;
    $device->mac_address = $request->mac_address ?? null;
    $device->ip_address = $request->ip_address ?? null;
    $device->model = $request->model ?? null;
    $device->manufacturer = $request->manufacturer ?? null;
    $device->firmware = $request->firmware ?? null;
    $device->stock = $request->stock ?? 1;
    $device->hdd = $request->hdd ?? null;
    $device->ram = $request->ram ?? null;
    $device->cpu = $request->cpu ?? null;
    $device->gpu = $request->gpu ?? null;
    $device->total_slots = $request->total_slots ?? null;
    $device->history = $request->history ?? null;
    $device->sos_id = $request->sos_id ?? null;

    $device->save();

    return redirect()->route('pages-devices');
  }

  public function show($device_id)
  {
    $sos = So::where('active', true)->get();
    $types = Type::where('active', true)->get();
    $device = Device::find($device_id);
    
    return view('content.pages.devices-show', ['device' => $device, 'sos' => $sos, 'types' => $types]);
  }

  public function update(Request $request)
  {
    $so = So::find($request->device_id);
    $so->name = $request->name;
    $so->description = $request->description;
    $so->version = $request->version;

    $so->save();

    return redirect()->route('pages-devices');
  }

  public function destroy($device_id)
  {
    $device = Device::find($device_id);
    $device->delete();

    return redirect()->route('pages-devices');
  }

  public function switch($device_id)
  {
    $device = Device::find($device_id);
    $device->active = !$device->active;
    $device->save();

    return redirect()->route('pages-devices');
  }
}