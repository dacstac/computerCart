@extends('welcome')
@section('content')
    <div class="container">
        <form action="{{ route('storeUsers') }}" method="POST">
            @csrf
            <div class="mb-3 input-group">
                <label class="input-group-text col-form-label">Username *</label>
                <input type="text" class="form-control" name="username" value="{{ old('username') }}">
            </div>
            @if ($errors->has('username'))
                <div class="alert alert-danger msg-error">
                    <p class="text-danger fw-bold"> {{ $errors->first('username') }}</p>
                </div>
            @endif
            <div class="mb-3 input-group">
                <label class="input-group-text col-form-label">Password *</label>
                <input type="password" class="form-control" name="password" value="{{ old('password') }}">
            </div>
            @if ($errors->has('password'))
                <div class="alert alert-danger msg-error">
                    <p class="text-danger fw-bold"> {{ $errors->first('password') }}</p>
                </div>
            @endif
            <div class="mb-3 input-group">
                <label class="input-group-text col-form-label">Email *</label>
                <input type="email" class="form-control" name="email" value="{{ old('email') }}">
            </div>
            @if ($errors->has('email'))
                <div class="alert alert-danger">
                    <p class="text-danger fw-bold"> {{ $errors->first('email') }}</p>
                </div>
            @endif
            <div class="mb-3 input-group">
                <label class="input-group-text col-form-label">Name *</label>
                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
            </div>
            @if ($errors->has('name'))
                <div class="alert alert-danger msg-error">
                    <p class="text-danger fw-bold"> {{ $errors->first('name') }}</p>
                </div>
            @endif
            <div class="mb-3 input-group">
                <label class="input-group-text col-form-label">First Surname *</label>
                <input type="text" class="form-control" name="first_surname" value="{{ old('first_surname') }}">
            </div>
            @if ($errors->has('first_surname'))
                <div class="alert alert-danger msg-error">
                    <p class="text-danger fw-bold"> {{ $errors->first('first_surname') }}</p>
                </div>
            @endif
            <div class="mb-3 input-group">
                <label class="input-group-text col-form-label">Second Surname</label>
                <input type="text" class="form-control" name="second_surname" value="{{ old('second_surname') }}">
            </div>
            @if ($errors->has('second_surname'))
                <div class="alert alert-danger msg-error">
                    <p class="text-danger fw-bold"> {{ $errors->first('second_surname') }}</p>
                </div>
            @endif
            <div class="mb-3 input-group">
                <label class="input-group-text col-form-label">Phone *</label>
                <input type="tel" class="form-control" name="phone" value="{{ old('phone') }}">
            </div>
            @if ($errors->has('phone'))
                <div class="alert alert-danger msg-error">
                    <p class="text-danger fw-bold"> {{ $errors->first('phone') }}</p>
                </div>
            @endif
            <div class="input-group mb-3">
                <label class="input-group-text form-control">Offers</label>
                <div class="input-group-text">
                    <input class="form-check-input" type="checkbox" name="offers" {{ old('offers') ? 'checked' : '' }}>
                </div>
            </div>
            @if ($errors->has('offers'))
                <div class="alert alert-danger msg-error">
                    <p class="text-danger fw-bold"> {{ $errors->first('offers') }}</p>
                </div>
            @endif
            <div class="mb-3 input-group">
                <label class="input-group-text col-form-label">Type of user *</label>
                <select class="form-select" name="type">
                    <option {{ old('type') == null ? 'selected' : '' }} disabled>Select type of user</option>
                    <option value="0" @if (old('type') == 0) selected @endif>Admin</option>
                    <option value="1" @if (old('type') == 1) selected @endif>Normal User</option>
                </select>
            </div>
            @if ($errors->has('type'))
                <div class="alert alert-danger msg-error">
                    <p class="text-danger fw-bold"> {{ $errors->first('type') }}</p>
                </div>
            @endif
            <button type="submit" class="btn btn-primary ">Create User</button>
        </form>
    </div>
@endsection
