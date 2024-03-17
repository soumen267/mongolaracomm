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
                  <li class="breadcrumb-item active" aria-current="page"><span style="margin-left:3px;">Clients</span></li>
                </ol>
              </nav>
            </div>
            <div class="col-lg-6">
              <button type="button" class="float-right btn btn-danger btn-circle add-client">
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
                  @sortablelink('company', 'Company')
                </th>
                <th>@sortablelink('owner', 'Owner')</th>
                <th>@sortablelink('pending_project', 'Pending Project')</th>
                <th>@sortablelink('invoices', 'Invoices')</th>
                <th>tags</th>
                <th>@sortablelink('category', 'Category')</th>
                <th>@sortablelink('status', 'Status')</th>
                <th>
                  @sortablelink('created_at', 'Created')                  
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
            <tbody id="clientsdata">
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@include('modals.addclientsmodal')
@include('modals.editclientsmodal')
@include('modals.useremailsend')
<script>
$(document).ready(function(){
  $("#myModal").hide();
  var clientsdata = {{ Js::from($getClients) }};
  loadData(clientsdata)
  if(clientsdata.length == 'undefined' || clientsdata.length < 1){
    $("#clientsdata").append('<tr><td colspan="11">No data found</td></tr>');
  }
})
function loadData(clientsdata){
  var clientsdataHTML = "";
  $.each(clientsdata, function (indexInArray, item) {
    if(item.image == ''){
      $("#myimage").hide();
    }
    clientsdataHTML += `<tr>
                <td>
                  ${item.company}
                </td>
                <td>
                  ${item.owner}
                </td>
                <td>
                  ${item.pending_project}
                </td>
                <td>
                  ${item.invoices}
                </td>
                <td>
                  ${item.tags}
                </td>
                <td>
                  ${item.category}
                </td>
                <td>
                  ${item.status}
                </td>
                <td>
                  ${item.created_at}
                </td>
                <td>
                  <button type="button" class="rm-circ btn btn-outline-success btn-circle btn-sm edit-client" data-id="${item._id}"><i class="fa fa-edit" title="Edit"></i></button>
                </td>
                <td>
                  <form method="POST" action="{ route('client.destroy', ${item._id}) }">
                    @csrf
                    <input name="_method" type="hidden" value="DELETE">
                    <button type="button" class="rm-circ btn btn-outline-danger btn-circle btn-sm delete-client" data-id="${item._id}"><i class="fa fa-trash" title="Delete"></i></button>
                  </form>
                </td>
                <td>
                  <button type="button" class="rm-circ btn btn btn-outline-warning btn-circle btn-sm email-client" data-id="${item._id}"><i class="fa fa-envelope" title="Send Mail"></i></button>
                </td>                
              </tr>`;
  })
  $('#clientsdata').html(clientsdataHTML);
}
$(document).on("click", ".add-client", function (e) { 
    e.preventDefault();
    $('#addclientmodel').modal('show');
    $("#addclientform")[0].reset();
   $(".texterror").empty();
   $(".form-control").removeClass('is-invalid');
 });
 $("#addclientdata").on("click", function (e) {
    e.preventDefault();
    var datas = $("#addclientform").serialize();
    var url = "{{ route('client.store') }}";
    var method = "POST";
    var resultData = addData(datas,url,method);
  })
  $(".btn-closed").click(function(){
      $('#addclientmodel').modal('hide');
      $('#editclientmodel').modal('hide');
      
  })
  $(document).on("click", ".edit-client", function(e){
        e.preventDefault()
        var userId = $(this).attr("data-id");
        var url = "clients/edit/"+userId;
        var res = editData(userId,url);
        $('#editclientmodel').modal('show');
        $("#userid").val(res.getClientsData._id)
        $("#input-company").val(res.getClientsData.company)
        $("#input-owner").val(res.getClientsData.owner)
        $("#input-project").val(res.getClientsData.pending_project)
        $("#input-invoices").val(res.getClientsData.invoices)
        // $('#tag').tagsinput('add', response.tags);
        // var temp = response.tags.split(",");
        // for (var i = 0; i < temp.length; i++)
        // {
        //     $('#tag').tagsinput('add', temp[i]);
        // }
        $("#input-category").val(res.getClientsData.category)
        $("#input-status").val(res.getClientsData.status)
  });
  $('#updateclientdata').on("click",function(e) {
    e.preventDefault()
    var userIds = $("#userid").val();
    var _token = $("input[name='_token']").val();
    var datas = $("#editclientform").serialize();
    var url = "{{ route('client.update') }}";
    var method = "PUT";
    var updateData = addData(datas,url,method);
  });
  $(document).on('click', ".delete-client", function (e) {
    e.preventDefault();
    var userIds = $(this).attr("data-id");
    var _token = $("input[name='_token']").val();
    swal({
            title: `Are you sure you want to delete this row?`,
            text: "It will gone forevert",
            icon: "warning",
            buttons: true,
            dangerMode: true,
    }).then((willDelete) => {
      var url = "clients/delete/"+userIds;
      var method = "DELETE";
      var datas = userIds;
      deleteData(url,method,datas)
    })
  })
</script>
@endsection