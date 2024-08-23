@extends('layouts.app')

@section('content')
    <div class="container" style="width: 80%; margin: 20px auto; background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
        <h2 style="font-family: Arial, sans-serif; color: #333;">Create Student</h2>
        <form method="POST" action="{{ route('students.store') }}">
            @csrf
            <div class="form-group" style="margin-bottom: 15px;">
                <label for="name" style="display: block; margin-bottom: 5px; font-weight: bold; font-family: Arial, sans-serif;">Name</label>
                <input type="text" name="name" id="name" class="form-control" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px;" required>
            </div>
            <div class="form-group" style="margin-bottom: 15px;">
                <label for="email" style="display: block; margin-bottom: 5px; font-weight: bold; font-family: Arial, sans-serif;">Email</label>
                <input type="email" name="email" id="email" class="form-control" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 4px;" required>
            </div>
            <button type="submit" class="btn btn-primary" style="background-color: #007BFF; color: #fff; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer;">Create Student</button>
        </form>
    </div>
@endsection
