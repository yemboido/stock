<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fournisseur;
class FournisseurController extends Controller
{
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        $fournisseurs=Fournisseur::latest()->paginate(10);
        return view('fournisseur.index',compact('fournisseurs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    
        return view('fournisseur.create');
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
            
            'nom' =>  'required',
            'prenom'=>'required',
            'contact'=>'required',
            'structure'=>'required',
           
            
        ]);
        
        Fournisseur::create($data);
        
        return redirect()->route('fournisseurs.index')->with('message', 'fournisseur creer');;
    
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
        $fournisseur=Fournisseur::find($id);
        //dd($fournisseur);
        
        return view('fournisseur.show',compact('fournisseur'));
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
         $fournisseur=Fournisseur::find($id);
         
         return view('fournisseur.edit',compact('fournisseur'));
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
            
            'nom' =>  'required',
            'prenom'=>'required',
            'contact'=>'required',
            'structure'=>'required',
           
            
        ]);
        
        Fournisseur::find($id)->update($data);
        return redirect('/fournisseurs')->with('message', 'fournisseur Modifier');
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
        Fournisseur::find($id)->delete();
   
         return redirect('/fournisseurs')->with('message', 'fournisseur bien supprimer');
    }
}
