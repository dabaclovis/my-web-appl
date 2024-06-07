@extends('layouts.user')


@section('content')
    <div class="w3-row-padding">
        <div class="w3-third">
            <div class="w3-text-gray w3-card">
                <div class="w3-display-container">
                    @if (Auth::user()->avatar)
                        <img src="{{ asset('storage/users/'.Auth::user()->avatar) }}" class="w3-round-large" width="100%"
                            alt="profile">
                    @endif
                    <div class="w3-text-white w3-display-topright w3-container w3-dark-gray w3-round-xlarge mt-2">
                        <h5>{{ Str::ucfirst($user->fname) }}&nbsp;{{ Str::ucfirst($user->lname) }}</h5>
                    </div>
                </div>
                <div class="w3-container">
                    <div class="w3-row">
                        <div class="w3-col w3-conter" id="clovis">
                            <i class="fa fa-home w3-xlarge w3-text-teal mt-2" aria-hidden="true"></i>
                        </div>
                        <div class="w3-rest pt-2">
                            @if ($contact)
                            &nbsp;{{ Str::ucfirst($contact->city) }},&nbsp;{{ Str::ucfirst($contact->state) }}
                            @endif
                        </div>
                    </div>
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
                        <strong class=" text-uppercase">Address</strong>
                    </div>
                    <div class="w3-row">
                        <div class="w3-col w3-center" id="clovis">
                            <i class="fa fa-home w3-text-teal " aria-hidden="true"></i>
                        </div>
                        <div class="w3-rest">
                            @if ($contact)
                            {{ $contact->address }}
                            <br>
                            {{ $contact->city }}, {{ $contact->state }}
                            &nbsp; {{ $contact->zipcode }}<br>
                            {{ $contact->country }}
                            @endif
                            &nbsp; <span id="addr"><i class="fa fa-edit w3-text-teal" aria-hidden="true"></i></span>
                            <div id="addrForm" class=" w3-container">
                                <form action="{{ route('contacts.users') }}" method="post">
                                    @csrf
                                    <input type="text" placeholder=" Address" name="address" class="mb-1"><br>
                                    <input type="text" placeholder=" City" name="city" class=" mb-1"> <br>
                                    <input type="text" placeholder=" State " name="state" class=" mb-1"> <br>
                                    <input type="text" placeholder=" Zip Code / Postal Code" name="zipcode" class=" mb-1"> <br>
                                    <input type="text" placeholder=" Country" name="country" class=" mb-1"> <br>
                                    <textarea name="notes" placeholder="Enter little information about you. This is also optional" id="" cols="23" rows="3"></textarea> <br>
                                    <button type="submit" class="btn btn-primary btn-sm">create</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w3-display-container">
                <div class="w3-container">
                    <div class="w3-large">
                        <strong class=" text-uppercase">catagories</strong>
                    </div>
                    <div class="w3-row">
                        <div class="w3-col w3-center" id="clovis">
                            <i class="fa fa-folder-open w3-text-teal" aria-hidden="true"></i>
                        </div>
                        <div class="w3-rest">
                            @if ($subjects)
                            @foreach (json_decode($subjects->papers) as $subject)
                            {{ Str::ucfirst($subject) }}  <br>
                            @endforeach
                            @endif
                            <span id="category" class="mx-5"><i class="fa fa-edit w3-text-teal" aria-hidden="true"></i></span>
                            <div class="w3-container" id="categoryForm">
                                <form action="{{ route('users.category') }}" method="post">
                                    @csrf
                                    <div class="form-check">
                                      <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="subjects[]" id="subjects" value="chemistry">
                                            Chemistry
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="subjects[]" id="subjects" value="physics">
                                            Physics
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="subjects[]" id="subjects" value="biology">
                                            Biology
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="subjects[]" id="subjects" value="mathematic">
                                            Mathematics
                                      </label>
                                    </div>
                                    <div class="form-group">
                                          <button type="submit" class="btn btn-sm btn-primary">create</button>
                                    </div>
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
