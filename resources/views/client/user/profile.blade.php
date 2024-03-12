@extends('client.layouts.layout')


@section('title')
    Profile
@endsection

@section('header')
@endsection


@section('content')
    @include('admin.layouts.success')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-content">
                        <div class="card-header">
                            <img class="mx-auto d-block" style="border-radius: 100%" width="250px" height="250px"
                                src="{{ asset(Auth::user()->getAvatar()) }}" alt="Card image cap">
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-center">
                        <h1>{{ Auth::user()->name }}</h1>
                    </div>
                </div>

                <div class="card">
                    <div class="card-content">
                        <div class="card-body d-flex justify-content-center">
                            <div class="form-group">
                                <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal"
                                    data-bs-target="#inlineForm">
                                    Profile Settings
                                </button>
                                <div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog"
                                    aria-labelledby="myModalLabel33" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel33">Profile settings</h4>
                                                <button type="button" class="close" data-bs-dismiss="modal"
                                                    aria-label="Close">
                                                    <i data-feather="x"></i>
                                                </button>
                                            </div>
                                            <form class="form form-vertical" action="{{ route('profile.store') }}"
                                                method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="card-content">
                                                    <div class="card-body">
                                                        <div class="form-body">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="form-group has-icon-left">
                                                                        <label for="first-name-icon">Name</label>
                                                                        <div class="position-relative">
                                                                            <input type="text"
                                                                                class="form-control @error('name') is-invalid @enderror"
                                                                                placeholder="Name" id="first-name-icon"
                                                                                name="name"
                                                                                value="{{ auth()->user()->name }}">
                                                                            <div class="form-control-icon">
                                                                                <i class="bi bi-person"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-12">
                                                                    <div class="form-group has-icon-left">
                                                                        <label for="mobile-id-icon">Mobile</label>
                                                                        <div class="position-relative">
                                                                            <input type="tel"
                                                                                class="form-control @error('phone_number') is-invalid @enderror"
                                                                                placeholder="Mobile" id="mobile-id-icon"
                                                                                name="phone_number"
                                                                                value="{{ auth()->user()->phone_number }}">
                                                                            <div class="form-control-icon">
                                                                                <i class="bi bi-phone"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-12">
                                                                    <div class="form-group">
                                                                        <label for="mobile-id-icon">Avatar</label>
                                                                        <div class="position-relative">
                                                                            <input
                                                                                class="form-control @error('avatar') is-invalid @enderror"
                                                                                type="file" id="formFile"
                                                                                name="avatar">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <div class="col-12">
                                                                    <div class="form-group has-icon-left">
                                                                        <label for="mobile-id-icon">Bank Cart
                                                                            Number</label>
                                                                        <div class="position-relative">
                                                                            <input type="text"
                                                                                class="form-control @error('bank_cart') is-invalid @enderror"
                                                                                placeholder="****************"
                                                                                id="mobile-id-icon" name="bank_cart"
                                                                                value="{{ auth()->user()->bank_cart }}">
                                                                            <div class="form-control-icon">
                                                                                <i class="bi bi-credit-card-fill"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="form-group has-icon-left">
                                                                        <label for="mobile-id-icon">Validity
                                                                            period</label>
                                                                        <div class="position-relative">
                                                                            <input type="text"
                                                                                class="form-control @error('bank_cart_age') is-invalid @enderror"
                                                                                placeholder="**/**" id="mobile-id-icon"
                                                                                name="bank_cart_age"
                                                                                value="{{ auth()->user()->bank_cart_age }}">
                                                                            <div class="form-control-icon">
                                                                                <i class="bi bi-credit-card-fill"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="form-group has-icon-left">
                                                                        <label for="mobile-id-icon">CVV</label>
                                                                        <div class="position-relative">
                                                                            <input type="text"
                                                                                class="form-control @error('cvv') is-invalid @enderror"
                                                                                placeholder="***" id="mobile-id-icon"
                                                                                name="cvv"
                                                                                value="{{ auth()->user()->cvv }}">
                                                                            <div class="form-control-icon">
                                                                                <i class="bi bi-credit-card-fill"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 d-flex justify-content-end">
                                                                    <button type="submit"
                                                                        class="btn btn-primary me-1 mb-1">Submit</button>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table mb-0 table-lg">
                                    <thead>
                                        <tr>
                                            <th>Column</th>
                                            <th>Attribute</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-bold-500">Name</td>
                                            <td>{{ auth()->user()->name }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-bold-500">Email</td>
                                            <td>{{ auth()->user()->email }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-bold-500">Phone number</td>
                                            <td>{{ auth()->user()->phone_number }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-bold-500">Account created at</td>
                                            <td>{{ auth()->user()->created_at }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="accordion border border-warning rounded-3" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button collapsed text-warning" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false"
                                            aria-controls="collapseOne">
                                            Bank cart
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse"
                                        aria-labelledby="headingOne" data-bs-parent="#accordionExample" style="">
                                        <div class="accordion-body">
                                            <div class="table-responsive">
                                                <table class="table mb-0 table-lg">
                                                    <thead>
                                                        <tr>
                                                            <th>Bank cart number</th>
                                                            <th>{{ auth()->user()->bank_cart }}</th>
                                                        </tr>
                                                        <tr>
                                                            <th>Bank cart age</th>
                                                            <th>{{ auth()->user()->bank_cart_age }}</th>
                                                        </tr>
                                                        <tr>
                                                            <th>Bank cart age</th>
                                                            <th>{{ auth()->user()->bank_cart_age }}</th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
