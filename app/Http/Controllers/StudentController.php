<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Batch;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:students',
        ]);

        $student = Student::create($validated);

        activity('student_created')
            ->performedOn($student)
            ->causedBy(auth()->user())
            ->log('Student created');

        return redirect()->route('students.create')->with('success', 'Student created successfully!');
    }

    public function showAssignForm()
    {
        $students = Student::all();
        $batches = Batch::all();
        return view('students.assign', compact('students', 'batches'));
    }

    // Method to handle the assignment
    public function assign(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'batch_id' => 'required|exists:batches,id',
        ]);

        $student = Student::find($validated['student_id']);
        $batch = Batch::find($validated['batch_id']);

        $student->batch_id = $batch->id;

        // Assign batch label based on intake period
        $today = now()->toDateString();
        if ($today > $batch->intake_period_end) {
            $student->batch_label = $batch->label . '_extended';
        } else {
            $student->batch_label = $batch->label;
        }

        $student->save();

        // Log the assignment
        activity()
            ->performedOn($student)
            ->causedBy(auth()->user())
            ->withProperties(['batch' => $batch->label])
            ->log('Student assigned to batch');

        return redirect()->back()->with('success', 'Student assigned to batch successfully!');
    }
}

