@extends('../layouts.app')

@section('content')






<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Lista administratorilor</h1>
          </div>
            <div class="col-sm-6 " style="text-align: right;">
                <a href="{{url('admin/admin/add')}}" class="btn btn-primary">Adauga un administrator nou</a>
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
                        <h3 class="card-title">Cauta un administrator</h3>
                    </div>
                    <form method="get" action="">
                        <div class="card-body">

                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label >Numele administratorului</label>
                                    <input type="text" class="form-control" value="{{Request::get('name')}}" name="name"  placeholder="Introduceti numele administratorului">
                                </div>
                                <div class="form-group col-md-3">
                                    <label >Adresa email</label>
                                    <input type="text" class="form-control" value="{{Request::get('email')}}" name="email"  placeholder="Introduceti adresa email a administratorului">

                                </div>
                                <div class="form-group col-md-3">
                                    <label >Data</label>
                                    <input type="date" class="form-control" value="{{Request::get('email')}}" name="date"  placeholder="Introduceti adresa email a administratorului">

                                </div>
                                <div class="form-group col-md-3">
                                    <button class="btn btn-primary" type="submit" style="margin-top: 30px">Cautare</button>
                                    <a href="{{url('admin/admin/list')}}" class="btn btn-primary" style="margin-top: 30px">Reseteaza</a>
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
                    <h3 class="card-title">Lista administratorilor</h3>
                </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Nume</th>
                      <th>Adresa email</th>
                      <th>Creat la</th>
                        <th>Actiuni</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($getRecord as $value)
                        <tr>
                            <td>{{$value->id}}</td>
                            <td>{{$value->name}}</td>
                            <td>{{$value->email}}</td>
                            <td>{{date('d-m-Y', strtotime($value->createed_at)) }}</td>

                            <td>
                                <a href="{{url('admin/admin/edit' , $value->id)}}" class="btn btn-primary">Editeaza</a>
                                <a href="{{url('admin/admin/delete' , $value->id)}}" class="btn btn-danger">Sterge</a>
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
