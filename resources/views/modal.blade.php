{{-- add modal --}}
<div class="modal fade" id="addnew" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Add New Member</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form action="{{ URL::to('save') }}" id="addForm">
                    <div class="mb-3">
                        <label for="firstname">First Name:</label>
                        <input type="text" name="firstname" class="form-control" placeholder="Input First Name" required>
                    </div>

                    <div class="mb-3">
                        <label for="firstname">Last Name:</label>
                        <input type="text" name="lastname" class="form-control" placeholder="Input Last Name" required>
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
