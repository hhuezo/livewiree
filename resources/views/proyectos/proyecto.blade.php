@extends('backend.layouts.app')

@section('title', __('Dashboard'))

@section('content')

    @livewireStyles
    <!-- Body: Body -->
    <!-- Body: Body -->


    <!-- Jquery Page Js -->



    <livewire:proyecto />





    <script src="{{ asset('assets/bundles/libscripts.bundle.js') }}"></script>
    <script src="{{ asset('assets/bundles/nestable.bundle.js') }}"></script>
    <script src="{{ asset('js/template.js') }}"></script>
    <script src="{{ asset('js/page/task.js') }}"></script>

    @livewireScripts

@endsection
