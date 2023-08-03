<?php

namespace App\Http\Controllers;

use App\Models\Abonnement;
use App\Models\DateAbonnement;
use App\Models\ImageOffre;
use App\Models\Location;
use App\Models\Offre;
use App\Models\Vehicule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AbonnementController extends Controller
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

    //lister offres
    public function offres()
    {
        $jours = DB::table('jours')->get();
        $type_abonnements = DB::table('type_abonnements')->get();
        $image_offres = DB::table('image_offres')->get();
        $abonnements = DB::table('abonnements')->whereNotNull('id_offre')->get();
        $nbrAbonnements = DB::table('abonnements')->whereNotNull('id_offre')->count();
        $vehicules = DB::table('vehicules')->whereNull('id_abonnement')->get();
        $locations = DB::table('locations')->get();

        $entreprise = auth()->user();
        $id_entreprise = $entreprise->id;
        return view('entreprise.offres', [
            'id_entreprise' => $id_entreprise,
            'jours' => $jours,
            'type_abonnements' => $type_abonnements,
            'vehicules' => $vehicules,
            'image_offres' => $image_offres,
            'abonnements' => $abonnements,
            'nbrAbonnements' => $nbrAbonnements,
            'locations' => $locations,
        ]);
    }

    //lister MesOffres
    public function mesOffres()
    {
        $entreprise = auth()->user();
        $id_entreprise = $entreprise->id;

        $jours = DB::table('jours')->get();
        $type_abonnements = DB::table('type_abonnements')->get();
        $image_offres = DB::table('image_offres')->get();
        $abonnements = DB::table('abonnements')
            ->whereNotNull('id_offre') // Filtre les enregistrements où la colonne "id_offre" n'est pas nulle
            ->where('id_entreprise', $id_entreprise) // Filtre les enregistrements où la colonne "id_entreprise" correspond à la variable "$id_entreprise"
            ->get(); // Exécute la requête et récupère les résultats
        $nbrAbonnements = DB::table('abonnements')
            ->whereNotNull('id_offre') // Filtre les enregistrements où la colonne "id_offre" n'est pas nulle
            ->where('id_entreprise', $id_entreprise)->count();

        $locations = DB::table('locations')->get();

        return view('entreprise.Mesoffres', [
            'jours' => $jours,
            'type_abonnements' => $type_abonnements,
            'id_entreprise' => $id_entreprise,
            'image_offres' => $image_offres,
            'abonnements' => $abonnements,
            'nbrAbonnements' => $nbrAbonnements,
            'locations' => $locations,
        ]);
    }

    /**
     * Store a newly created resrequiredource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'titre' => ['required', 'string', 'max:255'],
            'description_offre' => ['required', 'string', 'max:250'],
            'dateFinOffre' => ['required', 'date'],
            'nom' => ['required', 'string', 'max:255'],
            'type_abonnement' => ['required'],
            'image_offre' => ['required'],
            'description_abonnement' => ['required', 'string', 'max:250'],
            'duree' => ['required', 'numeric', 'min:1'],
            'depart' => ['required', 'string', 'max:255'],
            'destination' => ['required', 'string', 'max:255'],
            'jours' => 'required|array',
            'jours.*' => 'integer|min:1',
            'heur_debut_aller' => 'required|date_format:H:i',
            'heur_fin_aller' => 'required|date_format:H:i',
            'heur_debut_retour' => 'required|date_format:H:i',
            'heur_fin_retour' => 'required|date_format:H:i',
            'prix' => ['required', 'numeric', 'min:0', 'regex:/^\d+(\.\d{1,2})?$/'],
            'vehicules' => ['required'],
            'image_offre' => ['required', 'image', 'mimes:jpeg,png,jpg,svg', 'max:2048'],
        ],
            [
                'titre.required' => 'Le champ titre est requis.',
                'titre.max' => 'Le champ titre ne doit pas dépasser :max caractères.',
                'description_offre.required' => 'Le champ description de offre est requis.',
                'description_offre.max' => 'Le champ description de offre ne doit pas dépasser :max caractères.',
                'dateFinOffre.required' => 'Le champ date de fin de offre est requis.',
                'dateFinOffre.date' => 'Le champ date de fin de offre doit être une date valide.',
                'nom.required' => 'Le champ nom est requis.',
                'nom.max' => 'Le champ nom ne doit pas dépasser :max caractères.',
                'type_abonnement.required' => 'Le champ type abonnement est requis.',
                'description_abonnement.required' => 'Le champ description de abonnement est requis.',
                'description_abonnement.max' => 'Le champ description de abonnement ne doit pas dépasser :max caractères.',
                'duree.required' => 'Le champ durée est requis.',
                'duree.numeric' => 'Le champ durée doit être un nombre.',
                'duree.min' => 'Le champ durée doit être supérieur à :min.',
                'depart.required' => 'Le champ départ est requis.',
                'depart.max' => 'Le champ départ ne doit pas dépasser :max caractères.',
                'destination.required' => 'Le champ destination est requis.',
                'destination.max' => 'Le champ destination ne doit pas dépasser :max caractères.',
                'jours.required' => 'Le champ jours est requis.',
                'jours.array' => 'Le champ jours doit être un tableau.',
                'jours.*.integer' => 'Les valeurs du champ jours doivent être des entiers.',
                'jours.*.min' => 'Les valeurs du champ jours doivent être supérieures à :min.',
                'heur_debut_aller.required' => 'Le champ heure de début aller est requis.',
                'heur_debut_aller.date_format' => 'Le champ heure de début aller doit être au format H:i.',
                'heur_fin_aller.required' => 'Le champ heure de fin aller est requis.',
                'heur_fin_aller.date_format' => 'Le champ heure de fin aller doit être au format H:i.',
                'heur_debut_retour.required' => 'Le champ heure de début retour est requis.',
                'heur_debut_retour.date_format' => 'Le champ heure de début retour doit être au format H:i.',
                'heur_fin_retour.required' => 'Le champ heure de fin retour est requis.',
                'heur_fin_retour.date_format' => 'Le champ heure de fin retour doit être au format H:i.',
                'prix.required' => 'Le champ prix est requis.',
                'prix.numeric' => 'Le champ prix doit être un nombre.',
                'prix.min' => 'Le champ prix doit être supérieur à :min.',
                'prix.regex' => 'Le champ prix doit avoir un format valide.',
                'vehicules.required' => 'Abonnement requis des véhicules.',
                'image_offre' => 'verifier le champ de image offre',
            ]);

        $offre = new Offre();
        $offre->titre = $request->input('titre');
        $offre->description = $request->input('description_offre');
        $offre->dateFinOffre = $request->input('dateFinOffre');
        $offre->id_entreprise = $request->input('id_entreprise');

        if ($request->hasFile('image_offre')) {
            $imageName = 'cars/' . $request->file('image_offre')->getClientOriginalName();
            $imageOffre = ImageOffre::where('image', $imageName)->first();

            if ($imageOffre) {
                $offre->id_imageOffre = $imageOffre->id;
            }
        }

        $offre->save();

        // $imageName = 'vehicules/' . $request->input('image_offre')->getClientOriginalName();
        // $imageOffre = ImageOffre::where('image', $imageName)->first();
        // if ($imageOffre) {
        //     $offre->id_imageOffre = $imageOffre->id;
        // }
        // $offre->save();

        $id_offre = $offre->id;

        $abonnement = new Abonnement();
        $abonnement->nom = $request->input('nom');
        $abonnement->description = $request->input('description_abonnement');
        $abonnement->depart = $request->input('depart');
        $abonnement->destination = $request->input('destination');
        $abonnement->trajet = $request->input('depart') . '-' . $request->input('destination');
        //manque nombre de places
        $abonnement->id_offre = $id_offre;
        $abonnement->id_type_abonnement = $request->input('type_abonnement');
        $abonnement->duree = $request->input('duree');

        $abonnement->prix = $request->input('prix');
        $abonnement->heur_debut_aller = $request->input('heur_debut_aller');
        $abonnement->heur_fin_aller = $request->input('heur_fin_aller');
        $abonnement->heur_debut_retour = $request->input('heur_debut_retour');
        $abonnement->heur_fin_retour = $request->input('heur_fin_retour');
        $abonnement->id_entreprise = $request->input('id_entreprise');
        $abonnement->save();

        $joursIds = $request->input('jours');

        foreach ($joursIds as $jourId) {
            $dateAbonnement = new DateAbonnement();
            $dateAbonnement->id_abonnement = $abonnement->id;
            $dateAbonnement->id_jour = $jourId;
            $dateAbonnement->save();
        }

        $vehiculeIds = $request->input('vehicules');

        if (is_array($vehiculeIds)) {
            // Plusieurs véhicules sont sélectionnés
            foreach ($vehiculeIds as $vehiculeId) {
                // Check if the vehicle exists
                $vehicule = Vehicule::find($vehiculeId);

                if ($vehicule) {
                    // Update the id_abonnement field
                    $vehicule->id_abonnement = $abonnement->id; // Replace $id_abonnement with the desired value
                    $vehicule->save();
                }
            }
        } else {
            // Un seul véhicule est sélectionné
            $vehicule = Vehicule::find($vehiculeIds);

            if ($vehicule) {
                $vehicule->id_abonnement = $abonnement->id; // Replace $id_abonnement with the desired value
                $vehicule->save();
            }
        }

        return redirect('/MesOffres')->with('success', "Offre Abonnemnt est ajouter avec succee");
    }

    /**
     * Display the specified resource.
     */
    //infosAbonnement
    public function showInfosAbonnement(string $id)
    {
        $abonnement = DB::table('abonnements')->where('id', $id)->first();
        $locations = DB::table('locations')->get();
        $destinationCitieDepart = Location::select(DB::raw('latitude as destinationCitieDepartlat'))->where('city', '=', $abonnement->depart)->first();
        $destinationCitieDepartlng = Location::select(DB::raw('longitude as destinationCitieDepartlng'))->where('city', '=', $abonnement->depart)->first();
        $destinationCitieDestination = Location::select(DB::raw('latitude as destinationCitieDestinationlat'))->where('city', '=', $abonnement->destination)->first();
        $destinationCitieDestinationlng = Location::select(DB::raw('longitude as destinationCitieDestinationlng'))->where('city', '=', $abonnement->destination)->first();
        if ($abonnement) {
            return view('entreprise.infosAbonnement', [
                'abonnement' => $abonnement,
                'locations' => $locations,
                'destinationCitieDepart' => $destinationCitieDepart,
                'destinationCitieDepartlng' => $destinationCitieDepartlng,
                'destinationCitieDestination' => $destinationCitieDestination,
                'destinationCitieDestinationlng' => $destinationCitieDestinationlng,
            ]);
        } else {
            abort(404);
        }
    }

    //plusOnfos
    public function showPlusInfos(string $id)
    {
        $abonnement = Abonnement::findOrFail($id);
        $destinationCitieDepart = Location::select(DB::raw('latitude as destinationCitieDepartlat'))->where('city', '=', $abonnement->depart)->first();
        $destinationCitieDepartlng = Location::select(DB::raw('longitude as destinationCitieDepartlng'))->where('city', '=', $abonnement->depart)->first();
        $destinationCitieDestination = Location::select(DB::raw('latitude as destinationCitieDestinationlat'))->where('city', '=', $abonnement->destination)->first();
        $destinationCitieDestinationlng = Location::select(DB::raw('longitude as destinationCitieDestinationlng'))->where('city', '=', $abonnement->destination)->first();

        if ($abonnement) {
            return view('entreprise.plusInfos', [
                'abonnement' => $abonnement,
                'destinationCitieDepart' => $destinationCitieDepart,
                'destinationCitieDepartlng' => $destinationCitieDepartlng,
                'destinationCitieDestination' => $destinationCitieDestination,
                'destinationCitieDestinationlng' => $destinationCitieDestinationlng,
            ]);
        } else {
            abort(404);
        }
    }

    //searchOffreAbonnement
    public function searchMesOffres(Request $request)
    {
        $entreprise = auth()->user();
        $id_entreprise = $entreprise->id;

        $type = $request->input('type');
        $offreAbonnement = $request->input('offreAbonnement');

        $abonnements = null;
        $nbrAbonnements = 0;

        $query = DB::table('abonnements')
            ->whereNotNull('id_offre')
            ->where('abonnements.id_entreprise', $id_entreprise); // Specify table name for id_entreprise

        if ($type !== null) {
            $mon_type_abonnement = DB::table('type_abonnements')->where('id', $type)->first();
            $query->where('id_type_abonnement', 'LIKE', '%' . $mon_type_abonnement->id . '%');
        }

        if ($offreAbonnement !== null) {
            $query->join('offres', 'offres.id', '=', 'abonnements.id_offre')
                ->where(function ($query) use ($offreAbonnement) {
                    $query->where('offres.titre', 'LIKE', '%' . $offreAbonnement . '%')
                        ->orWhere('abonnements.nom', 'LIKE', '%' . $offreAbonnement . '%');
                });
        }

        $abonnements = $query->get();
        $nbrAbonnements = $query->count();

        $jours = DB::table('jours')->get();
        $type_abonnements = DB::table('type_abonnements')->get();
        $image_offres = DB::table('image_offres')->get();
        $vehicules = DB::table('vehicules')->whereNull('id_abonnement')->get();
        $locations = DB::table('locations')->get();

        return view('entreprise.MesOffres', [
            'jours' => $jours,
            'type_abonnements' => $type_abonnements,
            'id_entreprise' => $id_entreprise,
            'vehicules' => $vehicules,
            'image_offres' => $image_offres,
            'abonnements' => $abonnements,
            'nbrAbonnements' => $nbrAbonnements,
            'locations' => $locations,
        ]);
    }

    //searchOffresAbonnements
    public function searchOffres(Request $request)
    {
        $type = $request->input('type');
        $offreAbonnement = $request->input('offreAbonnement');

        $abonnements = null;
        $nbrAbonnements = 0;

        $query = DB::table('abonnements')->whereNotNull('id_offre');

        if ($type !== null) {
            $mon_type_abonnement = DB::table('type_abonnements')->where('id', $type)->first();
            $query->where('id_type_abonnement', 'LIKE', '%' . $mon_type_abonnement->id . '%');
        }

        if ($offreAbonnement !== null) {
            $query->join('offres', 'offres.id', '=', 'abonnements.id_offre')
                ->where(function ($query) use ($offreAbonnement) {
                    $query->where('offres.titre', 'LIKE', '%' . $offreAbonnement . '%')
                        ->orWhere('abonnements.nom', 'LIKE', '%' . $offreAbonnement . '%');
                });
        }

        $abonnements = $query->get();
        $nbrAbonnements = $query->count();

        $jours = DB::table('jours')->get();
        $type_abonnements = DB::table('type_abonnements')->get();
        $image_offres = DB::table('image_offres')->get();
        $vehicules = DB::table('vehicules')->whereNull('id_abonnement')->get();
        $locations = DB::table('locations')->get();
        $entreprise = auth()->user();
        $id_entreprise = $entreprise->id;

        return view('entreprise.offres', [
            'jours' => $jours,
            'type_abonnements' => $type_abonnements,
            'id_entreprise' => $id_entreprise,
            'vehicules' => $vehicules,
            'image_offres' => $image_offres,
            'abonnements' => $abonnements,
            'nbrAbonnements' => $nbrAbonnements,
            'locations' => $locations,
        ]);
    }

    //AdvancedResearch
    public function advancedResearch(Request $request)
    {
        $query = DB::table('abonnements')
            ->join('offres', 'offres.id', '=', 'abonnements.id_offre')
            ->whereNotNull('id_offre');

        $filters = [
            'titre' => ['column' => 'offres.titre', 'operator' => 'LIKE'],
            'nom' => ['column' => 'nom', 'operator' => 'LIKE'],
            'trajet' => ['column' => 'trajet', 'operator' => 'LIKE'],
            'duree' => ['column' => 'duree', 'operator' => 'LIKE'],
            'depart' => ['column' => 'depart', 'operator' => 'LIKE'],
            'destination' => ['column' => 'destination', 'operator' => 'LIKE'],
            'heur_debut_aller' => ['column' => 'heur_debut_aller', 'operator' => 'LIKE'],
            'heur_fin_aller' => ['column' => 'heur_fin_aller', 'operator' => 'LIKE'],
            'heur_debut_retour' => ['column' => 'heur_debut_retour', 'operator' => 'LIKE'],
            'heur_fin_retour' => ['column' => 'heur_fin_retour', 'operator' => 'LIKE'],
            'prixMin' => ['column' => 'prix', 'operator' => '>='],
            'prixMax' => ['column' => 'prix', 'operator' => '<='],
        ];

        $id_type_abonnement = $request->input('type_abonnement');
        if ($id_type_abonnement) {
            $query->where('id_type_abonnement', $id_type_abonnement);
        }

        foreach ($filters as $param => $config) {
            if ($request->filled($param)) {
                $value = $request->input($param);
                $column = $config['column'];
                $operator = $config['operator'];

                if ($param === 'prixMin' && $request->filled('prixMax')) {
                    $query->whereBetween('prix', [$value, $request->input('prixMax')]);
                } elseif ($param === 'prixMax' && $request->filled('prixMin')) {
                    // Skip as this condition is already handled above
                } else {
                    $query->where($column, $operator, '%' . $value . '%');
                }
            }
        }

        if ($request->filled('jours')) {
            $joursIds = $request->input('jours');

            $subquery = DB::table('abonnements')
                ->join('date_abonnements', 'abonnements.id', '=', 'date_abonnements.id_abonnement')
                ->join('jours', 'date_abonnements.id_jour', '=', 'jours.id')
                ->whereIn('jours.id', $joursIds)
                ->groupBy('abonnements.id')
                ->havingRaw('COUNT(DISTINCT jours.id) = ?', [count($joursIds)])
                ->select('abonnements.id');

            $query->whereIn('abonnements.id', $subquery);
        }

        // Exécuter la requête et récupérer les résultats
        $abonnements = $query->get();
        $nbrAbonnements = $query->count();

        $jours = DB::table('jours')->get();
        $type_abonnements = DB::table('type_abonnements')->get();
        $image_offres = DB::table('image_offres')->get();
        $vehicules = DB::table('vehicules')->whereNull('id_abonnement')->get();
        $entreprise = auth()->user();
        $id_entreprise = $entreprise->id;
        $locations = DB::table('locations')->get();

        return view('entreprise.offres', [
            'jours' => $jours,
            'type_abonnements' => $type_abonnements,
            'id_entreprise' => $id_entreprise,
            'vehicules' => $vehicules,
            'image_offres' => $image_offres,
            'abonnements' => $abonnements,
            'nbrAbonnements' => $nbrAbonnements,
            'locations' => $locations,
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
        $validatedData = $request->validate([
            'titre' => ['required', 'string', 'max:255'],
            'description_offre' => ['required', 'string', 'max:500'],
            'dateFinOffre' => ['required', 'date'],
            'nom' => ['required', 'string', 'max:255'],
            'type_abonnement' => ['required'],
            'image_offre' => ['required'],
            'description_abonnement' => ['required', 'string', 'max:500'],
            'duree' => ['required', 'numeric', 'min:1'],
            'depart' => ['required', 'string', 'max:255'],
            'destination' => ['required', 'string', 'max:255'],
            'jours' => 'required|array',
            'jours.*' => 'integer|min:1',
            'heur_debut_aller' => 'required',
            'heur_fin_aller' => 'required',
            'heur_debut_retour' => 'required',
            'heur_fin_retour' => 'required',
            'prix' => ['required', 'numeric', 'min:0', 'regex:/^\d+(\.\d{1,2})?$/'],
            'vehicules' => ['required'],
            'image_offre' => ['nullable', 'image', 'mimes:jpeg,png,jpg,svg', 'max:2048'],
        ],
            [
                'titre.required' => 'Le champ titre est requis.',
                'titre.max' => 'Le champ titre ne doit pas depasser :max caracteres.',
                'description_offre.required' => 'Le champ description de offre est requis.',
                'description_offre.max' => 'Le champ description de offre ne doit pas depasser :max caracteres.',
                'dateFinOffre.required' => 'Le champ date de fin de offre est requis.',
                'dateFinOffre.date' => 'Le champ date de fin de offre doit etre une date valide.',
                'nom.required' => 'Le champ nom est requis.',
                'nom.max' => 'Le champ nom ne doit pas depasser :max caracteres.',
                'type_abonnement.required' => 'Le champ type abonnement est requis.',
                'description_abonnement.required' => 'Le champ description de abonnement est requis.',
                'description_abonnement.max' => 'Le champ description de abonnement ne doit pas depasser :max caracteres.',
                'duree.required' => 'Le champ duree est requis.',
                'duree.numeric' => 'Le champ duree doit etre un nombre.',
                'duree.min' => 'Le champ duree doit etre superieur a :min.',
                'depart.required' => 'Le champ depart est requis.',
                'depart.max' => 'Le champ depart ne doit pas depasser :max caracteres.',
                'destination.required' => 'Le champ destination est requis.',
                'destination.max' => 'Le champ destination ne doit pas depasser :max caracteres.',
                'jours.required' => 'Le champ jours est requis.',
                'jours.array' => 'Le champ jours doit être un tableau.',
                'jours.*.integer' => 'Les valeurs du champ jours doivent être des entiers.',
                'jours.*.min' => 'Les valeurs du champ jours doivent etre superieures a :min.',
                'heur_debut_aller.required' => 'Le champ heure de début aller est requis.',
                'heur_debut_aller.date_format' => 'Le champ heure de début aller doit être au format H:i.',
                'heur_fin_aller.required' => 'Le champ heure de fin aller est requis.',
                'heur_fin_aller.date_format' => 'Le champ heure de fin aller doit être au format H:i.',
                'heur_debut_retour.required' => 'Le champ heure de début retour est requis.',
                'heur_debut_retour.date_format' => 'Le champ heure de début retour doit être au format H:i.',
                'heur_fin_retour.required' => 'Le champ heure de fin retour est requis.',
                'heur_fin_retour.date_format' => 'Le champ heure de fin retour doit être au format H:i.',
                'prix.required' => 'Le champ prix est requis.',
                'prix.numeric' => 'Le champ prix doit etre un nombre.',
                'prix.min' => 'Le champ prix doit etre supérieur a :min.',
                'prix.regex' => 'Le champ prix doit avoir un format valide.',
                'vehicules.required' => 'Abonnement requis des véhicules.',
            ]);

        $abonnement = Abonnement::findOrFail($id);

        $offre = Offre::findOrFail($abonnement->id_offre);
        $offre->titre = $request->input('titre');
        $offre->description = $request->input('description_offre');
        $offre->dateFinOffre = $request->input('dateFinOffre');
        $offre->id_entreprise = $request->input('id_entreprise');

        if ($request->hasFile('image_offre')) {
            $imageName = 'cars/' . $request->file('image_offre')->getClientOriginalName();
            $imageOffre = ImageOffre::where('image', $imageName)->first();

            if ($imageOffre) {
                $offre->id_imageOffre = $imageOffre->id;
            }
        }

        $offre->save();
        $id_offre = $offre->id;

        $abonnement->nom = $request->input('nom');
        $abonnement->description = $request->input('description_abonnement');
        $abonnement->depart = $request->input('depart');
        $abonnement->destination = $request->input('destination');
        $abonnement->trajet = $request->input('depart') . '-' . $request->input('destination');
        //manque nombre de places
        $abonnement->id_offre = $id_offre;
        $abonnement->id_type_abonnement = $request->input('type_abonnement');
        $abonnement->duree = $request->input('duree');

        $abonnement->prix = $request->input('prix');
        $abonnement->heur_debut_aller = $request->input('heur_debut_aller');
        $abonnement->heur_fin_aller = $request->input('heur_fin_aller');
        $abonnement->heur_debut_retour = $request->input('heur_debut_retour');
        $abonnement->heur_fin_retour = $request->input('heur_fin_retour');
        $abonnement->id_entreprise = $request->input('id_entreprise');
        $abonnement->save();

        $joursIds = $request->input('jours');
        $existingJours = DateAbonnement::where('id_abonnement', $abonnement->id)->pluck('id_jour')->toArray();

        // Supprimer les jours supplémentaires
        $joursToDelete = array_diff($existingJours, $joursIds);
        DateAbonnement::where('id_abonnement', $abonnement->id)->whereIn('id_jour', $joursToDelete)->delete();

        // Ajouter les nouveaux jours
        $joursToAdd = array_diff($joursIds, $existingJours);
        foreach ($joursToAdd as $jourId) {
            $dateAbonnement = new DateAbonnement();
            $dateAbonnement->id_abonnement = $abonnement->id;
            $dateAbonnement->id_jour = $jourId;
            $dateAbonnement->save();
        }

        // Mettre à jour les jours existants
        $joursToUpdate = array_intersect($joursIds, $existingJours);
        foreach ($joursToUpdate as $jourId) {
            $dateAbonnement = DateAbonnement::where('id_abonnement', $abonnement->id)->where('id_jour', $jourId)->first();
            $dateAbonnement->save();
        }

        $vehiculeIds = $request->input('vehicules');
        $existingVehicules = Vehicule::where('id_abonnement', $abonnement->id)->pluck('id')->toArray();

        // Supprimer les véhicules existants qui ne sont pas dans la nouvelle liste
        $vehiculesToDelete = array_diff($existingVehicules, $vehiculeIds);
        Vehicule::whereIn('id', $vehiculesToDelete)->update(['id_abonnement' => null]);

        // Mettre à jour les véhicules existants et ajouter les nouveaux véhicules
        foreach ($vehiculeIds as $vehiculeId) {
            $vehicule = Vehicule::find($vehiculeId);
            if ($vehicule) {
                // Mettre à jour la relation avec l'abonnement
                $vehicule->id_abonnement = $abonnement->id;
                $vehicule->save();
            }
        }

        return redirect('/MesOffres')->with('success', "offre abonnemnt est modifier avec succee");
    }

    public function updateAbn(Request $request, string $id)
    {
        $entreprise = auth()->user();

        $validatedData = $request->validate([
            'nom' => ['required', 'string', 'max:255'],
            'type_abonnement' => ['required'],
            'description_abonnement' => ['required', 'string', 'max:500'],
            'duree' => ['required', 'numeric', 'min:1'],
            'depart' => ['required', 'string', 'max:255'],
            'destination' => ['required', 'string', 'max:255'],
            'jours' => 'required|array',
            'jours.*' => 'integer|min:1',
            'heur_debut_aller' => 'required',
            'heur_fin_aller' => 'required',
            'heur_debut_retour' => 'required',
            'heur_fin_retour' => 'required',
            'prix' => ['required', 'numeric', 'min:0', 'regex:/^\d+(\.\d{1,2})?$/'],
            'vehicules' => ['required'],
        ],
            [

                'nom.required' => 'Le champ nom est requis.',
                'nom.max' => 'Le champ nom ne doit pas depasser :max caracteres.',
                'type_abonnement.required' => 'Le champ type abonnement est requis.',
                'description_abonnement.required' => 'Le champ description de abonnement est requis.',
                'description_abonnement.max' => 'Le champ description de abonnement ne doit pas depasser :max caracteres.',
                'duree.required' => 'Le champ duree est requis.',
                'duree.numeric' => 'Le champ duree doit etre un nombre.',
                'duree.min' => 'Le champ duree doit etre superieur a :min.',
                'depart.required' => 'Le champ depart est requis.',
                'depart.max' => 'Le champ depart ne doit pas depasser :max caracteres.',
                'destination.required' => 'Le champ destination est requis.',
                'destination.max' => 'Le champ destination ne doit pas depasser :max caracteres.',
                'jours.required' => 'Le champ jours est requis.',
                'jours.array' => 'Le champ jours doit être un tableau.',
                'jours.*.integer' => 'Les valeurs du champ jours doivent être des entiers.',
                'jours.*.min' => 'Les valeurs du champ jours doivent etre superieures a :min.',
                'heur_debut_aller.required' => 'Le champ heure de début aller est requis.',
                'heur_debut_aller.date_format' => 'Le champ heure de début aller doit être au format H:i.',
                'heur_fin_aller.required' => 'Le champ heure de fin aller est requis.',
                'heur_fin_aller.date_format' => 'Le champ heure de fin aller doit être au format H:i.',
                'heur_debut_retour.required' => 'Le champ heure de début retour est requis.',
                'heur_debut_retour.date_format' => 'Le champ heure de début retour doit être au format H:i.',
                'heur_fin_retour.required' => 'Le champ heure de fin retour est requis.',
                'heur_fin_retour.date_format' => 'Le champ heure de fin retour doit être au format H:i.',
                'prix.required' => 'Le champ prix est requis.',
                'prix.numeric' => 'Le champ prix doit etre un nombre.',
                'prix.min' => 'Le champ prix doit etre supérieur a :min.',
                'prix.regex' => 'Le champ prix doit avoir un format valide.',
                'vehicules.required' => 'Abonnement requis des véhicules.',
            ]);

        $abonnement = Abonnement::findOrFail($id);
        $offre = null;
        $msg = '';
        if ($abonnement->id_offre === null) {
            $offre = new Offre();
            $msg = ' offre d abonnement est creer avec succee';
        } else {
            $offre = Offre::findOrFail($abonnement->id_offre);
            $msg = ' offre d abonnement est modifier avec succee';
        }

        $titre = $request->input('titre');
        $description = $request->input('description_offre');
        $dateFinOffre = $request->input('dateFinOffre');
        $id_entreprise = $request->input('id_entreprise');
        $imageOffre = $request->input('image_offre');

        if (!empty($titre) || !empty($description) || !empty($dateFinOffre) || !empty($imageOffre)) {
            $validatedData = $request->validate([
                'titre' => ['required', 'string', 'max:255'],
                'description_offre' => ['required', 'string', 'max:500'],
                'dateFinOffre' => ['required', 'date'],
                'image_offre' => ['nullable', 'image', 'mimes:jpeg,png,jpg,svg', 'max:2048'],
            ], [
                'titre' => 'Verifier le champ titre de offre',
                'description' => 'Verifier le champ description de offre',
                'date fin offre' => 'Verifier le champ date fin offre de offre',
                'image offre' => 'Verifier le champ image offre de offre',
            ]);

            $offre->titre = $validatedData['titre'];
            $offre->description = $validatedData['description_offre'];
            $offre->dateFinOffre = $validatedData['dateFinOffre'];
            $offre->id_entreprise = $entreprise->id;

            if ($request->hasFile('image_offre')) {
                $imageName = 'cars/' . $request->file('image_offre')->getClientOriginalName();
                $imageOffre = ImageOffre::where('image', $imageName)->first();

                if ($imageOffre) {
                    $offre->id_imageOffre = $imageOffre->id;
                }
            }

            $offre->save();
        }

        $abonnement->nom = $request->input('nom');
        $abonnement->description = $request->input('description_abonnement');
        $abonnement->depart = $request->input('depart');
        $abonnement->destination = $request->input('destination');
        $abonnement->trajet = $request->input('depart') . '-' . $request->input('destination');
        //manque nombre de places
        $abonnement->id_type_abonnement = $request->input('type_abonnement');
        $abonnement->duree = $request->input('duree');

        $abonnement->prix = $request->input('prix');
        $abonnement->heur_debut_aller = $request->input('heur_debut_aller');
        $abonnement->heur_fin_aller = $request->input('heur_fin_aller');
        $abonnement->heur_debut_retour = $request->input('heur_debut_retour');
        $abonnement->heur_fin_retour = $request->input('heur_fin_retour');
        $abonnement->id_entreprise = $entreprise->id;
        if ($offre != null) {
            $abonnement->id_offre = $offre->id;
        }

        $abonnement->save();

        $joursIds = $request->input('jours');
        $existingJours = DateAbonnement::where('id_abonnement', $abonnement->id)->pluck('id_jour')->toArray();

        // Supprimer les jours supplémentaires
        $joursToDelete = array_diff($existingJours, $joursIds);
        DateAbonnement::where('id_abonnement', $abonnement->id)->whereIn('id_jour', $joursToDelete)->delete();

        // Ajouter les nouveaux jours
        $joursToAdd = array_diff($joursIds, $existingJours);
        foreach ($joursToAdd as $jourId) {
            $dateAbonnement = new DateAbonnement();
            $dateAbonnement->id_abonnement = $abonnement->id;
            $dateAbonnement->id_jour = $jourId;
            $dateAbonnement->save();
        }

        // Mettre à jour les jours existants
        $joursToUpdate = array_intersect($joursIds, $existingJours);
        foreach ($joursToUpdate as $jourId) {
            $dateAbonnement = DateAbonnement::where('id_abonnement', $abonnement->id)->where('id_jour', $jourId)->first();
            $dateAbonnement->save();
        }

        $vehiculeIds = $request->input('vehicules');
        $existingVehicules = Vehicule::where('id_abonnement', $abonnement->id)->pluck('id')->toArray();

        // Supprimer les véhicules existants qui ne sont pas dans la nouvelle liste
        $vehiculesToDelete = array_diff($existingVehicules, $vehiculeIds);
        Vehicule::whereIn('id', $vehiculesToDelete)->update(['id_abonnement' => null]);

        // Mettre à jour les véhicules existants et ajouter les nouveaux véhicules
        foreach ($vehiculeIds as $vehiculeId) {
            $vehicule = Vehicule::find($vehiculeId);
            if ($vehicule) {
                // Mettre à jour la relation avec l'abonnement
                $vehicule->id_abonnement = $abonnement->id;
                $vehicule->save();
            }
        }

        return redirect('/mesAbonnements')->with('success', "Abonnemnt est modifier avec succee\n" . $msg);
    }

    //mesAbonnements
    public function mesAbonnements()
    {
        $entreprise = auth()->user();

        $abonnements = DB::table('abonnements')->where('id_entreprise', $entreprise->id)->get();
        $abns = DB::table('abonnements')->where('id_entreprise', $entreprise->id)->get();
        $offres = null;
        return view('entreprise.abonnement', [
            'abonnements' => $abonnements,
            'abns' => $abns,
            'offres' => $offres,
        ]);
    }
    public function mesOffresAbn()
    {
        $entreprise = auth()->user();

        $abonnements = null;
        $abns = DB::table('abonnements')->where('id_entreprise', $entreprise->id)->get();
        $offres = DB::table('offres')->where('id_entreprise', $entreprise->id)->get();
        return view('entreprise.abonnement', [
            'abonnements' => $abonnements,
            'abns' => $abns,
            'offres' => $offres,
        ]);
    }

    //SearchMesAbonnement
    public function searchMesAbonnement(Request $request)
    {
        $entreprise = auth()->user();
        $type = $request->input('type_abonnement');
        $nom = $request->input('abonnement');

        $query = DB::table('abonnements')
            ->where('abonnements.id_entreprise', $entreprise->id);

        if ($type !== null) {
            $mon_type_abonnement = DB::table('type_abonnements')->where('id', $type)->first();
            $query->where('id_type_abonnement', 'LIKE', '%' . $mon_type_abonnement->id . '%');
        }

        if ($nom !== null) {
            $query->join('offres', 'offres.id', '=', 'abonnements.id_offre')
                ->where(function ($query) use ($nom) {
                    $query->where('abonnements.nom', 'LIKE', '%' . $nom . '%');
                });
        }

        $abonnements = $query->get();
        $offres = null;

        $abns = DB::table('abonnements')
            ->where('id_entreprise', $entreprise->id)
            ->get();

        return view('entreprise.abonnement', [
            'offres' => $offres,
            'abonnements' => $abonnements,
            'abns' => $abns,
            'entreprise' => $entreprise,
        ]);
    }
    public function searchMesOffresAbn(Request $request)
    {
        $entreprise = auth()->user();
        $titre = $request->input('offre');

        $query = DB::table('offres')->where('id_entreprise', $entreprise->id);

        if ($titre !== null) {
            $query->where('titre', 'LIKE', '%' . $titre . '%');
        }

        $offres = $query->get();
        $abonnements = null;

        $abns = DB::table('abonnements')
            ->where('id_entreprise', $entreprise->id)
            ->get();

        return view('entreprise.abonnement', [
            'abonnements' => $abonnements,
            'offres' => $offres,
            'abns' => $abns,
            'entreprise' => $entreprise,
        ]);
    }

    //monVoirePlus
    public function monVoirePlus(string $id)
    {
        $entreprise = auth()->user();
        $abonnement = Abonnement::findOrFail($id);
        $clientAbonnes = DB::table('client_abonnes')->where('id_abonnement', $id)->get();
        $clientIds = $clientAbonnes->pluck('id_client')->toArray();
        $clients = DB::table('clients')->whereIn('id', $clientIds)->get();

        $destinationCitieDepart = Location::select(DB::raw('latitude as destinationCitieDepartlat'))->where('city', '=', $abonnement->depart)->first();
        $destinationCitieDepartlng = Location::select(DB::raw('longitude as destinationCitieDepartlng'))->where('city', '=', $abonnement->depart)->first();
        $destinationCitieDestination = Location::select(DB::raw('latitude as destinationCitieDestinationlat'))->where('city', '=', $abonnement->destination)->first();
        $destinationCitieDestinationlng = Location::select(DB::raw('longitude as destinationCitieDestinationlng'))->where('city', '=', $abonnement->destination)->first();

        $locations = DB::table('locations')->get();
        if ($abonnement) {
            return view('entreprise.monAbnVoirePlus', [
                'clients' => $clients,
                'abonnement' => $abonnement,
                'locations' => $locations,
                'entreprise' => $entreprise,
                'destinationCitieDepart' => $destinationCitieDepart,
                'destinationCitieDepartlng' => $destinationCitieDepartlng,
                'destinationCitieDestination' => $destinationCitieDestination,
                'destinationCitieDestinationlng' => $destinationCitieDestinationlng,
            ]);
        } else {
            abort(404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $abonnement = Abonnement::findOrFail($id);
        $offre = Offre::findOrFail($abonnement->id_offre);
        $titre = $offre->titre;
        $offre->delete();

        return redirect('/MesOffres')->with('success', 'Offre ' . $titre . ' a ete suprime avec succes!');
    }

    public function destroyAbn(string $id)
    {
        $abonnement = Abonnement::findOrFail($id);
        DB::table('date_abonnements')
            ->where('id_abonnement', $id)
            ->delete();

        $offre = Offre::findOrFail($abonnement->id_offre);
        $titre = $offre->titre;
        $nom = $abonnement->nom;
        $offre->delete();
        $abonnement->delete();

        return redirect('/MesOffres')->with('success', 'Abonnement ' . $nom . ' de offre ' . $titre . ' a été supprimé avec succès!');
    }

    public function destroyMonAbn(string $id)
    {
        $abonnement = Abonnement::findOrFail($id);
        $dateAbn = DB::table('date_abonnements')
            ->where('id_abonnement', $id)
            ->get();
        $dateAbn->delete();

        $offre = Offre::find($abonnement->id_offre);
        $message = '';
        if ($offre) {
            $titre = $offre->titre;
            $nom = $abonnement->nom;
            $offre->delete();
            $message = 'Abonnement ' . $nom . ' de offre' . $titre . ' sont ete suprime avec succee!';
        } else {
            $message = 'Abonnement ' . $nom . ' a ete supprimer avec suceee';
        }

        $abonnement->delete();

        return redirect('/mesAbonnements')->with('success', $message);
    }

    public function plannier()
    {
        // Définir les tableaux pour les abonnements et les dates d'abonnement
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
            $abonnementsInterval = DB::table('abonnements')->whereNotNull('id_offre')
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

        return view('entreprise.planning', [
            'abonnementss' => $abonnementss,
        ]);
    }

    public function voireVoyages(Request $request)
    {
        $abonnementsIds = $request->input('abonnements');
        $day = $request->input('day');
        $heur = $request->input('heur');

        if ($abonnementsIds) {
            // Retrieve the abonnements based on the IDs
            return view('entreprise.voyages', [
                'abonnementsIds' => $abonnementsIds,
                'day' => $day,
                'heur' => $heur
            ]);
        } else {
            return redirect()->back();
        }
    }

    // public function searchVoyage(Request $request)
    // {
    //     $abonnementsIds = $request->input('abonnementsIdds');
    //     $abonnements = DB::table('abonnements')->whereIn('id', $abonnementsIds);

    //     $trajetAbn = $request->input('trajet');
    //     $voyage = $request->input('voyage');

    //     if ($trajetAbn !== null) {
    //         $abonnements->where('trajet', $trajetAbn);
    //     }
    //     if ($voyage !== null) {
    //         $abonnements->where('trajet', 'LIKE', '%' . $voyage . '%')
    //             ->orWhere('duree', 'LIKE', '%' . $voyage . '%')
    //             ->orWhere('depart', 'LIKE', '%' . $voyage . '%')
    //             ->orWhere('destination', 'LIKE', '%' . $voyage . '%')
    //             ->orWhere('heur_debut_aller', 'LIKE', '%' . $voyage . '%')
    //             ->orWhere('heur_debut_retour', 'LIKE', '%' . $voyage . '%')
    //             ->orWhere('heur_fin_aller', 'LIKE', '%' . $voyage . '%')
    //             ->orWhere('heur_fin_retour', 'LIKE', '%' . $voyage . '%');
    //     }

    //     $abonnements->get();
    //     return view('entreprise.mesVoyages', [
    //         'abonnements' => $abonnements,
    //         'abonnementsIds' => $abonnementsIds
    //     ]);
    // }

}
