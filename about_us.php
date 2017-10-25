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
<div class="navbar" style="margin: -2px">
    <nav class="navbar navbar-inverse bg-inverse">


        <a class="navbar-brand" href="">Главная</a>>
        <a class="navbar-brand"  href="admin">Панель администратора</a>
        <a class="navbar-brand" href="about_us.php">О нас</a>
        <a class="navbar-brand" href="about_us.php">Контакты</a>
        <a type="button" data-toggle="modal" data-target="#myModal" class="navbar-brand">Написать отзыв</a>
        <a class="navbar-brand" href="#">Корзина</a>

        </ul>

    </nav>
</div>

<div class="modal fade" id="myModal" role="dialog" aria-labelledby="myModalLabel"
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

                <div class="row">
                    <div class="col-md-6" style="margin-top: 20px">
                        <form action="reviews/create" class="form-horizontal" role="form" method="POST">
                            <div class="form-group">
                                <div class="col-sm-10">
                                    <input
                                            type="text"
                                            class="form-control"
                                            id="name"
                                            placeholder="Ваше имя"
                                            name="name"
                                    >
                                </div>
                            </div>
                            <div class="form-group">

                                <div class="col-sm-10">
                                    <input
                                            type="text"
                                            class="form-control"
                                            id="phone"
                                            placeholder="Ваше номер телефона"
                                            name="phone"
                                    >
                                </div>
                            </div>
                            <div class="form-group">

                                <div class="col-sm-10">
                                    <input
                                            type="text"
                                            class="form-control"
                                            id="text"
                                            placeholder="Ваше сообщение"
                                            name="text"
                                    >
                                </div>
                            </div>


                            <button type="submit" class="btn btn-default">Отправить</button>


                        </form>
                    </div>

                    <div class="modal-footer">
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



<div class="container" style="margin-top: -1.4%" class="align-content-center">
    <div class="jumbotron" style="background-color: aliceblue">
        <h1 style="text-align: center">Адрес компании</h1>
<h3>Контакты</h3>
<p>115551, Москва, а/я 20, ООО "Вайлдберриз"</p>
<p>Юридический адрес:</p>
<p>142715, Московская область, Ленинский район, деревня Мильково, владение 1</p>
    </div>
</div>

</body>
</html>