@extends('layouts.user')


@section('content')
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
