<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<?php $session = session() ?>
<div class="d-flex justify-content-between flex-row px-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Status</li>
        </ol>
    </nav>

    <p class="text-capitalize text-success">welcome, <span class="fw-bold"> <?= $session->get('username') ?> </span></p>
</div>
<div class="container px-4 py-5" id="featured-3">
    <h2 class="pb-2 border-bottom">Status Registration Users</h2>
    <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
        <div class="col-lg-8 scroll">
            <table id="dataRegisters" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>ID Registration </th>
                        <th>Username</th>
                        <th>School</th>
                        <th>Date</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($registers as $item) : ?>
                        <tr>
                            <td><?= $item['id'] ?></td>
                            <td><?= $item['name'] ?></td>
                            <td><?= $item['school'] ?></td>
                            <td>
                                <?php if ($item['status'] == 1) : ?>
                                    Not Accepted
                                <?php elseif ($item['status'] == 2) : ?>
                                    Accepted
                                <?php else : ?>
                                    Reserve
                                <?php endif ?>
                            </td>
                            <td>
                                <a id="btn-edit" data="<?= site_url('admin/change/') . $item['id'] ?>" href="javascript:;" class="btn btn-primary btn-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                                        <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z" />
                                    </svg></a>
                                <a id="btn-trash" data="<?= site_url('admin/delete/') . $item['id'] ?>" href="javascript:;" class="btn btn-danger btn-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                    </svg></a>
                            </td>

                        </tr>
                    <?php endforeach ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>ID Registration </th>
                        <th>Username</th>
                        <th>School</th>
                        <th>Date</th>
                        <th>Action</th>

                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Notes :</h5>
                    <p class="card-text">You can see detailed information from the user by selecting the detail button which has an eye symbol.</p>
                    <p class="card-text">For now you can not change user data, nor delete data..</p>
                    <a href="#" class="text-muted">Terms and conditions</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="modal-item">

</div>

<?= $this->include('layout/partials/script') ?>
<?= $this->include('layout/partials/dataTable') ?>
<script>
    $(document).ready(function() {
        $('#dataRegisters').DataTable();
        $('#dataRegisters').on('click', '#btn-edit', function() {
            var editURL = $(this).attr('data');
            $.ajax({
                type: "post",
                url: editURL,
                success: function(response) {
                    $('#modal-item').html(response);
                    $('#modalEdit').show();
                },
                error: function() {
                    alert('Modal Error');
                }
            });
        });
        $('#dataRegisters').on('click', '#btn-trash', function() {
            var deleteURL = $(this).attr('data');
            $.ajax({
                type: "post",
                url: deleteURL,
                success: function(response) {
                    $('#dataRegisters').load(' #dataRegisters > *');
                },
                error: function() {
                    alert('Error Deleted');
                }
            });
        });
    });
</script>
<?= $this->endSection() ?>