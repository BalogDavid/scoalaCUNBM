@extends('../layouts.app')

@section('content')






    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Lista elevi</h1>
                    </div>
                    <div class="col-sm-6 " style="text-align: right;">
                        <a href="{{url('admin/student/add')}}" class="btn btn-primary">Adauga un elev</a>
                    </div>



                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="row">
                <!-- left column -->
                <div class="col-md-12">







                </div>
            </div>

            <div class="container-fluid">
                <div class="row">

                    <!-- /.col -->
                    <div class="col-md-12">

                        @include ('_message')


                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Lista elevilor</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th style="padding-right: 3px">Nr. matricol</th>
                                        <th>Prenume</th>
                                        <th>Nume</th>
                                        <th>Adresa email</th>
                                        <th>Creat la</th>
                                        <th>Actiuni</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($getRecord as $value)
                                        <tr>
                                            <td>{{$value->roll_number}}</td>
                                            <td>{{$value->name}}</td>
                                            <td>{{$value->last_name}}</td>
                                            <td>{{$value->email}}</td>
                                            <td>{{date('d-m-Y', strtotime($value->created_at)) }}</td>

                                            <td>
                                                <a href="{{url('admin/student/edit' , $value->id)}}" class="btn btn-primary">Editeaza</a>
                                                <a href="{{url('admin/student/delete' , $value->id)}}" class="btn btn-danger">Sterge</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div style="padding: 10px;float: right">
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
