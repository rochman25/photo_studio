<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class HeroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $heros = Hero::all();
        return view('pages.admin.hero.index',compact('heros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.hero.create');
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
            'file' => 'required',
            'order' => 'required'
        ]);
        try {
            DB::beginTransaction();
            
            $filename = uniqid().".".$request->file("file")->extension();
            $path = $request->file("file")->storeAs('public/heros',$filename);
            $url = Storage::url($path);

            $dataHero = [
                "file_name" => $filename,
                "file_path" => $path,
                "file_url" => $url,
                "order" => $request->input('order')
            ];

            Hero::create($dataHero);
            
            DB::commit();
            return redirect()->route('hero.index')->with('success','Hero berhasil disimpan');
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
        $hero = Hero::find($id);
        return view('pages.admin.hero.edit',compact('hero'));
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
            'order' => 'required'
        ]);
        try {
            DB::beginTransaction();
            $hero = Hero::find($id);
            $dataHero = [];
            if($request->file){
                $file = explode("/",$hero->file_path);
                Storage::delete('heros/'.$file[array_key_last($file)]);

                $filename = uniqid().".".$request->file("file")->extension();
                $path = $request->file("file")->storeAs('public/heros',$filename);
                $url = Storage::url($path);
    
                $dataHero = [
                    "file_name" => $filename,
                    "file_path" => $path,
                    "file_url" => $url,
                    "order" => $request->input('order')
                ];   
            }else{
                $dataHero = [
                    'order' => $request->input('order')
                ];
            }

            $hero->update($dataHero);

            DB::commit();
            return redirect()->route('hero.index')->with('success','Hero berhasil disimpan');
        } catch (\Throwable $th) {
            DB::rollBack();
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
        try{
            DB::beginTransaction();
            $hero = Hero::where('id',$id)->first();
            $file = explode("/",$hero->file_path);
            Storage::delete('heros/'.$file[array_key_last($file)]);
            $hero->delete();
            DB::commit();
            $success = true;         
            return response()->json(['success'=>$success]);
        }catch(Exception $e){
            DB::rollBack();
            return response()->json(['success' => false,'errors' => $e->getMessage()]);
        }
    }
}
