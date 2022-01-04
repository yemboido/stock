<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Boutique;

class BoutiqueController extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        $boutiques=Boutique::latest()->paginate(10);
        return view('boutique.index',compact('boutiques'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    
        return view('boutique.create');
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
        $data = $request->validate([
            
            'libelle' =>  'required',
            'personneReference'=>  'required',
            'telephone'=>  'required',
            'adresse'=>  'required',
        ]);
        
        Boutique::create($data);
        
        return redirect()->route('boutiques.index')->with('message', 'boutique creer');;
    
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
        $boutique=Boutique::find($id);
        //dd($boutique);
        
        return view('boutique.show',compact('boutique'));
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
         $boutique=Boutique::find($id);
         
         return view('boutique.edit',compact('boutique'));
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

        $data = $request->validate([
            
            'libelle' =>  'required',
            'personneReference'=>  'required',
            'telephone'=>  'required',
            'adresse'=>  'required',
            'actif'=>'required'
           
            
        ]);
        
        Boutique::find($id)->update($data);
        return redirect('/boutiques')->with('message', 'boutique Modifier');
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
        Boutique::find($id)->delete();
   
         return redirect('/boutiques')->with('message', 'boutique bien supprimer');
    }
}
