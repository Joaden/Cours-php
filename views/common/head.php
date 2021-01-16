<head>
    <meta charset="utf-8">
    <title><?php echo($PAGE_TITLE);?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- FONTS -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Black+Ops+One&display=swap" rel="stylesheet">

    <!-- SASS/CSS (this file imports Bootstrap Scss) -->
    <link rel="stylesheet" href="../../assets/scss/mainStyle.css">

    <?php 
        // THIS IS A COOKIE TEST :
            // model:
                // setcookie(string $cookie_name, string $cookie_value, int $cookie_expires=0, string $cookie_path="", string $cookie_domain="", bool $cookie_secure = false, bool $cookie_httponly = false);
            // our version:
                // $cookie_name = "cookie_name"; 
                // $cookie_value = "This cookie is really just a test!";
                // $cookie_expire_in = time()+300;
                // setcookie($cookie_name; $cookie_value, $cookie_expire_in); 
                    // expire in 300sec = 5 min
    ?>

</head>