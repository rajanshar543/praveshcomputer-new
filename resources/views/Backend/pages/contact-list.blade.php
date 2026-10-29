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
                    <table id="example2" class="table table-striped table-bordered">
                        <thead class="text-center">
                            <tr>
                                <th>#</th>
                                <th>Full Name</th>
                                <th>Mobile</th>
                                <th>Email</th>
                                <th>Message</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @forelse ($contacts as $index => $contact)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $contact->first_name }} {{ $contact->last_name }}</td>
                                <td>{{ $contact->mobile }}</td>
                                <td>{{ $contact->email ?? 'N/A' }}</td>

                                <!-- 👇 Message Column (with Modal Trigger) -->
                                <td>
                                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#messageModal{{ $contact->id }}">
                                        View Message
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="messageModal{{ $contact->id }}" tabindex="-1"
                                        aria-labelledby="messageModalLabel{{ $contact->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header bg-dark text-white">
                                                    <h5 class="modal-title" id="messageModalLabel{{ $contact->id }}">
                                                        Message from {{ $contact->first_name }} {{ $contact->last_name
                                                        }}
                                                    </h5>
                                                    <button type="button" class="btn-close btn-close-white"
                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p class="text-start">{{ $contact->message }}</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <td>
                                    <select class="form-select form-select-sm contact-status"
                                        data-id="{{ $contact->id }}" style="min-width:130px; cursor:pointer;">
                                        <option value="Pending" {{ $contact->status == 'Pending' ? 'selected' : ''
                                            }}>Pending</option>
                                        <option value="In Progress" {{ $contact->status == 'In Progress' ? 'selected' :
                                            '' }}>In Progress</option>
                                        <option value="Resolved" {{ $contact->status == 'Resolved' ? 'selected' : ''
                                            }}>Resolved</option>
                                    </select>
                                </td>

                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted">No contact records found</td>
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

    // 🎨 Set initial colors based on status
    $('.contact-status').each(function() {
        let status = $(this).val();
        setColor($(this), status);
    });

    // ⚙️ On dropdown change
    $('.contact-status').on('change', function() {
        let selectElement = $(this);
        let status = selectElement.val();
        let contactId = selectElement.data('id');

        $.ajax({
            url: "{{ route('contact.updateStatus') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                id: contactId,
                status: status
            },
            beforeSend: function() {
                selectElement.prop('disabled', true);
            },
            success: function(response) {
                if (response.success) {
                    setColor(selectElement, status);
                    console.log('✅ Status updated successfully');
                } else {
                    alert('❌ Something went wrong!');
                }
            },
            error: function(xhr) {
                console.error(xhr.responseText);
                alert('⚠️ Server error, please try again.');
            },
            complete: function() {
                selectElement.prop('disabled', false);
            }
        });
    });

    // 🎨 Function to change color dynamically
    function setColor(selectElement, status) {
        if (status === 'Pending') {
            selectElement.css('background-color', '#ffc107').css('color', '#000');
        } else if (status === 'In Progress') {
            selectElement.css('background-color', '#0dcaf0').css('color', '#000');
        } else {
            selectElement.css('background-color', '#198754').css('color', '#fff');
        }
    }

});
</script>



@endsection