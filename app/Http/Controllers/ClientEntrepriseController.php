<?php

namespace App\Http\Controllers;

use App\Models\ClientEntreprise;
use App\Models\ClientAbonne;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientEntrepriseController extends Controller
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
    public function show(string $id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {

        $iclen = DB::table('client_entreprises')->where('id_client', $id)->first();
        if ($iclen) {
            $clientEntreprise = ClientEntreprise::findOrFail($iclen->id);
            $clientEntreprise->delete();

            $entreprise = auth()->user();
            $clientAbonneIds = DB::table('client_abonnes')->where('id_entreprise', $entreprise->id)->pluck('id');

            // Detach the client from the pivot table
            foreach ($clientAbonneIds as $clientAbonneId) {
                DB::table('client_abonnes')->where('id', $clientAbonneId)->delete();
            }

            $client = DB::table('clients')->where('id', $id)->first();

            return redirect('/clients')->with('success', 'le client ' . $client->nom . ' a ete suprime dans tout les abonnements de entreprise avec succee!');
            // Rest of your code or response
        } else {
            abort(404);
        }

    }

    public function destroyFromAbn(string $id)
    {
        $clientAbonne = ClientAbonne::findOrFail($id);
        $client = DB::table('clients')->where('id', $clientAbonne->id_client)->first();
        $abon = DB::table('abonnements')->where('id', $clientAbonne->id_abonnement)->first();
        if($clientAbonne){
            $clientAbonne->delete();
            return redirect()->back()->with('success', 'le client ' . $client->nom . ' a ete suprime du abonnement' .$abon->nom. 'avec succee!');
        }

    }
}
