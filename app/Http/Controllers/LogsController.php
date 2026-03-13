<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLogsRequest;
use App\Http\Requests\UpdateLogsRequest;
use App\Models\Habit;
use App\Models\Logs;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LogsController extends Controller
{
    /**
     * Display all logs for one habit.
     */
    public function index(Request $request, Habit $habit): JsonResponse
    {
        if ($habit->user_id !== $request->user()->id) {
            return response()->json([
                'success' => false,
                'data' => null,
                'message' => 'You do not own this habit.',
            ], 403);
        }

        $logs = $habit->logs()->latest()->get();

        return response()->json([
            'success' => true,
            'data' => [
                'logs' => $logs,
            ],
            'message' => 'Habit logs retrieved successfully.',
        ], 200);
    }

    /**
     * Store a newly created log.
     */
    public function store(StoreLogsRequest $request, Habit $habit): JsonResponse
    {
        if ($habit->user_id !== $request->user()->id) {
            return response()->json([
                'success' => false,
                'data' => null,
                'message' => 'You do not own this habit.',
            ], 403);
        }

        $data = $request->validated();

        $log = $habit->logs()->create($data);

        return response()->json([
            'success' => true,
            'data' => [
                'log' => $log,
            ],
            'message' => 'Habit log created successfully.',
        ], 201);
    }

    /**
     * Display the specified log.
     */
    public function show(Request $request, Logs $log): JsonResponse
    {
        if ($log->habit->user_id !== $request->user()->id) {
            return response()->json([
                'success' => false,
                'data' => null,
                'message' => 'You do not own this log.',
            ], 403);
        }

        return response()->json([
            'success' => true,
            'data' => [
                'log' => $log,
            ],
            'message' => 'Habit log retrieved successfully.',
        ], 200);
    }

    /**
     * Update the specified log.
     */
    public function update(UpdateLogsRequest $request, Logs $log): JsonResponse
    {
        if ($log->habit->user_id !== $request->user()->id) {
            return response()->json([
                'success' => false,
                'data' => null,
                'message' => 'You do not own this log.',
            ], 403);
        }

        $data = $request->validated();

        $log->update($data);

        return response()->json([
            'success' => true,
            'data' => [
                'log' => $log,
            ],
            'message' => 'Habit log updated successfully.',
        ], 200);
    }

    /**
     * Remove the specified log.
     */
    public function destroy(Request $request, Logs $log): JsonResponse
    {
        if ($log->habit->user_id !== $request->user()->id) {
            return response()->json([
                'success' => false,
                'data' => null,
                'message' => 'You do not own this log.',
            ], 403);
        }

        $log->delete();

        return response()->json([
            'success' => true,
            'data' => null,
            'message' => 'Habit log deleted successfully.',
        ], 200);
    }
}