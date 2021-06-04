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
            if ($_POST["pid"] != "" && $_POST["pid"] != null && isset($_POST["submit"])) {
                $policeId = $_POST["pid"];
                $getQuery = "select p.fname, i.fname, i.age, i.gender from police as p, police as i where p.incharge_id = '$policeId' and i.age>'35' and p.incharge_id = i.pid";
                $excecuteQuery = pg_exec($con, $getQuery);
                if ($excecuteQuery) {
                    echo '<center>';
                    echo '<table style="background-color: white; padding: 10px; margin-top: 30px; ">';
                    if (pg_num_rows($excecuteQuery) > 0) {
                        echo '<tr>';
                        echo '<th style="padding-right: 50px; text-align: center"> Police Name </th>';
                        echo '<th style="padding-right: 50px; text-align: center"> Incharge Name </th>';
                        echo '<th style="padding-right: 50px; text-align: center"> Age </th>';
                        echo '<th style="padding-right: 50px; text-align: center"> Gender </th>';
                        echo '</tr>';
                        while($policeArray = pg_fetch_array($excecuteQuery)) {
                            echo '<tr>';
                            echo '<td style="padding-right: 50px; text-align: center">' . $policeArray[0] . '</td>';
                            echo '<td style="padding-right: 50px; text-align: center">' . $policeArray[1] . '</td>';
                            echo '<td style="padding-right: 50px; text-align: center">' . $policeArray[2] . '</td>';
                            echo '<td style="padding-right: 50px; text-align: center">' . $policeArray[3] . '</td>';
                            echo '</tr>';
                        }
                    } else {
                        echo '<tr>';
                        echo '<th style="padding: 10px; text-align: center"> The police officer you are looking is not a incharge of any one...! </th>';
                        echo '</tr>';
                        echo '</table>';
                        echo '</center>';                        
                    }
                } else {
                    echo 'Some error occured while fetching detail...!';
                }
            } else {
                header("Location: incharge.php");
            }
        ?>
    </body>
</html>
