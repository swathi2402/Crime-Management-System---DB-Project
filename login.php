<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css.css" >
        <title></title>
    </head>
    <body class="body">
        <div class="header">
            <div class="heading">Crime Management System</div>
            <div class="d-flex">
                <div class="flex-1"></div>
                <div class="flex-2">
                    <marquee>
                        <span style="font-size: 30px; color: burlywood;">Stop crime, before crime stops you.</span>
                    </marquee>
                </div>
                <div class="flex-1"></div>
            </div>
        </div>
        <div class="d-flex nav-header">
            <ul class="d-flex flex-2">
                <li class="nav-bar"><a class="list-anchor" href="index.php">Back</a></li>
            </ul>
        </div>
        <div>
            <form action='login.php' method="post">
                <center>
                    <table style="background-color: black; color: white; opacity: 0.8; padding: 20px; margin-top: 30px;">
                        <tr>
                            <td colspan="2" style="text-align: center; padding-bottom: 20px; font-size: 20px;">Login</td>
                        </tr>
                        <tr>
                            <td>Username</td>
                            <td>
                                <input type="text" id="username" name="username" placeholder="Username" required style="padding: 10px; padding-right: 35px; padding-top: 2px; padding-bottom: 2px; margin-bottom: 10px;">
                            </td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td>
                                <input type="password" id="password" name="password" placeholder="Password" required style="padding: 10px; padding-right: 35px; padding-top: 2px; padding-bottom: 2px;">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align: center;"><br>
                                <input style="background-color: blue; color: white" type="submit" name="login" value="Login">
                            </td>
                        </tr>
                        <?php
                            include 'connection.php';
                            if (isset($_POST["login"])) {
                                $pword = $_POST["password"];
                                $uname = $_POST["username"];
                                $authenticate = "SELECT count(*) FROM ADMIN WHERE username = '$uname' AND password = '$pword'";
                                $excecuteQuery = pg_exec($con, $authenticate);
                                if ($excecuteQuery) {
                                    while($result = pg_fetch_array($excecuteQuery)) {
                                        if ($result[0] == 0) {
                                            echo '<tr>';
                                                echo '<td colspan="2" style="text-align: center;"><br>';
                                                    echo 'Invalid Username or password...!';
                                                echo '</td>';
                                            echo '</tr>';
                                        } else {
                                            header("Location: manage_page.php");
                                        }
                                    }
                                }
                            }
                        ?>
                    </table>
                </center>
            </form>
        </div>
    </body>
</html>