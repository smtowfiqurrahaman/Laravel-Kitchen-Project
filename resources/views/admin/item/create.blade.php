@extends('layouts.app')
@section('title', "Create | Items")
@section('content')

<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
            	<a href="{{ route('item.index') }}" class="btn btn-primary">Back</a>
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Add Items</h4>
                  {{-- <p class="card-category">Complete your profile</p> --}}
                </div>
                <div class="card-body">
                  <form action="{{ route('item.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                      <div class="col-md-6 pt-4">
                        <div class="form-group">
                          <label class="bmd-label-floating pl-4">Item Name</label>
                          <input type="text" class="form-control" name="name">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating pl-4">Categorious</label>
                          <select class="form-control" name="category">
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating pl-4">Price</label>
                          <input type="text" class="form-control" name="price">
                        </div>
                      </div>
                      <div class="col-md-6">
                          <label class="bmd-label-floating">Upload</label>
                          <input type="file" class="form-control" name="image"> 
                      </div>
                    </div>  
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating pl-4">Description</label>
                         <textarea name="description" id="" cols="30" rows="5" class="form-control"></textarea>
                        </div>
                      </div>
                    </div>

                    <button type="submit" class="btn btn-primary mt-4 pull-left">Create Item</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
            {{-- <div class="col-md-4">
              <div class="card card-profile">
                <div class="card-avatar">
                  <a href="#pablo">
                    <img class="img" src="../assets/img/faces/marc.jpg" />
                  </a>
                </div>
                <div class="card-body">
                  <h6 class="card-category text-gray">CEO / Co-Founder</h6>
                  <h4 class="card-title">Alec Thompson</h4>
                  <p class="card-description">
                    Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                  </p>
                  <a href="#pablo" class="btn btn-primary btn-round">Follow</a>
                </div>
              </div>
            </div> --}}
          </div>
        </div>
      </div>

@endsection