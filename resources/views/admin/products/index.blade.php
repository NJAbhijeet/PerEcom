@extends('admin.layout.app')
@section('content')
    <!-- Main content -->
    <div class="app-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Product</h3>
                            <a href="{{ route('product-create') }}" class="btn btn-primary float-right">Add</a>
                        </div>

                        @if (Session::has('flash_success'))
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                {{ Session::get('flash_success') }}
                            </div>
                        @endif
                        @if (Session::has('flash_error'))
                            <div class="alert alert-danger m-2">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                {{ Session::get('flash_error') }}
                            </div>
                        @endif
                        <!-- /.card-header -->
                        <div class="card-body table-responsive">
                            <table id="example" class="table table-bordered " style="text-align:center">

                                <thead>
                                    <tr>
                                        <th>Sl No:</th>
                                        <th>Category Name</th>
                                        <th>Product Name</th>
                                        <th>Product Weight</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>MRP</th>
                                        <th>Selling Price</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $key => $product)
                                        <tr>
                                            <td> {{ $key + 1 }} </td>
                                            <td> {{ @$product->category->name }}</td>
                                            <td> {{ @$product->product_name }}</td>
                                            <td> {{ @$product->units->name }}</td>
                                            <td> {!! \Illuminate\Support\Str::words(@$product->description, 100, '...') !!} </td>

                                          
                                            <td><img src="{{ asset('storage/product/' . $product->single_image->images) }}"
                                                alt="" class="img-responsive" width="50%" /></td>

                                                
                                            <td> {{ @$product->mrp }}</td>
                                            <td> {{ @$product->sp }}</td>

                                            <td>
                                                @if ($product->status == 'Active')
                                                    <span class="badge badge-pill bg-success">Active</span>
                                                @else
                                                    <span class="badge badge-pill bg-danger">InActive</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('product-edit', $product->id) }}" class="btn btn-info">
                                                    Edit</a>
                                                <br> <br>
                                                <a onclick="return confirm('Are you sure you want to delete this item?');"
                                                    href="{{ route('product-destroy', $product->id) }}" class="btn btn-danger">
                                                    Delete
                                                </a>
                                            </td>


                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <br>
                            {{-- {{ $blog->links('pagination::bootstrap-4') }} --}}
                        </div>
                        <!-- /.card-body -->

                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
@endsection
