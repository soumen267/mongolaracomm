@extends('layouts.app')
@section('content')
@push('style')
<style>
    /* #draggable {width: 150px;height: 150px;padding: 0.5em;} */
    .boards{
      position: relative;
      white-space: nowrap;
      display: block;
      height: calc(100vh - 95px);
      padding-bottom: 16px;
      overflow-x: auto;
      overflow-y: hidden;
    }
    .board{
      display: inline-flex;
      flex-direction: column;
      width: 290px;
      height: 100%;
      vertical-align: top;
      margin-left: 10px;
      margin-right: 10px;
    }
    .board-heading {
    /* padding-bottom: 20px; */
    font-size: 14px;
    font-weight: 500;
    padding-right: 6px;
    padding-left: 14px;
    }
    .pull-left {
      float: left;
    }
    .pull-right {
      float: right;
    }
    .kanban .kanban-wrapper .boards .board .board-body .board-heading .x-action-icons {
    font-size: 19px;
    margin-top: -4px;
    }
    .board-body{
      padding: 10px;
      padding-top: 12px;
      /* background-color: #272c33; */
      background: linear-gradient(85deg, #392c70, #6a005b);
      height: 100%;
      border-radius: 5px;
      border-top: 2px #67757c solid;
      overflow: hidden;
      padding-left: 0px;
      padding-right: 1px;
    }
    .border-default {
      border-color: #ecf1f3 !important;
    }
    .kanban-content{
      height: 100%;
      position: relative;
      overflow: auto;
      width: 100%;
      padding-left: 13px;
      padding-right: 15px;
      padding-bottom: 150px;
      scrollbar-width: thin;
    }
    .tasks-view-wrapper{
      position: relative;
      white-space: nowrap;
      display: block;
      height: calc(100vh - 95px);
      padding-bottom: 16px;
      overflow-x: auto;
      overflow-y: hidden;
    }
    .heads{
      padding-bottom: 20px;
      font-size: 14px!important;
      font-weight: 500!important;
      padding-right: 6px;
      padding-left: 14px;
      font-size: 14px;
      font-weight: 500;
      color: white;
    }
    /* .row{
      display: flex;
      -ms-flex-wrap: wrap;
      flex-wrap: wrap;
      margin-right: -15px;
      margin-left: -15px;
    } */
    /* .kanban-wrapper{
      height: 100%;
    } */
    .x-title {
      padding-right: 10px;
      position: relative;
    }
    .wordwrap, .word-wrap {
    white-space: normal;
    white-space: -moz-normal;
    white-space: -o-normal;
    word-wrap: break-word;
    }
    .x-meta span {
    font-size: 11px;
    color: #bcc3d3;
    display: block;
    padding-bottom: 3px;
    overflow-wrap: break-word;
    word-break: break-word;
    white-space: normal;
    }
    .x-meta strong {
    font-weight: normal;
    color: #87949a;
    font-weight: 500;
    }
    .kanban-card{
      background-color: #404852;
      padding: 10px;
      min-height: 60px;
      -webkit-box-shadow: 0px 0px 4px -1px #b3b1b3;
      -moz-box-shadow: 0px 0px 4px -1px #b3b1b3;
      box-shadow: 0px 0px 4px -1px #b3b1b3;
      border-radius: 3px;
      margin-bottom: 12px;
      font-size: 14px;
      font-weight: 500;
      cursor: pointer;
      min-width: 260px;
      /* margin-left: -5px; */
    }
    .label {
      padding: 3px 10px;
      line-height: 13px;
      color: #ffffff;
      font-weight: 400;
      border-radius: 4px;
      font-size: 75%;
    }
    .label-default {
      background-color: #383f48;
      color: #5d5d5d;
    }
    .label-lime {
      background-color: #cddc39;
    }
    .list-group-item{
      background-color: #404852;
      border: none;
      color: white;
      font-size: 14px;
      font-weight: 500;
      text-align: left;
      margin-left: -13px;
    }
    .kanban-card .x-meta {
      padding-top: 7px;
    }
    .label-light-primary {
    background-color: #f1effd;
    color: #6772e5;
    }
    .card-modal .modal-body {
    padding: 0px !important;
    margin-left: 0px;
    margin-right: 0px;
    color: #c7cbcc;
   }

  .card-left-panel {
    margin: 0px;
    padding: 25px;
    padding-top: 25px;
    background-color: #323840;
    border-top-left-radius: 5px;
    border-bottom-left-radius: 5px;
  }
  .card-right-panel {
    margin: 0px;
    padding-top: 20px;
    padding-left: 20px;
    padding-right: 20px;
    background-color: #272c33;
    border-top-right-radius: 5px;
    border-bottom-right-radius: 5px;
  }
  
.card-modal .card-left-panel .x-content {
    padding-left: 20px;
    padding-bottom: 1px;
}
.card-modal .card-left-panel .card-description {
    padding-bottom: 60px;
    padding-top: 10px;
}
@media (min-width: 576px){
.modal-dialog {
    max-width: 951px;
    margin: 30px auto;
}
}
.card-modal .card-right-panel .x-assigned-user .avatar-xsmall {
    max-width: 30px;
    cursor: pointer;
}
h6 {
    line-height: 16px;
    font-size: 14px;
    font-weight: 500;
}
.img-circle {
    border-radius: 100%;
}
.mdi-calendar-plus:before {
    content: "\F0F3";
}
.card-modal .card-right-panel .x-element {
    min-height: 31px;
    border-color: #464d56;
    padding: 5px;
    background-color: #464d56;
    border-radius: 3px;
    font-size: 13px;
    margin-bottom: 10px;
    color: #d9e0e4;
    word-wrap: break-word;
    padding-left: 8px;
}
.card-modal .card-right-panel .x-section {
    margin-bottom: 30px;
}
.card-modal .card-right-panel .x-element span {
    vertical-align: middle;
}
.card-modal .card-left-panel .card-attachments {
    padding-bottom: 55px;
}
.file-attachment {
    margin-bottom: 16px;
    display: flex;
}
.file-attachment .x-image {
    height: 60px;
    width: 80px;
    border-radius: 5px;
    background-size: contain;
    background-repeat: no-repeat;
    background-position: center;
    background-color: #e8edef;
    font-size: 18px;
    font-weight: 600;
    text-transform: uppercase;
    text-align: center;
    line-height: 60px;
}
.file-attachment .x-details {
    margin-left: 15px;
    font-size: 13px;
    padding-top: 0px;
}
.preview-image-thumb {
    width: 100%;
    height: 100%;
    display: block;
    color: inherit;
}
.card-modal .card-left-panel .x-heading {
    font-size: 15px;
    border-bottom: solid 1px #e6e6e6;
    margin-bottom: 15px;
    font-weight: 500;
}
.card-modal .card-left-panel .card-comments {
    padding-bottom: 30px;
}
.card-modal .card-left-panel .x-action a {
    color: #67757c;
    text-decoration: underline;
    font-size: 10px;
    padding-left: 20px;
}
.card-modal .card-right-panel .x-section .x-edit-tabs {
    font-size: 11px;
    text-decoration: underline;
    font-weight: 500;
    padding-left: 3px;
    padding-right: 14px;
}
html body .display-block {
    display: block !important;
}
.card-modal .modal-dialog .modal-content .modal-body button.close {
    color: #d9e0e4 !important;
}
.card-modal .modal-dialog .modal-content .modal-body button.close {
    text-shadow: none;
    right: 13px;
    top: 8px;
}

</style>    
@endpush
<div class="content-wrapper">
  <div class="template-demo">
    <div class="row">
      <h4 class="pb-2 pt-1">Task</h4>
      <div class="col-lg-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-custom" style="border:none!important">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><span style="margin-left:3px;">Task</span></li>
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
                New
              </p>
              <h4>{{ $newItemCount ?? ''}}</h4>
            </div>
            <div class="statistics-item">
              <p>
                In Progress
              </p>
              <h4>{{ $pendingItemCount ?? '' }}</h4>
            </div>
            <div class="statistics-item">
              <p>
                Testing
              </p>
              <h4>{{ $qcItemCount ?? '' }}</h4>
            </div>
            <div class="statistics-item">
              <p>
                Completed
              </p>
              <h4>{{ $completeItemCount ?? '' }}</h4>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row kanban-wrapper">
    <div class="col-12">
      <div class="boards count-0">
        <div class="new-item board">
          <div class="board-body border-default">
            <div class="board-heading clearfix">
              <div class="pull-left heads">New</div>
              <div class="pull-right x-action-icons">
                <!--action add-->
              </div>
            </div>
            <div class="content kanban-content">
              <ul class="connectedSortable list-group shadow-lg kanban-wrapper" id="new-item-drop">
                @if(!empty($newItem) && $newItem->count())
                @foreach($newItem as $key => $value)
                <div
                  class="kanban-card kanban-board-element show-modal-button reset-card-modal-form js-ajax-ux-request">
                  <div class="x-title wordwrap" id="kanban_task_title_108">
                    <li class="list-group-item" item-id="{{ $value->id }}">{{ $value->title }}</li>
                  </div>
                  <div class="x-meta">
                    <div>
                      <label class="label label-default p-t-3 p-b-3 p-l-8 p-r-8">{{ $value->milestone }}</label>
                    </div>
                    <label class="label label-lime p-t-3 p-b-3 p-l-8 p-r-8">{{ $value->priority }}</label>
                    <div class="wrap-words">
                      @foreach (Helper::getTagByValue($value->tag) as $v)
                        <label class="label label-light-primary p-t-3 p-b-3 p-r-8 p-l-8">{{ $v }}</label>  
                      @endforeach
                    </div>
                    <span class="milestone" style="color:white"><strong>Project</strong>: {{ Helper::getProjectName($value->projectid)
                      }}</span>
                    <span class="milestone" style="color:white"><strong>Created</strong>: {{ Helper::changeDateFormat($value->created_at)
                      }}</span>
                    <span class="milestone" style="color:white"><strong>Due Date</strong>: {{ Helper::changeDueDateFormat($value->duedate)
                      }}</span>
                  </div>
                </div>
                @endforeach
                @endif
              </ul>
            </div>
          </div>
        </div>
        <div class="new-item board">
          <div class="board-body border-default">
            <div class="board-heading clearfix">
              <div class="pull-left heads">In Progress</div>
              <div class="pull-right x-action-icons">
                <!--action add-->
              </div>
            </div>
            <div class="content kanban-content">
              <ul class="connectedSortable list-group shadow-lg kanban-wrapper" id="pending-item-drop">
                @if(!empty($pendingItem) && $pendingItem->count())
                @foreach($pendingItem as $key => $value)
                <div
                  class="kanban-card kanban-board-element show-modal-button reset-card-modal-form js-ajax-ux-request">
                  <div class="x-title wordwrap" id="kanban_task_title_108">
                    <li class="list-group-item" item-id="{{ $value->id }}">{{ $value->title }}</li>
                  </div>
                  <div class="x-meta">
                    <div>
                      <label class="label label-default p-t-3 p-b-3 p-l-8 p-r-8">{{ $value->milestone }}</label>
                    </div>
                    <label class="label label-lime p-t-3 p-b-3 p-l-8 p-r-8">{{ $value->priority }}</label>
                    <div class="wrap-words">
                      @foreach (Helper::getTagByValue($value->tag) as $v)
                        <label class="label label-light-primary p-t-3 p-b-3 p-r-8 p-l-8">{{ $v }}</label>  
                      @endforeach
                    </div>
                    <span class="milestone" style="color:white"><strong>Project</strong>: {{ Helper::getProjectName($value->projectid)
                      }}</span>
                    <span class="milestone" style="color:white"><strong>Created</strong>: {{ Helper::changeDateFormat($value->created_at)
                      }}</span>
                    <span class="milestone" style="color:white"><strong>Due Date</strong>: {{ Helper::changeDueDateFormat($value->duedate)
                      }}</span>
                  </div>
                </div>
                @endforeach
                @endif
              </ul>
            </div>
          </div>
        </div>
        <div class="new-item board">
          <div class="board-body border-default">
            <div class="board-heading clearfix">
              <div class="pull-left heads">Testing</div>
              <div class="pull-right x-action-icons">
                <!--action add-->
              </div>
            </div>
            <div class="content kanban-content">
              <ul class="connectedSortable list-group shadow-lg kanban-wrapper" id="qc-item-drop">
                @if(!empty($qcItem) && $qcItem->count())
                @foreach($qcItem as $key => $value)
                <div
                  class="kanban-card kanban-board-element show-modal-button reset-card-modal-form js-ajax-ux-request">
                  <div class="x-title wordwrap" id="kanban_task_title_108">
                    <li class="list-group-item" item-id="{{ $value->id }}">{{ $value->title }}</li>
                  </div>
                  <div class="x-meta">
                    <div>
                      <label class="label label-default p-t-3 p-b-3 p-l-8 p-r-8">{{ $value->milestone }}</label>
                    </div>
                    <label class="label label-lime p-t-3 p-b-3 p-l-8 p-r-8">{{ $value->priority }}</label>
                    <div class="wrap-words">
                      @foreach (Helper::getTagByValue($value->tag) as $v)
                        <label class="label label-light-primary p-t-3 p-b-3 p-r-8 p-l-8">{{ $v }}</label>  
                      @endforeach
                    </div>
                    <span class="milestone" style="color:white"><strong>Project</strong>: {{ Helper::getProjectName($value->projectid)
                      }}</span>
                    <span class="milestone" style="color:white"><strong>Created</strong>: {{ Helper::changeDateFormat($value->created_at)
                      }}</span>
                    <span class="milestone" style="color:white"><strong>Due Date</strong>: {{ Helper::changeDueDateFormat($value->duedate)
                      }}</span>
                  </div>
                </div>
                @endforeach
                @endif
              </ul>
            </div>
          </div>
        </div>
        <div class="new-item board">
          <div class="board-body border-default">
            <div class="board-heading clearfix">
              <div class="pull-left heads">Completed</div>
              <div class="pull-right x-action-icons">
                <!--action add-->
              </div>
            </div>
            <div class="content kanban-content">
              <ul class="connectedSortable list-group shadow-lg kanban-wrapper" id="complete-item-drop">
                @if(!empty($completeItem) && $completeItem->count())
                @foreach($completeItem as $key => $value)
                <div
                  class="kanban-card kanban-board-element show-modal-button reset-card-modal-form js-ajax-ux-request">
                  <div class="x-title wordwrap" id="kanban_task_title_108">
                    <li class="list-group-item" item-id="{{ $value->id }}">{{ $value->title }}</li>
                  </div>
                  <div class="x-meta">
                    <div>
                      <label class="label label-default p-t-3 p-b-3 p-l-8 p-r-8">{{ $value->milestone }}</label>
                    </div>
                    <label class="label label-lime p-t-3 p-b-3 p-l-8 p-r-8">{{ $value->priority }}</label>
                    <div class="wrap-words">
                      @foreach (Helper::getTagByValue($value->tag) as $v)
                      <label class="label label-light-primary p-t-3 p-b-3 p-r-8 p-l-8">{{ $v }}</label>  
                      @endforeach
                    </div>
                    <span class="milestone" style="color:white"><strong>Project</strong>: {{ Helper::getProjectName($value->projectid)
                      }}</span>
                    <span class="milestone" style="color:white"><strong>Created</strong>: {{ Helper::changeDateFormat($value->created_at)
                      }}</span>
                    <span class="milestone" style="color:white"><strong>Due Date</strong>: {{ Helper::changeDueDateFormat($value->duedate)
                      }}</span>
                  </div>
                </div>
                @endforeach
                @endif
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @include('modals.addsubtaskmodal')
</div>
@push('script_src')
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
@endpush
@push('script')
<script type="text/javascript">
  $( function() {
    $("#new-item-drop, #pending-item-drop, #qc-item-drop, #complete-item-drop").sortable({
      connectWith: ".connectedSortable",
      tolerance:"pointer",
      opacity: 0.5,
      axis: "x"
    });
    $(".connectedSortable").on("sortupdate", function(event, ui) {
        var newItem = [];  
        var pending = [];
        var qc = [];
        var accept = [];
        $("#new-item-drop li").each(function(index) {
          if($(this).attr('item-id')){
            newItem[index] = $(this).attr('item-id');
          }
        });
        $("#pending-item-drop li").each(function(index) {
          if($(this).attr('item-id')){
            pending[index] = $(this).attr('item-id');
          }
        });
        $("#qc-item-drop li").each(function(index) {
          qc[index] = $(this).attr('item-id');
        });
        $("#complete-item-drop li").each(function(index) {
          accept[index] = $(this).attr('item-id');
        });
        $.ajax({
            url: "{{ route('update.items') }}",
            method: 'PUT',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {newItem:newItem,pending:pending,qc:qc,accept:accept},
            success: function(data) {
              console.log('success');
              $('.grid-margin').load(document.URL +  ' .grid-margin');
            }
        });
    });
  });
  $(".show-modal-button").click(function () { 
    $("#classModal").modal('show');
  });
</script>
@endpush
@endsection