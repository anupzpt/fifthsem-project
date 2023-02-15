@extends('user.layout.master')
@section('content')
    <!-- header -->
    @include('user.layout.home')
    <!-- end of header -->

    <!-- main content -->
    <main>
        <!-- category -->
        @include('user.layout.art')
        <!-- end of category -->

        <!-- Popular section -->
        @include('user.layout.popular')
        <!-- end of popular section -->

        <!-- latest art deals section -->
        @include('user.layout.latest')
        <!-- end of latest art deals section -->

        <!-- About Artist section -->
        @include('user.layout.about')
        <!-- About artist section -->

        <!-- artist section -->
        @include('user.layout.artist')
        <!-- end of artist section -->

        <!-- contact section -->
        @include('user.layout.contact')
        <!-- end of contact section -->
    </main>
@endsection
