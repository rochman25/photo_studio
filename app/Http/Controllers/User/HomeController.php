<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Hero;
use App\Models\Portfolio;
use App\Models\Setting;
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
        $settings = Setting::all();
        $aboutUs = "";
        $photoAboutUs = "";
        foreach($settings as $index => $item) {
            if($item->kode == "P002"){
                $aboutUs = $item->value;
            }else if($item->kode == "P003"){
                $photoAboutUs = $item->value;
            }
        }
        return view('pages.user.home',compact('heros','portfolios','aboutUs','photoAboutUs'));
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
        $settings = Setting::all();
        $email = "";
        $phone = "";
        $address = "";
        $facebook = "";
        $twitter = "";
        $instagram = "";
        foreach($settings as $index => $item){
            if($item->kode == "P004"){
                $address = $item->value;
            }else if($item->kode == "P005"){
                $email = $item->value;
            }else if($item->kode == "P006"){
                $phone = $item->value;
            }else if($item->kode == "P007"){
                $facebook = $item->value;
            }else if($item->kode == "P008"){
                $instagram = $item->value;
            }else if($item->kode == "P009"){
                $twitter = $item->value;
            }
        }
        return view('pages.user.etc.contact_us',compact('email','phone','address','facebook','instagram','twitter'));
    }

}
