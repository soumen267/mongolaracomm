//Add Data
function addData(datas,url,method){
$(".form-control").removeClass('is-invalid');
$(".texterror").empty();
var results = '';
$.ajax({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    type: method,
    url: url,
    data: datas,
    dataType: "json",
    async: false,
    success: (response) =>{
      result = response;
      $(".btn-closed").trigger("click");
      loadData(response.getClientsData);
      swal({
         title: response.message,
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
  return results;
}

function editData(userId,url){
        $(".texterror").empty();
        $(".form-control").removeClass('is-invalid');
        var result = '';
        $.ajax({
          type: "GET",
          url: url,
          data: {"id": userId},
          dataType:"json",
          async: false,
          success: function (response) {
            result = response;
          }
        });
      return result;
}

function deleteData(url,method,datas){
  $.ajax({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    type: method,
    url: url,
    data: {"userId": datas},
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
    }
  });
}