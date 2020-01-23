
@extends('admin.master')

@section('main-content')


<!--Content Start-->
<section class="container-fluid">
    <div class="row content reg-form">
        <div class="col-12 pl-0 pr-0">
            <div class="form-group">
                <div class="col-sm-12">
                    <h4 class="text-center font-weight-bold font-italic mt-3">Header Footer Form</h4>
                </div>
            </div>
            <form method="POST" action="{{ route('header-and-footer-save') }}" enctype="multipart/form-data" autocomplete="off" class="form-inline">

              @csrf
               

                <div class="form-group col-12 mb-3">
                    <label for="owner_name" class="col-sm-3 col-form-label text-right">Owner Name</label>
                    <input id="owner_name" type="text" class="col-sm-9 form-control  @error('owner_name') is-invalid @enderror" name="owner_name" value="{{ old('owner_name') }}" placeholder="Name" required autofocus>
                     @error('owner_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                     @enderror
                </div> 

                 <div class="form-group col-12 mb-3">
                    <label for="owner_dept" class="col-sm-3 col-form-label text-right"> Owner Department</label>
                    <input id="owner_dept" type="text" class="col-sm-9 form-control  @error('owner_dept') is-invalid @enderror" name="owner_dept" value="{{ old('owner_dept') }}" placeholder="Department Name" required autofocus>
                     @error('owner_dept')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                     @enderror
                </div>

                 <div class="form-group col-12 mb-3">
                    <label for="owner_mobile" class="col-sm-3 col-form-label text-right">Mobile</label>
                    <input id="owner_mobile" type="text" class="col-sm-9 form-control  @error('owner_mobile') is-invalid @enderror" name="owner_mobile" value="{{ old('owner_mobile') }}" placeholder="8801xxxxxxxxx" required>

                    @error('owner_mobile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

               

                <div class="form-group col-12 mb-3">
                    <label for="address" class="col-sm-3 col-form-label text-right"> Owner Address</label>
                    <input id="address" type="text" class="col-sm-9 form-control  @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" placeholder="Address" required autofocus>
                     @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                     @enderror
                </div>
                <div class="form-group col-12 mb-3">
                    <label for="copyright" class="col-sm-3 col-form-label text-right"> Copyright </label>
                    <input id="copyright" type="text" class="col-sm-9 form-control  @error('copyright') is-invalid @enderror" name="copyright" value="{{ old('copyright') }}" placeholder="Copyright" required autofocus>
                     @error('copyright')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                     @enderror
                </div>

             <input type="hidden" value="1" name="status">

                <div class="form-group col-12 mb-3">
                    <label class="col-sm-3"></label>
                    <button type="submit" class="col-sm-9 btn btn-block my-btn-submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</section>
<!--Content End-->

@endsection