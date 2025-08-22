<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Team;
use App\Models\TeamCategory;
use Illuminate\Http\Request;

class TeamCategoryController extends Controller
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
    public function show(TeamCategory $teamCategory)
    {
        $teams = Team::join('team_team_categories','team_team_categories.team_id','=','teams.id')
            ->where('team_team_categories.team_category_id',$teamCategory->id)
            ->select('teams.*')
            ->orderBy('teams.rank')
            ->get();
        $teamCategories = TeamCategory::orderBy('rank')->get();
        return view($this->activeTheme.'.pages.teams', compact(
            'teamCategory',
            'teams',
            'teamCategories'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TeamCategory $teamCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TeamCategory $teamCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TeamCategory $teamCategory)
    {
        //
    }
}
