@extends('layouts.app')

@section('content')
<div class="container" style="width: 80%; margin: 20px auto; background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
    <h2 style="font-family: Arial, sans-serif; color: #333;">Create Batch</h2>
    <form method="POST" action="{{ route('batches.store') }}">
        @csrf
        <div class="form-group" style="margin-bottom: 15px;">
            <label for="label" style="display: block; margin-bottom: 5px; font-weight: bold; font-family: Arial, sans-serif;">Label</label>
            <input type="text" name="label" id="label" class="form-control" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px;" required>
        </div>
        <div class="form-group" style="margin-bottom: 15px;">
            <label for="intake_start" style="display: block; margin-bottom: 5px; font-weight: bold; font-family: Arial, sans-serif;">Intake Start</label>
            <input type="date" name="intake_start" id="intake_start" class="form-control" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px;" required>
        </div>
        <div class="form-group" style="margin-bottom: 15px;">
            <label for="intake_end" style="display: block; margin-bottom: 5px; font-weight: bold; font-family: Arial, sans-serif;">Intake End</label>
            <input type="date" name="intake_end" id="intake_end" class="form-control" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px;" required>
        </div>
        <button type="submit" class="btn btn-primary" style="background-color: #007BFF; color: #fff; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer;">Create Batch</button>
    </form>
</div>
@endsection
