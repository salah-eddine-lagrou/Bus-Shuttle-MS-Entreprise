<?php

use App\Http\Controllers\AbonnementController;
use App\Http\Controllers\EntrepriseController;
use App\Http\Controllers\exprimerAbonnementController;
use App\Http\Controllers\Tester;
use App\Http\Controllers\VehiculeController;
use App\Http\Controllers\ClientAbonneController;
use App\Models\Location;
use App\Models\Abonnement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

//--------------------------------------

Route::get('/tables', [Tester::class, 'tables'])->name('tables'); //name is for the route
Route::get('/blank', [Tester::class, 'blank'])->name('blank'); //name is for the route

Route::get('/', function () {
    return view('auth.login');
});
Route::middleware(['authEntreprise'])->group(function () {

    Route::get('/profile', [EntrepriseController::class, 'show'])->name('profile');

    Route::put('/profile/{id}', [EntrepriseController::class, 'update'])->name('profile.update');

    Route::match(['put', 'patch'], '/profile/{id}', [EntrepriseController::class, 'passwordChange'])->name('profile.passwordChange');

    Route::resource('entreprise', EntrepriseController::class);

    Route::get('/offres', [AbonnementController::class, 'offres'])->name('offres');

    Route::get('/MesOffres', [AbonnementController::class, 'mesOffres'])->name('MesOffres');

    Route::get('/profile/{id_MonEntreprise}', [EntrepriseController::class, 'showEntreprise'])->name('entreprise');

    Route::get('/MesOffres/voire-mon-offre/{id}', [AbonnementController::class, 'showInfosAbonnement'])->name('infosAbonnement');

    // Route::get('/offres/voirePlus/{id}', function ($id) {
    //     $abonnement = DB::table('abonnements')->where('id', $id)->first();

    //     if($abonnement){
    //         return view('entreprise.plusInfos', [
    //             'abonnement' => $abonnement,
    //         ]);
    //     }else {
    //         abort(404);
    //     }

    // })->name('plusInfos');
    Route::get('/offres/voirePlus/{id}', [AbonnementController::class, 'showPlusInfos'])->name('plusInfos');

    Route::resource('abonnement', AbonnementController::class);

    // Route::get('/destroy/{id}', ['App\Http\Controllers\AbonnementController', 'destroy'])->name('destroyOffre');
    // Route::get('/destroy/{id}', [AbonnementController::class, 'destroy'])->name('destroyOffre');
    Route::get('/destroyOffre/{id}', [AbonnementController::class, 'destroy'])->name('destroyOffre');

    Route::get('/destroyAbn/{id}', [AbonnementController::class, 'destroyAbn'])->name('destroyAbn');
    Route::get('/destroyMonAbn/{id}', [AbonnementController::class, 'destroyMonAbn'])->name('destroyMonAbn');
    Route::post('/monAbonnement/{id}/edit', [AbonnementController::class, 'updateAbn'])->name('updateAbn');

    Route::get('/SearchMesOffres', [AbonnementController::class, 'searchMesOffres'])->name('SearchMesOffres');

    Route::get('/SearchOffres', [AbonnementController::class, 'searchOffres'])->name('SearchOffres');

    Route::post('/offres/AdvancedResearch', [AbonnementController::class, 'advancedResearch'])->name('AdvancedResearch');

    Route::get('/mesAbonnements', [AbonnementController::class, 'mesAbonnements'])->name('mesAbonnements');
    Route::get('/mesOffresAbn', [AbonnementController::class, 'mesOffresAbn'])->name('mesOffresAbn');

    Route::get('/mesAbonnements/Search', [AbonnementController::class, 'searchMesAbonnement'])->name('SearchMesAbonnement');
    Route::get('/mesOffresAbn/Search', [AbonnementController::class, 'searchMesOffresAbn'])->name('SearchMesOffresAbn');

    Route::get('/mesAbonnements/voirePlus/{id}', [AbonnementController::class, 'monVoirePlus'])->name('monVoirePlus');

    Route::get('/vehicules', [VehiculeController::class, 'vehicule'])->name('vehicule');

    Route::get('/SearchVehicule', [VehiculeController::class, 'searchVehicule'])->name('SearchVehicule');

    Route::resource('vehicule', VehiculeController::class);

    Route::get('/clients', [ClientAbonneController::class, 'clients'])->name('clients');

    Route::get('/SearchClient', [ClientAbonneController::class, 'searchClient'])->name('SearchClient');

    Route::get('/debiteurs', [ClientAbonneController::class, 'debiteurs'])->name('debiteurs');

    Route::get('/abonnes', [ClientAbonneController::class, 'abonnes'])->name('abonnes');

    // Route::resource('clientEntreprise', ClientEntrepriseController::class);
    Route::get('/destroy/{id}', ['App\Http\Controllers\ClientEntrepriseController', 'destroy'])->name('clientEntreprise.destroy');
    Route::get('/delete-client-abonne/{id}', ['App\Http\Controllers\ClientEntrepriseController', 'destroyFromAbn'])->name('clientEntreprise.destroyFromAbn');

    Route::resource('exprimerAbonnement', exprimerAbonnementController::class);
    Route::post('/edit/{id}', ['App\Http\Controllers\exprimerAbonnementController', 'edit'])->name('react');
    Route::post('/reload/{id}', ['App\Http\Controllers\exprimerAbonnementController', 'rereact'])->name('rereact');

    Route::get('/comments', [exprimerAbonnementController::class, 'comments'])->name('comments');

    Route::post('/reactComments/{id}', ['App\Http\Controllers\exprimerAbonnementController', 'reactEntreprise'])->name('reactEntreprise');
    Route::post('/reloadReact/{id}', ['App\Http\Controllers\exprimerAbonnementController', 'rereactEntreprise'])->name('rereactEntreprise');

    Route::get('/comments', [exprimerAbonnementController::class, 'comments'])->name('comments');

    Route::get('/voireCommentaires', [exprimerAbonnementController::class, 'commentsEntreprise'])->name('commentsEntreprise');

    //route de la recherche dans les commentaires
    Route::get('/searchComment', [exprimerAbonnementController::class, 'searchComment'])->name('searchComment');

    //de la page comments
    Route::get('/searchCommentaire', [exprimerAbonnementController::class, 'searchCommentaire'])->name('searchCommentaire');

    // ADMIN consulter les commentaires::::
    Route::get('/consulterCommentaires', function () {

        $exprimerAbonnement = DB::table('exprimer_abonnements')->get();

        return view('entreprise.voireCommentsAdmin', [
            'exprimerAbonnement' => $exprimerAbonnement,
        ]);
    })->name('commentsAdmin');
    Route::post('/AdminSearchComment', function (Request $request) {

        $nom = $request->input('client');
        if ($nom) {
            $client = DB::table('clients')->where('nom', 'LIKE', '%' . $nom . '%')->first();
            if ($client != null) {
                $exprimerAbonnement = DB::table('exprimer_abonnements')->where('id_client', $client->id)->get();
            } else {
                $exprimerAbonnement = null;
            }

            return view('entreprise.voireCommentsAdmin', [
                'exprimerAbonnement' => $exprimerAbonnement,
            ]);

        } else {
            return redirect('/voireCommentsAdmin');
        }
    })->name('adminSearchComment');
    //fin admin voire commentaires

    // Plainning
    Route::get('/plainningVoyages', ['App\Http\Controllers\AbonnementController', 'plannier'])->name('plainningVoyages');
    Route::get('/plainningVoyages/voyages', ['App\Http\Controllers\AbonnementController', 'voireVoyages'])->name('voyages');
    Route::post('/plainningVoyages/voyages', ['App\Http\Controllers\AbonnementController', 'voireVoyages']);

    Route::post('/plainningVoyages/voyagesSearched', ['App\Http\Controllers\AbonnementController', 'searchVoyage'])->name('searchVoyage');

});

Auth::routes();
