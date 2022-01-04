<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Bussiness;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BussinessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.business.business',[
            'bussiness' => Bussiness::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.business.addbusiness');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'bussiness_name' => 'required|unique:bussinesses'
        ]);

        Bussiness::insert([
            'bussiness_name' => $request->bussiness_name,
            'created_at'     => Carbon::now()
        ]);
        return redirect('/bussiness')->with('success', __('Bussiness name Create Successfully !!'));
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
        return view('admin.business.addbusiness',[
            'data' =>  Bussiness::find($id),
        ]);
       
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
        $validated = $request->validate([
            'bussiness_name' => 'required|unique:bussinesses,bussiness_name,'.$id,
        ]);

        Bussiness::find($id)->update([
            'bussiness_name' => $request->bussiness_name,
        ]);
        return redirect('/bussiness')->with('success', __('Bussiness name Update Successfully !!'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bussiness $bussiness)
    {
        $bussiness->delete();
        return back()->with('success', __('Bussiness Delete Successfully !!'));
    }
}
