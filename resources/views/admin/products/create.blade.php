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
                            <h3 class="card-title">Create Product</h3>
                        </div>

                        <form action="{{ route('product-store') }}" method="POST" enctype="multipart/form-data"
                            id="productForm">
                            @csrf
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-12">

                                        <div class="form-group">
                                            <label for="category_id">Select Category Name *</label>
                                            <select class="form-control" id="category_id" name="category_id" required>
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
                                            <label for="unit_id">Select Unit Name *</label>
                                            <select class="form-control" id="unit_id" name="unit_id" required>
                                                <option value="">Select Unit Name</option>
                                                @foreach ($units as $unit)
                                                    <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('unit_id'))
                                                <span class="text-danger">
                                                    <strong>{{ $errors->first('unit_id') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <button type="submit" class="btn btn-primary">Create Product</button>


                                        <div class="form-group mt-2">
                                            <label for="product_name">Product Name</label>
                                            <input type="text" name="product_name" class="form-control" required>
                                            @if ($errors->has('product_name'))
                                                <span class="required">
                                                    <strong>{{ $errors->first('product_name') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group mt-2">
                                            <label for="weight">Weight</label>
                                            <input type="text" name="weight" class="form-control" required>
                                            @if ($errors->has('weight'))
                                                <span class="required">
                                                    <strong>{{ $errors->first('weight') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group mt-2">
                                            <label for="country_of_origin">Origin</label>
                                            <input type="text" name="country_of_origin" class="form-control" required>
                                            @if ($errors->has('country_of_origin'))
                                                <span class="required">
                                                    <strong>{{ $errors->first('country_of_origin') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group mt-2">
                                            <label for="description">Description</label>
                                            <textarea name="description" id="editor" class="form-control" rows="3" required></textarea>
                                            @if ($errors->has('description'))
                                                <span class="required">
                                                    <strong>{{ $errors->first('description') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="images">Choose Multiple Images <span
                                                    class="required text-danger">*</span></label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" name="images[]" class="form-control"
                                                        id="images" multiple>
                                                    @if ($errors->has('images'))
                                                        <span class="required text-danger">
                                                            <strong>{{ $errors->first('images') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group mt-2">
                                            <label for="mrp">MRP</label>
                                            <input type="number" name="mrp" class="form-control" required>
                                            @if ($errors->has('mrp'))
                                                <span class="required">
                                                    <strong>{{ $errors->first('mrp') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group mt-2">
                                            <label for="selling_price">Selling Price</label>
                                            <input type="number" name="sp" class="form-control" required>
                                            @if ($errors->has('sp'))
                                                <span class="required">
                                                    <strong>{{ $errors->first('sp') }}</strong>
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

    <script>
        document.querySelector('input[name="weight"]').addEventListener('input', function(e) {
            this.value = this.value.replace(/[^0-9.]/g, ''); // allows numbers and dot
        });
    </script>

    <script>
        document.querySelector('input[name="mrp"]').addEventListener('input', function(e) {
            this.value = this.value.replace(/[^0-9.]/g, ''); // allows numbers and dot
        });
    </script>

    <script>
        document.querySelector('input[name="sp"]').addEventListener('input', function(e) {
            this.value = this.value.replace(/[^0-9.]/g, ''); // allows numbers and dot
        });
    </script>
@endsection
