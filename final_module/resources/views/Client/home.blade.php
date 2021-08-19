@extends('Client.Home.index')
@section('title', 'Trang chủ')
@section('content')
    <!-- Banner -->
    @include('Client.Home.bannerheader')

    <!-- Deals of the week -->
    <!-- Popular Categories -->
    @include('Client.Home.dealofweek')

    <!-- Banner -->
{{--    @include('Client.Home.banner2')--}}

    <!-- Hot New Arrivals -->
    @include('Client.Home.hotnew')

    <!-- Best Sellers -->
    @include('Client.Home.bestseller')

    <!-- Adverts -->
    <!-- Trends -->
{{--    @include('Client.Home.trend')--}}


    <!-- Reviews -->
    <!-- Recently Viewed -->
{{--    @include('Client.Home.reviewviewed')--}}


@endsection
