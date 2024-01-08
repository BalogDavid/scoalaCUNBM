
@extends('../layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Editeaza profesor</h1>
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
                                        <label >Nume </label>
                                        <input type="text" class="form-control" value="{{old('name', $getRecord->name)}}" name="name" required placeholder="Introduceti nume">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label >Prenume</label>
                                        <input type="text" class="form-control" value="{{old('last_name', $getRecord->last_name)}}" name="last_name" required placeholder="Introduceti prenume">
                                    </div>



                                    <div class="form-group col-md-6">
                                        <label >Gen </label>
                                        <select class="form-control" required name="gender">
                                            <option value="">Selecteaza genul</option>
                                            <option value="Male">Masculin</option>
                                            <option value="Female">Feminin</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label >Data de nastere</label>
                                        <input type="date" class="form-control" value="{{old('date_of_birth', $getRecord->date_of_birth)}}" name="date_of_birth" required >
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label >Religia </label>
                                        <input type="text" class="form-control" value="{{old('religion', $getRecord->religion)}}" name="religion" required placeholder="Introduceti religia">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label >Nr. telefon </label>
                                        <input type="text" class="form-control" value="{{old('mobile_number', $getRecord->mobile_number)}}" name="mobile_number" required placeholder="Introduceti nr telefon">
                                    </div>


                                    <div class="form-group col-md-6">
                                        <label >Mail </label>
                                        <input type="email" class="form-control" name="email" value="{{old('email', $getRecord->email)}}" required placeholder="Introduceti email">
                                    </div>


                                    <div class="form-group col-md-6">
                                        <label >Parola </label>
                                        <input type="password" class="form-control" value="{{old('password', $getRecord->password)}}" name="password" required placeholder="Introduceti parola">
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
