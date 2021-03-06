<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<?php $session = session() ?>
<div class="d-flex justify-content-between flex-row px-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Overview</li>
        </ol>
    </nav>

    <p class="text-capitalize text-success">welcome, <span class="fw-bold"> <?= $session->get('username') ?> </span></p>
</div>

<div class="container px-4 py-5" id="featured-3">
    <h2 class="pb-2 border-bottom">Register steps</h2>
    <div class="row g-4 py-5 mt-md-5 row-cols-1 row-cols-lg-3">
        <div class="col">
            <div class="feature icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="62" height="62" fill="currentColor" class="bi bi-person-circle text-primary" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                </svg>
            </div>

            <h2> Account

            </h2>
            <p>Users must Create new account used before you can register into school, at this stage the user will be asked to register an account to register for school, you can see a list of accounts here</p>
            <a href="<?= site_url('/admin/registration') ?>" class="icon-link text-primary">
                See who have an account
                <svg class="bi" width="1em" height="1em">
                    <use xlink:href="#chevron-right" />
                </svg>
            </a>
        </div>
        <div class="col">
            <div class="feature icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="62" height="62" fill="currentColor" class="bi bi-building text-warning" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022zM6 8.694 1 10.36V15h5V8.694zM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5V15z" />
                    <path d="M2 11h1v1H2v-1zm2 0h1v1H4v-1zm-2 2h1v1H2v-1zm2 0h1v1H4v-1zm4-4h1v1H8V9zm2 0h1v1h-1V9zm-2 2h1v1H8v-1zm2 0h1v1h-1v-1zm2-2h1v1h-1V9zm0 2h1v1h-1v-1zM8 7h1v1H8V7zm2 0h1v1h-1V7zm2 0h1v1h-1V7zM8 5h1v1H8V5zm2 0h1v1h-1V5zm2 0h1v1h-1V5zm0-2h1v1h-1V3z" />
                </svg>
            </div>
            <h2>Choose School</h2>
            <p>The user can choose the school he wants to attend. You can see the list of students who have registered here. </p>
            <a href="<?= site_url('/admin/status') ?>" class="icon-link text-warning">
                Registered users
                <svg class="bi" width="1em" height="1em">
                    <use xlink:href="#chevron-right" />
                </svg>
            </a>
        </div>
        <div class="col">
            <div class="feature icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="62" height="62" fill="currentColor" class="bi bi-chat-left-text text-success" viewBox="0 0 16 16">
                    <path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                    <path d="M3 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 6a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 6zm0 2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z" />
                </svg>
            </div>
            <h2>
                Graduation Announcement</h2>
            <p>You can change the registration status to accepted, rejected or reserved. That way the user can see the status of the registration. if the status has changed then it can not be edited again</p>
            <a href="<?= site_url('/admin/status') ?>" class="icon-link text-success">
                See status
                <svg class="bi" width="1em" height="1em">
                    <use xlink:href="#chevron-right" />
                </svg>
            </a>
        </div>
    </div>
</div>
<?= $this->endSection() ?>