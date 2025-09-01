@extends('layouts.app')
@section('head')
    <title>Students</title>
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
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;

        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #9ebcf2;
            color: white;
            text-align: center;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }
        h2 {
            color: #2a14f0;
            text-align: center;
        }
        .search{
            width: 100%;

            justify-content: center;
            margin-bottom: 20px;
        }
        .search input{
            padding: 10px;
            width: 50%;
            margin-right: 10px;
            }

        .search button{
            background-color: #249328; /* Green */
            color: white;
            padding: 5px 5px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            border-radius: 5px;
        }
        .search button:hover {
            background-color: #579e5b;
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
            background-color: #90d393; /* Green */
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
        .addStudentButton {
            width: auto;
            padding: 15px;
            border-radius: 5px;
            background-color: #2a14f0;
            color: white;
            margin: 10px 0;
         }
        .addStudentButton:hover {
            background-color: #5e87f0; /* Lighter Blue */
            color:
        }

        form {
            margin: 0 auto;
            max-width: 100%;
            text-align: center;
        }

    </style>
@endsection

@section('content')
    <section>
        <h2>Student List</h2>
        <div class="search">
            <form action="{{ URL("student") }}" method="GET">
                <div class="search">
                    @csrf
                    <input type="text" name="search" id="search" placeholder="Enter text to search" value="{{ request('search') }}">
                    <button type="submit" class="searchButton">Search</button>

                </div>
            </form>
        </div>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Date of Birth</th>
                    <th>Age</th>
                    <th>Address</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>{{$student->id}}</td>
                        <td>{{$student->name}}</td>
                        <td>{{$student->email}}</td>
                        <td>{{$student->gender}}</td>
                        <td>{{$student->dob}}</td>
                        <td>{{ $student->age }}</td>
                        <td>{{ $student->address }}</td>
                        <td style="display: flex;">
                        <td style="display: flex;">
                        <a href="" class="editButton">Edit</a>
                        <a href="" class="deleteButton"
                        onclick="return confirm('Are you sure you want to delete this student?')" style="padding:
                        5px;margin-left: 5px;">Delete</a>

                        </td>
                     </tr>
                 @endforeach
            </tbody>
        </table>
        <div class="paginationDiv">

        </div>
    </section>
@endsection