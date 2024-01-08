@extends('../layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Introduceti un nou elev</h1>
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
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label >Prenume<span style="color: orangered">*</span></label>
                                            <input type="text" class="form-control" value="{{old('name')}}" name="name" required placeholder="Introduceti prenume">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label >Nume<span style="color: orangered">*</span></label>
                                            <input type="text" class="form-control" value="{{old('last_name')}}" name="last_name" required placeholder="Introduceti numele de botez">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label >Nr. dosar<span style="color: orangered">*</span></label>
                                            <input type="text" class="form-control" value="{{old('admission_number')}}" name="admission_number" required placeholder="Introduceti nr. dosar">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label >Nr. Matricol<span style="color: orangered">*</span></label>
                                            <input type="text" class="form-control" value="{{old('roll_number')}}" name="roll_number" required placeholder="Introduceti nr. matricol">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label >Clasa<span style="color: orangered">*</span></label>
                                            <select class="form-control" required name="class_id">
                                                <option value="">Selecteaza clasa</option>
                                                @foreach($getClass as $value)
                                                    <option value="{{$value->id}}">{{$value->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label >Gen<span style="color: orangered">*</span></label>
                                            <select class="form-control" required name="gender">
                                                <option value="">Selecteaza genul</option>
                                                <option value="Mascuiln">Mascuiln</option>
                                                <option value="Feminin">Feminin</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label >Data de nastere<span style="color: orangered">*</span></label>
                                            <input type="date" class="form-control" required value="{{old('date_of_birth')}}" name="date_of_birth">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label >Religia<span style="color: orangered">*</span></label>
                                            <input type="text" class="form-control" value="{{old('religion')}}" name="religion" required placeholder="Introduceti religia">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label >Nr. telefon<span style="color: orangered">*</span></label>
                                            <input type="text" class="form-control" value="{{old('mobile_number')}}" name="mobile_number" required placeholder="Introduceti numarul de telefon">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label >Data admiterii<span style="color: orangered">*</span></label>
                                            <input type="date" class="form-control" required value="{{old('admission_date')}}" name="admission_date">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label >Grupa Sanguina<span style="color: orangered">*</span></label>
                                            <input type="text" class="form-control" value="{{old('blood_group')}}" name="blood_group" required placeholder="Introduceti grupa sanguina">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label >Inaltime<span style="color: orangered">*</span></label>
                                            <input type="text" class="form-control" value="{{old('height')}}" name="height" required placeholder="Introduceti inaltimea">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label >Greutate<span style="color: orangered">*</span></label>
                                            <input type="text" class="form-control" value="{{old('weight')}}" name="weight" required placeholder="Introduceti greutatea" >
                                        </div>

                                    </div>



                                    <div class="form-group">
                                        <label >Adresa email<span style="color: orangered">*</span></label>
                                        <input type="email" class="form-control" name="email" required placeholder="Introduceti adresa email a elevului">
                                        <div style="color: red">{{ $errors->first('email') }}</div>
                                    </div>
                                    <div class="form-group">
                                        <label >Parola<span style="color: orangered">*</span></label>
                                        <input type="password" class="form-control" name="password" required placeholder="Introduceti parola elevului">
                                    </div>

                                    <div class="form-group">
                                        <label > Status<span style="color: orangered">*</span></label>
                                        <select class="form-control" required name="status">
                                            <option value="0">Activ</option>
                                            <option value="1">Inactiv</option>

                                        </select>
                                    </div>

                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Adauga</button>
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
