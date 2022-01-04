@extends('layouts.app')
@push('head.scripts')
    <script src="{{ asset('js/admin.js') }}" defer></script>
@endpush
@section('content')
    @include('vue')
@endsection
