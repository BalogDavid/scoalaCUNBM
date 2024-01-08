@extends('../layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Editeaza nota</h1>
                    </div>

                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <form method="post" action="">
                                {{ csrf_field()}}
                                <div class="card-body">


                                    <div class="form-group col-md-6">
                                        <label >Student </label>
                                        <input type="text" class="form-control" value="{{old('student', $getRecord->student)}}" name="student" required placeholder="Introduceti numele studentului">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label >Nume </label>
                                        <input type="text" class="form-control" value="{{old('name', $getRecord->name)}}" name="name" required placeholder="Introduceti materie">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label >Nota</label>
                                        <input type="text" class="form-control" value="{{old('grade_number', $getRecord->grade_number)}}" name="grade_number" required placeholder="Introduceti nota">
                                    </div>





                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>


                    </div>
                    <!--/.col (left) -->
                    <!-- right column -->

                    <!--/.col (right) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
