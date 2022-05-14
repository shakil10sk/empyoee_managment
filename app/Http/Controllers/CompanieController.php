<?php

namespace App\Http\Controllers;

use App\Companie;
use Illuminate\Http\Request;

class CompanieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');
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
            'name' => 'required',
            'logo' => 'dimensions:max_width:300,max_height:200|mimes:jpg,png,jpeg,gif',
        ]);

        $companies = new Companie();

        $companies['name'] = $request->name;
        $companies['email'] = $request->email;
        $companies['website'] = $request->website;

        if($request->hasFile('logo')){
            $file = $request->file('logo');
            $fileName = time().'.'.$file->getClientOriginalExtension();
            $path = public_path('/iamges');
            $request->file('logo')->move($path, $fileName);
            $companies['logo'] = $fileName;
        }
       if($companies->save()){
           return redirect()->back()->with('success','Successfully data inserted');
       }else{
            return redirect()->back()->with('error','Data not inserted');

       }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Companie  $companie
     * @return \Illuminate\Http\Response
     */
    public function show(Companie $companie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Companie  $companie
     * @return \Illuminate\Http\Response
     */
    public function edit(Companie $companie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Companie  $companie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Companie $companie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Companie  $companie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Companie $companie)
    {
        //
    }
}
