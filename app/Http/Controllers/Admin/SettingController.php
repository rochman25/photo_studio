<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Setting::all();
        return view('pages.admin.settings.index', compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.settings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|unique:settings,kode',
            'value' => 'required',
            'type' => 'required'
        ]);
        try {
            DB::beginTransaction();
            if ($request->input('type') == "text") {
                $settingData = $request->only(['kode', 'label', 'value', 'type']);
            } else {
                $filename = uniqid() . "." . $request->file("file")->extension();
                $path = $request->file("file")->storeAs('public/pengaturan', $filename);
                $url = Storage::url($path);
                $settingData = $request->only(['kode', 'label', 'type']);
                $settingData['value'] = $url;
            }

            Setting::create($settingData);
            DB::commit();
            return redirect()->route('setting.index')->with('success', 'Pengaturan berhasil disimpan');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $th->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $setting = Setting::find($id);
        return view('pages.admin.settings.edit', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'kode' => 'required|unique:settings,kode,' . $id,
            'type' => 'required'
        ]);
        try {
            DB::beginTransaction();
            $setting = Setting::find($id);
            $settingData = [];
            if ($request->input('type') == "text") {
                $settingData = $request->only(['kode', 'label', 'value', 'type']);
            } else {
                if ($request->hasfile('file')) {
                    $file = explode("/", $setting->value);
                    Storage::delete('public/pengaturan/' . $file[array_key_last($file)]);

                    $filename = uniqid() . "." . $request->file("file")->extension();
                    $path = $request->file("file")->storeAs('public/pengaturan', $filename);
                    $url = Storage::url($path);
                    $settingData = $request->only(['kode', 'label', 'type']);
                    $settingData['value'] = $url;
                }
            }
            $setting->update($settingData);
            DB::commit();
            return redirect()->route('setting.index')->with('success', 'Pengaturan berhasil disimpan');
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th);
            return redirect()->back()->withErrors(['error' => $th->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $setting = Setting::where('id', $id)->first();
            $setting->delete();
            DB::commit();
            $success = true;
            return response()->json(['success' => $success]);
        } catch (\Throwable  $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'errors' => $e->getMessage()]);
        }
    }
}
