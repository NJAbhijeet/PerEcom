@extends('vendorpro.layout.app')
@section('content')
    <!--app-content open-->
    <div class="app-content">
        <section class="section">

            <!--page-header open-->
            <div class="page-header">

                <ol class="breadcrumb">
                    <!-- breadcrumb -->
                    <li class="breadcrumb-item"><a href="{{route('vendordashboard')}}"><i class="fe fe-home mr-2"></i> Home </a></li>
                    <li class="breadcrumb-item active" aria-current="page"> Vendor Profile </li>
                </ol><!-- End breadcrumb -->

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

                                           <img src="{{asset('storage/vendor/'.$vendors->image)}}"
                                            alt="" class="userpicimg"> </div>
                                    <h3 class="username">{{ $vendors->name }} </h3>
                                    <p>VENDOR</p>
                                    <div class="text-center mb-2">
                                        <h3 class="username">{{ $vendors->address }} </h3>
                                    </div>

                                    <div class="mt-3">

                                        <a href="mailto:{{ $vendors->email }}" class="btn btn-secondary btn-sm mt-1">
                                            <i class="fe fe-envelope followbtn ml-1"></i>{{ $vendors->email }} </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-12 col-xl-7 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Vendor Details</h4>
                        </div>
                        <div class="card-body">
                            {{-- <p><b>User ID :</b>{{ $admin->id }} </p> --}}
                            <p><b>Name :</b>{{ $vendors->name }} </p>
                            <p><b>Email :</b> {{ $vendors->email }}</p>
                            <p><b>Phone :</b> {{ $vendors->phone }} </p>
                            <p><b>Address : </b>{{ $vendors->address }}</p>

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
                                action="{{ route('dashboard.vendorprofile') }}">
                                @csrf
                                <div class="card-body">

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Name</label>
                                        <input type="text" class="form-control" name="name" value="{{$vendors->name}} " id=""
                                            placeholder="Enter Name">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email address</label>
                                        <input type="email" class="form-control" name="email" value="{{$vendors->email}}"  id=""
                                            placeholder="Enter email">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Phone Number</label>
                                        <input type="number" class="form-control" name="phone" value="{{$vendors->phone}}"  id=""
                                            placeholder="Enter phone">
                                    </div>

                                    <div class="form-group">
                                        <label for="">Address</label>
                                        <textarea type="text" class="form-control" id="" name="address" value="{{$vendors->address}}" placeholder="Enter Address">{{$vendors->address}}</textarea>
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

               
            </div>
            <!--row closed-->

        </section>
    </div>
    <!--app-content closed-->
@endsection
