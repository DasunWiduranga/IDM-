@extends('layouts.app')

@section('content')
    <div class="container" style="width: 80%; margin: 20px auto; background-color: #f9f9f9; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
        <h1 style="font-family: Arial, sans-serif; color: #333;">Assign Student to Batch</h1>
        <form action="{{ route('students.assign') }}" method="POST">
            @csrf
            <div class="form-group" style="margin-bottom: 15px;">
                <label for="student_id" style="display: block; margin-bottom: 5px; font-weight: bold; font-family: Arial, sans-serif;">Select Student</label>
                <select name="student_id" class="form-control" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px;" required>
                    @foreach ($students as $student)
                        <option value="{{ $student->id }}">{{ $student->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group" style="margin-bottom: 15px;">
                <label for="batch_id" style="display: block; margin-bottom: 5px; font-weight: bold; font-family: Arial, sans-serif;">Select Batch</label>
                <select name="batch_id" class="form-control" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px;" required>
                    @foreach ($batches as $batch)
                        <option value="{{ $batch->id }}">{{ $batch->label }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary" style="background-color: #007BFF; color: #fff; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer;">Assign</button>
        </form>
    </div>
@endsection
