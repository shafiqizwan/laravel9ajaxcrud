@extends('app')

@section('content')
<h1 class="page-header text-center">Laravel 9 Ajax Crud</h1>
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <h2>Members Table
            <button type="button" id="add" data-bs-toggle="modal" data-bs-target="#addnew" class="btn btn-primary pull-right">Add Member</button>
        </h2>
    </div>
</div>

<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <table class="table table-bordered table-responsive table-striped">
            <thead>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Action</th>
            </thead>
            <tbody id="memberBody">

            </tbody>
        </table>
    </div>
</div>

{{-- add modal --}}
<div class="modal fade" id="addnew" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form action="{{ URL::to('save') }}" id="addForm">
                    <div class="mb-3">
                        <label for="firstname">First Name:</label>
                        <input type="text" id="firstname" name="firstname" class="form-control" placeholder="Input First Name" required>
                    </div>

                    <div class="mb-3">
                        <label for="firstname">Last Name:</label>
                        <input type="text" id="lastname" name="lastname" class="form-control" placeholder="Input Last Name" required>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
{{-- modal end --}}

{{-- edit modal --}}
{{-- <div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form action="{{ URL::to('save') }}" id="addForm">
                    <div class="mb-3">
                        <label for="firstname">First Name:</label>
                        <input type="text" id="firstname" name="firstname" class="form-control" placeholder="Input First Name" required>
                    </div>

                    <div class="mb-3">
                        <label for="firstname">Last Name:</label>
                        <input type="text" id="lastname" name="lastname" class="form-control" placeholder="Input Last Name" required>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div> --}}
{{-- edit modal end --}}

@endsection

@section('script')
<script type="text/javascript">
$(document).ready(function () {

    showMember();

    // click submit btn
    $('#addForm').on('submit', function (e) {
        e.preventDefault();
        // $('#myModalLabel').html("Add New Record");
        var form = $(this).serialize();
        var url = $(this).attr('action');
        // var fn = $(this).attr

        $.ajax({
            type: 'POST',
            url: url,
            data: {
                _token: '{{ csrf_token() }}',
                'firstname': $('#firstname').val(),
                'lastname': $('#lastname').val()
            },
            dataType: 'json',
            success: function () {
                $('#addnew').modal('hide');
                $('#addForm')[0].reset();
                showMember();
            }
        });
    });

    // edit record
    $(document).on('click', '.edit', function(event) {
        event.preventDefault();
        $('#myModalLabel').html("Edit Record");
        // alert('button edited clicked' + );
        var id = $(this).data('id');
        var firstname = $(this).data('first');
        var lastname = $(this).data('last');
        
        // $('#editmodal').modal('show');
        $('#addnew').modal('show');
        
        $('#firstname').val(firstname);
        $('#lastname').val(lastname);
        $('#memid').val(id);

    });

    // $(document).on('click', '.edit', function(event){
    //             event.preventDefault();
    //             var id = $(this).data('id');
    //             var firstname = $(this).data('first');
    //             var lastname = $(this).data('last');
    //             $('#editmodal').modal('show');
    //             $('#firstname').val(firstname);
    //             $('#lastname').val(lastname);
    //             $('#memid').val(id);
    //         });

    function showMember()
    {
        $.get("{{ URL::to('show') }}", function(data) {
            $('#memberBody').empty().html(data);
        })
    }
});
</script>
@endsection
