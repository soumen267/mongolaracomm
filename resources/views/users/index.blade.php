@extends('layouts.app')
@section('content')
@push('style_src')
<link rel="stylesheet" href="{{ asset("assets/vendors/summernote/dist/summernote-bs4.css") }}">
@endpush
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
          <table class="table m-t-0 m-b-0 table-hover no-wrap">
            <thead>
              <tr>
                <th>
                  User
                </th>
                <th>
                  @sortablelink('name', 'Name')
                </th>
                <th>@sortablelink('email', 'Email')</th>
                <th>@sortablelink('phone', 'Phone')</th>
                <th>
                  @sortablelink('created_at', 'Created')                  
                </th>
                <th>
                  Last Seen
                </th>
                <th>
                  Action
                </th>
                <th>
                </th>
                <th>
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
  {{-- @if(Cache::has('user-is-online-' . $user->id))
  <span class="text-success">Online</span>
  @else
  <span class="text-secondary">Offline</span>
  @endif --}}
@include('modals.addmodal')
@include('modals.errormodal')
@include('modals.editmodal')
@include('modals.useremailsend')
<script>
$(document).ready(function(){
  $("#myModal").hide();
  var userdata = {{ Js::from($getUsers) }};
  loadData(userdata)
})
function loadData(userdata){
  var userdataHTML = "";
  $.each(userdata, function (indexInArray, item) {
    if(item.image == ''){
      $("#myimage").hide();
    }
    userdataHTML += `<tr>
                <td class="py-1" id="myimage">
                    <img src="storage/images/users/${item.image}" alt="image"/>  
                </td>
                <td>
                  ${item.name}
                </td>
                <td>
                  ${item.email}
                </td>
                <td>
                  ${item.phone}
                </td>
                <td>
                  ${item.created_at}
                </td>
                <td>0 minutes ago</td>
                <td>
                  <button type="button" class="rm-circ btn btn-outline-success btn-circle btn-sm edit-user" data-id="${item._id}"><i class="fa fa-edit" title="Edit"></i></button>
                </td>
                <td>
                  <form method="POST" action="{ route('users.destroy', ${item._id}) }">
                    @csrf
                    <input name="_method" type="hidden" value="DELETE">
                    <button type="button" class="rm-circ btn btn-outline-danger btn-circle btn-sm delete-user" data-id="${item._id}"><i class="fa fa-trash" title="Delete"></i></button>
                  </form>
                </td>
                <td>
                  <button type="button" class="rm-circ btn btn btn-outline-warning btn-circle btn-sm email-user" data-id="${item._id}"><i class="fa fa-envelope" title="Send Mail"></i></button>
                </td>                
              </tr>`;
  })
  $('#usersdata').html(userdataHTML);
}
$(document).on("click", ".add-user", function (e) { 
    e.preventDefault();
    $('#addusermodel').modal('show');
    $("#adduserform")[0].reset();
   $(".texterror").empty();
   $(".form-control").removeClass('is-invalid');
 });
 $("#adduserform").submit(function (e) {
    e.preventDefault();
    $(".form-control").removeClass('is-invalid');
    $(".texterror").empty();
    let formData = new FormData(this);
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type: "POST",
      url: "{{ route('users.store') }}",
      data: formData,
      contentType: false,
      processData: false,
      dataType: "json",
      success: (response) =>{
        loadData(response.getUsersData);
        $(".btn-closed").trigger("click");
        swal({
           title: `User Added`,
           icon: "success",
        })
      },
      error: (err)=>{
        let error = err.responseJSON;
           $.each(error.errors, function (index, value) {
              $(`#${index}`).removeClass("is-invalid");
              $(`#${index}`).addClass("is-invalid");
              $(document).find('[name='+index+']').after('<span class="texterror" style="color:red">' +value+ '</span>')
        });
      },
    });
    //}
  })
$(document).on("click", ".edit-user", function(){
        var userId = $(this).attr("data-id");
        $(".texterror").empty();
        $(".form-control").removeClass('is-invalid');
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
            $("#phone").val(response.phone)
            //$("#password").val(response.password)
          }
        });
  });
  $(".btn-closed").click(function(){
      $('#exampleModal-2').modal('hide');
      $('#addusermodel').modal('hide');
      $('#useremail').modal('hide');
  })
  // $(".editUser").click(function (e) { 
  $('#updateform').submit(function(e) {
    e.preventDefault()
    $(".form-control").removeClass('is-invalid');
    $(".texterror").empty();
    let formData = new FormData(this);
    var userIds = $("#userid").val();
    var _token = $("input[name='_token']").val();
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type: "POST",
      url: "users/"+userIds,
      data: formData,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function (response) {
        loadData(response.getUsersData);
        $(".btn-closed").trigger("click");
      },
      error: function(err){
            let error = err.responseJSON;
            $.each(error.errors, function (index, value) {
              console.log(index);
                $(`#${index}`).removeClass("is-invalid");
                $(`#${index}`).addClass("is-invalid");
                $(document).find('[name='+index+']').after('<span class="texterror" style="color:red">' +value+ '</span>')
          });
       },
    });
  });
  $(document).on('click', ".delete-user", function (e) {
    e.preventDefault();
    var userIds = $(this).attr("data-id");
    swal({
            title: `Are you sure you want to delete this row?`,
            text: "It will gone forevert",
            icon: "warning",
            buttons: true,
            dangerMode: true,
    }).then((willDelete) => {
      $.ajax({
        type: "DELETE",
        url: "users/"+userIds,
        data: {'_token': '{{ csrf_token() }}','userIds':userIds},
        dataType: "json",
        success: function (response) {
          swal({
                title: `Deleted`,
                icon: "success",
              })
              loadData(response.getUsersData);
        },
        error: function (data) {
          console.log(data)
        },
        complete: function (datas) {
          $(".btn-closed").trigger("click");
      }
      });
    })
});
$(document).on("click", ".email-user", function(e){
  e.preventDefault()
  var userId = $(this).attr('data-id');
  $.ajax({
    type: "GET",
    url: "{{ route('user.getdata') }}",
    data: {'_token': '{{ csrf_token() }}','userID': userId},
    dataType: "json",
    success: function (response) {
      $("#useremail").modal('show');
      $("#emailuserid").val(userId)
      $("#toname").val(response.getUsername);
      $("#form").val(response.fromEmail);
    }
  });
});
$(document).on("click", ".sendMail", function(e){
  e.preventDefault()
  $(".form-control").removeClass('is-invalid');
  $(".texterror").empty();
  $.ajax({
    type: "POST",
    url: "{{ route('user.send') }}",
    data: $("#useremailForm").serialize(),
    dataType: "json",
    success: function (response) {
      console.log(response)
      $("#useremail").modal('hide');
    },
    error: function(err){
            let error = err.responseJSON;
            $.each(error.errors, function (index, value) {
                $(`#${index}`).removeClass("is-invalid");
                $(`#${index}`).addClass("is-invalid");
                $(document).find('[name='+index+']').after('<span class="texterror" style="color:red">' +value+ '</span>')
          });
    },
    complete: function(){
      $("#useremail").modal('hide');
    }
  });
})
</script>
@push('script')
<script src="{{ asset("assets/vendors/summernote/dist/summernote-bs4.min.js")}}"></script>
<script src="{{ asset("assets/js/dropify.js") }}"></script>
<script>
    $('#summernote').summernote();
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