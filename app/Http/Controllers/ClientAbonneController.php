<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class ClientAbonneController extends Controller
{


    //clients
    public function clients()
    {
        $entreprise = auth()->user();
        $clientEntreprises = DB::table('client_entreprises')->where('id_entreprise', $entreprise->id)->get();
        $clientIds = $clientEntreprises->pluck('id_client')->toArray(); // Extract id_client values

        $clients = DB::table('clients')->whereIn('id', $clientIds)->get();
        $etat = '';
        return view('entreprise.clients', [
            'clients' => $clients,
            'entreprise' => $entreprise,
            'clientEntreprises' => $clientEntreprises,
            'etat' => $etat,
        ]);
    }

    //SearchClient
    public function searchClient(Request $request)
    {
        $client = $request->input('client');
        $entreprise = auth()->user();
        $clientEntreprises = DB::table('client_entreprises')->where('id_entreprise', $entreprise->id)->get();
        $clientIds = $clientEntreprises->pluck('id_client')->toArray(); // Extract id_client values

        $clients = DB::table('clients')->whereIn('id', $clientIds);
        if ($client !== null) {
            $clients->where('nom', 'LIKE', '%' . $client . '%')
                ->orWhere('email', 'LIKE', '%' . $client . '%')
                ->orWhere('telephone', 'LIKE', '%' . $client . '%');
        } else {
            return redirect()->back();
        }

        $clients = $clients->get(); // Retrieve the results from the Query Builder
        $etat = 'search';
        return view('entreprise.clients', [
            'clients' => $clients,
            'entreprise' => $entreprise,
            'clientEntreprises' => $clientEntreprises,
            'etat' => $etat,
        ]);
    }

    //debiteurs
    public function debiteurs()
    {
        $entreprise = auth()->user();

        $clientEntreprises = DB::table('client_entreprises')
            ->where('id_entreprise', $entreprise->id)
            ->get();

        $clientIds = $clientEntreprises->pluck('id_client')->toArray();

        $clientAbonnementIds = DB::table('abonnements')
            ->where('id_entreprise', $entreprise->id)
            ->pluck('id')
            ->toArray();

        $clientIdsPaye = DB::table('paiements')
            ->whereIn('id_abonnement', $clientAbonnementIds)
            ->pluck('id_client')
            ->toArray();

        $clientIdsAbonne = DB::table('client_abonnes')
            ->whereNotNull('id_abonnement')
            ->pluck('id')
            ->toArray();

        $clients = DB::table('clients')
            ->whereIn('id', $clientIds)
            ->whereIn('id', $clientIdsAbonne)
            ->whereNotIn('id', $clientIdsPaye)
            ->get();

        $etat = 'debite';
        return view('entreprise.clients', [
            'clients' => $clients,
            'entreprise' => $entreprise,
            'clientEntreprises' => $clientEntreprises,
            'etat' => $etat,
        ]);
    }

    //abonnes
    public function abonnes()
    {
        $entreprise = auth()->user();
        $clientEntreprises = DB::table('client_entreprises')->where('id_entreprise', $entreprise->id)->get();

        $clientAbonne = DB::table('client_abonnes')->whereNotNull('id_abonnement')->where('id_entreprise', $entreprise->id)->get();
        $clientIdsAbonne = $clientAbonne->pluck('id_client')->toArray(); // Extract IDs of subscribed clients

        $clients = DB::table('clients')->whereIn('id', $clientIdsAbonne)->get();
        $etat = 'abonne';
        return view('entreprise.clients', [
            'clients' => $clients,
            'entreprise' => $entreprise,
            'clientEntreprises' => $clientEntreprises,
            'clientAbonne' => $clientAbonne,
            'etat' => $etat,
        ]);
    }
}
