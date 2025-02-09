<?php
    // header
    include_view("layouts/header");

    // sidebar
    include_view("layouts/sidebar");
?>

<!-- content here -->



<!-- Page Header -->
<div class="crms-title row bg-white mb-4">
    <div class="col">
        <h3 class="page-title">
            <span class="page-title-icon bg-gradient-primary text-white me-2">
                <i class="la la-table"></i>
            </span> <span>Deals Dashboard</span></h3>
    </div>
    <div class="col text-end">
        <ul class="breadcrumb bg-white float-end m-0 ps-0 pe-0">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">Deals Dashboard</li>
        </ul>
    </div>
</div>

<!-- /Page Header -->

<div class="row graphs">
    <div class="col-md-6">
        <div class="card h-100">
            <div class="card-body">
                <h3 class="card-title">Total Lead</h3>
                <canvas id="pie-chart" width="800" height="450"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card h-100">
            <div class="card-body">
                <h3 class="card-title">Products Yearly Sales</h3>
                <canvas id="bar-chart-horizontal" width="800" height="450"></canvas>
            </div>
        </div>
    </div>
</div>
<div class="row graphs">
    <div class="col-md-6">
        <div class="card h-100">
            <div class="card-body">
                <h3 class="card-title">Sales Overview</h3>
                <div id="line-charts"></div>
            </div>
        </div>
    </div>
    <div class="col-md-6">

        <div class="card h-100">
            <div class="card-body">
                <h3 class="card-title">Total Sales</h3>
                <div id="chart"></div>
            </div>
        </div>
    </div>
</div>
<div class="row graphs">
    <div class="col-md-6">
        <div class="card h-100">
            <div class="card-body">
                <h3 class="card-title">Yearly Projects</h3>
                <canvas id="bar-chart" width="800" height="550"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card h-100">
            <div class="card-body">
                <h3 class="card-title">Total Revenue</h3>
                <div id="bar-charts"></div>
            </div>
        </div>
    </div>

</div>

<div class="row graphs">
    <div class="col-md-6 mb-0">
        <div class="card h-100">
            <div class="card-body">
                <h3 class="card-title">Sales Statistics</h3>
                <canvas id="bar-chart-grouped" width="800" height="450"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-0">
        <div class="card h-100">
            <div class="card-body">
                <h3 class="card-title">Completed Tasks</h3>
                <canvas id="mixed-chart" width="800" height="450"></canvas>
            </div>
        </div>
    </div>
</div>



<?php 
    // footer
    include_view("layouts/footer");
?>