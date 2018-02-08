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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
  <script type="text/javascript">
    $(function() {
        $.ajax({
          url: ''
        })
    })
  </script>
@endsection
