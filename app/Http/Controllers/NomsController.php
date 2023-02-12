<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Noms;

class NomsController extends Controller
{
    public function liste()
    {
    $noms = DB::table('noms')->get();
    return view('noms_liste', ['personnes' => $noms]);
    }

    public function createForm()
    {
    return view('noms.create_form');
    }

    public function create(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|alpha|max:40',
            'prenom' => 'required|alpha|max:40',
            'age' => 'bail|required|integer|gte:0|lte:120',
            ]);
            $nom = new Noms();
            $nom->nom = $validated['nom'];
            $nom->prenom = $validated['prenom'];
            $nom->age = $validated['age'];
            $nom->save();
            $request->session()->flash('etat', 'Ajout effectué !');
            return redirect()->route('index');
    }

    public function delete(Request $request, $id)
    {
        $personne = Noms::findOrFail($id);
        $personne->delete();
        $request->session()->flash('etat', 'Suppression effectuée !');
        return redirect()->route('index');
    }

    public function editForm($id)
    {
        $nom = Noms::findOrFail($id);
        return view('noms.edit_form', ['personne' => $nom]);
    }

    public function edit(Request $request, $id)
    {
        $validated = $request->validate([
            'nom' => 'required|alpha|max:40',
            'prenom' => 'required|alpha|max:40',
            'age' => 'bail|required|integer|gte:0|lte:120',
        ]);
        $nom = Noms::findOrFail($id);
        $nom->nom = $validated['nom'];
        $nom->prenom = $validated['prenom'];
        $nom->age = $validated['age'];
        $nom->save();
        $request->session()->flash('etat', 'Modification effectuée !');
        return redirect()->route('index');
    }

}
