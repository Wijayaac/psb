<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<div class="d-flex justify-content-between flex-row">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Home</li>
        </ol>
    </nav>
    <a href="/auth/logout">Logout</a>
</div>
<?= $this->endSection() ?>