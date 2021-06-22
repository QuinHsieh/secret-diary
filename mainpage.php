<?PHP include("login.php");

session_start();

include("connection.php");

$query = "SELECT diary FROM users_info WHERE id = '" . $_SESSION["id"] . "' LIMIT 1";

$result = mysqli_query($link, $query);

$row = mysqli_fetch_array($result);

$diary = $row["diary"];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>

    <title>Secrect Diary</title>

    <style>
        .heroImage {

            background-image: url("img/bg.jpg");
            height: 670px;
            border-radius: 0;
            background-size: cover;
            /* 適應裝飾寬度 */
        }

        .footer-height {

            height: 400px;
            margin: 0;
            padding-top: 50px;
        }

        #appStoreImage {

            width: 200px;
        }
    </style>

</head>

<body>

    <nav class="navbar navbar-expand-xl navbar-light bg-light">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">

            <a href="#" class="navbar-brand">Secrect Diary</a>

            <ul class="navbar-nav nav">

                <li><a href="index.php?logout=1">Log Out</a></li>

            </ul>
        </div>

    </nav>

    <div class="jumbotron heroImage text-center">

        <textarea class="mx-auto col-md-7 form-control"><?php echo $diary; ?></textarea>

    </div>

    <script>
        $(".contentContainer").css("mid-height", $(window).height());

        $("textarea").css("min-height", $(window).height() * 0.8);

        $("textarea").keyup(function() {

            $.post("updatediary.php", {
                diary: $("textarea").val()
            });

        });
    </script>

</body>

</html>