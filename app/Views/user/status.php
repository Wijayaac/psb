<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>

<?php $session = session() ?>
<div class="d-flex justify-content-between flex-row px-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Status</li>
        </ol>
    </nav>

    <p class="text-capitalize text-success">welcome, <span class="fw-bold"> <?= $session->get('username') ?> </span></p>
</div>
<div class="container px-4 py-5">
    <h2 class="pb-2 border-bottom">Registration Status</h2>
    <div class="row g-4 py-5 row-cols-1 row-cols-lg-4 scroll">
        <?php foreach ($registers as $key) : ?>
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?= $key['school'] ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted"><?= $key['city'] ?> , <?= $key['code'] ?></h6>
                        <p class="card-text"> </p>
                        <figure>
                            <blockquote class="blockquote">
                                <p>"Patience is not the ability to wait, but the ability to keep a good attitude while waiting."</p>
                            </blockquote>
                            <figcaption class="blockquote-footer">
                                Anonymous <cite title="Source Title"> 2021 </cite>
                            </figcaption>
                        </figure>

                        <h6 class="d-inline-block mx-2">
                            <?php if ($key['status'] == 1) : ?>
                                <span class="badge rounded-pill bg-danger">Not Accepted</span>
                            <?php elseif ($key['status'] == 2) : ?>
                                <span class="badge rounded-pill bg-success">Accepted</span>
                            <?php else : ?>
                                <span class="badge rounded-pill bg-warning">Reserve</span>
                            <?php endif ?>
                        </h6>
                        <a target="_blank" href="<?= site_url('user/print/') . $key['id'] ?>" class="btn btn-sm btn-outline-primary card-link">Print PDF</a>
                        <p class="text-muted"><?= $key['date'] ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>
<?= $this->endSection() ?>