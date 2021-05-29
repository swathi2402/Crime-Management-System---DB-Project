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
            if ($_POST["police_id"] != "" && $_POST["police_id"] != null && isset($_POST["submit"])) {
                $policeId = $_POST["police_id"];
                $getQuery = "SELECT Fname, Pid, Age, Gender, Address, Ward_no FROM POLICE WHERE Pid = '$policeId'";
                $excecuteQuery = pg_exec($con, $getQuery);
                if ($excecuteQuery) {
                    echo '<center>';
                    echo '<table style="background-color: white; padding: 10px; margin-top: 30px; ">';
                    if (pg_num_rows($excecuteQuery) > 0) {
                        echo '<tr>';
                        echo '<th style="padding-right: 50px; text-align: center"> Name </th>';
                        echo '<th style="padding-right: 50px; text-align: center"> Police ID </th>';
                        echo '<th style="padding-right: 50px; text-align: center"> Age </th>';
                        echo '<th style="padding-right: 50px; text-align: center"> Gender </th>';
                        echo '<th style="padding-right: 50px; text-align: center"> Address </th>';
                        echo '<th style="padding-right: 50px; text-align: center"> Ward Number </th>';
                        echo '</tr>';
                        while($policeArray = pg_fetch_array($excecuteQuery)) {
                            echo '<tr>';
                            echo '<td style="padding-right: 50px; text-align: center">' . $policeArray[0] . '</td>';
                            echo '<td style="padding-right: 50px; text-align: center">' . $policeArray[1] . '</td>';
                            echo '<td style="padding-right: 50px; text-align: center">' . $policeArray[2] . '</td>';
                            echo '<td style="padding-right: 50px; text-align: center">' . $policeArray[3] . '</td>';
                            echo '<td style="padding-right: 50px; text-align: center">' . $policeArray[4] . '</td>';
                            echo '<td style="padding-right: 50px; text-align: center">' . $policeArray[5] . '</td>';
                            echo '</tr>';
                        }
                    } else {
                        echo '<tr>';
                        echo '<th style="padding: 10px; text-align: center"> No record found...! </th>';
                        echo '</tr>';
                        echo '</table>';
                        echo '</center>';                        
                    }
                } else {
                    echo 'Some error occured while fetching detail...!';
                }
            } else {
                header("Location: police_details.php");
            }
        ?>
    </body>
</html>
