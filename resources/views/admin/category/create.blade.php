@extends('layouts.app')
@section('title', "Create | Category")
@section('content')

<div class="content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-md-6">
            	<a href="{{ route('category.index') }}" class="btn btn-primary"><i class="fa-solid fa-circle-left" style="font-size: 35px;"></i></a>
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Add Category</h4>
                  {{-- <p class="card-category">Complete your profile</p> --}}
                </div>
                <div class="card-body">
                  <form action="{{ route('category.store') }}" method="POST" >
                    @csrf
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating pl-4">Name</label>
                          <input type="text" class="form-control" name="name">
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-4 pull-left">Update</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

@endsection