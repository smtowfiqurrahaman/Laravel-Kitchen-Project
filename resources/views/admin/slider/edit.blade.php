@extends('layouts.app')
@section('title',' Edit | Slider')

@section('content')

<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
            	<a href="{{ route('slider.index') }}" class="btn btn-primary"><i class="fa-solid fa-circle-left" style="font-size: 35px;"></i></a>
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Edit Slider</h4>
                  {{-- <p class="card-category">Complete your profile</p> --}}
                </div>
                <div class="card-body">
                  <form action="{{ route('slider.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating pl-4">Image Title</label>
                          <input type="text" class="form-control" name="title" value="{{ $slider->title }}">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating pl-4">Sub Title</label>
                          <input type="text" class="form-control" name="sub_title" value="{{ $slider->sub_title }}">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                         <img src="{{ asset('uploads/slider/'.$slider->image) }}" style="height:70px; width: auto;" alt="">
                          <input type="file" class="form-control" name="image"> 
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