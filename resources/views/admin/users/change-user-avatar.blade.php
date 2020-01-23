

@extends('admin.master')
<!--Content Start-->
@section('main-content')
<section class="container-fluid">
    <div class="row content">
        <div class="col-8 offset-md-2 pl-0 pr-0">
            <div class="form-group">
                <div class="col-sm-12">
                    <h4 class="text-center font-weight-bold font-italic mt-3">{{$users->name}}'s Profile</h4>
                </div>
            </div>

            <form action="{{ route('update-user-photo') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="table-responsive p-1">
                <table class="table table-striped table-bordered dt-responsive nowrap text-center" style="width: 100%;">
                    <tr> <td><img src="{{ asset('/') }}admin/assets//images/avatar.png" alt="" id="profile_photo" style="max-width: 300px;"></td></tr>
                   <tr>
                    <td>
                      <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="form-control " name="avatar" onchange="showImage(this,'profile_photo')">
                            <label for="photo" class="custom-file-input" id="fileLabel">choose file</label>
                        </div>
                        
                    </div> 
                   </td>
               </tr>
               <tr><td><input type="hidden" name="users_id" value="{{$users->id}}"></td></tr>

                    <td>
                            <button type="submit" class="btn btn-block my-btn-submit">Upadte Photo</button>
                        </td> 
                    </tr>
                   
                </table>
            </div>
            </form>
        </div>
    </div>
</section>
<!--Content End-->


@endsection