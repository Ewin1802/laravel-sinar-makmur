@extends('layouts.app')

@section('title','Dashboard')

@section('content')

<div class="dashboard">

    @include('pages.dashboard.partials.header')

    @include('pages.dashboard.partials.statistics')

    <div class="dashboard-bottom">

        @include('pages.dashboard.partials.chart')

        @include('pages.dashboard.partials.activity')

    </div>

    <div class="dashboard-users">

        @include('pages.dashboard.partials.users')

    </div>

</div>

@endsection
