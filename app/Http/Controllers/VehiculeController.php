<?php

namespace App\Http\Controllers;

use App\Models\Vehicule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VehiculeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'marque' => ['required', 'string', 'max:255'],
            'capacite' => ['required', 'numeric', 'min:1'],
            'dateMiseEnservice' => ['required'],
            'immatriculation' => ['required', 'regex:/^[A-Z]{2}-\d{3}-[A-Z]{2}$/i', 'string', 'max:10', 'unique:vehicules'],
        ], [
            'marque.required' => 'Le champ marque est obligatoire.',
            'capacite.required' => 'Le champ capacite est obligatoire.',
            'capacite.min' => 'La capacité doit être supérieure à 0.',
            'dateMiseEnservice.required' => 'Le champ date de mise en service est obligatoire.',
            'immatriculation.required' => 'Le champ immatriculation est obligatoire.',
            'immatriculation.regex' => 'Le format de l immatriculation est invalide (ex: XX-123-XX).',
            'immatriculation.unique' => 'L immatriculation doit être unique.',
        ]);

        $vehicule = new Vehicule();
        $vehicule->marque = $request->input('marque');
        $vehicule->capacite = $request->input('capacite');
        $vehicule->dateMiseEnservice = $request->input('dateMiseEnservice');
        $vehicule->immatriculation = $request->input('immatriculation');
        $vehicule->id_entreprise = $request->input('id_entreprise');
        $vehicule->save();

        return redirect('/vehicules')->with('success', 'Le véhicule a été ajouté avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $vehicule = Vehicule::findOrFail($id);
        $vehicule->id_abonnement = null;
        $vehicule->save();

        return redirect('/vehicules')->with('success', 'Le véhicule a été Abolir avec succès.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $vehicule = Vehicule::findOrFail($id);

        $validatedData = $request->validate([
            'marque' => ['required', 'string', 'max:255'],
            'capacite' => ['required', 'numeric', 'min:1'],
            'dateMiseEnservice' => ['required'],
            'immatriculation' => ['required', 'regex:/^[A-Z]{2}-\d{3}-[A-Z]{2}$/i', 'string', 'max:10', 'unique:vehicules,immatriculation,' . $vehicule->id],
        ], [
            'marque.required' => 'Le champ marque est obligatoire.',
            'capacite.required' => 'Le champ capacite est obligatoire.',
            'capacite.min' => 'La capacité doit être supérieure à 0.',
            'dateMiseEnservice.required' => 'Le champ date de mise en service est obligatoire.',
            'immatriculation.required' => 'Le champ immatriculation est obligatoire.',
            'immatriculation.regex' => 'Le format de l immatriculation est invalide (ex: XX-123-XX).',
            'immatriculation.unique' => 'L immatriculation doit être unique.',
        ]);

        $vehicule->marque = $request->input('marque');
        $vehicule->capacite = $request->input('capacite');
        $vehicule->dateMiseEnservice = $request->input('dateMiseEnservice');
        $vehicule->immatriculation = $request->input('immatriculation');

        $vehicule->save();

        return redirect('/vehicules')->with('success', 'la vehicule ' . $vehicule->marque . ' a ete modifier avec succee!');

    }

    //vehicule
    public function vehicule()
    {
        $entreprise = auth()->user();
        $id_entreprise = $entreprise->id;
        $vehicules = DB::table('vehicules')->where('id_entreprise', $id_entreprise)->get();
        return view('entreprise.vehicules', [
            'vehicules' => $vehicules,
            'id_entreprise' => $id_entreprise, // add id_entreprise to the view data
        ]);
    }

    //SearchVehicule
    public function searchVehicule(Request $request)
    {
        $vehicule = $request->input('vehicule');
        $entreprise = auth()->user();
        $id_entreprise = $entreprise->id;
        $vehicules = DB::table('vehicules')->where('id_entreprise', $id_entreprise);

        if (strpos('reserve', $vehicule) !== false && strlen($vehicule) < 8) {
            $vehicules->whereNotNull('id_abonnement');
        } elseif (strpos('non reserve', $vehicule) !== false) {
            $vehicules->whereNull('id_abonnement');
        } else {
            if ($vehicule !== null) {
                $vehicules = $vehicules->where(function ($query) use ($vehicule) {
                    $query->where('marque', 'LIKE', '%' . $vehicule . '%')
                        ->orWhere('immatriculation', 'LIKE', '%' . $vehicule . '%')
                        ->orWhere('capacite', 'LIKE', '%' . $vehicule . '%')
                        ->orWhere('dateMiseEnservice', 'LIKE', '%' . $vehicule . '%');
                });
            }
        }





        //si on a recuperer le mot resever

        $vehiculesSearched = $vehicules->get();

        return view('entreprise.vehicules', [
            'vehiculesSearched' => $vehiculesSearched,
            'vehicules' => $vehicules,
            'id_entreprise' => $id_entreprise, // add id_entreprise to the view data
        ]);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $vehicule = Vehicule::findOrFail($id);
        $vehMarque = $vehicule->marque;
        $vehicule->delete();

        return redirect('/vehicules')->with('success', 'la vehicule ' . $vehMarque . ' a ete suprime avec succee!');
    }
}
