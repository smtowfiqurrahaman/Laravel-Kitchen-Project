@extends('layouts.app')
@section('title', "Index | Order")
@section('content')

@push('css')
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
 <link rel="stylesheet" href="
https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css">
@endpush

<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
            	{{-- <a href="{{ route('item.create') }}" class="btn btn-primary">Add New</a> --}}
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">ALL Orders</h4>
                  {{-- <p class="card-category"> Here is a subtitle for this table</p> --}}
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped table-bordered"  id="table">
                      <thead class="text-primary">
                        <th>Sl</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>D & T</th>
                        <th>Status</th>
                        <th>Action</th>

                        
                      </thead>
                      <tbody>
                        @foreach($reservations as $key=>$reservation)
                        <tr>
                        	<td>{{ $key+1 }}</td>
                        	<td>{{ $reservation->name }}</td>
                          <td>{{ $reservation->phone }}</td>
                        	<td>{{ $reservation->email }}</td>
                          <td>{{ $reservation->date_and_time }}</td>
                          <td>
                            @if($reservation->status == 1)
                             <span class="badge badge-success">Confirmed</span>
                            @endif
                            @if($reservation->status == 0)
                             <span class="badge badge-danger">Panding</span>
                            @endif
                          </td>
                        	<td>
                           {{-- <a href="{{ route('reservation.edit', $reservation->id) }}" class="btn btn-primary"> <i class="material-icons">edit</i></a>  --}}

                            @if($reservation->status == 0)
                             <form id="status-form-{{ $reservation->id }}" action="{{ route('reservation.status', $reservation->id )}}" method="POST">
                             @csrf
                           </form>

                           <button class="btn btn-info" type="button" onclick="if (confirm('Are you sure to Conform this reservation????')){
                            event.preventDefault();
                            document.getElementById('status-form-{{ $reservation->id }}').submit();
                           }else{
                            event.preventDefault();
                          }">
                          <i class="material-icons">check</i></button>
                           @endif



                           {{-- Delete button --}}
                           <form id="delete-form-{{ $reservation->id }}" action="{{ route('reservation.destroy', $reservation->id )}}" method="POST">
                             @csrf
                             @method('DELETE')
                           </form>

                           <button class="btn btn-danger" type="button" onclick="if (confirm('Are you sure to delete this reservation????')){
                            event.preventDefault();
                            document.getElementById('delete-form-{{ $reservation->id }}').submit();
                           }else{
                            event.preventDefault();
                          }">
                          <i class="material-icons">delete</i></button>

                           {{-- Delete button --}}
                          
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
@endsection

@push('js')
 <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js
"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>
<script>
  $(document).ready(function() {
    $('#table').DataTable();
} );
</script>

@endpush