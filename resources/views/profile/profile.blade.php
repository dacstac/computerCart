@extends('welcome')
@section('content')
    <div class="container">
        <form action="{{ route('updatedataUser') }}" method="POST">
            @csrf
            <div class="mb-3 input-group">
                <label class="input-group-text col-form-label">Username</label>
                <input type="text" class="form-control" name="username" value="{{ old('username', $user->username) }}">
            </div>
            @if ($errors->has('username'))
                <div class="alert alert-danger msg-error">
                    <p class="text-danger fw-bold"> {{ $errors->first('username') }}</p>
                </div>
            @endif
            <div class="mb-3 input-group">
                <label class="input-group-text col-form-label">Email</label>
                <input type="email" class="form-control" name="email" value="{{ old('email', $user->email) }}">
            </div>
            @if ($errors->has('email'))
                <div class="alert alert-danger msg-error">
                    <p class="text-danger fw-bold"> {{ $errors->first('email') }}</p>
                </div>
            @endif
            <div class="mb-3 input-group">
                <label class="input-group-text col-form-label">Name</label>
                <input type="text" class="form-control" name="name" value="{{ old('name', $user->name) }}">
            </div>
            @if ($errors->has('name'))
                <div class="alert alert-danger msg-error">
                    <p class="text-danger fw-bold"> {{ $errors->first('name') }}</p>
                </div>
            @endif
            <div class="mb-3 input-group">
                <label class="input-group-text col-form-label">First Surname</label>
                <input type="text" class="form-control" name="first_surname" value="{{ old('first_surname', $user->first_surname) }}">
            </div>
            @if ($errors->has('first_surname'))
                <div class="alert alert-danger msg-error">
                    <p class="text-danger fw-bold"> {{ $errors->first('first_surname') }}</p>
                </div>
            @endif
            <div class="mb-3 input-group">
                <label class="input-group-text col-form-label">Second Surname</label>
                <input type="text" class="form-control" name="second_surname" value="{{ old('second_surname', $user->second_surname) }}">
            </div>
            @if ($errors->has('second_surname'))
                <div class="alert alert-danger msg-error">
                    <p class="text-danger fw-bold"> {{ $errors->first('second_surname') }}</p>
                </div>
            @endif
            <div class="mb-3 input-group">
                <label class="input-group-text col-form-label">Phone</label>
                <input type="tel" class="form-control" name="phone" value="{{ old('phone', $user->number_phone) }}">
            </div>
            @if ($errors->has('phone'))
                <div class="alert alert-danger msg-error">
                    <p class="text-danger fw-bold"> {{ $errors->first('phone') }}</p>
                </div>
            @endif
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
