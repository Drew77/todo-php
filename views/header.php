<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $title; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="public/style.css" type="text/css" />
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    </head>
    <body>
        <div class="header">
        <h1>Todo!</h1>
            <nav>
                <ul>
                    <?php if (isset($_SESSION["id"])){ ?>
                        <li><?php echo $_SESSION["user"]["username"] ?></li>
                        <li><a href="/todo/logout.php">Logout</a></li>
                    <?php } else { ?>
                        <li><a href="/todo/register.php">Register</a></li>
                        <li><a href="/todo/login.php">Login</a></li>
                    <?php } ?>
                </ul>
            </nav>
        </div>
        <div class="container">
        
        
        
