
@extends('../layouts.app')

@section('content')






    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Leaga parinte de elev</h1>
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
                        <div class="card-header">
                            <h3 class="card-title">Cauta un elev</h3>
                        </div>
                        <form method="get" action="">
                            <div class="card-body">

                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label >Nr. matricol</label>
                                        <input type="text" class="form-control" value="{{Request::get('roll_number')}}" name="roll_number"  placeholder="Introduceti nr. matricol al elevuli">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label >Nume</label>
                                        <input type="text" class="form-control" value="{{Request::get('name')}}" name="name"  placeholder="Introduceti numele elevului">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label >Prenume</label>
                                        <input type="text" class="form-control" value="{{Request::get('last_name')}}" name="last_name"  placeholder="Introduceti prenumele elevului">
                                    </div>

                                    <div class="form-group col-md-3">
                                        <button class="btn btn-primary" type="submit" style="margin-top: 30px">Cauta</button>
                                        <a href="{{url('admin/parent/my_student/'.$parent_id)}}" class="btn btn-primary" style="margin-top: 30px">Reseteaza</a>
                                    </div>
                                </div>


                            </div>

                        </form>
                    </div>


                </div>
            </div>

            <div class="container-fluid">
                <div class="row">

                    <!-- /.col -->
                    <div class="col-md-12">

                        @include ('_message')

                        @if(!empty($getSearchStudent))



                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Lista elevi</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body p-0">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nume</th>
                                                <th>Prenume</th>
                                                <th>Mail</th>
                                                <th>Nume Parinte</th>
                                                <th>Nr.Matricol</th>
                                                <th>Actiuni</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                    @foreach($getSearchStudent as $value)
                                                    <tr>
                                                        <td>{{$value->id}}</td>
                                                        <td>{{$value->name}}</td>
                                                        <td>{{$value->last_name}}</td>
                                                        <td>{{$value->email}}</td>
                                                        <td>{{$value->parent_name}}</td>

                                                        <td>{{$value->roll_number}}</td>

                                                        <td>
                                                            <a href="{{url('admin/parent/assign_student_parent/'.$value->id. '/'.$parent_id)}}" class="btn btn-primary">Adauga elevul la parinte</a>
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

                        @endif


                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Lista copil-parinte</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nume</th>
                                        <th>Prenume</th>
                                        <th>Mail</th>
                                        <th>Nume Parinte</th>
                                        <th>Nr.Matricol</th>
                                        <th>Actiuni</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($getRecord as $value)
                                        <tr>
                                            <td>{{$value->id}}</td>
                                            <td>{{$value->name}}</td>
                                            <td>{{$value->last_name}}</td>
                                            <td>{{$value->email}}</td>
                                            <td>{{$value->parent_name}}</td>

                                            <td>{{$value->roll_number}}</td>
                                            <td>{{$value->roll_number}}</td>

                                            <td>
                                                <a href="{{url('admin/parent/assign_student_parent_delete/'.$value->id)}}" class="btn btn-danger">Sterge elevul de la parinte</a>
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
