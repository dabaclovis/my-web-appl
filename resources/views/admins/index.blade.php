@extends('layouts.admin')


@section('content')
    <div class=" card">
        <div class=" card-header w3-padding-16 w3-xlarge">
            Administrator
        </div>
    </div>

   <div class="list-group w3-card-2">
        <a href="{{ route('admins.users') }}" class=" list-group-item list-group-item-action mb-1">
            <div class="">
                <h3>ALL USERs Card</h3>
                <div></div>

            </div>
            <small>
                Total Users {{ $users->count() }}
            </small>
        </a>
   </div>
@endsection

