@extends('../layouts.app')

@section('content')






    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Atribuirea materiilor</h1>
                    </div>
                    <div class="col-sm-6 " style="text-align: right;">
                        <a href="{{url('admin/assign_subject/add')}}" class="btn btn-primary">Atribuie o materie noua</a>
                    </div>



                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="row">
                <!-- left column -->
                <div class="col-md-12">






                    <div class="card ">

                    </div>


                </div>
            </div>

            <div class="container-fluid">
                <div class="row">

                    <!-- /.col -->
                    <div class="col-md-12">

                        @include ('_message')


                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Atribuirea materiilor</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nume Clasa</th>
                                        <th>Nume Materie</th>
                                        <th>Creat de</th>
                                        <th>Creat la</th>
                                        <th>Actiuni</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($getRecord as $value)
                                        <tr>
                                            <td>{{$value->id}}</td>
                                            <td>{{$value->class_name}}</td>
                                            <td>{{$value->subject_name}}</td>
                                            <td>
                                                @if($value->status ==0)
                                                    Activ
                                                @else
                                                    Inactiva
                                                @endif
                                            </td>
                                            <td>{{$value->created_by_name}}</td>
                                            <td>{{date('d-m-Y', strtotime($value->created_at))}}</td>
                                            <td>
                                                <a href="{{url('admin/assign_subject/edit' , $value->id)}}" class="btn btn-primary">Editeaza</a>
                                                <a href="{{url('admin/assign_subject/delete' , $value->id)}}" class="btn btn-danger">Sterge</a>
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
