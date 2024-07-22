@extends('app')

@section('content')
    
@endsection

@include('layout.sidebar')
    <div class="p-4 sm:ml-64">
        @include('layout.appbar')
        <div class="py-4">            
            @yield('main-content')
        </div>
    </div>