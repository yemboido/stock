<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\Categorie;
class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        $produits=Produit::latest()->paginate(10);
        return view('admin.produit.index',compact('produits'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories=Categorie::all();
        return view('admin.produit.create',compact('categories'));
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
            'libelle' => 'required',
            'prixAchat'=>'required',
            'prixVente'=>'required',
            'prixRevendeur'=>'required',
            'categorie_id' => 'required',
            'image' =>  'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required',
            
        ]);
       
        $input = $request->all();
        if ($image = $request->file('image')) {

            $destinationPath = 'storage/upload/image/';

            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();

            $image->move($destinationPath, $profileImage);

            $input['image'] = "$profileImage";
           
        }


        Produit::create($input);
        session()->flash('message', 'produit bien creer');
        return  redirect('produits')->with('message', 'produit bien creer');
    
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
        $produit=produit::find($id);
        //dd($produit);
        
        return view('admin.produit.show',compact('produit'));
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
         $produit=Produit::find($id);
         $categories=Categorie::latest()->get();
         return view('admin.produit.edit',compact('produit','categories'));
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
            'libelle' => 'required',
            'prixAchat'=>'required',
            'prixVente'=>'required',
            'prixRevendeur'=>'required',
            'categorie_id' => 'required',
            'image' =>  'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required',

        ]);

        $input = $request->all(); 
        if ($image = $request->file('image')) {

            $destinationPath = 'storage/upload/image/';

            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();

            $image->move($destinationPath, $profileImage);

            $input['image'] = "$profileImage";

        }else{

            unset($input['image']);
        }
        $produit=produit::find($id);
        $produit->update($input);
         session()->flash('message', 'produit bien modifier');
        return redirect('/produits')->with('message', 'produit Modifier');
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
        Produit::find($id)->delete();
   
         return redirect('/produits')->with('message', 'produit bien supprimer');
    }

    
}
