@extends('welcome')
@section('content')
    <button type="button" class='btn btn-link' data-bs-toggle='modal' data-bs-target='#addModal'>Add Address</button>
    <div class="container">
        @foreach ($address as $item)
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">{{ $item->address }}</h5>
                    <p class="card-text">{{ $item->cp }}, {{ $item->city }}, {{ $item->province }},
                        {{ $item->country }}
                    </p>
                    <a href="#" class="card-link updateOrder" data-bs-toggle='modal' data-bs-target='#updateModal'
                        data-id={{ $item->id }}>Edit</a>
                    <a href="#" class="card-link deleteOrder" data-bs-toggle='modal' data-bs-target='#deleteModal'
                        data-delete-link={{ route('deleteAddress', $item->id) }}>Delete</a>
                </div>
            </div>
        @endforeach
    </div>

    {{-- Create Modal --}}
    <div>
        <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Add Address</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('storeAddress') }}" method="POST">
                            @csrf
                            <div class="mb-3 input-group">
                                <label class="input-group-text col-form-label">Address *</label>
                                <input type="text" class="form-control" name="address" value="{{ old('address') }}">
                            </div>
                            @if ($errors->has('address'))
                                <div class="alert alert-danger msg-error">
                                    <p class="text-danger fw-bold"> {{ $errors->first('address') }}</p>
                                </div>
                            @endif
                            <div class="mb-3 input-group">
                                <label class="input-group-text col-form-label">CP *</label>
                                <input type="number" class="form-control" name="cp" value="{{ old('cp') }}">
                            </div>
                            @if ($errors->has('cp'))
                                <div class="alert alert-danger msg-error">
                                    <p class="text-danger fw-bold"> {{ $errors->first('cp') }}</p>
                                </div>
                            @endif
                            <div class="mb-3 input-group">
                                <label class="input-group-text col-form-label">City *</label>
                                <input type="text" class="form-control" name="city" value="{{ old('city') }}">
                            </div>
                            @if ($errors->has('city'))
                                <div class="alert alert-danger msg-error">
                                    <p class="text-danger fw-bold"> {{ $errors->first('city') }}</p>
                                </div>
                            @endif
                            <div class="mb-3 input-group">
                                <label class="input-group-text col-form-label">Province *</label>
                                <input type="text" class="form-control" name="province" value="{{ old('province') }}">
                            </div>
                            @if ($errors->has('province'))
                                <div class="alert alert-danger msg-error">
                                    <p class="text-danger fw-bold"> {{ $errors->first('province') }}</p>
                                </div>
                            @endif
                            <div class="mb-3 input-group">
                                <label class="input-group-text col-form-label">Country *</label>
                                <select class="form-select" name="country">
                                    @foreach (config('constants.countries') as $key => $value)
                                        <option value="{{ $value }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @if ($errors->has('country'))
                                <div class="alert alert-danger msg-error">
                                    <p class="text-danger fw-bold"> {{ $errors->first('country') }}</p>
                                </div>
                            @endif
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Add address</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>

        {{-- Update Modal --}}
        <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Add Address</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ old('recover') }}" method="POST" id="updateAddress">
                            @csrf
                            <input type="hidden" name="recover" id="recover" value="{{ old('recover') }}">
                            <div class="mb-3 input-group">
                                <label class="input-group-text col-form-label">Address *</label>
                                <input type="text" class="form-control" name="address_edit" id="address"
                                    value="{{ old('address_edit') }}">
                            </div>
                            @if ($errors->has('address_edit'))
                                <div class="alert alert-danger msg-error">
                                    <p class="text-danger fw-bold"> {{ $errors->first('address_edit') }}</p>
                                </div>
                            @endif
                            <div class="mb-3 input-group">
                                <label class="input-group-text col-form-label">CP *</label>
                                <input type="number" class="form-control" name="cp_edit" value="{{ old('cp_edit') }}"
                                    id="cp">
                            </div>
                            @if ($errors->has('cp_edit'))
                                <div class="alert alert-danger msg-error">
                                    <p class="text-danger fw-bold"> {{ $errors->first('cp_edit') }}</p>
                                </div>
                            @endif
                            <div class="mb-3 input-group">
                                <label class="input-group-text col-form-label">City *</label>
                                <input type="text" class="form-control" name="city_edit" id="city"
                                    value="{{ old('city_edit') }}">
                            </div>
                            @if ($errors->has('city_edit'))
                                <div class="alert alert-danger msg-error">
                                    <p class="text-danger fw-bold"> {{ $errors->first('city_edit') }}</p>
                                </div>
                            @endif
                            <div class="mb-3 input-group">
                                <label class="input-group-text col-form-label">Province *</label>
                                <input type="text" class="form-control" name="province_edit" id="province"
                                    value="{{ old('province_edit') }}">
                            </div>
                            @if ($errors->has('province_edit'))
                                <div class="alert alert-danger msg-error">
                                    <p class="text-danger fw-bold"> {{ $errors->first('province_edit') }}</p>
                                </div>
                            @endif
                            <div class="mb-3 input-group">
                                <label class="input-group-text col-form-label">Country *</label>
                                <select class="form-select" name="country_edit">
                                    @foreach (config('constants.countries') as $key => $value)
                                        <option id="{{ $value }}" value="{{ $value }}">
                                            {{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @if ($errors->has('country'))
                                <div class="alert alert-danger msg-error">
                                    <p class="text-danger fw-bold"> {{ $errors->first('country') }}</p>
                                </div>
                            @endif
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Update address</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        {{-- Delete Modal --}}
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Delete User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure that want delete this address?</p>
                    </div>
                    <div class="modal-footer">
                        <form action="{{ route('deleteAddress', $item->id) }}" method="POST" id="deleteAddress">
                            @csrf
                            <button type="submit" class="btn btn-primary">Delete</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script>
        window.onload = function() {
            @if (
                $errors->has('address') ||
                    $errors->has('cp') ||
                    $errors->has('city') ||
                    $errors->has('country') ||
                    $errors->has('province'))
                $('#addModal').modal('show');
            @endif

            @if (
                $errors->has('address_edit') ||
                    $errors->has('cp_edit') ||
                    $errors->has('city_edit') ||
                    $errors->has('country_edit') ||
                    $errors->has('province_edit'))
                $('#updateModal').modal('show');
            @endif
        }
    </script>
    <script src="{{ asset('js/address.js') }}"></script>
@endsection
