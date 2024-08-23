<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use Illuminate\Http\Request;
use Spatie\Activitylog\Facades\Activity;

class BatchController extends Controller
{
    public function create()
    {
        return view('batches.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'label' => 'required|string|unique:batches|max:255',
            'intake_start' => 'required|date',
            'intake_end' => 'required|date|after_or_equal:intake_start',
        ]);

        $batch = Batch::create($validated);

        // Log the activity using the global helper
        activity()
            ->performedOn($batch)
            ->causedBy(auth()->user())
            ->log('Batch created');

        return redirect()->route('batches.create')->with('success', 'Batch created successfully!');
    }
}

