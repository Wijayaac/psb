<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<?php $session = session() ?>
<div class="d-flex justify-content-between flex-row px-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Registration</li>
        </ol>
    </nav>

    <p class="text-capitalize text-success">welcome, <span class="fw-bold"> <?= $session->get('username') ?> </span></p>
</div>
<div class="container px-4 py-5" id="featured-3">
    <h2 class="pb-2 border-bottom">Registered Users</h2>
    <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
        <div class="col-lg-8 scroll">
            <table id="dataUsers" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user) : ?>
                        <tr>
                            <td><?= $user['id'] ?></td>
                            <td><?= $user['username'] ?></td>
                            <td>
                                <a href="<?= site_url('admin/detail/') . $user['id'] ?>" class="btn btn-warning my-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                    </svg></a>

                            </td>

                        </tr>
                    <?php endforeach ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
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

<?= $this->include('layout/partials/script') ?>
<?= $this->include('layout/partials/dataTable') ?>
<script>
    $(document).ready(function() {
        $('#dataUsers').DataTable();
    });
</script>
<?= $this->endSection() ?>