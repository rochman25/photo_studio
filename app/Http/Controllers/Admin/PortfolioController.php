<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use App\Repositories\PortFolioImageRepository;
use App\Repositories\PortfolioRepository;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    protected $portfolioRepository, $portfolioImageRepository;

    public function __construct(PortfolioRepository $portfolioRepository, PortFolioImageRepository $portfolioImageRepository)
    {
        $this->portfolioRepository = $portfolioRepository;
        $this->portfolioImageRepository = $portfolioImageRepository;        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portfolios = $this->portfolioRepository->getAll();
        return view('pages.admin.portfolio.index',compact('portfolios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.portfolio.create');
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
            'nama' => 'required',
            'order' => 'required'
        ]);
        try {
            DB::beginTransaction();
            $filename = uniqid().".".$request->file("file")->extension();
            $path = $request->file("file")->storeAs('public/portfolios',$filename);
            $url = Storage::url($path);

            $dataPortfolio = [
                "nama" => $request->input('nama'),
                "caption" => $request->input('caption'),
                "file_name" => $filename,
                "file_path" => $path,
                "file_url" => $url,
                "order" => $request->input('order')
            ];

            Portfolio::create($dataPortfolio);

            DB::commit();
            return redirect()->route('portfolio.index')->with('success','Portfolio berhasil disimpan');
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
        $portfolio = $this->portfolioRepository->getById($id);
        return view('pages.admin.portfolio.edit',compact('portfolio'));
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
            'file' => 'required',
            'nama' => 'required',
            'order' => 'required'
        ]);
        try {
            DB::beginTransaction();
            $portfolio = $this->portfolioRepository->getById($id);
            $dataPortfolio = [];
            if($request->file){
                $file = explode("/",$portfolio->file_path);
                Storage::delete('portfolios/'.$file[array_key_last($file)]);

                $filename = uniqid().".".$request->file("file")->extension();
                $path = $request->file("file")->storeAs('public/heros',$filename);
                $url = Storage::url($path);
    
                $dataPortfolio = [
                    "nama" => $request->input('nama'),
                    "caption" => $request->input('caption'),
                    "file_name" => $filename,
                    "file_path" => $path,
                    "file_url" => $url,
                    "order" => $request->input('order')
                ];   
            }else{
                $dataPortfolio = [
                    "nama" => $request->input('nama'),
                    "caption" => $request->input('caption'),
                    'order' => $request->input('order')
                ];
            }

            $portfolio->update($dataPortfolio);
            DB::commit();
            return redirect()->route('portfolio.index')->with('success','Portfolio berhasil disimpan');
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
            $portfolio = $this->portfolioRepository->getById($id);
            $file = explode("/",$portfolio->file_path);
            Storage::delete('portfolios/'.$file[array_key_last($file)]);
            $portfolio->delete();
            DB::commit();
            $success = true;         
            return response()->json(['success'=>$success]);
        }catch(Exception $e){
            DB::rollBack();
            return response()->json(['success' => false,'errors' => $e->getMessage()]);
        }
    }
}
