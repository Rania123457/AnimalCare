@extends('layouts.dashbord')
@section('content')


<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">

                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            </li>
                            <h3>
                                <li class="breadcrumb-item active"> التحليل الاحصائي للقضايا </li>
                            </h3>

                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- DOM - jQuery events table -->



            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="card-box bg-blue">
                            <div class="inner">
                                <h3> 13 </h3>
                                <p> عدد القضايا </p>
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-3 col-sm-6">
                        <div class="card-box bg-green">
                            <div class="inner">
                                <h3> 5</h3>
                                <p>قضايا تم حلها </p>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card-box bg-orange">
                            <div class="inner">
                                <h3> 2</h3>
                                <p>  قضايا عند محامي</p>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card-box bg-red">
                            <div class="inner">
                                <h3> 6</h3>
                                <p> قضايا لم تحل</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>


            <canvas id="myChart" style="width:1129px;max-width:inherit;height:333px;"></canvas>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>


            <script>
                var xValues = ["العدد الكلي ", "", "عدد المستخدمين", "عدد المحامين"];
                var yValues = [10, 7, 8, 9];
                var barColors = ["brown", "orange", "green", "blue"];
                new Chart("myChart", {
                    type: "bar",
                    data: {
                        labels: xValues,
                        datasets: [{
                            backgroundColor: barColors,
                            data: yValues
                        }]
                    },
                    options: {
                        legend: {
                            display: false
                        },
                        title: {
                            display: true,
                            text: ""
                        }
                    }
                });
            </script>



        </div>
    </div>
</div>


@endsection