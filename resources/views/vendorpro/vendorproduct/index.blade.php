@extends('vendorpro.layout.app')
@section('content')
    <!-- Main content -->
    <div class="app-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Vendor Product</h3>
                            <a href="{{ route('vendor-product-create') }}" class="btn btn-primary float-right">Add</a>
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
                            <table id="example" class="table table-bordered text-center">
                                <thead>
                                    <tr>
                                        <th>Sl No:</th>
                                        <th>Vendor Name</th>
                                        <th>Category Name</th>
                                        <th>Product Name</th>
                                        <th>Price</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($vendorproducts as $key => $vendorprod)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $vendorprod->vendor->name }}</td>
                                            <td>{{ $vendorprod->category->name ?? 'N/A' }}</td>
                                            <td>{{ $vendorprod->product->product_name ?? 'N/A' }}</td>
                                            <td>{{ $vendorprod->vendorproduct_price }}</td>
                                            <td>
                                                @if ($vendorprod->status === 'Active')
                                                    <span class="badge bg-success">Active</span>
                                                @else
                                                    <span class="badge bg-danger">Inactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('vendor-product-edit', $vendorprod->id) }}" class="btn btn-sm btn-info mb-1">
                                                    Edit
                                                </a>
                                                <a onclick="return confirm('Are you sure you want to delete this item?');"
                                                href="{{ route('vendor-product-destroy', $vendorprod->id) }}" class="btn btn-danger">
                                                Delete
                                            </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7">No vendor products found.</td>
                                        </tr>
                                    @endforelse
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
