<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Tester extends Controller
{

    public function offres()
    {
        return view('entreprise.offres');
    }
    public function tables()
    {
        return view('entreprise.tables');
    }
    public function profile()
    {
        return view('entreprise.profile');
    }
    public function blank()
    {
        return view('entreprise.billing');
    }
    public function clients()
    {
        return view('entreprise.clients');
    }
    public function voyages()
    {
        return view('entreprise.voyages');
    }
    public function commentaires()
    {
        return view('entreprise.commentaires');
    }
    public function vehicules()
    {
        return view('entreprise.vehicules');
    }
    public function comments()
    {
        return view('entreprise.comments');
    }
    public function abonnement()
    {
        return view('entreprise.abonnement');
    }
    public function plainning()
    {
        return view('entreprise.planning');
    }
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
    public function destroy(string $id)
    {
        //
    }
}
