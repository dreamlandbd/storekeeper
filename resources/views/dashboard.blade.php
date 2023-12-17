@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Dashboard</h1>

    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Sales Today</h5>
                    <p class="card-text">{{ $salesToday }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Sales Yesterday</h5>
                    <p class="card-text">{{ $salesYesterday }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Sales This Month</h5>
                    <p class="card-text">{{ $salesThisMonth }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Sales Last Month</h5>
                    <p class="card-text">{{ $salesLastMonth }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection