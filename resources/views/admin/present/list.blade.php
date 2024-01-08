@extends('../layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Lista Prezente</h1>
          </div>
        </div>
    </div>
    </section>

    <section class="content">
    <div class="container-fluid">
    <div class="row">
            
    
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Lista Prezente</h3>
                </div>
            <form method="get" actions="">
              <div class="card-body">
              <div class="row">
                <div class="form-group col-md-3">
                    <label>Clasa</label>
                <select class="form-control" name="class_id" id="getClass" required>
                <option value="">Select</option>
                @foreach($getClass as $class)
                  <option{{(Request::get('class_id')==$class->id)?'selected':''}} value="{{$class->id}}">{{$class->name}}</option>
                    @endforeach
                  </select>
              </div>


              <div class="form-group col-md-3">
                    <label>Data</label>
                <input type ="date" class="form-control" id="getAttendanceDate" value="{{Request::get('attendance_date')}}"required name="attendance_date">
              </div>





              <div class="form-group col-md-3">
                <button class="btn btn-primary" type="submit" style="margin-top:30px;">Cauta</button>
                
            
            </div>

          </div>
        </div>
        </form>
        </div>


        @if(!empty(Request::get('class_id')) && !empty(Request::get('attendance_date')))
        <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Lista studenti</h3>
                </div>

                <div class="card-body p-0" style="overflow: auto;">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Student</th>
                      <th>Prezenta</th>
</tr>
              <tbody>
                @if(!empty($getStudent) && !empty($getStudent->count()))
                @foreach($getStudent as $value)
                <tr>
      <td>{{$value->id}}</td>
      <td>{{$value->name}} {{$value->last_name}}</td>
          <td>
      <label style="margin-right: 10px;"><input value="1" type="radio" id="{{$value->id}}"  class="SaveAttendence" name="present"{{$value->id}}">Present</label>
      <label style="margin-right: 10px;"><input value="2" type="radio" id="{{$value->id}}" class="SaveAttendence" name="present"{{$value->id}}">Absent</label>
      <label style="margin-right: 10px;"><input value="3" type="radio" id="{{$value->id}}" class="SaveAttendence" name="present"{{$value->id}}">Intarziat</label>
          </td>
                </tr>
                @endforeach
                @endif
              </tbody>
              </table>
</div>

@endif


        </div>

        </div>

        </div>
</section>
</div>

@endsection

@section('script').

<script type="text/javascript">
    $('.SaveAttendence').change(function(e){
      var student_id=$(this).attr('id');
      var attendance_type=$(this).val();
      var class_id=$('#getClass').val();
      var attendance_date=$('#getAttendanceDate').val();




      $.ajax({
        type:"POST",
        url:"{{url('admin/present/list/save') }}",
        data:{
            "_token":"{{csrf_token()}}",
            student_id:student_id,
            attendance_type:attendance_type,
            class_id:class_id,
            attendance_date:attendance_date,

        },
        dataType:"json"
        success:function(data){
          alert(data.message);
        }
      });
    });
        
  </script>

  @endsection
