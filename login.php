<?PHP

session_start();

if ($_GET["logout"] == 1 and $_SESSION["id"]) {

    session_destroy();

    $message = "You have been logged out. Have a good day!";
}

include("connection.php");

if ($_POST['submit'] == "Sign Up") {

    if (!$_POST['email']) $error .= "<br>Please enter your email.";
    else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) $error .= "<br>Please enter a valid email address.";

    if (!$_POST['password']) $error .= "<br>Please enter your password.";
    else {

        if (strlen($_POST['password']) < 8) $error .= "<br>Please enter a password at least 8 charcters.";
        if (!preg_match('`[A-Z]`', $_POST['password'])) $error .= "<br>Please include at least one capital letter in your password.";
    }

    if ($error) $error = "There ware error(s) in your signup details: " . $error;
    else {

        $query = "SELECT * FROM users_info WHERE email = '" . mysqli_real_escape_string($link, $_POST['email']) . "'";

        $result = mysqli_query($link, $query);

        $results = mysqli_num_rows($result);

        if ($results) $error = "The email address is already registered, do you want to log in ?";
        else {

            $query = "INSERT INTO users_info (name, email, password, gender, phone, diary) VALUES ('', '" . mysqli_real_escape_string($link, $_POST['email']) . "','" . md5(md5($_POST['email']) . $_POST['password']) . "', '', '', '')";
            // $query = "INSERT INTO users_info (name, email, password, gender, phone) VALUES ('Dog', 'Dog@gmail.com', 'Dog123456', 'Male', '0910222456')";


            mysqli_query($link, $query);
            $error =  "You've been signed up!";

            $_SESSION["id"] = mysqli_insert_id($link);

            header("Location:mainpage.php"); // header指令需要在HTML之前
        }
    }
}

if ($_POST['submit'] == "Log In") {

    $query = "SELECT * FROM users_info WHERE email = '" . mysqli_real_escape_string($link, $_POST['loginemail']) . "' AND password = '" . md5(md5($_POST['loginemail']) . $_POST['loginpassword']) . "' LIMIT 1";

    $result = mysqli_query($link, $query);

    $row = mysqli_fetch_array($result);

    if ($row) {

        $_SESSION['id'] = $row['id'];

        header("Location:mainpage.php");
    } else {

        $error = "We could not find a user with that email and password. Please try again later.";
    }
}
