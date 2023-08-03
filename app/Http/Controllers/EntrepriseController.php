<?php

namespace App\Http\Controllers;

use App\Models\Entreprise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EntrepriseController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     */
    //show Profile
    public function show()
    {
        $entreprise = auth()->user();
        $id_entreprise = $entreprise->id;

        $jours = DB::table('jours')->get();
        $type_abonnements = DB::table('type_abonnements')->get();
        $image_offres = DB::table('image_offres')->get();
        $vehicules = DB::table('vehicules')->whereNull('id_abonnement')->get();

        $abonnementss = [];

        // Définir les intervalles horaires
        $intervals = [
            ['06:00:00', '08:00:00'],
            ['09:00:00', '11:00:00'],
            ['12:00:00', '14:00:00'],
            ['15:00:00', '17:00:00'],
            ['18:00:00', '20:00:00'],
            ['21:00:00', '23:00:00'],
        ];
        $currentDate = date('Y-m-d'); // Get the current date

        // Parcourir les intervalles horaires
        // Parcourir les intervalles horaires
        foreach ($intervals as $interval) {
            // Récupérer les abonnements dans l'intervalle horaire
            $abonnementsInterval = DB::table('abonnements')->whereNotNull('id_offre')->where('id_entreprise', $entreprise->id)
                ->whereDate('created_at', '>=', DB::raw('DATE_SUB(NOW(), INTERVAL duree MONTH)'))
                ->whereDate('created_at', '<=', $currentDate)
                ->where(function ($query) use ($interval) {
                    $query->whereRaw("TIME(heur_debut_aller) BETWEEN ? AND ?", $interval)
                        ->orWhereRaw("TIME(heur_debut_retour) BETWEEN ? AND ?", $interval);
                })
                ->get();

            // Ajouter les résultats aux tableaux principaux
            $abonnementss[] = $abonnementsInterval;
        }
        return view('entreprise.profile', [
            'entreprise' => $entreprise,
            'jours' => $jours,
            'type_abonnements' => $type_abonnements,
            'id_entreprise' => $id_entreprise,
            'vehicules' => $vehicules,
            'image_offres' => $image_offres,
            'abonnementss' => $abonnementss,
        ]);
    }

    //show entrepriseProfile
    public function showEntreprise(string $id_MonEntreprise)
    {
        $jours = DB::table('jours')->get();
        $type_abonnements = DB::table('type_abonnements')->get();
        $image_offres = DB::table('image_offres')->get();
        $abonnements = DB::table('abonnements')
            ->whereNotNull('id_offre') // Filtre les enregistrements où la colonne "id_offre" n'est pas nulle
            ->where('id_entreprise', $id_MonEntreprise) // Filtre les enregistrements où la colonne "id_entreprise" correspond à la variable "$id_entreprise"
            ->get(); // departExécute la requête et récupère les résultats
        $nbrAbonnements = DB::table('abonnements')
            ->whereNotNull('id_offre') // Filtre les enregistrements où la colonne "id_offre" n'est pas nulle
            ->where('id_entreprise', $id_MonEntreprise)->count();

        $vehicules = DB::table('vehicules')->whereNull('id_abonnement')->get();
        $entreprise = DB::table('entreprises')->where('id', $id_MonEntreprise)->first();
        $id_entreprise = $entreprise->id;
        return view('entreprise.entrepriseProfile', [
            'entreprise' => $entreprise,
            'jours' => $jours,
            'nbrAbonnements' => $nbrAbonnements,
            'type_abonnements' => $type_abonnements,
            'id_entreprise' => $id_entreprise,
            'vehicules' => $vehicules,
            'image_offres' => $image_offres,
            'abonnements' => $abonnements,
        ]);
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
        $entreprise = Entreprise::findOrFail($id);
        $validatedData = $request->validate([
            'nom' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:entreprises,email,' . $id],
            'description' => ['required', 'string', 'max:500'],
            'adresse' => ['required', 'string', 'max:255'],
            'telephone' => ['required', 'digits:10'],
            'siteWeb' => ['nullable', 'string', 'max:255', 'url'],
            'secteur' => ['required', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,svg', 'max:2048'],
        ], [
            'nom' => 'Verifier le champ nom il ne est pas valid.',
            'email' => 'Verifier le champ email il ne est pas valid.',
            'description' => 'Verifier le champ description il ne est pas valid.',
            'adresse' => 'Verifier le champ adresse il ne est pas valid.',
            'telephone' => 'Verifier le champ telephone il ne est pas valid.',
            'siteWeb' => 'Verifier le champ siteWeb il ne est pas valid.',
            'secteur' => 'Verifier le champ secteur il ne est pas valid.',
            'image' => 'Verifier le champ image il ne est pas valid.',

        ]);

        if ($request->hasFile('image')) {
            $imageName = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/images', $imageName);
        } else {
            $imageName = null;
        }

        // Update the data
        $entreprise->nom = $request->input('nom');
        $entreprise->email = $request->input('email');
        $entreprise->description = $request->input('description');
        $entreprise->adresse = $request->input('adresse');
        $entreprise->telephone = $request->input('telephone');
        $entreprise->siteWeb = $request->input('siteWeb', null);
        $entreprise->secteur = $request->input('secteur');
        if ($request->hasFile('image')) {
            $entreprise->image = $imageName;
        }
        // Update other fields as needed
        $entreprise->save();

        // Entreprise::whereId($id)->update($validatedData);

        return redirect('/profile')->with('success', 'votre profile modifier avec succee');
    }

    public function passwordChange(Request $request, string $id)
    {
        $entreprise = Entreprise::findOrFail($id);

        $password = $request->input('password');
        $passwordAct = $request->input('passwordAct');

        $validatedData = $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/'],
            'passwordAct' => ['required'],
            // Your other validation rules
        ], [
            'password.required' => 'Le champ du mot de passe est requis.',
            'password.string' => 'Le mot de passe doit être une chaîne de caractères.',
            'password.min' => 'Le mot de passe doit comporter au moins :min caractères.',
            'password.confirmed' => 'La confirmation du mot de passe ne correspond pas.',
            'password.regex' => 'Le mot de passe doit contenir au moins une lettre minuscule, une lettre majuscule et un chiffre.',
            'passwordAct.required' => 'Le champ du mot de passe actuel est requis.',
        ]);

        if (!Hash::check($passwordAct, $entreprise->password)) {
            return redirect('/profile')->with('success', 'Mot de passe actuel incorrect');
        }

        $passwordHashed = Hash::make($password);
        $entreprise->password = $passwordHashed;
        $entreprise->save();

        return redirect('/profile')->with('success', 'Votre mot de passe a été modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
