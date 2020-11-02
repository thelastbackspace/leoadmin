<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Http\Request;
use DB;

class RestaurantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurants = DB::table('tblRestaurants')->get();
        return $restaurants;
    }

    public function reservedtable($name){
        $reservedtable =  DB::table('tblTables')
                    ->where('qr_code_img',$name)
                    ->where('status',0)
                    ->get();
        $branch_id = $reservedtable->pluck('branch_id');
        if($reservedtable->isEmpty()){
            return "Not Available";
        }
        else{
            DB::table('tblTables')
            ->where('qr_code_img', $name)
            ->update(['status' => 1]);
          // DB::update('update tblTables set status = ? where qr_code_img = ?',[1,$name]);
            $branch = DB::table('tblBranch')
                                ->where('rest_id', $branch_id)
                                ->get();
            $categories = DB::table('tblMenuCategory')
                            ->where('m_rest_id', $branch_id)
                            ->get();
            $menu = DB::table('tblMenu')
                    ->where('branch_id', $branch_id)
                    ->get();
            return response()->json(['availability' => $reservedtable, 'branch' =>$branch, 'categories'=>$categories, 'menu' => $menu,], 200);   
        }
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
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurant $restaurant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        //
    }
}
