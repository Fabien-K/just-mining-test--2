<?php

namespace App\Http\Controllers;

use App\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produits= Produit::get();
        return view('accueil', compact('produits'));
    }
    public function shop()
    {
        $produits= Produit::get();
        return view('vitrine.vitrine', compact('produits'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ajoutProduit');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validationData = $request->validate([
            'nom'=>'required|min:2|max:50',
            'prix'=>'required',
            'description'=>'required|min:2|max:400',
            
        ]);
        $nom= strip_tags($request->input('nom'));
        $prix= strip_tags($request->input('prix'));
        $description= strip_tags($request->input('description'));
        $image = $request->file('image');
        $produit = new Produit();
        $produit->nom = $nom;
        $produit->prix = $prix;  
        $produit->description = $description;
        if($image!=null)
        {
        $imageNom = $image->getClientOriginalName();
        $imageNom = pathinfo($imageNom, PATHINFO_FILENAME);
        $extension = $image->getClientOriginalExtension();
        $file = time().'_'.$imageNom.'_'.$extension;
        $image->storeAs('public/images/', $file);
        $produit->image = $file;
        } else
        {
            $produit->image ='https://picsum.photos/150/100';
        }
        $produit->save();
        $sucess = 1;
        return view('ajoutProduit', [      
            'sucess'=> $sucess  
        ]);     
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function show(Produit $produit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $id= $request->id;
        
        $produitAModifier= Produit::where('id',$id)->get();
        return view('modifierProduit', compact('produitAModifier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produit $produit)
    {
        $produit = Produit::find($request->id);
        $produit->nom = strip_tags($request->nom);  
        $produit->prix = $request->prix;
        $produit->description = strip_tags($request->description);
        if ($request->file('image')) 
        {
            $image = $request->file('image');
            $imageNomComplet = $image->getClientOriginalName();
            $imageNom = pathinfo($imageNomComplet, PATHINFO_FILENAME);
            $extension = $image->getClientOriginalExtension();
            $file = time().'_'.$imageNom.'_'.$extension;
            $image->storeAs('public/images/', $file);
            $produit->image = $file;
        }
        $produit->save();
        return redirect()->route('accueil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produit  $produit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id= $request->id;
        DB::table('produits')->where('id', $id)->delete();
        return redirect()->route('accueil');
    }
}
