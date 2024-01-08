@extends('../layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Editeaza  materia</h1>
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
                                        <label >Nume materie</label>
                                        <input type="text" class="form-control"  name="name" value="{{$getRecord->name}}" required placeholder="Introduceti numele materiei">
                                    </div>

                                    <div class="form-group">
                                        <label > Tip</label>
                                        <select class="form-control" name="type">
                                            <option {{($getRecord->type == 'Teoretica')? 'selected':''}} value="Teoretica">Teoretica</option>
                                            <option {{($getRecord->type == 'Practica')? 'selected':''}} value="Practica">Practica</option>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label > Status</label>
                                        <select class="form-control" name="status">
                                            <option {{($getRecord->status) == 0 ? 'selected':''}} value="0">Activa</option>
                                            <option {{($getRecord->status) == 1 ? 'selected':''}} value="1">Inactiva</option>


                                        </select>
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
