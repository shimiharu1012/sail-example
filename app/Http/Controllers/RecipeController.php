<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Recipe;
use App\Models\Review;
use Illuminate\Database\Query\JoinClause;

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
    public function index(Request $request)
    {
        $fillters=$request->all();
        // dd($posts['title']);
        
        //TODO: formによるレシピ一覧の絞り込みを実装
        //ragingは，紐づく平均評価で絞る

        // 1. 条件を満たすレコードを全て抽出するクエリ
        // 2. それらのratingをすべて足し合わせる

        $query=Recipe::query()->select('recipes.id','recipes.title','recipes.description','recipes.created_at','recipes.image','users.name')
            ->join('users','users.id','=','recipes.user_id')
            ->join('reviews','reviews.recipe_id','=','recipes.id')
            ->orderBy('recipes.created_at', 'desc');
            
        if(!empty($fillters)){
            if(!empty($fillters['rating'])){
                // dd($fillters['rating']);
                $avgRatingsEachRecipes=Review::selectRaw('recipe_id, AVG(rating) as avg_rating')->groupBy('recipe_id');
                $query->JoinSub($avgRatingsEachRecipes,'avg_ragings_each_recipes',function (JoinClause $join) {
                    $join->on('recipes.id','=','avg_ragings_each_recipes.recipe_id');
                })->where('avg_ragings_each_recipes.avg_rating','>=',$fillters['rating'])->addSelect('avg_ragings_each_recipes.avg_rating');   
            }

            if(!empty($fillters['categories'])){
                $query->whereIn('recipes.category_id',$fillters['categories']);
            }

            if(!empty($fillters['title'])){
                $query->where('recipes.title','like','%'.$fillters['title'].'%');
            }
        }
        $recipes=$query->get();
        // dd($recipes);
        $categories=Category::all();
        
        

        return view('recipes.index',compact('recipes','categories'));
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
