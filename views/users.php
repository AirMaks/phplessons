<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Редактирование товара</title>
    <link rel="stylesheet" href="/16/css/bootstrap.min.css">
    <base href="/16/">
</head>
<body>


<div class="container" style="margin: 50px">
    <div class="row">
        <div class="col-sm-4">
            <h1><?= $user['id'] ?></h1>
            <h2><?= $user['photo'] ?></h2>
            <h2><?= $user['username'] ?></h2>
            <h3><?= $user['lastname'] ?></h3>
            <h4><?= $user['phone'] ?></h4>
            <h5><?= $user['timestamp'] ?></h5>
            <?php if($editable === true) : ?>
                <form action="users/<?= $user['id'] ?>/edit" method="post">
                    <div class="form-group">
                        <label for="photo">Изменить фото</label>
                        <input type="file" id="photo" name="photo" value="<?= $user['photo'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="username">Имя</label>
                        <input type="text" class="form-control" name="username" id="username" value="<?= $user['username'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="lastname">Фамилия</label>
                        <input type="text" class="form-control" name="lastname" value="<?= $user['lastname'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Телефон</label>
                        <input type="text" class="form-control" name="phone" value="<?= $user['phone'] ?>" required>
                    </div>
                    <input type="hidden" name="id" value="<?= $_REQUEST['id'] ?>">
                    <button class="btn btn-primary" type="submit">Редактировать</button>
                </form>
            <?php endif; ?>
        </div>
    </div>
</div>
</body>
</html>