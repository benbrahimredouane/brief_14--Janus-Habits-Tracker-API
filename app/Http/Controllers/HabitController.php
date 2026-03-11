<?php

namespace App\Http\Controllers;

use App\Models\Habit;
use App\Http\Requests\StoreHabitRequest;
use App\Http\Requests\UpdateHabitRequest;

class HabitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreHabitRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Habit $habit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHabitRequest $request, Habit $habit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Habit $habit)
    {
        //
    }
}
