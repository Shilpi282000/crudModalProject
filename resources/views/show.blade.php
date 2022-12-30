<!DOCTYPE html>
<html>
  <head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Table</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css"> 

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">

<!-- <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"> -->
<style>
  a:link, a:visited {
  text-decoration: none;
}</style>

<style>
  .required:after {
    content:" *";
    color: red;
  }
</style>

<style>
  table,thead,tbody{
    text-align:center;
    border:4px solid white;
  }
thead{
  /* color: black; */
  background: teal;
}
thead,th{
  text-align:center;
  }
.ed{
  position:absolute;
  margin-left:80%;
}
</style>
<style>
    .table td, .table th {
        font-size: 15px;
    }
</style>

</head>

<body>
               <!-------- start inserting data --------->
<div class="modal fade" id="completeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">INSERT DATA</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="addform"> 
      <div class="modal-body">
      {{csrf_field() }} 
      <div class="form-group">
        <label for="name" class="required"><b>Name: </b></label>
        <input type="name" class="form-control" id="name" aria-describedby="nameHelp"  placeholder="Enter Your Name" value="{{old('name')}}" autocomplete="off">
        <span class="text-danger" id="nameError"></span>
     </div>

     <div class="form-group">
        <label for="department" class="required"><b>Department: </b></label>
        <input type="department" class="form-control" id="department" aria-describedby="emailHelp"  placeholder="Enter your Department" value="{{old('department')}}" autocomplete="off">
        <span class="text-danger" id="departmentError"></span>
     </div>

     <div class="form-group">
        <div class="form-inline">
            <label for="" class="required"><b>Gender: </b></label>
            @foreach($gn as $gen)
            {{$gen->gender_name}}<input type="radio" name="gender" class="gender" value="{{$gen->gender_id}}" style="margin-right: 4px">
            @endforeach
          </div>
        <span class="text-danger" id="genderError"></span>
     </div>

     <div class="form-group">
        <label for="mobile" class="required"><b>Mobile: </b></label>
        <input type="mobile" class="form-control" id="mobile" aria-describedby="emailHelp"  placeholder="Enter your Mobile" value="{{old('mobile')}}" autocomplete="off">
        <span class="text-danger" id="mobileError"></span>
     </div>

     <div class="form-group">
        <label for="dob" class="required"><b>DOB: </b></label>
        <input type="date" class="form-control" id="dob" aria-describedby="emailHelp"  placeholder="Enter your DOB" value="{{old('dob')}}" autocomplete="off">
        <span class="text-danger" id="dobError"></span>
     </div>
<!-- 
     <div class="form-group">
     <label for=""><b>Age: </b><label>
    <input type="text" name="age" class='form-control' id="agg" value="{{old('age')}}" autocomplete="off">
     </div> -->

     <div class="form-group">
        <label for="address" class="required"><b>Address: </b></label>
        <input type="address" class="form-control" id="address" aria-describedby="emailHelp"  placeholder="Enter your address" value="{{old('address')}}" autocomplete="off">
        <span class="text-danger" id="addressError"></span>
     </div>

     <div class="form-group">
        <label class="state" for="" class="required"><b>State: </b></label>
       <select name="state" id="stat">
      <option value="">Select</option>
       @foreach($st as $m)
         <option value="{{$m->state_id}}">{{$m->states}}</option>
       @endforeach
    </select>
    <span class="text-danger" id="statError"></span>
     </div>

     <div class="form-group">
     <label class="user_type" for="" class="required"><b>User-Type: </b></label>
     <select name="user_type" class="select"  id="user_type">
     <option value="">Select</option>
       @foreach($us as $m)
         <option value="{{$m->user_id}}">{{$m->user_types}}</option>
       @endforeach
     </select>
     <span class="text-danger" id="user_typeError"></span>
     </div>

      <div class="form-group">
        <label for="email" class="required"><b>Email: </b></label>
        <input type="email" class="form-control" id="email" aria-describedby="emailHelp"  placeholder="Enter your email" value="{{old('email')}}" autocomplete="off">
        <span class="text-danger" id="emailError"></span>
     </div>

     <div class="form-group">
     <label for="password" class="required"><b>Password: </b></label>
    <input type="password" name='password' value="{{old('password')}}" class='form-control' id="password" autocomplete="off" >
    <span class="text-danger" id="passwordError"></span>
     </div>

      <div class="form-group">
      <label for="password_confirmation" class="required"><b>Repeat-Password: </b></label>
    <input type="password" name='password_confirmation' value="{{old('password_confirmation')}}" class='form-control' id="cpassword" autocomplete="off" >
    <span class="text-danger" id="cpasswordError"></span>
     </div>

     <div class="form-group">
     <div class="form-inline">
      <label for="checked" class="required"></label>
      <input type="checkbox" name="checked" class="checkbox form-check-input" id="ck"><b> Agree the terms and conditions.</b>
     </div>  
    <span class="text-danger" id="ckError"></span>
    </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="sub" class="btn btn-primary ">Submit</button>
      </div>
     </form> 
    </div>
  </div>
</div>

                    <!--------alert msg for data editing --------->
 <!-- <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><b>ALERT EDIT DATA</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="deleteform"> 
      <div class="modal-body">
      {{csrf_field() }} 
      <label for="id"><b>id: </b></label> -->
      <!-- <input type="hidden" id="delete_stud_id" readonly>
      <h5>Are you want to edit this Record?</h5>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">NO</button>
        <button type="button" id="update" class="edit_btn btn btn-primary ">YES</button>
      </div>
     </form> 
    </div>
  </div>
</div> -->

               <!-------- editing data start --------->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">EDIT & UPDATE DATA</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="editform"> 
      <div class="modal-body">
      {{csrf_field() }} 
      <!-- <label for="id"><b>id: </b></label> -->
      <input type="hidden" id="edit_stud_id" readonly>

      <!-- <ul id="updateform_errorlist"></ul> -->
      <div class="form-group">
        <label for="name" class="required"><b>Name: </b></label>
        <input type="name" class="form-control" id="ename" aria-describedby="nameHelp"  placeholder="Enter Your Name" value="" autocomplete="off">
        <span class="text-danger" id="enameError"></span>
     </div>

     <div class="form-group">
        <label for="department" class="required"><b>Department: </b></label>
        <input type="department" class="form-control" id="edepartment" aria-describedby="emailHelp"  placeholder="Enter your Department" value="" autocomplete="off">
        <span class="text-danger" id="edepartmentError"></span>
     </div>

     <div class="form-group">
        <div class="form-inline">
            <label for="" class="required"><b>Gender: </b></label>
            @foreach($gn as $gen)
            {{$gen->gender_name}}<input type="radio" name="gender" class="edit_gender" value="{{$gen->gender_id}}" style="margin-right: 4px">
            @endforeach
          </div>
        <span class="text-danger" id="egenderError"></span>
     </div>

     <div class="form-group">
        <label for="mobile" class="required"><b>Mobile: </b></label>
        <input type="mobile" class="form-control" id="emobile" aria-describedby="emailHelp"  placeholder="Enter your Mobile" value="" autocomplete="off">
        <span class="text-danger" id="emobileError"></span>
     </div>

     <div class="form-group">
        <label for="dob" class="required"><b>DOB: </b></label>
        <input type="date" class="form-control" id="edob" aria-describedby="emailHelp"  placeholder="Enter your DOB" value="" autocomplete="off">
        <span class="text-danger" id="edobError"></span>
     </div>

     <!-- <div class="form-group">
     <label for=""><b>Age: </b><label>
    <input type="text" name="age" class='form-control' id="agg" value="{{old('age')}}" autocomplete="off">
     </div> -->

     <div class="form-group">
        <label for="address" class="required"><b>Address: </b></label>
        <input type="address" class="form-control" id="eaddress" aria-describedby="emailHelp"  placeholder="Enter your address" value="" autocomplete="off">
        <span class="text-danger" id="eaddressError"></span>
     </div>

     <div class="form-group">
        <label class="state" for="" class="required"><b>State: </b></label>
       <select name="state" id="estat">
      <option value="">Select</option>
      @foreach($st as $m)
         <option value="{{$m->state_id}}">{{$m->states}}</option>
       @endforeach
    </select>
    <span class="text-danger" id="estatError"></span>
     </div>

     <div class="form-group">
     <label class="user_type" for="" class="required"><b>User-Type: </b></label>
     <select name="user_type" class="select"  id="euser_type">
     <option value="">Select</option>
     @foreach($us as $m)
         <option value="{{$m->user_id}}">{{$m->user_types}}</option>
       @endforeach
     </select>
     <span class="text-danger" id="euser_typeError"></span>
     </div>

      <div class="form-group">
        <label for="email" class="required"><b>Email: </b></label>
        <input type="email" class="form-control" id="eemail" aria-describedby="emailHelp"  placeholder="Enter your email" value="" autocomplete="off">
        <span class="text-danger" id="eemailError"></span>
     </div>

     <div class="form-group">
     <label for="password" class="required"><b>Password: </b></label>
    <input type="password" name='password' value="" class='form-control' id="epassword" autocomplete="off">
    <span class="text-danger" id="epasswordError"></span>
     </div>

      <div class="form-group">
      <label for="password_confirmation" class="required"><b>Repeat-Password: </b></label>
    <input type="password" name='password_confirmation' value="{{old('password_confirmation')}}" class='form-control' id="ecpassword" autocomplete="off">
    <span class="text-danger" id="ecpasswordError"></span>
     </div>

     <div class="form-group">
     <div class="form-inline">
      <label for="checked" class="required"></label>
      <input type="checkbox" name="checked" class="checkbox form-check-input" id="eck" checked><b> Agree the terms and conditions.</b>
     </div>  
     <span class="text-danger" id="eckError"></span>
    </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="update" class="btn btn-primary ">Update Data</button>
      </div>
     </form> 
    </div>
  </div>
</div> 



<div class="container"> 
    <h4 class="display-7 text-center"><b><u>STUDENT INFORMATION</u></b></h4>
    <div class="container"><button type="button" class="btn btn-dark ed" data-toggle="modal" data-target="#completeModal">
 ADD DATA
</button></div>
   </div>
   <div id="alerts"></div>

<!-- <div id="success_msg"></div> -->
        
<div class="container ml-4 mr-1 mt-0">

  <table id="form" class="table table-bordered shadow text-center table-striped"style="width:2px">
    <thead>
    <tr>
      <th style="text-align:center">id</th>
      <th style="text-align:center">Name</th>
      <th style="text-align:center">Department</th>
      <th style="text-align:center">Gender</th>
      <th style="text-align:center">Mobile</th>
      <th style="text-align:center">DOB</th>
      <th style="text-align:center">Address</th>
      <th style="text-align:center">State</th>
      <th style="text-align:center">User-Type</th>
      <th style="text-align:center">Email</th>
      <th style="text-align:center">Edit</th>
      <th style="text-align:center">Delete</th>
      <th style="text-align:center">Status</th>
    </tr>
</thead>
<tbody>
</tbody>
  </table>
</div>


<script src ="https://code.jquery.com/jquery-3.6.2.js"></script>
<script src ="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src ="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>



<script>
   $(document).ready(function(){
    $.ajaxSetup({
      headers: {
       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
     });

     var datatable=$('#form').DataTable({
      processing: true,
      serverside: true,
      ajax: '/anydata',
      columns:[
        {data:'id',name:'id'},
        {data:'Name',name:'name'},
        {data:'Department',name:'department'},
        {data:'gender_g.gender_name',name:'gender'},
        {data:'Mobile',name:'mobile'},
        {data:'DOB',name:'dob'},
        {data:'Address',name:'address'},
        {data:'state_s.states',name:'state'},
        {data:'user_u.user_types',name:'user_type'},
        {data:'Email',name:'email'},
        {data:'edit',name:'edit',orderable:'false',searchable:'false'},
        {data:'delete',name:'delete',orderable:'false',searchable:'false'},
        {data:'status',name:'status',orderable:'false',searchable:'false'},
      ]
     });
    

    // <---------------start clear data---------------->
      function clearData(){
        $('#name').val('')
        $('#department').val('');
        $('.gender:checked').val('');
        $('#mobile').val('');
        $('#dob').val('');
        $('#address').val('');
        $('#stat').val('');
        $('#user_type').val('');
        $('#email').val('');
        $('#password').val('');
        $('#cpassword').val('');
        $('#ck').val('');
        $('#nameError').text('');
        $('#departmentError').text('');
        $('#genderError').text('');
        $('#mobileError').text('');
        $('#dobError').text('');
        $('#addressError').text('');
        $('#statError').text('');
        $('#user_typeError').text('');
        $('#emailError').text('');
        $('#passwordError').text('');
        $('#cpasswordError').text('');

      }

    // <---------------end clear data---------------->

     $('#addform').on("click",'#sub',(function(e){
       e.preventDefault();
      
       var data={
       'name':$('#name').val(),
       'department':$('#department').val(),
       'gender':$('.gender:checked').val(),
       'mobile':$('#mobile').val(),
       'dob':$('#dob').val(),
       'address':$('#address').val(),
       'state':$('#stat').val(),
       'user_type':$('#user_type').val(),
       'email':$('#email').val(),
       'password':$('#password').val(),
       'password_confirmation':$('#cpassword').val(),
       'checked':$('#ck').is(':checked'),
       }
        $.ajax({
        type:"POST",
        url:"/store",
        data:data,
        success:function(response){
         console.log("inside success....")
          clearData();
          $('#addform')[0].reset();
          $('#form').DataTable().ajax.reload();
          $('#completeModal').modal('hide');
          // $('#completeModal').find('input').val("");

         
              const Msg = Swal.mixin({
                  toast: true,
                  position: 'top-end',
                  showConfirmButton: false,
                  timer: 1800
                })

                Msg.fire({
                  icon: 'success',
                  title: 'Data Added Successfully',
                })
        },
        error:function(err){
          console.log(err);
          $('#nameError').text(err.responseJSON.errors.name);
          $('#departmentError').text(err.responseJSON.errors.department);
          $('#genderError').text(err.responseJSON.errors.gender);
          $('#mobileError').text(err.responseJSON.errors.mobile);
          $('#dobError').text(err.responseJSON.errors.dob);
          $('#addressError').text(err.responseJSON.errors.address);
          $('#statError').text(err.responseJSON.errors.state);
          $('#user_typeError').text(err.responseJSON.errors.user_type);
          $('#emailError').text(err.responseJSON.errors.email);
          $('#passwordError').text(err.responseJSON.errors.password);
          $('#cpasswordError').text(err.responseJSON.errors.password_confirmation);
          $('#ckError').text(err.responseJSON.errors.checked);
        }
       });
      }));
    
     
      $('#editform').on('click','#update',function(){
        var stud_id=$('#edit_stud_id').val();
       
        var data={
       'name':$('#ename').val(),
       'department':$('#edepartment').val(),
       'gender':$('.edit_gender:checked').val(),
       'mobile':$('#emobile').val(),
       'dob':$('#edob').val(),
       'address':$('#eaddress').val(),
       'state':$('#estat').val(),
       'user_type':$('#euser_type').val(),
       'email':$('#eemail').val(),
       'password':$('#epassword').val(),
       'password_confirmation':$('#ecpassword').val(),
       'checked':$('#eck').is(':checked'),
      
       }
      //  console.log(data.gender);
       $.ajax({
        type:"POST",
        url:"/update/"+stud_id,
        // datatype:"json",
        data:data,
        success:function(response){
          console.log(response);
          // alertsSuccess("Data Updated Successfully...");

            $('#editModal').modal('hide');
            $('#addform')[0].reset();
            $('#form').DataTable().ajax.reload();
            
            const Msg = Swal.mixin({
                  toast: true,
                  position: 'top-end',
                  showConfirmButton: false,
                  timer: 1800
                })

                Msg.fire({
                  icon: 'success',
                  title: 'Data Updated Successfully',
                })
        },
        error:function(err){
          // console.log(err);
          $('#enameError').text(err.responseJSON.errors.name);
          $('#edepartmentError').text(err.responseJSON.errors.department);
          $('#egenderError').text(err.responseJSON.errors.gender);
          $('#emobileError').text(err.responseJSON.errors.mobile);
          $('#edobError').text(err.responseJSON.errors.dob);
          $('#eaddressError').text(err.responseJSON.errors.address);
          $('#estatError').text(err.responseJSON.errors.state);
          $('#euser_typeError').text(err.responseJSON.errors.user_type);
          $('#eemailError').text(err.responseJSON.errors.email);
          $('#epasswordError').text(err.responseJSON.errors.password);
          $('#ecpasswordError').text(err.responseJSON.errors.password_confirmation);
          $('#eckError').text(err.responseJSON.errors.checked);
        }

      });

     });

    
});

function edit_func(id){
  $('#editModal').modal('show');

       $.ajax({
        type:"GET",
        url:"/edit/"+id,
        // datatype:"json",
        success:function(response){
          // console.log(response);
        
             $('#ename').val(response.post.Name);
             $('#edepartment').val(response.post.Department);
            //  $('.edit_gender:checked').val(response.post.gender);
             let gender_val=response.post.gender;
             $("input[name=gender][value="+gender_val+"]").attr('checked','checked');
             $('#emobile').val(response.post.Mobile);
             $('#edob').val(response.post.DOB);
             $('#eaddress').val(response.post.Address);
             $('#estat').val(response.post.state);
             $('#euser_type').val(response.post.userType);
             $('#eemail').val(response.post.Email);
             $('#epassword').val(response.post.Password);
             $('#ecpassword').val(response.post.repeatPassword);
             $('#eck').is(':checked');
             $('#edit_stud_id').val(id);
          
         }
        })
}

function del_func(id){
         
  Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to recover this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
 }).then((result) => {
      if (result.isConfirmed) {
       $.ajax({
        type:"GET",
        url:"/delete/"+id,
        success:function(response){
          $('#form').DataTable().ajax.reload();
          Swal.mixin({
                  toast: true,
                  position: 'top-end',
                  showConfirmButton: false,
                  timer: 1800
                })
          Swal.fire(
              'Deleted!',
              'Your file has been deleted.',
              'success'
             )
        },error:function(err){
          console.log(err);
        }
       });
   
      }
    })
    

     };

     function sta_func(id){
      $.ajax({
        type:"GET",
        url:"/status/"+id,
        success:function(response){
          // console.log(response);
          $('#form').DataTable().ajax.reload();
            
            const Msg = Swal.mixin({
                  toast: true,
                  position: 'top-end',
                  showConfirmButton: false,
                  timer: 1800
                })

                Msg.fire({
                  icon: 'success',
                  title: 'Status Changed Successfully',
                })
        },
        error:function(err){
          console.log(err);
        }
       });

     }
  
  

  </script>
 </body>
</html>

<!-- //  https://www.softaox.info/ajax-popup-view-add-and-update-data-using-php-mysql/ 



        
     








