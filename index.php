<?PHP include("login.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="Use mySQL database and web programming language to create a diary website." />
    <meta name="author" content="Quin Hsieh" />
    <meta property="og:title" content="Secret Diary" />
    <meta property="og:description" content="mySQL and web programming language secret diary exercise" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="img/og-img.png" />
    <meta property="og:url" content="https://quinhsieh.github.io/secret-diary" />
    <meta property="og:image:alt" content="mySQL and web programming language secret diary exercise" />
    <meta property="og:image:type" content="image/png" />


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
            height: 650px;
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

            <form class="form-inline" method="post">

                <input class="form-control mr-2" type="email" name="loginemail" placeholder="E-mail address" value="<?PHP echo addslashes($_POST['loginemail']); ?>">
                <input class="form-control mr-2" type="password" name="loginpassword" placeholder="Password" value="<?PHP echo addslashes($_POST['loginpassword']); ?>">
                <input class="btn btn-outline-success" type="submit" name="submit" value="Log In">

            </form>

        </div>


    </nav>

    <div class="jumbotron heroImage text-center">
        <h1 class="display-4 text-light">Secrect Diary</h1>
        <p class="lead text-light">Your own private diary, with you wherever you go.</p>

        <div class="col-md-6 mx-auto">

            <?PHP

            if ($error) {

                echo '<div class="alert alert-danger">' . addslashes($error) . '</div>';
            }

            if ($message) {

                echo '<div class="alert alert-success">' . addslashes($message) . '</div>';
            }

            ?>

        </div>

        <p class="text-light">For more information, please <strong class="text-warning">join our
                community, sign up!</strong></p>

        <form method="post">

            <div class="form-group col-md-7 mx-auto mt-4">

                <label for="email" class="text-light">Email Address</label>

                <input type="email" name="email" placeholder="Please enter your e-mail address" class="form-control" value="<?PHP echo addslashes($_POST['email']); ?>">

            </div>

            <div class="form-group col-md-7 mx-auto mt-4">

                <label for="password" class="text-light">Password</label>

                <input type="password" name="password" placeholder="Passowrd" class="form-control" value="<?PHP echo addslashes($_POST['password']); ?>">

            </div>

            <div class="mt-3">

                <input type="submit" name="submit" class="btn btn-warning btn-lg" value="Sign Up">

            </div>

        </form>

    </div>

</body>

</html>