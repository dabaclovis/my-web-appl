@extends('layouts.user')


@section('content')
    <div class="w3-row-padding">
        <div class="w3-third">
            <div class="w3-text-gray w3-card">
                <div class="w3-display-container">
                    @if (Auth::user()->avatar)
                        <img src="{{ asset('storage/users/' . Auth::user()->avatar) }}" class="w3-round-large" width="100%"
                            alt="profile">
                    @endif
                    <div class="w3-text-white w3-display-topright w3-container w3-dark-gray w3-round-xlarge mt-2">
                        <h5>{{ Str::ucfirst($user->fname) }}&nbsp;{{ Str::ucfirst($user->lname) }}</h5>
                    </div>
                </div>
                <div class="w3-container">
                    <p><i class="fa fa-home w3-xlarge w3-text-teal  w3-margin-right mt-2" aria-hidden="true"></i>Columbus,
                        Ohio</p>
                </div>
                <div class="w3-container pt-2">
                    <form action="{{ route('avatarUpdate') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class=" form-group d-flex justify-content-between">
                            <input type="file" name="avatar" id="avatar">
                            <button type="submit" class="btn w3-teal btn-sm">upload</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- right content --}}
        <div class="w3-twothird">
            <div class="w3-display-container">
                <div class="w3-container">
                    <div class="w3-large">
                        <strong class=" text-uppercase">your details</strong>
                    </div>
                    <div class="w3-row w3-section">
                        <div class="w3-col w3-center" id="clovis">
                            <i class="fa fa-user w3-text-teal" aria-hidden="true"></i>
                        </div>
                        <div class="w3-rest">
                            {{ Str::ucfirst($user->fname) }}
                                &nbsp;
                            {{ Str::ucfirst($user->lname) }}
                        </div>
                    </div>
                    <div class="w3-row w3-section">
                        <div class="w3-col w3-center" id="clovis">
                            <i class="fa fa-envelope-o w3-text-teal" aria-hidden="true"></i>
                        </div>
                        <div class="w3-rest">
                            {{ $user->email }}
                        </div>
                    </div>
                    <div class="w3-row w3-section">
                        <div class="w3-col w3-center" id="clovis">
                            <i class="fa fa-phone w3-text-teal" aria-hidden="true"></i>
                        </div>
                        <div class="w3-rest">
                            {{ $user->mobile }} &nbsp; <span id="Numbs"><i class="fa fa-edit text-primary" aria-hidden="true"></i></span>
                            <div id="phNumber" class="mt-2">
                                <form action="{{ route('mobileUpdate') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text"
                                        autocomplete="mobile"
                                        autofocus placeholder="update phone number" name="mobile">
                                        <button type="submit" class="btn btn-sm btn-primary">update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="w3-row w3-section">
                        <div class="w3-col w3-center" id="clovis">
                            <i class="fa fa-book w3-text-teal" aria-hidden="true"></i>
                        </div>
                        <div class="w3-rest">
                            {{ Str::ucfirst($user->roles) }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="w3-display-container">
                <div class="w3-container">
                    <div class="w3-large">
                        <strong>Address</strong>
                    </div>
                    <div class="w3-row">
                        <div class="w3-col w3-center" id="clovis">
                            <i class="fa fa-home w3-text-teal " aria-hidden="true"></i>
                        </div>
                        <div class="w3-rest">
                            6287 sunderland drive &nbsp; <span id="addr"><i class="fa fa-edit w3-text-teal" aria-hidden="true"></i></span>
                            <br>
                            columbus, ohio
                            &nbsp; 43229<br>
                            united states
                            <div id="addrForm" class=" w3-container">
                                <form action="" method="post">
                                    @csrf
                                    <input type="text" placeholder=" Address" name="address" class="mb-1"><br>
                                    <input type="text" placeholder=" City" name="city" class=" mb-1"> <br>
                                    <input type="text" placeholder=" State " name="state" class=" mb-1"> <br>
                                    <input type="text" placeholder=" Zip Code / Postal Code" name="zipcode" class=" mb-1"> <br>
                                    <input type="text" placeholder=" Country" name="country" class=" mb-1"> <br>
                                    {{-- <textarea name="notes" id="" cols="30" rows="10"></textarea> <br> --}}
                                    <button type="submit" class="btn btn-primary btn-sm">create</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- end right --}}
    </div>

@endsection
