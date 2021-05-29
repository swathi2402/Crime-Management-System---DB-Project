<!DOCTYPE html>
<html>
    <head>
        <?php
            include 'manage_page.php';
            include 'connection.php';
        ?>
    </head>
    <body>
        <?php
            if ($_POST["cname"] != "" && $_POST["cname"] != null && isset($_POST["submit"])) {
                $cname = $_POST["cname"];
                $getQuery = "select cname,  age, gender, adhar_no, address, phone from citizen where not exists ((select fname from police where fname = '$cname') union (select coname from complaint where cname = '$cname'))";
                $excecuteQuery = pg_exec($con, $getQuery);
                if ($excecuteQuery) {
                    echo '<center>';
                    echo '<table style="background-color: white; padding: 10px; margin-top: 30px; ">';
                    if (pg_num_rows($excecuteQuery) > 0) {
                        echo '<tr>';
                        echo "<th style='padding: 10px; text-align: center'> {$_POST["cname"]} is not involved in crime </th>";
                        echo '</tr>';
                    } else {
                        echo '<tr>';
                        echo "<th style='padding: 10px; text-align: center'> {$_POST["cname"]} is involved in crime as a police officer or as a complainee </th>";
                        echo '</tr>';
                        echo '</table>';               
                    }
                } else {
                    echo 'Some error occured while fetching detail...!';
                }
            } else {
                header("Location: free.php");
            }
        ?>
    </body>
</html>
