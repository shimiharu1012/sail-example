<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;

class RecipeController extends Controller
{   
    public function home()
    {   
        $recipes= Recipe::select('recipes.id','recipes.title','recipes.description','recipes.created_at','recipes.image','users.name')
            ->join('users','users.id','=','recipes.user_id')
            ->orderBy('recipes.created_at','desc')
            ->limit(3)
            ->get();

        $popular= Recipe::select('recipes.id','recipes.title','recipes.description','recipes.created_at','recipes.image','recipes.views','users.name')
            ->join('users','users.id','=','recipes.user_id')
            ->orderBy('recipes.views','desc')
            ->limit(2)
            ->get();

        return view('home',compact('recipes','popular'));   
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
