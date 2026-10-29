@extends('Backend.layout.main')
@section('content')
<div class="page-wrapper">
    <div class="page-content">

        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Tables</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Data Table</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <button type="button" class="btn btn-primary">Settings</button>
                    <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split"
                        data-bs-toggle="dropdown"> <span class="visually-hidden">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end"> <a class="dropdown-item"
                            href="javascript:;">Action</a>
                        <a class="dropdown-item" href="javascript:;">Another action</a>
                        <a class="dropdown-item" href="javascript:;">Something else here</a>
                        <div class="dropdown-divider"></div> <a class="dropdown-item" href="javascript:;">Separated
                            link</a>
                    </div>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->
        <h6 class="mb-0 text-uppercase">DataTable Example</h6>
        <hr />

        <div class="card">
            <div class="card-body">
                @php use Illuminate\Support\Str; @endphp

                <div class="table-responsive">
                    <table id="example2" class="table table-striped table-bordered align-middle">
                        <thead class="text-center bg-dark text-white">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Device Type</th>
                                <th>Brand</th>
                                <th>Problem</th>
                                <th>Visit Date</th>
                                <th>Time Slot</th>
                                <th>Urgency</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @forelse ($complaints as $index => $complaint)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $complaint->name }}</td>
                                <td>{{ $complaint->email ?? 'N/A' }}</td>
                                <td>{{ $complaint->phone }}</td>
                                <td>{{ $complaint->address }}</td>
                                <td>{{ $complaint->device_type }}</td>
                                <td>{{ $complaint->brand }}</td>

                                <!-- 👇 Problem with modal -->
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#problemModal{{ $complaint->id }}">
                                        View Problem
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="problemModal{{ $complaint->id }}" tabindex="-1"
                                        aria-labelledby="problemModalLabel{{ $complaint->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header bg-dark text-white">
                                                    <h5 class="modal-title" id="problemModalLabel{{ $complaint->id }}">
                                                        Problem Details ({{ $complaint->name }})
                                                    </h5>
                                                    <button type="button" class="btn-close btn-close-white"
                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body text-start">
                                                    <p>{{ $complaint->problem }}</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <td>{{ $complaint->visit_date ? $complaint->visit_date->format('d M Y') : 'Not Set' }}
                                </td>
                                <td>{{ $complaint->time_slot ?? 'N/A' }}</td>

                                <td>
                                    @if($complaint->urgency == 'Urgent')
                                    <span class="badge bg-danger">Urgent</span>
                                    @else
                                    <span class="badge bg-info text-dark">Normal</span>
                                    @endif
                                </td>

                                <td>
                                    <select class="form-select form-select-sm complaint-status"
                                        data-id="{{ $complaint->id }}">
                                        <option value="Pending" {{ $complaint->status == 'Pending' ? 'selected' : ''
                                            }}>Pending</option>
                                        <option value="In Progress" {{ $complaint->status == 'In Progress' ? 'selected'
                                            : '' }}>In Progress</option>
                                        <option value="Resolved" {{ $complaint->status == 'Resolved' ? 'selected' : ''
                                            }}>Resolved</option>
                                    </select>
                                </td>

                            </tr>
                            @empty
                            <tr>
                                <td colspan="12" class="text-center text-muted py-3">No complaints found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>



            </div>
        </div>

    </div>
</div>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {

    $('.complaint-status').each(function() {
    let status = $(this).val();
    if (status === 'Pending') {
        $(this).css('background-color', '#ffc107').css('color', '#000');
    } else if (status === 'In Progress') {
        $(this).css('background-color', '#0d6efd').css('color', '#fff');
    } else {
        $(this).css('background-color', '#198754').css('color', '#fff');
    }
});


    $('.complaint-status').on('change', function() {
        let selectElement = $(this); // store reference to current select
        let status = selectElement.val();
        let complaintId = selectElement.data('id');

        $.ajax({
            url: "{{ route('complaint.updateStatus') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                id: complaintId,
                status: status
            },
            beforeSend: function() {
                selectElement.prop('disabled', true); // disable during update
            },
            success: function(response) {
                if (response.success) {
                    // ✅ Change dropdown background color dynamically
                    if (status === 'Pending') {
                        selectElement.css('background-color', '#ffc107').css('color', '#000');
                    } else if (status === 'In Progress') {
                        selectElement.css('background-color', '#0d6efd').css('color', '#fff');
                    } else {
                        selectElement.css('background-color', '#198754').css('color', '#fff');
                    }

                    // Optional: Success toast
                    console.log('Status updated successfully');
                } else {
                    alert('❌ Something went wrong!');
                }
            },
            error: function(xhr) {
                console.error(xhr.responseText);
                alert('⚠️ Server error, please try again.');
            },
            complete: function() {
                selectElement.prop('disabled', false); // enable again
            }
        });
    });

});
</script>



@endsection




