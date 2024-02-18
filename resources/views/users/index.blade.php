@extends('layouts.app')
@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Striped Table</h4>
        <p class="card-description">
          Add class <code>.table-striped</code>
        </p>
        <div class="template-demo">
          <div class="row">
            <div class="col-lg-6">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-custom" style="border:none!important">
                  <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page"><span style="margin-left:3px;">User</span></li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6">
              <button type="button" class="float-right btn btn-danger btn-circle add-user">
                <i class="fa fa-plus"></i>
              </button>
            </div>
          </div>
        </div>
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>
                  User
                </th>
                <th>
                  Name
                </th>
                <th>Email</th>
                <th>
                  Created
                </th>
                <th colspan="3">
                  Action
                </th>
              </tr>
            </thead>
            <tbody id="usersdata">
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@include('modals.addmodal')
@include('modals.errormodal')
@include('modals.editmodal')
<script>
$(document).ready(function(){
  $("#myModal").hide();
  var userdata = {{ Js::from($getUsers) }};
  loadData(userdata)
})
function loadData(userdata){
  var userdataHTML = "";
  $.each(userdata, function (indexInArray, item) {
    userdataHTML += `<tr>
                <td class="py-1">
                  <img src="{{ asset("assets/images/faces/face1.jpg") }}" alt="image"/>
                </td>
                <td>
                  ${item.name}
                </td>
                <td>
                  ${item.email}
                </td>
                <td>
                  May 15, 2015
                </td>
                <td>
                  <button type="button" class="btn btn-primary btn-sm edit-user" data-id="${item._id}"><i class="fa fa-edit"></i></button>
                </td>
                <td>
                  <form method="POST" action="{ route('users.destroy', ${item._id}) }">
                    @csrf
                    <input name="_method" type="hidden" value="DELETE">
                    <button type="button" class="btn btn-danger btn-sm delete-user" data-id="${item._id}"><i class="fa fa-trash"></i></button>
                  </form>
                </td>
                <td>
                  <i class="fa fa-envelope"></i>
                </td>                
              </tr>`;
  })
  $('#usersdata').html(userdataHTML);
}
$(document).on("click", ".add-user", function (e) { 
    e.preventDefault();
    $('#addusermodel').modal('show');
 });
 $("form#adduserform").on("submit",function (e) {
    e.preventDefault();
    // $("#myModal").show();
    // var errorMesage = [];
    // var name1 = $("#input-name").val();
    // var email1 = $("#input-email").val();
    // var emailReg = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    // var password1 = $("#input-password").val();
    // if(name1 == ''){
    //     //$("#input-name").addClass('invalid-feedback');
    //     errorMesage.push($("#input-name").attr("data-error"))
    // }else{
    //     $("#input-name").removeClass('invalid-feedback');
    // }
    // if(password1 == ''){
    //     //$("#input-password").addClass('invalid-feedback');
    //     errorMesage.push($("#input-password").attr("data-error"))
    // }else{
    //     $("#input-password").removeClass('invalid-feedback');
    // }
    // if(email1 == ''){
    //     errorMesage.push($("#input-email").attr("data-error"))
    //     //$("#input-email").addClass('invalid-feedback');
    // }else if(emailReg.test(email1) == false){
    //     errorMesage.push("Please enter a valid email");
    // }else{
    //     $("#input-email").removeClass('invalid-feedback');
    // }
    // let ul = `<ul type="none">${errorMesage.map(data =>
    //             `<li>${data}</li>`).join('')}
    //           </ul>`;
    // $(".modal-body1").html(ul);
    // if(errorMesage.length == 0){
    // $("#myModal").hide();
    var formData = new FormData(this);
    $.ajax({
      type: "POST",
      url: "{{ route('users.store') }}",
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      cache: false,
      contentType: false,
      processData: false,
      data: formData,
      dataType: "json",
      success: function (response) {
        loadData(response.getUsersData);
      },
      complete: function (datas) {
        //$(".btn-closed").trigger("click");
     },
    });
    //}
  })
$(document).on("click", ".edit-user", function(){
        var userId = $(this).attr("data-id");
        console.log(userId);
        $.ajax({
          type: "GET",
          url: "users/"+userId+"/edit",
          data: {"id": userId},
          dataType:"json",
          success: function (response) {
            $('#exampleModal-2').modal('show');
            $("#userid").val(response._id)
            $("#name").val(response.name)
            $("#email").val(response.email)
            //$("#password").val(response.password)
          }
        });
  });
  $(".btn-closed").click(function(){
      $('#exampleModal-2').modal('hide');
      $('#addusermodel').modal('hide');
  })
  $(".editUser").click(function (e) { 
    e.preventDefault();
    var userIds = $("#userid").val();
    var _token = $("input[name='_token']").val();
    $.ajax({
      type: "POST",
      url: "users/"+userIds,
      data: $("#updateform input").serialize(),
      dataType: "json",
      success: function (response) {
        loadData(response.getUsersData);
        $(".btn-closed").trigger("click");
      },
      error: function (data) {
        console.log(data)
      },
      complete: function (datas) {
        $(".btn-closed").trigger("click");
     }
    });
  });
  $(".delete-user").click(function (e) {
    console.log("hi");
    e.preventDefault();
    var userIds = $(this).attr("data-id");
    $.ajax({
      type: "DELETE",
      url: "users/"+userIds,
      data: {'_token': '{{ csrf_token() }}','userIds':userIds},
      dataType: "json",
      success: function (response) {
      },
      error: function (data) {
        console.log(data)
      },
      complete: function (datas) {
        $(".btn-closed").trigger("click");
     }
    });
});
</script>
@push('script')
<script>
    function imagePreview(fileInput) {
    if (fileInput.files && fileInput.files[0]) {
        var fileReader = new FileReader();
        fileReader.onload = function (event) {
            $('#preview').html('<img src="'+event.target.result+'" width="89" height="80"/>');
        };
        fileReader.readAsDataURL(fileInput.files[0]);
    }
}
$("#exampleInputFile").change(function () {
    imagePreview(this);
});
</script>    
@endpush
@endsection