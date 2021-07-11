<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use PDO;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $heros = Hero::orderby('order','ASC')->get();
        $portfolios = Portfolio::limit(9)->get();
        return view('pages.user.home',compact('heros','portfolios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function portfolio(){
        $portfolios = Portfolio::paginate(10);
        return view('pages.user.etc.portfolio',compact('portfolios'));
    }

    public function detail_portfolio($id){
        $portfolio = Portfolio::find($id);
        return view('pages.user.etc.detail_portfolio',compact('portfolio'));
    }

    public function about(){
        return view('pages.user.etc.about_us');
    }

    public function contact(){
        return view('pages.user.etc.contact_us');
    }

}
