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
    <h2 class="pb-2 border-bottom">Register School</h2>
    <div class="row g-4 py-5 row-cols-1 row-cols-lg-2">
        <div class="col">
            <form enctype="multipart/form-data" id="formRegistration">
                <div class="mb-2">
                    <label for="inputName" class="form-label">Your Full Name</label>
                    <input type="text" class="form-control" name="name" id="inputName" aria-describedby="nameHelp">
                    <div id="nameHelp" class="form-text">We'll never share your name with anyone else.</div>
                </div>
                <div class="my-2 ">
                    <label for="formFileSm" class="form-label">Ijazah / Transcript</label>
                    <input class="form-control form-control-sm" name="transcript" id="formFileSm" type="file" aria-describedby="transcriptHelp">
                    <div id="transcriptHelp" class="form-text">We'll never share your confidential data.</div>
                    <p id="errorTranscript" class="text-danger small"></p>
                </div>
                <select class="form-select" name="school" aria-label="Default select example">
                    <option selected>Pick your favourite school</option>
                    <?php foreach ($schools as $key) : ?>
                        <option value="<?= $key['id'] ?>"><?= $key['name'] ?></option>
                    <?php endforeach ?>
                </select>
                <div class="row mt-2">
                    <div class="col-12">
                        <label for="inputAddress" class="form-label">Address</label>
                        <input type="text" name="address" class="form-control" id="inputAddress" placeholder="1234 Main St">
                    </div>
                    <div class="col-md-6">
                        <label for="inputCity" class="form-label">City</label>
                        <input type="text" name="city" class="form-control" id="inputCity">
                    </div>
                    <div class="col-md-6">
                        <label for="inputZip" class="form-label">Zip</label>
                        <input type="text" name="code" class="form-control" id="inputZip">
                    </div>
                </div>
                <div class="my-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">I agree with the terms and conditions</label>
                </div>
                <button type="submit" id="registerSchool" class="btn btn-primary">Submit Registration </button>
            </form>
        </div>
        <div class="col">
            <div class="card w-100">
                <div class="card-body">
                    <h5 class="card-title">Notes :</h5>
                    <p class="card-text">You can use proof of graduation from your previous school, you can only upload a pdf file.</p>
                    <a href="#" class="text-muted">Terms and conditions</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->include('layout/partials/script') ?>
<script>
    $(document).ready(function() {
        $('#formRegistration').on('submit', function(e) {
            e.preventDefault();
            $('#registerSchool').html('Checking....');
            $('#registerSchool').prop('disabled');
            $.ajax({
                type: "POST",
                url: "<?= site_url('user/signUp') ?>",
                data: new FormData(this),
                dataType: "json",
                contentType: false,
                cache: false,
                processData: false,
                success: function(response) {
                    if (response.status == 204) {
                        let close = confirm(response.message);
                        if (close) {
                            window.location.href = '<?= site_url('user/index') ?>';
                        }
                    } else {
                        var inputError = response.data;
                        if (response.message.errorTranscript !== '') {
                            $("#errorTranscript").html(response.message.errorTranscript);
                        }
                    }
                },
            });
            $('#registerSchool').html('Submit');
            $('#registerSchool').prop('enabled');
        });
    });
</script>
<?= $this->endSection() ?>