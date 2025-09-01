@extends('layouts.app')
@section('head')
    <title>Add Students</title>
@endsection
@section('styles')
    <style>
        body {
            font-family: 'Figtree', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;

        }
        nav {
            background-color: #9ebcf2;
            padding: 10px;
        }
        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            background-color: #9ebcf2;
            overflow: hidden;
            display: flex;
            justify-content: center;
        }
        nav ul li {
            display: inline;
            margin-right: 20px;
            padding: 14px 20px;

        }
        nav ul li a {
            color: rgb(13, 54, 157);
            text-decoration: none;
            font-weight: bold;
            text-align: center;
        }
        .container{
            display: flex;
            flex:1;

        }
        .sidebar {
            width: 150px;
            background-color: #f4f4f4;
            padding: 15px;
        }
        .main-content {
            flex: 1;
            padding: 20px;
        }
        footer {
            background-color: #9ebcf2;
            color: white;
            text-align: center;
            padding: 10px;
            position: relative;
            bottom: 0;
            width: 100%;
        }
        .card {
            width: 100%;
            margin: 20px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #779fe9;
            color: white;
            padding: 10px;
            border-radius: 20px;
        }
        .card-body {
            padding: 30px;
            border-radius: 10px;
        }
        .form-label {
            font-weight: bold;
        }
        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .form-check {
            margin-bottom: 10px;
        }
        .form-check-input {
            margin-right: 5px;
        }
        .form-check-label {
            margin-right: 15px;
        }
        .btn {
            background-color: #2a14f0;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #5e87f0;
        }
        .addStudentButton {
            background-color: #2a14f0; /* Blue */
            color: white;
            padding: 10px 15px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            border-radius: 5px;
            margin: 10px 0;
        }
        .addStudentButton:hover {
            background-color: #5e87f0; /* Lighter Blue */
        }

        h3 {
            color: #2a14f0;
            text-align: center;
        }
        .search{
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }
        .search input{
            padding: 10px;
            width: 70%;
            margin-right: 10px;
            }

        .search button{
            padding: 10px;

            border-radius: 5px;
            background-color: #2a14f0;
            color: white;
        }
        .search button:hover {
            background-color: #5e87f0;
        }

        .editButton {
            background-color: #249328; /* Green */
            color: white;
            padding: 5px 5px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            border-radius: 5px;
        }
        .editButton:hover {
            background-color: #579e5b; /* Green */
        }
        .deleteButton {
            background-color: #cc2115; /* Red */
            color: white;
            padding: 5px 5px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            border-radius: 5px;
        }
        .deleteButton:hover {
            background-color: #ed6060; /* Dark Red */
            color: black
        }

    </style>
@endsection
@section('content')
{{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}

<section class="container">
    <div class="card shadow-lg">
        <div class="card-header">
            <h3>Add New Student</h3>
        </div>
        <div class="card-body">
            <form action="{{ URL('student/create') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="age" class="form-label">Age</label>
                    <input type="number" class="form-control" id="age" name="age" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Gender</label>
                    <div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="male" value="m" checked>
                            <label class="form-check-label" for="male">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="female" value="f">
                            <label class="form-check-label" for="female">Female</label>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="date_of_birth" class="form-label">Date of Birth</label>
                    <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" required>
                </div>
                <div class="mb-3">
                    <label for="salary" class="form-label">Salary</label>
                    <input type="number" class="form-control" id="salary" name="salary" required>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</section>
@endsection