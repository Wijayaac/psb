<!-- The Modal -->
<div class="modal" id="modalEdit" tabindex="-1" aria-labelledby="modalEdit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title">Edit Status</h5>
                <button type="button" class="close close-modal" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <!-- Form for update data on database, pass data to Controller Product method update -->
            <form method="post" id="formUpdate" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <!-- Field id type : hidden, Field product name type :text -->
                        <input type="hidden" name="id" value="<?= $id ?>">
                        <label for="">Status</label>
                        <select class="form-select" name="status" aria-label="Default select example">
                            <option selected>Pick one status</option>
                            <option value="1">Not Accepted</option>
                            <option value="2">Accepted</option>
                            <option value="3">Reserved</option>
                        </select>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button class="btn btn-success" id="updateStatus">Update</button>
                    <button type="button" class="btn btn-danger close-modal" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- submit validation check -->

<?= $this->include('layout/partials/script') ?>
<script>
    $(document).ready(function() {
        $('#formUpdate').on('submit', function(e) {
            e.preventDefault();
            $('#updateStatus').html('Checking....');
            $('#updateStatus').prop('disabled');
            $.ajax({
                type: "POST",
                url: "<?= site_url('admin/update') ?>",
                data: new FormData(this),
                dataType: "json",
                contentType: false,
                cache: false,
                processData: false,
                success: function(response) {

                    let close = confirm(response.message);
                    if (close) {
                        $("#modalEdit").fadeOut(150);
                    }
                }
            });
            $('#addProduct').html('Save');
            $('#addProduct').prop('enabled');

            document.getElementById("formAdd").reset();
        });
    });
</script>
<!-- close button script -->
<script>
    $('.modal').on('click', '.close-modal', function() {
        $("#modalEdit").fadeOut(150);
    });
</script>