<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<?php $session = session() ?>
<div class="d-flex justify-content-between flex-row px-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin/registration">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/admin/registration">Registration</a></li>
            <li class="breadcrumb-item active" aria-current="page">Details</li>
        </ol>
    </nav>

    <p class="text-capitalize text-success">welcome, <span class="fw-bold"> <?= $session->get('username') ?> </span></p>
</div>
<div class="container px-4 py-5" id="featured-3">
    <h2 class="pb-2 border-bottom">Users Registered Details</h2>
    <div class="row g-4 py-5 row-cols-1 row-cols-lg-2">
        <div class="col">
            <?php foreach ($user as $key) : ?>
                <div class="card">
                    <div class="card-header">
                        <div class="card-image text-center">
                            <img class="img-thumbnail" width="150" src="<?= base_url('uploads/photo') . "/" . $key['photo'] ?>" alt="">
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><?= $key['name'] ? $key['name'] : $key['username'] ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted"><?= $key['id'] ?> , <?= $key['username'] ?></h6>
                    </div>
                </div>
            <?php endforeach ?>

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


<?= $this->endSection() ?>