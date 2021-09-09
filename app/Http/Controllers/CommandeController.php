<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commande;
use App\Models\Produit;
use App\Models\Fournisseur;
class CommandeController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        $commandes=Commande::latest()->paginate(10);
        return view('commande.index',compact('commandes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $fournisseurs=Fournisseur::all();
        $produits=Produit::all();
        return view('commande.create',compact('fournisseurs','produits'));
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
        
        commande::create($data);
        
        return redirect()->route('commandes.index')->with('message', 'commande creer');;
    
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
        $commande=commande::find($id);
        //dd($commande);
        
        return view('commande.show',compact('commande'));
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
         $commande=commande::find($id);
         
         return view('commande.edit',compact('commande'));
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
        
        commande::find($id)->update($data);
        return redirect('/commandes')->with('message', 'commande Modifier');
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
        commande::find($id)->delete();
   
         return redirect('/commandes')->with('message', 'commande bien supprimer');
    }
}
