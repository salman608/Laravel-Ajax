@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Ajax Crud customer
                    <div class="text-right">
                        <button type="button" name="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add Customer</button>
                    </div>
                </div>

                <div class="card-body table-responsive" id="showAllData">
                  <table class="table table-striped table-hover table-bordered">
                     <thead>
                         <th>SL</th>
                         <th>Name</th>
                         <th>Phone</th>
                         <th>Email</th>
                         <th>district</th>
                         <th>Register date</th>
                         <th>Manage</th>
                     </thead>
                     <tbody>
                       @foreach ($data as $show)


                         <tr>
                             <td>{{ $show->id }}</td>
                             <td>{{ $show->name}}</td>
                             <td>{{ $show->phone}}</td>
                             <td>{{ $show->email}}</td>
                             <td>{{ $show->district}}</td>
                             <td>{{ date("d-m-y",strtotime($show->created_at))}}</td>
                             <td>
                                 <a href="{{ url('view/customer/data') }}" id="view"  class="btn btn-sm btn-primary" data-id="{{ $show->id }}">view</a>

                                 <a href="{{ url('edit/customer/data') }}" id="edit"  class="btn btn-sm btn-success" data-id="{{ $show->id }}">Edit</a>

                                 <a onclick="return confirm('Are you Sure You Want to Delete!')" href="{{ url('delete/customer/data') }}" id="delete"  class="btn btn-sm btn-danger" data-id="{{ $show->id }}">Delete</a>
                             </td>
                         </tr>

                            @endforeach
                     </tbody>

                  </table>
                  {!! $data->render() !!}

                </div>
            </div>
        </div>
    </div>
</div>
<div id="getalldata" data-url="{{ url('get/custome/data') }}">

</div>

{{-- Add Customer --}}


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="{{ url('add/customer/data') }}" method="post" id="addcustomerform">
      @csrf
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

          <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"> <i class="fa fa-map-marker"></i> </span>

              </div>
              <input type="text" class="form-control" placeholder="district" name="district">
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

{{-- view Customer --}}

<div class="modal fade" id="ViewCustomer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">

      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="customerview">View Customer Data </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <blockquote cite="#">
             <div class="cname"></div>
          </blockquote>
          <blockquote cite="#">
             <div class="cphone"></div>
          </blockquote>
          <blockquote cite="#">
             <div class="cemail"></div>
          </blockquote>
          <blockquote cite="#">
             <div class="cdistrict"></div>
          </blockquote>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

        </div>
      </div>

  </div>
</div>



{{-- view Customer --}}

{{-- edit customer data model --}}
<!-- Modal -->
<div class="modal fade" id="updateCustomer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="{{ url('update/customer/data') }}" method="post" id="updatecustomerform">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="updateCustomerTitle"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="id" id="customerid">
          <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"> <i class="fa fa-user"></i> </span>

              </div>
              <input type="text" id="cname" class="form-control" placeholder="Name" name="name">
          </div>

          <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"> <i class="fa fa-phone"></i> </span>

              </div>
              <input type="text" id="cphone" class="form-control" placeholder="Phone" name="phone">
          </div>


          <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"> <i class="fa fa-envelope"></i> </span>

              </div>
              <input type="text" id="cemail" class="form-control" placeholder="Email" name="email">
          </div>

          <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"> <i class="fa fa-map-marker"></i> </span>

              </div>
              <input type="text" id="cdistrict" class="form-control" placeholder="district" name="district">
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </div>
    </form>
  </div>
</div>
{{-- edit customer data mode --}}
<div class="load">
  <img src="{{ asset('load.gif') }}" alt="" class="img-fluid loading">
</div>



@endsection
