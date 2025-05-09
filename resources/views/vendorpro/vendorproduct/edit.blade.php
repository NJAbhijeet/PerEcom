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
                            <h3 class="card-title">Edit Product</h3>
                        </div>

                        <form action="{{ route('vendor-product-update', $vendorProduct->id) }}" method="POST" enctype="multipart/form-data" id="productForm">
                            @csrf
                            @method('PUT')
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-12">

                                        <div class="form-group">
                                            <label>Vendor Name</label>
                                            <input type="text" class="form-control" value="{{ $vendorProduct->vendor->name }}" readonly>
                                            <input type="hidden" name="vendor_id" value="{{ $vendorProduct->vendor_id }}">
                                        </div>

                                        <div class="form-group">
                                            <label for="category_id">Select Category Name *</label>
                                            <select class="form-control" id="category_id" name="category_id">
                                                <option value="">Select Category Name</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}" {{ $vendorProduct->category_id == $category->id ? 'selected' : '' }}>
                                                        {{ $category->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('category_id'))
                                                <span class="text-danger">
                                                    <strong>{{ $errors->first('category_id') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label for="product_id">Select Product Name *</label>
                                            <select class="form-control" id="product_id" name="product_id">
                                                <option value="">Select Product Name</option>
                                                @foreach ($products as $product)
                                                    <option value="{{ $product->id }}" {{ $vendorProduct->product_id == $product->id ? 'selected' : '' }}>
                                                        {{ $product->product_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('product_id'))
                                                <span class="text-danger">
                                                    <strong>{{ $errors->first('product_id') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group mt-2">
                                            <label for="vendorproduct_price">Vendor Product Price</label>
                                            <input type="number" class="form-control" id="vendorproduct_price"
                                                name="vendorproduct_price" value="{{ $vendorProduct->vendorproduct_price }}" required>
                                            @if ($errors->has('vendorproduct_price'))
                                                <span class="text-danger">
                                                    <strong>{{ $errors->first('vendorproduct_price') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label>Status</label></br>
                                            <input type="radio" class="status" value="Active" name="status"
                                                {{ $vendorProduct->status == 'Active' ? 'checked' : '' }} />
                                            Active

                                            <label for="chkNo"></label>
                                            <input type="radio" class="status" value="Inactive" name="status"
                                                {{ $vendorProduct->status == 'Inactive' ? 'checked' : '' }} />
                                            Inactive

                                            @if ($errors->has('status'))
                                                <span class="text-danger">
                                                    <strong>{{ $errors->first('status') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <br>

                                        <div class="form-group mt-3">
                                            <button type="submit" class="btn btn-primary">Update Product</button>
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
