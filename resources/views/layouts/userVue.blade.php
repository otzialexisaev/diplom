@extends('layouts.app')
@push('head.scripts')
    <script src="{{ asset('js/user.js') }}" defer></script>
@endpush
@section('content')
    @include('vue')
@endsection
