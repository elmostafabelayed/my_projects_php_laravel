<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnnonceRequest;
use App\Models\Annonce;
use Illuminate\Database\Eloquent\Builder
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Storage;

use function Symfony\Component\Clock\now;

class AnnonceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Annonce::query();

        if ($request->has('filtre') && $request->filtre == "neuf") {
            $query->where("neuf", 1);
        } else if ($request->has('filtre') && $request->filtre == "ancien") {
            $query->where("neuf", 0);
        }


        if ($request->has('ville') && !empty($request->ville)) {
            $query->where('ville', $request->ville);
        };

        if ($request->has('rech') && !empty($request->rech)) {
            $query->where(function(Builder $q)use($rech){

            });
        };
        $villes = Annonce::select('ville')->distinct()->get();
        $annonces = $query->get();
        return view("annonce.index", compact("annonces", "villes"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("annonce.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "titre" => "required|unique:annonces,titre",
            "description" => "required|max:100",
            "type" => "required|in:Appartement,Maison,Villa,Magasin,Terrain",
            "superficie" => "required|integer|min:20",
            "ville" => "required|alpha",
            "prix" => "required|numeric|gt:0",
            "photo" => "image|mimes:jpg,jpeg,png,gif|max:8000"
        ], [
            "titre.unique" => "Veuillez choisir un autre titre",
            "description.required" => "Vous devez fournir une description",
            "type.in" => "Vous devez choisir une des valeurs: Appartement,Maison,Villa,Magasin,Terrain",
            "prix.gt" => "Entrez un prix valide"
        ]);
        $chemin = "";
        if ($request->has("photo")) {
            $chemin = $request->file("photo")->store("annonces", "public");
        }
        $data = $request->all();
        $data["photo"] = $chemin;
        Annonce::create($data);

        //    $annonce=new Annonce($request->all());
        //    $annonce->ville="Fès";
        //    $annonce->save();
        return redirect()->route("annonce.index")->with('success', 'Ajout réussi!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Annonce $annonce)
    {
        return view("annonce.show", compact('annonce'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Annonce $annonce)
    {
        return view("annonce.edit", compact('annonce'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AnnonceRequest $request, Annonce $annonce)
    {
        $chemin = null;
        if ($request->has("photo")) {
            $chemin = $request->file("photo")->store("annonces", "public");
            if (isset($annonce->photo))   Storage::disk("public")->delete($annonce->photo);
        }
        $data = $request->all();
        $data["photo"] = $chemin;

        $annonce->update($data);
        return redirect()->route("annonce.index")->with('success', 'Modification réussie!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Annonce $annonce)
    {
        $annonce->delete();
        return redirect()->route("annonce.index")->with('success', 'Suppression réussie!');
    }
}
