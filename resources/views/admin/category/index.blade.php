@extends('layouts.app')
@section('title', "Index | Category")
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
            	<a href="{{ route('category.create') }}" class="btn btn-primary">Add New</a>
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">ALL Category</h4>
                  {{-- <p class="card-category"> Here is a subtitle for this table</p> --}}
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped table-bordered"  id="table">
                      <thead class="text-primary">
                        <th>Sl</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Action</th>
                      </thead>
                      <tbody>
                        @foreach($categories as $key=>$category)
                        <tr>
                        	<td>{{ $key+1 }}</td>
                        	<td>{{ $category->name }}</td>
                        	<td>{{ $category->slug }}</td>
                        	<td>
                           <a href="{{ route('category.edit', $category->id) }}" class="btn btn-primary"> <i class="material-icons">edit</i></a> 

                           {{-- Delete button --}}
                           <form id="delete-form-{{ $category->id }}" action="{{ route('category.destroy', $category->id )}}" method="POST">
                             @csrf
                             @method('DELETE')
                           </form>

                           <button class="btn btn-danger" type="button" onclick="if (confirm('Are you sure to delete this category????')){
                            event.preventDefault();
                            document.getElementById('delete-form-{{ $category->id }}').submit();
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