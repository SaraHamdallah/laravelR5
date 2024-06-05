@extends('layout.main')

@section('menu')
    <li><a href="/">homepage</a></li>
@endsection

@push('submenu')
    <li><a href="/">testpage</a></li>
@endpush

@prepend('submenu')
    <li><a href="/">testpage4</a></li>
@endprepend