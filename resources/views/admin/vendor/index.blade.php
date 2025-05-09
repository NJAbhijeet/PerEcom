@extends('admin.layout.app')
@section('content')
    <div class="app-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"> Contact Us </h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive table-lg">
                                <table id="example" class="table table-bordered " style="text-align:center">
                                    <thead>
                                        <tr>
                                            <th style="width:10%">Name</th>
                                            <th style="width:10%">Email</th>
                                            <th style="width:10%">Phone</th>
                                            <th style="width:10%">GST</th>
                                            <th style="width:10%">Date/Time</th>
                                            <th style="width:10%"> Approval Status</th>
                                            <th style="width:10%"> Approved Or Rejected</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($vendors)
                                            @foreach ($vendors as $row)
                                            <tr>
                                                <td>{{ $row->name }}</td>
                                                <td>{{ $row->email }}</td>
                                                <td><a href="tel:{{ $row->phone }}">{{ $row->phone }}</a></td>
                                                <td>{{ $row->gst }}</td>
                                                <td>{{ date('d M Y', strtotime($row->created_at)) }} <br>
                                                    {{ date('h:i:s A', strtotime($row->created_at)) }}</td>
                                               
                                                    <td>
                                                        <form action="{{ route('vendor.approve', $row->id) }}" method="POST" style="display:inline;">
                                                            @csrf
                                                            <button type="submit" class="btn btn-success btn-sm">Approve</button>
                                                        </form>
                                                    
                                                        <form action="{{ route('vendor.reject', $row->id) }}" method="POST" style="display:inline;">
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger btn-sm">Reject</button>
                                                        </form>
                                                    </td>

                                                    <td>{{ $row->approval_status }}</td>
                                            </tr>                                            
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function updateStatus(id, status) {
    // Make an AJAX request to update the status
    $.ajax({
        url: '/update-status/' + id,
        method: 'PUT',
        data: {
            _token: '{{ csrf_token() }}',  // CSRF token for security
            status: status
        },
        success: function(response) {
            // Update the status in the table
            $('#status-' + id).text(response.status);
        },
        error: function() {
            alert('Something went wrong!');
        }
    });
}

    </script>
@endsection
