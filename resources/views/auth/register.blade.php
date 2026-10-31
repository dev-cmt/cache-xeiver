@extends('frontEnd.layouts.master')

@section('title')
    Register - TrendyMart24
@endsection
@section('style')
    <style>
        .login-container {
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 550px;
            text-align: center;
            margin: auto;
        }

        .login-container h2 {
            font-size: 1.5em;
            font-weight: normal;
            margin-bottom: 25px;
            color: #333;
        }

        .login-container form {
            text-align: left;
        }

        .login-container label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }

        .login-container input[type="text"],
        .login-container input[type="email"],
        .login-container input[type="tel"],
        .login-container input[type="password"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .login-container button {
            width: 100%;
            padding: 12px;
            background-color: #000;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 1.1em;
            cursor: pointer;
            margin-top: 10px;
        }

        .login-container button:hover {
            background-color: #333;
        }

        .form-links {
            display: flex;
            margin-top: 20px;
            font-size: 0.9em;
        }

        .form-links a {
            color: #555;
            text-decoration: none;
        }

        .form-links a:hover {
            text-decoration: underline;
        }
    </style>
@endsection

@section('body')
    <div class="custom-container my-5">
        <div class="login-container">
            <div class="login-form-box">
                <h2>Welcome ! Please Sign Up Here.</h2>
                <form action="{{ route('user.register.submit') }}" method="post">
                    @csrf
                    <label for="name">Name *</label>
                    <input type="text" id="name" name="name" placeholder="Please enter your name" required>

                    <label for="email">Email *</label>
                    <input type="email" id="email" name="email" placeholder="Please enter your email" required>

                    <label for="phone">Phone Number *</label>
                    <input type="text" id="phone" name="phone" placeholder="Please enter your phone number" required>

                    <label for="address">Address *</label>
                    <input type="text" id="address" name="address" placeholder="Please enter your address" required>

                    <label for="password">Password *</label>
                    <input type="password" id="password" name="password" placeholder="Please enter your password" required>

                    <button type="submit">Register</button>
                </form>
                <div class="form-links">
                   Already have an account? &nbsp;<a href="{{ route('user.login') }}"> <strong>Login Here.</strong></a>
                </div>
            </div>
        </div>
    </div>
@endsection
