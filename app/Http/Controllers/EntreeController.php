<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entree;
use App\Models\Produit;
use App\Models\Commande;

class EntreeController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        $entrees=Entree::latest()->paginate(10);
        return view('entree.index',compact('entrees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $produits=Produit::all();
        $commandes=Commande::all();
        return view('entree.create',compact('produits','commandes'));
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
        
        entree::create($data);
        
        return redirect()->route('entrees.index')->with('message', 'entree creer');;
    
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
        $entree=entree::find($id);
        //dd($entree);
        
        return view('entree.show',compact('entree'));
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
         $entree=entree::find($id);
         
         return view('entree.edit',compact('entree'));
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
        
        entree::find($id)->update($data);
        return redirect('/entrees')->with('message', 'entree Modifier');
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
        entree::find($id)->delete();
   
         return redirect('/entrees')->with('message', 'entree bien supprimer');
    }
}
