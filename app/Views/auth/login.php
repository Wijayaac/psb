<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="<?= base_url('assets/dist/css/bootstrap.css') ?>" rel="stylesheet">

    <title>Hello, world!</title>
</head>

<body class="auth text-center">
    <?php
    $session = session();
    $username = $session->getFlashdata('username');
    $password = $session->getFlashdata('password');
    ?>
    <main class="form-signin">
        <form method="post" action="/auth/validLogin"><svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-bootstrap" viewBox="0 0 16 16">
                <path d="M5.062 12h3.475c1.804 0 2.888-.908 2.888-2.396 0-1.102-.761-1.916-1.904-2.034v-.1c.832-.14 1.482-.93 1.482-1.816 0-1.3-.955-2.11-2.542-2.11H5.062V12zm1.313-4.875V4.658h1.78c.973 0 1.542.457 1.542 1.237 0 .802-.604 1.23-1.764 1.23H6.375zm0 3.762V8.162h1.822c1.236 0 1.887.463 1.887 1.348 0 .896-.627 1.377-1.811 1.377H6.375z" />
                <path d="M0 4a4 4 0 0 1 4-4h8a4 4 0 0 1 4 4v8a4 4 0 0 1-4 4H4a4 4 0 0 1-4-4V4zm4-3a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V4a3 3 0 0 0-3-3H4z" />
            </svg>
            <h1 class="h3 mb-3 fw-normal">Please login</h1>

            <div class="form-floating">
                <input type="text" name='username' class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Username</label>
                <?php if ($username) { ?>
                    <p class="text-danger"><?= $username ?></p>
                <?php } ?>
            </div>
            <div class="form-floating">
                <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
                <?php if ($password) { ?>
                    <p class="text-danger"><?= $password ?></p>
                <?php } ?>
            </div>

            <button class="w-100 btn btn-lg my-1 btn-success" type="submit">Sign in</button>
            <a href="/auth/register" class="w-100 btn btn-sm my-1 btn-outline-primary" type="submit">Register here</a>
            <p class="mt-5 mb-3 text-muted">PSB online &copy; 2021</p>
        </form>
    </main>




    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="<?= base_url('assets/dist/js/bootstrap.bundle.min.js') ?>"></script>
</body>

</html>