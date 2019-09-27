@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Ajax Crud
                    <div class="text-right">
                        <button type="button" name="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add Customer</button>
                    </div>
                </div>

                <div class="card-body table-responsive">
                  <table class="table table-striped table-hover table-bordered">
                     <thead>
                         <th>SL</th>
                         <th>Name</th>
                         <th>Phone</th>
                         <th>Email</th>
                         <th>Register date</th>
                         <th>Manage</th>
                     </thead>
                     <tbody>
                         <tr>
                             <td></td>
                             <td></td>
                             <td></td>
                             <td></td>
                             <td></td>
                             <td>
                                 <a href="#" class="btn btn-primary">view</a>
                                 <a href="#" class="btn btn-success">Edit</a>
                                 <a href="#" class="btn btn-danger">Delete</a>
                             </td>
                         </tr>
                     </tbody>
                  </table>

                </div>
            </div>
        </div>
    </div>
</div>

{{-- Add Customer --}}


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="{{ url('add/customer/data') }}" method="post" id="addcustomerform">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Customer Data </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"> <i class="fa fa-user"></i> </span>

              </div>
              <input type="text" class="form-control" placeholder="Name" name="name">
          </div>

          <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"> <i class="fa fa-phone"></i> </span>

              </div>
              <input type="text" class="form-control" placeholder="Phone" name="phone">
          </div>


          <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"> <i class="fa fa-envelope"></i> </span>

              </div>
              <input type="text" class="form-control" placeholder="Email" name="email">
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </form>
  </div>
</div>
<script>
$(function(){
  $("#addcustomerform").submit(function(e){
    e.preventDefault();
  });
})
</script>

@endsection
