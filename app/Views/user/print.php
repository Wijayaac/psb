<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Print Registration Invoice</title>
    <link href="<?= base_url('assets/dist/css/bootstrap.css') ?>" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1 class="text-center border-bottom border-3 border-primary">Registration Invoice</h1>
        <?php foreach ($register as $key) : ?>

            <h4 class="text-center"><?= $key['school'] ?></h4>
            <table class="table w-75 mx-auto">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Data</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Registration ID</td>
                        <td><?= $key['id'] ?></td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Registered Name :</td>
                        <td> <?= $key['name'] ?></td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Registered City :</td>
                        <td> <?= $key['city'] ?></td>
                    </tr>
                    <tr>
                        <th scope="row">4</th>
                        <td>Registered Addres :</td>
                        <td> <?= $key['address'] ?></td>
                    </tr>
                    <tr>
                        <th scope="row">5</th>
                        <td>School Choice :</td>
                        <td> <?= $key['school'] ?></td>
                    </tr>
                    <tr>
                        <th scope="row">6</th>
                        <td>Status :</td>
                        <?php if ($key['status'] == 1) : ?>
                            <td>
                                Not Accepted
                            </td>
                        <?php elseif ($key['status'] == 2) : ?>
                            <td>Accepted</td>
                        <?php else : ?>
                            <td>Reserve</td>
                        <?php endif ?>
                    </tr>
                </tbody>
            </table>

        <?php endforeach ?>
    </div>
    <script>
        window.print();
    </script>
</body>

</html>