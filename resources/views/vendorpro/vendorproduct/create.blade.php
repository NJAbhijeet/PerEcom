@extends('vendorpro.layout.app')
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
                            <h3 class="card-title">Create Product</h3>
                        </div>

                        <form action="{{ route('vendor-product-store') }}" method="POST" enctype="multipart/form-data" id="productForm">
                            @csrf
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-12">

                                        <div class="form-group">
                                            <label>Vendor Name</label>
                                            <input type="text" class="form-control" value="{{ $vendors->name }}" readonly>
                                            <input type="hidden" name="vendor_id" value="{{ $vendors->id }}">
                                        </div>


                                        <div class="form-group">
                                            <label for="category_id">Select Category Name *</label>
                                            <select class="form-control" id="category_id" name="category_id">
                                                <option value="">Select Category Name</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('category_id'))
                                                <span class="text-danger">
                                                    <strong>{{ $errors->first('category_id') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                       

                                        <div class="form-group">
                                            <label for="product_id">Select product Name *</label>
                                            <select class="form-control" id="product_id" name="product_id">
                                                <option value="">Select product Name</option>
                                                @foreach ($products as $product)
                                                    <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('product_id'))
                                                <span class="text-danger">
                                                    <strong>{{ $errors->first('product_id') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group mt-2">
                                            <label for="Vendor Product Price">Vendor Product Price</label>
                                            <input type="number" class="form-control" id="vendorproduct_price"
                                                name="vendorproduct_price" required>
                                            @if ($errors->has('vendorproduct_price'))
                                                <span class="required">
                                                    <strong>{{ $errors->first('vendorproduct_price') }}</strong>
                                                </span>
                                            @endif
                                        </div>


                                        <div class="form-group">
                                            <label for="chkYes"> Status</label></br>
                                            <input type="radio" class="status" value="Active" name="status"
                                                checked="" />
                                            @if ($errors->has('status'))
                                                <span class="required">
                                                    <strong>{{ $errors->first('status') }}</strong>
                                                </span>
                                            @endif
                                            Active

                                            <label for="chkNo"></label></br>
                                            <input type="radio" class="status" value="Inactive" name="status" />
                                            @if ($errors->has('status'))
                                                <span class="required">
                                                    <strong>{{ $errors->first('status') }}</strong>
                                                </span>
                                            @endif
                                            Inactive
                                        </div>
                                        <br>

                                        <div class="form-group mt-3">
                                            <button type="submit" class="btn btn-primary">Create Product</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jodit/build/jodit.min.js"></script>
    <script>
        const editor = new Jodit('#editor', {
            height: 300,
            uploader: {
                insertImageAsBase64URI: true
            }
        });
    </script>
@endsection
