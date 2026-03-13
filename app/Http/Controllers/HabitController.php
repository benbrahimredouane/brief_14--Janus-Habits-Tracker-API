<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHabitRequest;
use App\Http\Requests\UpdateHabitRequest;
use App\Models\Habit;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class HabitController extends Controller
{
    /**
     * Display a list of the authenticated user's habits.
     */
    public function index(Request $request): JsonResponse
    {
        $habits = $request->user()->habits()->latest()->get();

        return response()->json([
            'success' => true,
            'data' => [
                'habits' => $habits,
            ],
            'message' => 'Habits retrieved successfully.',
        ], 200);
    }

    /**
     * Store a newly created habit.
     */
    public function store(StoreHabitRequest $request): JsonResponse
    {
        $data = $request->validated();

        $habit = $request->user()->habits()->create($data);

        return response()->json([
            'success' => true,
            'data' => [
                'habit' => $habit,
            ],
            'message' => 'Habit created successfully.',
        ], 201);
    }

    /**
     * Display the specified habit.
     */
    public function show(Habit $habit): JsonResponse
    {
        Gate::authorize('view', $habit);

        return response()->json([
            'success' => true,
            'data' => [
                'habit' => $habit,
            ],
            'message' => 'Habit retrieved successfully.',
        ], 200);
    }

    /**
     * Update the specified habit.
     */
    public function update(UpdateHabitRequest $request, Habit $habit): JsonResponse
    {
        Gate::authorize('modify', $habit);

        $data = $request->validated();

        $habit->update($data);

        return response()->json([
            'success' => true,
            'data' => [
                'habit' => $habit,
            ],
            'message' => 'Habit updated successfully.',
        ], 200);
    }

    /**
     * Remove the specified habit.
     */
    public function destroy(Habit $habit): JsonResponse
    {
        Gate::authorize('modify', $habit);

        $habit->delete();

        return response()->json([
            'success' => true,
            'data' => null,
            'message' => 'Habit deleted successfully.',
        ], 200);
    }
}