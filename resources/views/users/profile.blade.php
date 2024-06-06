@extends('layouts.user')


@section('content')


<div class=" w3-row-padding">
    <div class=" w3-third w3-card-4">
        <div class="w3-container">
            <div class="w3-display-container">
               @if (Auth::user()->avatar)
                    <img src="{{ asset('storage/users/'.Auth::user()->avatar) }}" width="100%" alt="profile" class="w3-round-xlarge">
               @endif
               <div class="w3-display-bottombar w3-container">
                    {{ Auth::user()->name }}
               </div>
            </div>
        </div>
        <div class="w3-container mt-4 w3-card">
            <form action="{{ route('avatarUpdate') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class=" form-group d-flex justify-content-between">
                    <input type="file" name="avatar" id="avatar">
                    <button type="submit" class="btn btn-primary">upload</button>
                </div>
            </form>
        </div>
    </div>
    <div class="w3-twothird">
        <div class="w3-card-4">
            <ul class="list-group">
                <li class="list-group-item">My Details
                    
                </li>
            </ul>
        </div>
    </div>
</div>
    <div class="row">
        <div class="col-md-12">
            <div class="w3-card w3-padding-24 w3-container">
                Your Details
                <ul>
                    <li>Name:
                       <ul>
                        <li> {{ Str::ucfirst($user->name) }}</li>
                       </ul>
                    </li>
                    <li>Role:
                        <ul>
                            <li> {{ Str::ucfirst($user->roles) }}</li>
                        </ul>
                    </li>
                    <li>
                        Email:
                        <ul>
                            <li> {{ $user->email }}</li>
                        </ul>
                    </li>
                    <li>
                        Mobile:
                        <ul>
                            <li id="showform">{{ $user->mobile }} &nbsp; <i class="fa fa-edit"></i></li>
                        </ul>
                    </li>
                </ul>
                <div class="col-md-10" id="hidden">
                    <form action="{{ route('mobileUpdate') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="mobile">Update Mobile</label> <br>
                            <input type="text" name="mobile">
                            <button class=" btn btn-sm btn-success">update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
