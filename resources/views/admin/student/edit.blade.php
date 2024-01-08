@extends('../layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Editeaza un  elev</h1>
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
                                            <label >Prenume</label>
                                            <input type="text" class="form-control" value="{{old('name',$getRecord->name)}}" name="name"  placeholder="Introduceti prenumele">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label >Nume</label>
                                            <input type="text" class="form-control" value="{{old('last_name',$getRecord->last_name)}}" name="last_name"  placeholder="Introduceti numele de botez">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label >Nr. dosar</label>
                                            <input type="text" class="form-control" value="{{old('admission_number',$getRecord->admission_number)}}" name="admission_number"  placeholder="Introduceti nr. dosar">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label >Nr. Matricol</label>
                                            <input type="text" class="form-control" value="{{old('roll_number',$getRecord->roll_number)}}" name="roll_number"  placeholder="Introduceti nr. matricol">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label >Clasa</label>
                                            <select class="form-control"  name="class_id">
                                                <option value="">Selecteaza clasa</option>
                                                @foreach($getClass as $value)
                                                    <option {{(old('class_id',$getRecord->class_id) == $value->id)? 'selected' : ''}} value="{{$value->id}}">{{$value->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label >Gen</label>
                                            <select class="form-control"  name="gender">
                                                <option {{(old('gender') == 'Masculin')? 'selected' : ''}}value="Masculin">Mascuiln</option>
                                                <option {{(old('gender') == 'Feminin')? 'selected' : ''}}value="Feminin">Feminin</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label >Data de nastere</label>
                                            <input type="date" class="form-control"  value="{{old('date_of_birth',$getRecord->date_of_birth)}}" name="date_of_birth">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label >Religia</label>
                                            <input type="text" class="form-control" value="{{old('religion',$getRecord->religion)}}" name="religion"  placeholder="Introduceti religia">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label >Nr. telefon</label>
                                            <input type="text" class="form-control" value="{{old('mobile_number',$getRecord->mobile_number)}}" name="mobile_number"  placeholder="Introduceti numarul de telefon">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label >Data admiterii</label>
                                            <input type="date" class="form-control"  value="{{old('admission_date',$getRecord->admission_date)}}" name="admission_date">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label >Grupa Sanguina</label>
                                            <input type="text" class="form-control" value="{{old('blood_group',$getRecord->blood_group)}}" name="blood_group"  placeholder="Introduceti grupa sanguina">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label >Inaltime</label>
                                            <input type="text" class="form-control" value="{{old('height',$getRecord->height)}}" name="height"  placeholder="Introduceti inaltimea">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label >Greutate</label>
                                            <input type="text" class="form-control" value="{{old('weight',$getRecord->weight)}}" name="weight"  placeholder="Introduceti greutatea" >
                                        </div>

                                    </div>



                                    <div class="form-group">
                                        <label >Adresa email</label>
                                        <input type="email" value="{{old('email',$getRecord->email)}}" class="form-control"  name="email"  placeholder="Introduceti adresa email a elevului">
                                        <div style="color: red">{{ $errors->first('email',$getRecord->email) }}</div>
                                    </div>
                                    <div class="form-group">
                                        <label >Parola<span style="color: orangered">*</span></label>
                                        <input type="password" class="form-control" name="password" required placeholder="Introduceti parola elevului">
                                    </div>

                                    <div class="form-group">
                                        <label > Status</label>
                                        <select class="form-control"  name="status">
                                            <option {{($getRecord->status) == 0 ? 'selected':''}} value="0">Activa</option>
                                            <option {{($getRecord->status) == 1 ? 'selected':''}} value="1">Inactiv</option>

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
