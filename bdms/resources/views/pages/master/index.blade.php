@extends('layouts.master')

@section('content')

    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-home icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>The Book
                    <div class="page-title-subheading">Book is the rose of mysterious union, Man attains perfection by reading
                    </div>
                </div>
            </div>

            <div class="page-title-actions">
                <div class="row">
                    <div class="col-12">
                        <div class="d-inline-block pr-3">
                            <select id="custom-inp-top" type="select" class="custom-select">
                                <option value="" selected disabled>Select period...</option>
                                <option value="1">Today</option>
                                <option value="2">Last Week</option>
                                <option value="3">Last Month</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6 col-xl-4">
            <div class="card mb-3 widget-content bg-night-fade">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">Users</div>
                        <div class="widget-subheading">Current Users</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-white"><span>1896</span></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-xl-4">
            <div class="card mb-3 widget-content bg-arielle-smile">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">Readers</div>
                        <div class="widget-subheading">Total Readers</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-white"><span>120</span></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-xl-4">
            <div class="card mb-3 widget-content bg-premium-dark">
                <div class="widget-content-wrapper text-white">
                    <div class="widget-content-left">
                        <div class="widget-heading">Books</div>
                        <div class="widget-subheading">Total Books</div>
                    </div>
                    <div class="widget-content-right">
                        <div class="widget-numbers text-warning"><span>45</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
    <div class="col-md-6">
        <div class="card mb-2">
            <div class="card-body">
                <h5 class="card-title">Category wise Books</h5>
                <div id="chart_group">
                </div>
            </div>
        </div>
    </div>



    <div class="col-md-6">
        <div class="card mb-2">
            <div class="card-body">
                <h5 class="card-title">Region wise Readers</h5>
                <div id="chart_region">
                </div>
            </div>
        </div>
    </div>
    </div>





    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
       
    </script>
@endsection
