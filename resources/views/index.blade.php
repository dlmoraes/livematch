@extends('layouts.app')

@section('titulo')
    Dashboard
@endsection

@section('breadcrumb')
    <li class="active">Dashboard</li>
@endsection

@section('container')
    <!-- Content area -->
    <div class="content">
        <!-- Detached content -->
        <div class="container-detached">
            <div class="content-detached">
                <div class="row">
                    <div class="col-md-4">
                        <div class="panel border-left-lg border-left-primary">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <h6 class="no-margin-top"><a href="task_manager_detailed.html">#24. Create UI
                                                design
                                                model</a></h6>
                                        <p class="mb-15">One morning, when Gregor Samsa woke from troubled..</p>
                                    </div>

                                    {{--<div class="col-md-4">--}}
                                        {{--<ul class="list task-details">--}}
                                            {{--<li>28 January, 2015</li>--}}
                                            {{--<li class="dropdown">--}}
                                                {{--Priority: &nbsp;--}}
                                                {{--<a href="#" class="label label-primary dropdown-toggle"--}}
                                                   {{--data-toggle="dropdown">Normal--}}
                                                    {{--<span class="caret"></span></a>--}}
                                                {{--<ul class="dropdown-menu dropdown-menu-right">--}}
                                                    {{--<li><a href="#"><span--}}
                                                                    {{--class="status-mark position-left bg-danger"></span>--}}
                                                            {{--Highest priority</a></li>--}}
                                                    {{--<li><a href="#"><span--}}
                                                                    {{--class="status-mark position-left bg-info"></span>--}}
                                                            {{--High--}}
                                                            {{--priority</a></li>--}}
                                                    {{--<li class="active"><a href="#"><span--}}
                                                                    {{--class="status-mark position-left bg-primary"></span>--}}
                                                            {{--Normal--}}
                                                            {{--priority</a></li>--}}
                                                    {{--<li><a href="#"><span--}}
                                                                    {{--class="status-mark position-left bg-success"></span>--}}
                                                            {{--Low--}}
                                                            {{--priority</a></li>--}}
                                                {{--</ul>--}}
                                            {{--</li>--}}
                                            {{--<li><a href="#">Eternity app</a></li>--}}
                                        {{--</ul>--}}
                                    {{--</div>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection