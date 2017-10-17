
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/16/css/style.css">
    <base href="/16/">
</head>
<body>

<div class="container" style="margin-top: 2%" class="align-content-center">
    <div class="jumbotron">


        <div class="row">
            <div class="col-sm-12">
                <div style="margin-top: 20px">
                    <h1>Пользователи</h1>

                    <table class="table">
                        <thead>
                        <tr>
                            <td>ID</td>
                            <td>Фото</td>
                            <td>Имя</td>
                            <td>Фамилия</td>
                            <td>Телефон</td>
                            <td>Дата создания</td>
                            <td>Перейти</td>
                            <td>Редактировать</td>
                            <td>Удалить</td>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($users as $user) : ?>
                            <tr>
                                <td><h4><?= $user['id'] ?></h4></td>
                                <td><img src="http://localhost/16/img/<?= $user['photo'] ?>"></td>
                                <td><h4><?= $user['username'] ?></h4></td>
                                <td><h4><?= $user['lastname'] ?></h4></td>
                                <td><h4><?= $user['phone'] ?></h4></td>
                                <td><h4><?= $user['timestamp'] ?></h4></td>
                                <td>
                                    <h4><a href="users/<?= $user['id'] ?>/view">
                                            Перейти
                                        </a></h4>
                                </td>
                                <td>
                                    <h4><a href="users/<?= $user['id'] ?>/edit">
                                            Редактировать
                                        </a></h4>
                                </td>
                                <td>
                                    <form action="users/<?= $user['id'] ?>/delete" method="POST">

                                        <button class="btn btn-danger" type="submit" name="delete">Удалить</button>


                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>


                    <!-- Trigger the modal with a button -->
                    <button type="button" data-toggle="modal" data-target="#mymodal" class="btn btn-primary btn-lg">
                        Добавить
                    </button>
                    <!-- Modal -->


                    <div class="modal fade" id="mymodal" role="dialog" aria-labelledby="myModalLabel"
                         aria-hidden="true">

                        <div class="modal-dialog">
                            <!-- Modal content-->

                            <div class="modal-content">

                                <div class="modal-header">

                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;
                                    </button>
                                    <h4 class="modal-title" id="myModalLabel">Добавить нового пользователя</h4>
                                </div>
                                <div class="modal-body">
                                    <div style="margin-top: 20px" class="col-sm-6">
                                        <form enctype="multipart/form-data" action="users/create" class="form-group"
                                              method="post">


                                            <p><input type="file" name="photo" required></p>
                                            <p><input minlength="2" maxlength="15" id="mw1" class="form-control"
                                                   type="text" name="username"
                                                   placeholder="Имя" required></p>
                                            <p><input minlength="2" maxlength="15" id="mw1" class="form-control"
                                                   type="text" name="lastname"
                                                   placeholder="Фамилия" required></p>
                                            <p><input class="form-control" id="mw1" minlength="12" type="tel" name="phone"
                                                   placeholder="+7 (900) 123-45-67"
                                                   pattern="\+7\s?[\(]{0,1}9[0-9]{2}[\)]{0,1}\s?\d{3}[-]{0,1}\d{2}[-]{0,1}\d{2}"
                                                   required></p>

                                            <button id="mw1" class="btn btn-primary" type="submit">Добавить</button>
                                            <button id="mw1" type="button" class="btn btn-default" data-dismiss="modal">
                                                Отмена
                                            </button>

                                        </form>

                                    </div>
                                    <div class="modal-footer">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <script>
                        $(document).ready(function () {
                            $("#mybtn").click(function () {
                                $("#mymodal").modal();
                            });
                        });
                    </script>

                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-sm-12">
                <div style="margin-top: 20px">
                    <h1>Товары</h1>

                    <table class="table">
                        <thead>
                        <tr>
                            <td>ID</td>
                            <td>Название</td>
                            <td>Описание</td>
                            <td>Цена</td>
                            <td>Дата создания</td>
                            <td>Перейти</td>
                            <td>Редактировать</td>
                            <td>Удалить</td>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($products as $product) : ?>
                            <tr>
                                <td><h4><?= $product['id'] ?></h4></td>
                                <td><h4><?= $product['title'] ?></h4></td>
                                <td><h4><?= $product['description'] ?></h4></td>
                                <td><h4>$<?= $product['price'] ?></h4></td>
                                <td><h4><?= $product['timestamp'] ?></h4></td>
                                <td>
                                    <h4><a href="products/<?= $product['id'] ?>/view">
                                            Перейти
                                        </a></h4>
                                </td>
                                <td>
                                    <h4><a href="products/<?= $product['id'] ?>/edit">
                                            Редактировать
                                        </a></h4>
                                </td>
                                <td>
                                    <form action="products/<?= $product['id'] ?>/delete" method="POST">

                                        <button class="btn btn-danger" type="submit" name="delete">Удалить</button>


                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>


                    <!-- Trigger the modal with a button -->
                    <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary btn-lg">
                        Добавить
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="myModal" role="dialog" aria-labelledby="myModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;
                                    </button>
                                    <h4 class="modal-title" id="myModalLabel">Добавить новый товар</h4>
                                </div>
                                <div class="modal-body">
                                    <div style="margin-top: 20px" class="col-sm-6">
                                        <form action="products/create" class="form-group" method="post">
                                            <p> <input id="mw1" class="form-control" type="text" name="title"
                                                       placeholder="Название" required></p>
                                            <p> <input id="mw1" class="form-control" type="text" name="description"
                                                   placeholder="Описание" required></p>
                                            <p> <input id="mw1" class="form-control" type="text" name="price"
                                                   placeholder="Цена"
                                                   required></p>
                                            <button id="mw1" class="btn btn-primary" type="submit">Добавить</button>
                                            <button id="mw1" type="button" class="btn btn-default" data-dismiss="modal">
                                                Отмена
                                            </button>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script>
                        $(document).ready(function () {
                            $("#myBtn").click(function () {
                                $("#myModal").modal();
                            });
                        });
                    </script>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-sm-12">
                <div style="margin-top: 20px">
                    <h1>Отзывы</h1>
                    <table class="table">
                        <thead>
                        <tr>
                            <td>ID</td>
                            <td>Имя</td>
                            <td>Телефон</td>
                            <td>Сообщение</td>
                            <td>Дата создания</td>
                            <td>Перейти</td>
                            <td>Редактировать</td>
                            <td>Удалить</td>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($reviews as $review) : ?>
                            <tr>
                                <td><h4><?= $review['id'] ?></h4></td>
                                <td><h4><?= $review['name'] ?></h4></td>
                                <td><h4><?= $review['phone'] ?></h4></td>
                                <td><h4><?= $review['text'] ?></h4></td>
                                <td><h4><?= $review['timestamp'] ?></h4></td>
                                <td>
                                    <h4><a href="reviews/<?= $review['id'] ?>/view">
                                            Перейти
                                        </a></h4>
                                </td>
                                <td>
                                    <h4><a href="reviews/<?= $review['id'] ?>/edit">
                                            Редактировать
                                        </a></h4>
                                </td>
                                <td>
                                    <form action="reviews/<?= $review['id'] ?>/delete" method="POST">
                                        <input
                                                type="hidden"
                                                name="id"
                                                value="<?= $review['id'] ?>"
                                        >
                                        <button class="btn btn-danger" type="submit" name="delete">Удалить</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>

                    <!-- Trigger the modal with a button -->
                    <button type="button" data-toggle="modal" data-target="#MyModal" class="btn btn-primary btn-lg">
                        Добавить
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="MyModal" role="dialog" aria-labelledby="myModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;
                                    </button>
                                    <h4 class="modal-title" id="myModalLabel">Добавить новый отзыв</h4>
                                </div>
                                <div class="modal-body">
                                    <div style="margin-top: 20px" class="col-sm-6">
                                        <form action="reviews/create" class="form-group" method="post">
                                            <p><input id="mw1" class="form-control" type="text" name="name"
                                                   placeholder="Имя" required></p>
                                            <p><input id="mw1" class="form-control" type="text" name="phone"
                                                   placeholder="Номер телефона" required></p>
                                            <p><textarea id="mw1" class="form-control" type="text" name="text"
                                                      placeholder="Сообщение"
                                                      required></textarea></p>
                                            <button id="mw1" class="btn btn-primary" type="submit">Добавить</button>
                                            <button id="mw1" type="button" class="btn btn-default" data-dismiss="modal">
                                                Отмена
                                            </button>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script>
                        $(document).ready(function () {
                            $("#MyBtn").click(function () {
                                $("#MyModal").modal();
                            });
                        });
                    </script>


                </div>
            </div>
        </div>


    </div>
</div>






</body>
</html>