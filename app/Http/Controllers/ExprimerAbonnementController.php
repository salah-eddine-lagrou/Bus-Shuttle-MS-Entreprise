<?php

namespace App\Http\Controllers;

use App\Models\ExprimerAbonnement;
use App\Models\NotesCommentaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class exprimerAbonnementController extends Controller
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

            'nom' => ['nullable', 'string', 'max:255'],
            'type_abonnement' => ['nullable'],

            'description' => ['required', 'string', 'max:250'],

            'depart' => ['nullable', 'string', 'max:255'],
            'destination' => ['nullable', 'string', 'max:255'],

            'heur_debut_aller' => 'nullable|date_format:H:i',

            'heur_debut_retour' => 'nullable|date_format:H:i',

        ],
            [
                'nom' => 'Verifier le champ nom',
                'type_abonnement' => 'Verifier le champ type_abonnement',
                'description' => 'Verifier le champ description',
                'description.required' => 'Veullez ecrire la description car elle represente votre besoin',
                'depart' => 'Verifier le champ depart',
                'destination' => 'Verifier le champ destination',
                'heur_debut_aller' => 'Verifier le champ heur_debut_aller',
                'heur_debut_retour' => 'Verifier le champ heur_debut_retour',
            ]);

        $ExprimerAbonnement = new ExprimerAbonnement();
        $ExprimerAbonnement->nom_abonnement = $request->input('nom');
        $ExprimerAbonnement->id_client = $request->input('id_client');
        $ExprimerAbonnement->depart = $request->input('depart');
        $ExprimerAbonnement->description = $request->input('description');
        $ExprimerAbonnement->destination = $request->input('destination');
        $ExprimerAbonnement->id_type_abonnement = $request->input('type_abonnement');
        $ExprimerAbonnement->heur_debut_aller = $request->input('heur_debut_aller');
        $ExprimerAbonnement->heur_debut_retour = $request->input('heur_debut_retour');

        $ExprimerAbonnement->save();

        return redirect('/comments')->with('success', 'Votre commentaire a ete poster avec succee.');
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
    public function edit(Request $request, string $id)
    {
        $likes = $request->input('likes');
        $dislikes = $request->input('dislikes');
        $commentId = $request->input('commentId');

        if ($likes === null && $dislikes === null) {
            return redirect()->back();
        }

        // Check if the client has already liked the comment
        $noteComment = DB::table('notes_commentaires')->where('id_client', $id)->where('id_exprimer_abonnement', $commentId)->first();
        $exprimerAbn = ExprimerAbonnement::findOrFail($commentId);

        if ($noteComment) {
            if (($noteComment->likes != 0 && $dislikes != 0) || ($noteComment->dislikes != 0 && $likes != 0)) {
                if ($noteComment->likes != 0 && $dislikes != 0) {
                    $noteComment->likes = 0;
                    $noteComment->dislikes = 1;
                    $exprimerAbn->dislikes += $noteComment->dislikes;
                    $exprimerAbn->likes -= $noteComment->dislikes;
                } elseif ($noteComment->dislikes != 0 && $likes != 0) {
                    $noteComment->likes = 1;
                    $noteComment->dislikes = 0;
                    $exprimerAbn->likes += $noteComment->likes;
                    $exprimerAbn->dislikes -= $noteComment->likes;
                }
                $exprimerAbn->save();
                DB::table('notes_commentaires')->where('id_client', $id)->where('id_exprimer_abonnement', $commentId)->update([
                    'likes' => $noteComment->likes,
                    'dislikes' => $noteComment->dislikes,
                ]);
            }
        } else {
            $newNoteComment = new NotesCommentaire();
            $newNoteComment->id_client = $id;
            $newNoteComment->id_exprimer_abonnement = $commentId;
            $newNoteComment->likes = $likes;
            $newNoteComment->dislikes = $dislikes;
            $newNoteComment->save();
            if ($likes != 0) {
                $exprimerAbn->likes += $likes;
            } elseif ($dislikes != 0) {
                $exprimerAbn->dislikes += $dislikes;
            }

            $exprimerAbn->save();
        }

        return redirect('/comments');
    }
    public function rereact(Request $request, string $id)
    {
        $commentId = $request->input('commentId');

        $noteComment = DB::table('notes_commentaires')->where('id_client', $id)->where('id_exprimer_abonnement', $commentId)->first();
        $exprimerAbn = ExprimerAbonnement::findOrFail($commentId);

        if ($noteComment) {
            if (($exprimerAbn->likes != null && $exprimerAbn->likes != 0) || ($exprimerAbn->dislikes != null && $exprimerAbn->dislikes != 0)) {
                if ($noteComment->likes != 0) {
                    $exprimerAbn->likes -= 1;
                } else if ($noteComment->dislikes != 0) {
                    $exprimerAbn->dislikes -= 1;
                }
            }

            $exprimerAbn->save();
            NotesCommentaire::where('id_client', $id)->where('id_exprimer_abonnement', $commentId)->delete();
        } else {
            return redirect('/comments');
        }

        return redirect('/comments');
    }

    //entreprise react en comments :

    public function reactEntreprise(Request $request, string $id)
    {
        $likes = $request->input('likes');
        $dislikes = $request->input('dislikes');
        $commentId = $request->input('commentId');

        if ($likes === null && $dislikes === null) {
            return redirect()->back();
        }

        // Check if the client has already liked the comment
        $noteComment = DB::table('notes_commentaires')->where('id_entreprise', $id)->where('id_exprimer_abonnement', $commentId)->first();
        $exprimerAbn = ExprimerAbonnement::findOrFail($commentId);

        if ($noteComment) {
            if (($noteComment->likes != 0 && $dislikes != 0) || ($noteComment->dislikes != 0 && $likes != 0)) {
                if ($noteComment->likes != 0 && $dislikes != 0) {
                    $noteComment->likes = 0;
                    $noteComment->dislikes = 1;
                    $exprimerAbn->dislikes += $noteComment->dislikes;
                    $exprimerAbn->likes -= $noteComment->dislikes;
                } elseif ($noteComment->dislikes != 0 && $likes != 0) {
                    $noteComment->likes = 1;
                    $noteComment->dislikes = 0;
                    $exprimerAbn->likes += $noteComment->likes;
                    $exprimerAbn->dislikes -= $noteComment->likes;
                }
                $exprimerAbn->save();
                DB::table('notes_commentaires')->where('id_entreprise', $id)->where('id_exprimer_abonnement', $commentId)->update([
                    'likes' => $noteComment->likes,
                    'dislikes' => $noteComment->dislikes,
                ]);
            }
        } else {
            $newNoteComment = new NotesCommentaire();
            $newNoteComment->id_entreprise = $id;
            $newNoteComment->id_exprimer_abonnement = $commentId;
            $newNoteComment->likes = $likes;
            $newNoteComment->dislikes = $dislikes;
            $newNoteComment->save();
            if ($likes != 0) {
                $exprimerAbn->likes += $likes;
            } elseif ($dislikes != 0) {
                $exprimerAbn->dislikes += $dislikes;
            }

            $exprimerAbn->save();
        }

        return redirect('/voireCommentaires');
    }
    public function rereactEntreprise(Request $request, string $id)
    {
        $commentId = $request->input('commentId');

        $noteComment = DB::table('notes_commentaires')->where('id_entreprise', $id)->where('id_exprimer_abonnement', $commentId)->first();
        $exprimerAbn = ExprimerAbonnement::findOrFail($commentId);

        if ($noteComment) {
            if (($exprimerAbn->likes != null && $exprimerAbn->likes != 0) || ($exprimerAbn->dislikes != null && $exprimerAbn->dislikes != 0)) {
                if ($noteComment->likes != 0) {
                    $exprimerAbn->likes -= 1;
                } else if ($noteComment->dislikes != 0) {
                    $exprimerAbn->dislikes -= 1;
                }
            }

            $exprimerAbn->save();
            NotesCommentaire::where('id_entreprise', $id)->where('id_exprimer_abonnement', $commentId)->delete();
        } else {
            return redirect('/voireCommentaires');
        }

        return redirect('/voireCommentaires');
    }

    //comments
    public function comments()
    {
        $exprimerAbonnement = DB::table('exprimer_abonnements')->get();

        return view('entreprise.comments', [
            'exprimerAbonnement' => $exprimerAbonnement,
        ]);
    }

    //commentsEntreprise
    public function commentsEntreprise()
    {
        $exprimerAbonnement = DB::table('exprimer_abonnements')->get();

        return view('entreprise.voireComments', [
            'exprimerAbonnement' => $exprimerAbonnement,
        ]);
    }

    //searchComment
    public function searchComment(Request $request)
    {
        $nom = $request->input('client');
        if ($nom) {
            $client = DB::table('clients')->where('nom', 'LIKE', '%' . $nom . '%')->first();
            if ($client != null) {
                $exprimerAbonnement = DB::table('exprimer_abonnements')->where('id_client', $client->id)->get();
            } else {
                $exprimerAbonnement = null;
            }

            return view('entreprise.voireComments', [
                'exprimerAbonnement' => $exprimerAbonnement,
            ]);

        } else {
            return redirect('/voireCommentaires');
        }
    }

    //searchCommentaire
    public function searchCommentaire(Request $request)
    {
        $nom = $request->input('client');
        if ($nom) {
            $client = DB::table('clients')->where('nom', 'LIKE', '%' . $nom . '%')->first();
            if ($client != null) {
                $exprimerAbonnement = DB::table('exprimer_abonnements')->where('id_client', $client->id)->get();
            } else {
                $exprimerAbonnement = null;
            }

            return view('entreprise.comments', [
                'exprimerAbonnement' => $exprimerAbonnement,
            ]);

        } else {
            return redirect('/comments');
        }
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
    public function destroy(string $id)
    {
        $comment = ExprimerAbonnement::findOrFail($id);
        $comment->delete();

        return redirect('/comments')->with('success', 'votre commentaire a ete suprime avec succee!');
    }
}
