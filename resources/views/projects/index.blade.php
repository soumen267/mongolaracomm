@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <div class="template-demo">
        <div class="row">
          <div class="col-lg-3">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb breadcrumb-custom" style="border:none!important">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span style="margin-left:3px;">Project</span></li>
              </ol>
            </nav>
          </div>
          <div class="col-lg-9">
            <button type="button" class="float-right btn btn-danger btn-circle add-project">
              <i class="fa fa-plus"></i>
            </button>
          </div>
        </div>
      </div>
    <div class="row grid-margin">
        <div class="col-12">
          <div class="card card-statistics">
            <div class="card-body">
              <div class="d-flex flex-column flex-md-row align-items-center justify-content-between">
                  <div class="statistics-item">
                    <p>
                      <i class="icon-sm fa fa-user mr-2"></i>
                      All
                    </p>
                    <h4>54000</h4>
                  </div>
                  <div class="statistics-item">
                    <p>
                      <i class="icon-sm fas fa-hourglass-half mr-2"></i>
                      In Progress
                    </p>
                    <h4>123.50</h4>
                  </div>
                  <div class="statistics-item">
                    <p>
                      <i class="icon-sm fas fa-cloud-download-alt mr-2"></i>
                      On Hold
                    </p>
                    <h4>3500</h4>
                  </div>
                  <div class="statistics-item">
                    <p>
                      <i class="icon-sm fas fa-check-circle mr-2"></i>
                      Complete
                    </p>
                    <h4>7500</h4>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="btn-group alldel" role="group" aria-label="Basic example" style="display:none">
            <button type="button" class="btn btn-primary delete_all" data-url="{{ route('project.deleteAll') }}">Delete</button>
            <button type="button" class="btn btn-primary">Change Status</button>
            <button type="button" class="btn btn-primary">Assign Users</button>
         </div>
        <div class="col-md-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                            <input type="checkbox" id="master">
                            ID
                          </th>
                          <th>
                            Title
                          </th>
                          <th>Client</th>
                          <th>
                            Start Date
                          </th>
                          <th>
                            Due Date
                          </th>
                          <th>
                            Tags
                          </th>
                          <th>
                            Progress
                          </th>
                          <th colspan="4">
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody id="projectsdata">
                      </tbody>
                    </table>
                  </div>
            </div>
          </div>
        </div>
      </div>
</div>
@include('modals.addprojectmodal')
@include('modals.editprojectmodal')
@include('modals.assignmodel')
@push('script')
<script>
    $(document).ready(function(){
      var projectdata = {{ Js::from($getProjects) }};
      loadData(projectdata)
    })
    function loadData(projectdata){
      var projectdataHTML = "";
      $.each(projectdata, function (indexInArray, item) {
        projectdataHTML += `<tr>
                    <td class="py-1">
                        <input type="checkbox" class="sub_chk" data-id="${item._id}">
                        ${++indexInArray}
                    </td>
                    <td>
                      ${item.title}
                    </td>
                    <td>
                      ${item.client}
                    </td>
                    <td>
                        ${item.startdate}
                    </td>
                    <td>
                        ${item.duedate}
                    </td>
                    <td>
                        <input id="form-tags-1" name="tags-1" type="hidden" data-role="tagsinput" value="${item.tag}">
                        <span class="badge badge-success badge-pill">${item.tag}</span>
                    </td>
                    <td>
                       <div class="progress">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: ${item.progress}%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                       </div>
                    </td>
                    <td>
                      <button type="button" class="btn btn-primary btn-sm edit-project" data-id="${item._id}"><i class="fa fa-edit" title="Edit"></i></button>
                    </td>
                    <td>
                      <form method="POST" action="{ route('users.destroy', ${item._id}) }">
                        @csrf
                        <input name="_method" type="hidden" value="DELETE">
                        <button type="button" class="btn btn-danger btn-sm delete-project bl" data-id="${item._id}"><i class="fa fa-trash" title="Delete"></i></button>
                      </form>
                    </td>
                    <td>
                      <button type="button" class="btn btn-primary btn-sm assign-user bl" data-id="${item._id}"><i class="fa fa-user" title="Assigned User"></i></button>
                    </td>
                    <td>
                        <button type="button" class="btn btn-primary btn-sm clone-project bl" data-id="${item._id}"><i class="fa fa-clone" title="Cloned Project"></i></button>
                    </td>                
                  </tr>`;
      })
      $('#projectsdata').html(projectdataHTML);
    }
$(document).on("click", ".add-project", function (e) { 
   e.preventDefault();
   $(".modal-body").hide();
   setTimeout(() => {
      $(".modal-body").slideDown(); 
   }, 500);
   $('#addproject').modal('show');
   $("#addprojectform")[0].reset();
   $(".texterror").empty();
   $(".form-control").removeClass('is-invalid');
});
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$("#addprojectdata").click(function (e) {
    $(".texterror").empty();
    $(".form-control").removeClass('is-invalid');
    e.preventDefault();
    $.ajax({
      method: "POST",
      url: "/project/store",
      data: $("#addprojectform").serialize(),
      dataType: "json",
      success: function (response) {
        loadData(response);
        $(".btn-closed").trigger("click");
      },
      error: function(err){
        let error = err.responseJSON;
           $.each(error.errors, function (index, value) {
            console.log(index);
              $(`#${index}`).removeClass("is-invalid");
              $(`#${index}`).addClass("is-invalid");
              // $('.formerrors').append('<span class="text-danger">'+value+'<span>'+'<br>');
              $(document).find('[name='+index+']').after('<span class="texterror" style="color:red">' +value+ '</span>')
        });
      }
    //   complete: function (datas) {
    //     $(".btn-closed").trigger("click");
    //  }
    });
  });
  $('body').on("click", ".edit-project", function(e){
        e.preventDefault()
        $(".texterror").empty();
        $(".form-control").removeClass('is-invalid');
        var userId = $(this).attr("data-id");
        $.ajax({
          type: "GET",
          url: "{{ route('project.edit') }}",
          data: {"id": userId},
          dataType:"json",
          success: function (response) {
            console.log(response);
            $('#editproject').modal('show');
            $(".modal-body").hide();
            setTimeout(() => {
                $(".modal-body").slideDown(); 
            }, 500);
            $("#userid").val(response._id)
            $(".client").val(response.client)
            $(".title").val(response.title)
            $(".startdate").val(response.startdate)
            $(".duedate").val(response.duedate)
            $(".tag").val(response.tag)
            $(".progress").val(response.progress)
          }
        });
});
$('body').on("click", ".assign-user", function(e){
        e.preventDefault()
        var projectId = $(this).attr("data-id");
        $.ajax({
          type: "GET",
          url: "{{ route('project.assign') }}",
          dataType:"json",
          data: {"projectId": projectId},
          success: function (response) {
            console.log(response);
            $('#assignmodel').modal('show');
            $("#projectid").val(projectId)
            $("#user").val(response.getUserName);
            $.each(response.getUsers,function(key, value)
              {
                $("#user").append('<option value=' + value._id + '>' + value.name + '</option>'); // return empty
              });
          }
        });
});

$(document).on("click", "#addassdata", function (e) {
  e.preventDefault()
  $.ajax({
    type: "post",
    url: "{{ route('project.assignstore') }}",
    data: $("#assignform").serialize(),
    dataType: "json",
    success: function (response) {
      console.log(response);
    }
  });
});


$(document).on("click", "#editprojectdata", function(e){
  e.preventDefault();
  $(".texterror").empty();
  $(".form-control").removeClass('is-invalid');
$.ajax({
      method: "PUT",
      url: "project/update",
      data: $("#editprojectform").serialize(),
      dataType: "json",
      success: function (response) {
        loadData(response.getProjectsData);
        //toastr.success(res.message);
        console.log(response);
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
  

  $(".btn-closed").click(function(){
      $('#addproject').modal('hide');
      $('#editproject').modal('hide');
      $('#assignmodel').modal('hide');
  })

  $('#master').on('click', function(e) {  
         if($(this).is(':checked',true))    
         { 
            $(".alldel ").show();
            $(".sub_chk").prop('checked', true);    
         } else {    
            $(".sub_chk").prop('checked',false);    
            $(".alldel ").hide();
         }    
  });
  $('.delete_all').on('click', function(e) { 
    var allVals = [];
    $(".sub_chk:checked").each(function() {    
       allVals.push($(this).attr('data-id'));  
    });
    if(allVals.length <=0)    
        {    
          alert("Please select row.");   
        }  else {
        var check = confirm("Are you sure you want to delete this row?");
        if(check == true){
            var join_selected_values = allVals.join(",");
            $.ajax({  
                url: $(this).data('url'),  
                type: 'DELETE',  
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},  
                data: 'ids='+join_selected_values,  
                success: function (data) {  
                       if (data['success']) {  
                           $(".sub_chk:checked").each(function() {    
                           $(this).parents("tr").remove();  
                          });  
                             alert(data['success']);  
                            } else if (data['error']) {  
                                alert(data['error']);  
                            } else {  
                                alert('Whoops Something went wrong!!');  
                            }  
                        },  
                        error: function (data) {  
                            alert(data.responseText);  
                        }
            });
            $.each(allVals, function( index, value ) {  
               $('table tr').filter("[data-row-id='" + value + "']").remove();
            }); 
        }
        }
  })
//   $('[data-toggle=confirmation]').confirmation({
//        rootSelector: '[data-toggle=confirmation]',
//        onConfirm: function (event, element) {
//        element.trigger('confirm');
//    }
//   });
  $(document).on('confirm', function (e) {
            var ele = e.target;
            e.preventDefault();


            $.ajax({
                url: ele.href,
                type: 'DELETE',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                success: function (data) {
                    if (data['success']) {
                        $("#" + data['tr']).slideUp("slow");
                        alert(data['success']);
                    } else if (data['error']) {
                        alert(data['error']);
                    } else {
                        alert('Whoops Something went wrong!!');
                    }
                },
                error: function (data) {
                    alert(data.responseText);
                }
            });


            return false;
        });
$(document).on('click', ".clone-project", function (e) {
    e.preventDefault();
    var ids = $(this).attr("data-id");
    $.ajax({
        type: "POST",
        url: "{{ route('project.copy') }}",
        data: {"ids":ids},
        dataType: "json",
        success: function (response) {
            loadData(response.getProjects); 
        }
    });
});
$(document).on('click', ".delete-project", function (e) {
    e.preventDefault();
    var ids = $(this).attr("data-id");
    swal({
            title: `Are you sure you want to delete this row?`,
            text: "It will gone forevert",
            icon: "warning",
            buttons: true,
            dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            $.ajax({
                type: "POST",
                url: "{{ route('project.delete') }}",
                data: {"ids":ids},
                dataType: "json",
                success: function (response) {
                    swal({
                        title: `Deleted`,
                        icon: "success",
                    })
                    loadData(response.getProjectsData);
                }
            });
        }
    });
});
</script>
<script type="text/javascript">
  $(function(){
      var dtToday = new Date();
   
      var month = dtToday.getMonth() + 1;
      var day = dtToday.getDate();
      var year = dtToday.getFullYear();
      if(month < 10)
          month = '0' + month.toString();
      if(day < 10)
       day = '0' + day.toString();
      var maxDate = year + '-' + month + '-' + day;
      $('#startdate').attr('min', maxDate);
      $('#enddate').attr('min', maxDate);
  });
</script>
<script type="text/javascript">
$(document).ready(function() {
    setTimeout(() => {
      $(".loader").hide();
    }, 500);
    $('.select2').select2({
    closeOnSelect: false
    });
});
</script>
@endpush
@endsection