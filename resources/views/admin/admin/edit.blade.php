@extends('../layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Editati datele administratorului</h1>
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
                                    <div class="form-group">
                                        <label >Numele administratorului</label>
                                        <input type="text" class="form-control" name="name" value="{{$getRecord->name}}" required placeholder="Introduceti numele administratorului">
                                    </div>
                                    <div class="form-group">
                                        <label >Adresa email</label>
                                        <input type="email" class="form-control" name="email" value="{{$getRecord->email}}" required placeholder="Introduceti adresa email a administratorului" >
                                        <div style="color: red">{{ $errors->first('email') }}</div>
                                    </div>
                                    <div class="form-group">
                                        <label >Parola</label>
                                        <input type="text" class="form-control" name="password"  placeholder="Introduceti parola administratorului">
                                        <p>Doriti sa schimbati parola? Scrieti in casuta de mai sus noua parola!</p>
                                    </div>

                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Actualizeaza</button>
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
