<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<a href="/auth/logout">Logout</a>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Home</li>
    </ol>
</nav>
<?= $this->endSection() ?>