@extends('layouts.app')

@section('content')
    <taxpayer-status-component
        taxpayer-status-route="{{route('api.taxpayer-status')}}"></taxpayer-status-component>
@endsection
