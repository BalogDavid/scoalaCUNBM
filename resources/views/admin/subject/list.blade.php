@extends('../layouts.app')

@section('content')






    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Lista materii</h1>
                    </div>
                    <div class="col-sm-6 " style="text-align: right;">
                        <a href="{{url('admin/subject/add')}}" class="btn btn-primary">Adauga o materie noua</a>
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
                                <h3 class="card-title">Lista materiilor</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Materie</th>
                                        <th>Tip materie</th>
                                        <th>Status</th>
                                        <th>Creat de</th>
                                        <th>Creat la</th>
                                        <th>Actiuni</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($getRecord as $value)
                                        <tr>
                                            <td>{{$value->id}}</td>
                                            <td>{{$value->name}}</td>
                                            <td>{{$value->type}}</td>
                                            <td>@if($value->status ==0)
                                                    Activa
                                                @else
                                                    Inactiva
                                                @endif
                                            </td>
                                            <td>{{$value->created_by_name}}</td>
                                            <td>{{date('d-m-Y', strtotime($value->created_at))}}</td>
                                            <td>
                                                <a href="{{url('admin/subject/edit' , $value->id)}}" class="btn btn-primary">Editeaza</a>
                                                <a href="{{url('admin/subject/delete' , $value->id)}}" class="btn btn-danger">Sterge</a>

                                            </td>
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
