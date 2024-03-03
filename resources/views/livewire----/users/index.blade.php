@extends('layouts.app')
@section('content')
<div>
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
              <button type="button" data-bs-toggle="modal" class="float-right btn btn-danger btn-circle" data-bs-target="#addusermodel">
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
              @foreach ($getUsers as $user)
              <tr>
                <td class="py-1">
                  <img src="{{ asset("assets/images/faces/face1.jpg") }}" alt="image"/>
                </td>
                <td>
                  {{ $user->name }}
                </td>
                <td>
                  {{ $user->email }}
                </td>
                <td>
                  May 15, 2015
                </td>
                <td>
                  <button type="button" class="btn btn-primary btn-sm edit-user" data-id="{{ $user->_id }}"><i class="fa fa-edit"></i></button>
                </td>
                <td>
                  {{-- <form method="POST" action="{ route('users.destroy', ${item._id}) }">
                    @csrf
                    <input name="_method" type="hidden" value="DELETE">
                    <button type="button" class="btn btn-danger btn-sm delete-user" data-id="{{ $user->_id }}"><i class="fa fa-trash"></i></button>
                  </form> --}}
                </td>
                <td>
                  <i class="fa fa-envelope"></i>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  @include('livewire.modals.addmodal')
</div>
{{-- @include('modals.editmodal') --}}
@push('script')
{{-- <script type="text/javascript">
  window.addEventListener('openFormModal', event => {
    $("#addusermodel").modal('show');
  })

  window.addEventListener('closePagamentoLongModal', event => {
      $("#addusermodel").modal('hide');
  })
</script> --}}
@endpush
@endsection