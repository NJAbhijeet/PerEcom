@extends('admin.layout.app')
@section('content')
    <!--app-content open-->
    <div class="app-content">
        <section class="section">

            <!--page-header open-->
            <div class="page-header">

                <ol class="breadcrumb">
                    <!-- breadcrumb -->
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="fe fe-home mr-2"></i> Home </a></li>
                    <li class="breadcrumb-item active" aria-current="page"> Admin Profile </li>
                </ol><!-- End breadcrumb -->

                {{-- <div class="ml-auto">
                    <div class="input-group">
                        <a href="#" class="btn btn-primary btn-icon text-white mr-2" data-toggle="tooltip"
                            title="" data-placement="top" data-original-title="Add New Account">
                            <span>
                                <i class="fe fe-plus"></i>
                            </span>
                        </a>
                        <a href="#" class="btn btn-icon btn-info text-white mr-2" data-toggle="tooltip" title=""
                            data-placement="top" data-original-title="Help">
                            <span>
                                <i class="fe fe-help-circle"></i>
                            </span>
                        </a>
                        <a href="#" class="btn btn-icon btn-danger text-white" data-toggle="tooltip" title=""
                            data-placement="top" data-original-title="Settings">
                            <span>
                                <i class="fe fe-settings"></i>
                            </span>
                        </a>
                    </div>
                </div> --}}
            </div>
            <!--page-header closed-->

            <!--row open-->
            <div class="row">
                <div class="col-lg-12 col-xl-5 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center">
                                <div class="userprofile social">
                                    <div class="userpic">

                                           <img src="{{asset('storage/admin/'.$admin->image)}}"
                                            alt="" class="userpicimg"> </div>
                                    <h3 class="username">{{ $admin->name }} </h3>
                                    <p>Admin</p>
                                    <div class="text-center mb-2">
                                        <h3 class="username">{{ $admin->address }} </h3>
                                    </div>

                                    <div class="mt-3">

                                        <a href="mailto:{{ $admin->email }}" class="btn btn-secondary btn-sm mt-1">
                                            <i class="fe fe-envelope followbtn ml-1"></i>{{ $admin->email }} </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-12 col-xl-7 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Admin Details</h4>
                        </div>
                        <div class="card-body">
                            {{-- <p><b>User ID :</b>{{ $admin->id }} </p> --}}
                            <p><b>Name :</b>{{ $admin->name }} </p>
                            <p><b>Email :</b> {{ $admin->email }}</p>
                            <p><b>Phone :</b> {{ $admin->phone }} </p>
                            <p><b>Address : </b>{{ $admin->address }}</p>

                        </div>

                    </div>
                </div>
            </div>
            <!--row closed-->

            <!--row open-->
            <div class="row profile-card">
                <div class="col-lg-7 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Profile</h4>
                        </div>
                        <div class="card-body">
                            {{--  <form>  --}}
                                <form enctype="multipart/form-data" class="form-horizontal" method="post"
                                action="{{ route('dashboard.adminprofile') }}">
                                @csrf
                                <div class="card-body">

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Name</label>
                                        <input type="text" class="form-control" name="name" value="{{$admin->name}} " id=""
                                            placeholder="Enter Name">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email address</label>
                                        <input type="email" class="form-control" name="email" value="{{$admin->email}}"  id=""
                                            placeholder="Enter email">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Phone Number</label>
                                        <input type="number" class="form-control" name="phone" value="{{$admin->phone}}"  id=""
                                            placeholder="Enter phone">
                                    </div>

                                    <div class="form-group">
                                        <label for="">Address</label>
                                        <textarea type="text" class="form-control" id="" name="address" value="{{$admin->address}}" placeholder="Enter Address">{{$admin->address}}</textarea>
                                    </div>


                                    <div class="form-group">
                                        <label for="exampleInputFile">Profile Pic </label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="image" class="custom-file-input" id="">
                                                <label class="custom-file-label" for="">Choose file</label>
                                            </div>
                                            {{--  <div class="input-group-append">
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </div>  --}}
                                        </div>
                                    </div>



                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>


                </div>

                <div class="col-lg-5 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Change Password</h4>
                        </div>
                        <div class="card-body">
                            <form enctype="multipart/form-data" class="form-horizontal" method="post"
                                action="{{ route('admin-update-password') }}">
                                @csrf
                                <div class="card-body">

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Old Password</label>
                                        <input type="password" name="current_password" class="form-control" id="exampleInputPassword1"
                                            placeholder="Old Password">
                                    </div>


                                    <div class="form-group">
                                        <label for="exampleInputPassword1">New Password</label>
                                        <input type="password" name="new_password" class="form-control" id="exampleInputPassword1"
                                            placeholder="New Password">
                                    </div>


                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Confirm Password</label>
                                        <input type="password" name="password_confirmation" class="form-control" id="exampleInputPassword1"
                                            placeholder="Confirm Password">
                                    </div>


                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
            <!--row closed-->

        </section>
    </div>
    <!--app-content closed-->
@endsection
