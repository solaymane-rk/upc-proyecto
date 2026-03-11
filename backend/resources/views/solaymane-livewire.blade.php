@extends('layouts.app')

@section('contenido')
    <div class="py-8 px-6 space-y-10">
        @livewire('satellite-browser')
        <hr class="border-gray-700">
        @livewire('satellite-stats')
        <hr class="border-gray-700">
        @livewire('maintenance-planner')
    </div>
@endsection
