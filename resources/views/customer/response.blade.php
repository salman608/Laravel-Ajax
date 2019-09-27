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
