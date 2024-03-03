@extends('layouts.app')
@section('content')
@push('style')
<style>
    .switch {
      position: relative;
      display: inline-block;
      width: 63px;
      height: 28px;
      float: right;
    }
    
    .switch input { 
      opacity: 0;
      width: 0;
      height: 0;
    }
    
    .slider {
      position: absolute;
      cursor: pointer;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: #ccc;
      -webkit-transition: .4s;
      transition: .4s;
    }
    
    .slider:before {
      position: absolute;
      content: "";
      height: 22px;
      width: 25px;
      left: 4px;
      bottom: 4px;
      background-color: white;
      -webkit-transition: .4s;
      transition: .4s;
    }
    
    input:checked + .slider {
      background-color: #2196F3;
    }
    
    input:focus + .slider {
      box-shadow: 0 0 1px #2196F3;
    }
    
    input:checked + .slider:before {
      -webkit-transform: translateX(26px);
      -ms-transform: translateX(26px);
      transform: translateX(26px);
    }
    
    /* Rounded sliders */
    .slider.round {
      border-radius: 34px;
    }
    
    .slider.round:before {
      border-radius: 50%;
    }
</style>
<link rel="stylesheet" href="{{ asset("assets/vendors/summernote/dist/summernote-bs4.css") }}">
@endpush
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">{{ $getProject->title }}</h4>
                    <p class="card-description">Horizontal bootstrap tab</p>
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active show" id="home-tab" data-toggle="tab" href="#home-1" role="tab"
                                aria-controls="home-1" aria-selected="true">Overview</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile-1" role="tab"
                                aria-controls="profile-1" aria-selected="false">Details</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact-1" role="tab"
                                aria-controls="contact-1" aria-selected="false">Task</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="home-1" role="tabpanel" aria-labelledby="home-tab">
                            <div class="media">
                                <img class="mr-3 w-25 rounded" src="../../images/samples/300x300/13.jpg"
                                    alt="sample image">
                                <div class="media-body">
                                    <h4 class="mt-0">Why choose us?</h4>
                                    <p>
                                        Far curiosity incommode now led smallness allowance. Favour bed assure son
                                        things yet. She consisted
                                        consulted elsewhere happiness disposing household any old the. Widow downs you
                                        new shade drift hopes
                                        small. So otherwise commanded sweetness we improving. Instantly by daughters
                                        resembled unwilling principle
                                        so middleton.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile-1" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="media">
                                <img class="mr-3 w-25 rounded" src="../../images/faces/face12.jpg" alt="sample image">
                                <div class="media-body">
                                    <h4 class="mt-0">John Doe</h4>
                                    <p>
                                        Fail most room even gone her end like. Comparison dissimilar unpleasant six
                                        compliment two unpleasing
                                        any add. Ashamed my company thought wishing colonel it prevent he in. Pretended
                                        residence are something
                                        far engrossed old off.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="contact-1" role="tabpanel" aria-labelledby="contact-tab">
                            <div class="task_box">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                        <h6 class="card-title">New</h6>
                                        <span class="addTask float-right" data-id="{{ $getProject->_id }}">
                                        <i class="fas fa-plus"></i>
                                        </span>
                                        </div>
                                        <div id="dragula-event-left" class="py-2 column">
                                            <div class="card rounded border mb-2 list-group-item" draggable="true">
                                                <div class="card-body p-3">
                                                    <div class="media">
                                                        <i
                                                            class="fa fa-check icon-sm align-self-center mr-3 text-primary"></i>
                                                        <div class="media-body">
                                                            <h6 class="mb-1">Prohect details</h6>
                                                            <p class="mb-0 text-muted">
                                                                Get new project details from Greg
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h6 class="card-title">In progress</h6>
                                        <div id="dragula-event-right" class="py-2 column">
                                            <div class="card rounded border mb-2 list-group-item" draggable="true">
                                                <div class="card-body p-3">
                                                    <div class="media">
                                                        <i
                                                            class="fa fa-check icon-sm align-self-center mr-3 text-success"></i>
                                                        <div class="media-body">
                                                            <h6 class="mb-1">Book flight</h6>
                                                            <p class="mb-0 text-muted">
                                                                Book flight tickets
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
@include('modals.addtaskmodal');
</div>
@push('script_src')
<script src= "https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
@endpush
@push('script')
<script type="text/javascript">
    $('.column').sortable({
        connectWith: '.column',
        cursor: "move",
        ghostClass: "blue-background-class",
    });
    
    // $('.list-group-item').click(function (event) {
    //     event.preventDefault();
    //     var id = $(this).attr('data-id');
    //     var status = $(this).parent().attr('id');
    //     $.ajax({
    //         url: "<?php echo URL('/update_task') ?>",
    //         data: 'status=' + status + '&id=' + id,
    //         type: "get",
    //         success: function (data) {
    //             alert(data);
    //         }
    //     });
    // });
</script>
<script>
    $(".addTask").click(function () {
        $("#addtaskmodal").modal('show');
        var projID = $(this).attr('data-id');
        check();
        $.ajax({
            type: "GET",
            data: {"projID": projID},
            url: "{{ route('project.taskAssign') }}",
            dataType: "json",
            success: function (response) {
              $(".projectid").val(projID)
              $.each(response.getUsers,function(key, value)
              {
                $("#user").append('<option value=' + value._id + '>' + value.name + '</option>'); // return empty
              });          
            }
        });
    });
    $("#addtaskdata").click(function (e) {
        $(".texterror").empty();
        $(".form-control").removeClass('is-invalid');
        e.preventDefault();
        $.ajax({
            method: "POST",
            url: "{{ route('task.store') }}",
            data: $("#addtaskform").serialize(),
            dataType: "json",
            success: function (response) {
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
            }
        });
    });
    $(".btn-closed").click(function(){
      $('#addtaskmodal').modal('hide');
  })
$(document).ready(function() {
    $('.select2').select2({
    closeOnSelect: false
    });

});

function check(){
    $('#description').click(function(){
        $(".moreinfo").toggle()
	});
    $('#option').click(function(){
        $(".moreinfo1").toggle()
	});
}
</script>
<script src="{{ asset("assets/vendors/summernote/dist/summernote-bs4.min.js")}}"></script>
<script type="text/javascript">
    $('#summernote').summernote();
</script>
@endpush
@endsection