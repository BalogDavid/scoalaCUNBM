
@extends('../layouts.app')

@section('content')






    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Lista parinti</h1>
                    </div>
                    <div class="col-sm-6 " style="text-align: right;">
                        <a href="{{url('admin/parent/add')}}" class="btn btn-primary">Adauga parinti</a>
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
                            <h3 class="card-title">Cauta un parinte</h3>
                        </div>
                        <form method="get" action="">
                            <div class="card-body">

                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label >Prenume</label>
                                        <input type="text" class="form-control" value="{{Request::get('name')}}" name="name">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label >Nume</label>
                                        <input type="text" class="form-control" value="{{Request::get('last_name')}}" name="last_name">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label >Sex</label>
                                        <input type="text" class="form-control" value="{{Request::get('gender')}}" name="gender">

                                    </div>
                                    <div class="form-group col-md-3">
                                        <label >Data de nastere</label>
                                        <input type="date" class="form-control" value="{{Request::get('date_of_birth')}}" name="date">
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label >Nr. telefon </label>
                                        <input type="text" class="form-control" value="{{old('mobile_number')}}" name="mobile_number">
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label >Mail </label>
                                        <input type="email" class="form-control" name="email" value="{{old('email')}}">
                                    </div>





                                    <div class="form-group col-md-3">
                                        <button class="btn btn-primary" type="submit" style="margin-top: 30px">Cauta</button>
                                        <a href="{{url('admin/parent/list')}}" class="btn btn-primary" style="margin-top: 30px">Reseteaza</a>
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


                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Lista Parinti</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Prenume</th>
                                        <th>Nume</th>
                                        <th>Sex</th>
                                        <th>Data de nastere</th>
                                        <th>Nr telefon</th>

                                        <th>Mail</th>
                                        <th>Actiuni</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($getRecord as $value)
                                        <tr>
                                            <td>{{$value->id}}</td>

                                            <td>{{$value->name}}</td>
                                            <td>{{$value->last_name}}</td>
                                            <td>{{$value->gender}}</td>
                                            <td>{{$value->date_of_birth}}</td>
                                            <td>{{$value->mobile_number}}</td>

                                            <td>{{$value->email}}</td>

                                            <td>
                                                <a href="{{url('admin/parent/my_student' , $value->id)}}" class="btn btn-primary">Elev</a>
                                                <a href="{{url('admin/parent/edit' , $value->id)}}" class="btn btn-primary">Editeaza</a>
                                                <a href="{{url('admin/parent/delete' , $value->id)}}" class="btn btn-danger">Sterge</a>
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
