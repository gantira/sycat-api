<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::latest()
            ->when(request()->search, function ($query) {
                $query->where('name', 'like', '%' . request()->search . '%');
            })
            ->paginate(10);

        return view('teams.index', [
            'teams' => $teams
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teams.create', [
            'team' => new Team(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:teams,name|string|min:3|max:255',
            'description' => 'nullable|string|min:3|max:255',
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }

        Team::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect(route('teams.index'))->with('success', 'Your Team has been submited!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        return view('teams.show', [
            'team' => $team
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        return view('teams.edit', [
            'team' => $team,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:teams,name,' . $team->id . '|string|min:3|max:255',
            'description' => 'nullable|string|min:3|max:255',
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }

        $team->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect(route('teams.index'))->with('success', 'Team has been updated!');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        $team->delete();

        return back()->with('toast_success', 'Team has been deleted!');
    }
}
