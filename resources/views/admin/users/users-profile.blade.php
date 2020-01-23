

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
            @include('admin.includes.message')
            <div class="table-responsive p-1">
                <table class="table table-striped table-bordered dt-responsive nowrap text-center" style="width: 100%;">
                    <tr> <td colspan="2"><img src="@if (isset($users->avatar)){!! asset('admin/avatar/'.$users->avatar) !!} @else {{ asset('/') }}admin/assets//images/avatar.png
                        {{-- expr --}}
                    
                    @endif" alt="{{$users->name}}"></td></tr>
                    <tr><th>Name</th>  <td>{{$users->name}}</td></tr>
                    <tr><th>Role</th>  <td>{{$users->role}}</td></tr>
                    <tr><th>Email</th>  <td>{{$users->email}}</td></tr>
                    <tr><th>Action</th> 
                    <td>
                            <a href="{{ route('change-user-info',$users->id) }}" class="btn btn-sm btn-dark"><span >Change Info</span></a>
                            <a href="{{ route('change-user-avatar',$users->id) }}" class="btn btn-sm btn-info"><span>Change Photo</span></a>
                            <a href="{{ route('change-user-password',$users->id) }}" class="btn btn-sm btn-danger"><span>Change Password</span></a>
                        </td> 
                    </tr>
                   
                </table>
            </div>
        </div>
    </div>
</section>
<!--Content End-->


@endsection