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
            if ($_POST["ipcsname"] != "" && $_POST["ipcsname"] != null && isset($_POST["submit"])) {
                $ipcsname = $_POST["ipcsname"];
                $getQuery = "select Fname, Pid, Address from police where pid in(select pid from criminal where law_id in (select law_id from criminal where law_id in(select law_id from avocation where section='$ipcsname')))";
                $excecuteQuery = pg_exec($con, $getQuery);
                if ($excecuteQuery) {
                    echo '<center>';
                    echo '<table style="background-color: white; padding: 10px; margin-top: 30px; ">';
                    if (pg_num_rows($excecuteQuery) > 0) {
                        echo '<tr>';
                            echo '<th style="padding-right: 50px; text-align: center"> Police Incharge </th>';
                            echo '<th style="padding-right: 50px; text-align: center"> Police ID </th>';
                            echo '<th style="padding-right: 50px; text-align: center"> Address </th>';
                        echo '</tr>';
                        while($policeArray = pg_fetch_array($excecuteQuery)) {
                            echo '<tr>';
                            echo '<td style="padding-right: 50px; text-align: center">' . $policeArray[0] . '</td>';
                            echo '<td style="padding-right: 50px; text-align: center">' . $policeArray[1] . '</td>';
                            echo '<td style="padding-right: 50px; text-align: center">' . $policeArray[2] . '</td>';
                            echo '</tr>';
                        }
                    } else {
                        echo '<tr>';
                        echo '<th style="padding: 10px; text-align: center"> No such section exist in Database...! </th>';
                        echo '</tr>';
                        echo '</table>';
                        echo '</center>';                        
                    }
                } else {
                    echo 'Some error occured while fetching detail...!';
                }
            } else {
                header("Location: ipcsection.php");
            }
        ?>
    </body>
</html>
