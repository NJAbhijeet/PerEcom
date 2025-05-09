@extends('admin.layout.app')
@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jodit/build/jodit.min.css">


    <div class="app-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    @if (session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Create Category</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->

                        <form enctype="multipart/form-data" role="form" id="myform" method="post"
                            action="{{ route('category-update', $categories->id) }}">
                            @csrf
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-12">



                                        <div class="form-group mt-2">
                                            <label for="Name">Name</label>
                                            <input type="text" class="form-control" id="name"
                                                name="name" value="{{$categories->name}}" required>
                                            @if ($errors->has('name'))
                                                <span class="required">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <label for="">Current Image </label>
                                        <div class="table table-bordered">
                                            <img src="{{ asset('storage/category/' . basename($categories->image)) }}" alt=""
                                                class="img-responsive" width="200px" />
                                        </div>

                                        <label for="">Image</label>
                                        <input type="file" name="image" class="form-control" id="image"
                                            value="{{ $categories->image }}">
                                        @if ($errors->has('image'))
                                            <span class="required">
                                                <strong>{{ $errors->first('image') }}</strong>
                                            </span>
                                        @endif



                                        <div class="form-group">
                                            <label for="price">Status <span class="required">*</span></label><br>
                                            <label for="chkYes">
                                                <input type="radio" class="status" value="active" name="status"
                                                    checked="" @if ($categories->status == 'active') checked @endif />
                                                @if ($errors->has('status'))
                                                    <span class="required">
                                                        <strong>{{ $errors->first('status') }}</strong>
                                                    </span>
                                                @endif
                                                Active
                                            </label>
                                            <label for="chkNo">
                                                <input type="radio" class="status" value="inactive" name="status"
                                                    @if ($categories->status == 'inactive') checked @endif />
                                                @if ($errors->has('status'))
                                                    <span class="required">
                                                        <strong>{{ $errors->first('status') }}</strong>
                                                    </span>
                                                @endif
                                                Inactive
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <button id="submit" type="submit" class="btn btn-primary">Create
                                                Category</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->

    </div>
    <script src="https://cdn.jsdelivr.net/npm/jodit/build/jodit.min.js"></script>
    <script>
        // Initialize Jodit
        const editor = new Jodit('#editor', {
            // Add any configuration options here
            height: 300,
            uploader: {
                insertImageAsBase64URI: true
            }
        });
    </script>
@endsection
