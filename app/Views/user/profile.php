<?= $this->extend('layout/template') ?>
<?= $this->section('content') ?>
<?php $session = session() ?>
<div class="d-flex justify-content-between flex-row px-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Account</a></li>
            <li class="breadcrumb-item active" aria-current="page">Profile</li>
        </ol>
    </nav>

    <p class="text-capitalize text-success">welcome, <span class="fw-bold"> <?= $session->get('username') ?> </span></p>
</div>
<div class="container px-4 py-5" id="featured-3">
    <h2 class="pb-2 border-bottom">Update Profile</h2>
    <div class="row g-4 py-5 row-cols-1 row-cols-lg-2">
        <div class="col">
            <form enctype="multipart/form-data" id="formProfile">
                <div class="mb-2">
                    <label for="inputUsername" class="form-label">Your Username</label>
                    <input type="text" class="form-control" value="<?= $user['username'] ?>" disabled id="inputUsername" aria-describedby="usernameHelp">
                    <input type="hidden" name="id" value="<?= $user['id'] ?>">
                </div>
                <div class="mb-2">
                    <label for="inputName" class="form-label">Your Full Name</label>
                    <input type="text" name="name" class="form-control" value="<?= $user['name'] ?>" id="inputName" aria-describedby="nameHelp">
                </div>

                <div class="form-group row d-flex align-items-center">
                    <div class="col">
                        <label for="">Picture</label>
                        <img id="placeholder" src="<?= base_url("uploads/photo/") . "/" .  $user['photo'] ?>" style="max-width: 100px; height: auto;" class="img-thumbnail" alt="your image" />
                    </div>
                    <div class="col">
                        <input type="file" class="form-control-file" accept="image/*" id="inputImage" name="photo" onchange="readURL(this);">
                        <span class="text-danger small" id="errorPhoto"></span>
                    </div>
                </div>

                <div class="my-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">I agree with the terms and conditions</label>
                </div>
                <button type="submit" id="updateProfile" class="btn btn-primary">Save Update</button>
            </form>
        </div>
        <div class="col">
            <div class="card w-100">
                <div class="card-body">
                    <h5 class="card-title">Notes :</h5>
                    <p class="card-text">You can use any profile photo, and you don't have to worry about keeping your data safe.</p>
                    <a href="#" class="text-muted">Terms and conditions</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->include('layout/partials/script') ?>
<script>
    function readURL(input, id) {
        id = id || '#placeholder';
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $(id)
                    .attr('src', e.target.result)
                    .width(100)
                    .height(75)
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    $(document).ready(function() {
        $('#formProfile').on('submit', function(e) {
            e.preventDefault();
            $('#updateProfile').html('Checking....');
            $('#updateProfile').prop('disabled');
            $.ajax({
                type: "POST",
                url: "<?= site_url('admin/save') ?>",
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
                        if (response.message.errorPhoto !== '') {
                            $("#errorPhoto").html(response.message.errorPhoto);
                        }
                    }
                },
            });
            $('#updateProfile').html('Save Update');
            $('#updateProfile').prop('enabled');
        });
    });
</script>
<?= $this->endSection() ?>