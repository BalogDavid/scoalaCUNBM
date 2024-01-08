@extends('../layouts.app')

@section('content')






    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Lista note</h1>
                    </div>



                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="row">
                <!-- left column -->
                <div class="col-md-12">








                    <div class="container-fluid">
                        <div class="row">

                            <!-- /.col -->
                            <div class="col-md-12">

                                @include ('_message')


                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Lista Note</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body p-0">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Student</th>
                                                <th>Nume</th>
                                                <th>Nota</th>
                                                <th>Nota adaugata de</th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($getRecord as $value)
                                                <tr>
                                                    <td>{{$value->id}}</td>
                                                    <td>{{$value->student}}</td>
                                                    <td>{{$value->name}}</td>
                                                    <td>{{$value->grade_number}}</td>
                                                    <td>{{$value->created_by}}</td>

                                                
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        <div style="padding: 10px;float: right">
                                            {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                                        </div>


                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->

                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- /.row -->
                    <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
