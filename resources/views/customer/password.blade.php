@extends('frontEnd.layouts.master')
@section('title', 'Profile')

@section('style')
    <style>
        .dashboard-container {
            display: grid;
            grid-template-columns: 1fr 3fr;
            gap: 50px;
            margin: 50px auto;
        }

        .sidebar {
            border: 1px solid #e0e0e0;
            padding: 20px 0;
        }

        .user-profile {
            text-align: center;
            padding-bottom: 20px;
        }

        .user-profile h3 {
            margin: 0;
            color: #333;
        }

        .nav-menu {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .nav-menu li {
            padding: 10px 20px;
            display: flex;
            align-items: center;
            border-bottom: 1px solid #e0e0e0;
        }

        .nav-menu li:last-child {
            border-bottom: none;
        }

        .nav-menu li.active {
            background-color: #fef4ec;
            border-left: 3px solid #ff7f00;
        }

        .nav-menu li.active a {
            color: #ff7f00;
            font-weight: bold;
        }

        .nav-menu li:hover {
            background-color: #f0f0f0;
        }

        .nav-menu a {
            text-decoration: none;
            color: #555;
            margin-left: 10px;
            flex-grow: 1;
        }



        .nav-menu li.active .icon {
            color: #ff7f00;
        }

        .main-content {}
    </style>
@endsection

@section('body')
    <div class="dashboard-container custom-container">
        <div class="sidebar">
            @include('frontEnd.customer.partials.sidebar')
        </div>
        <div class="main-content">
            @include('frontEnd.customer.partials.password')
        </div>
    </div>
@endsection
