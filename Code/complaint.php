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
            $getQuery = "select Cname, Adhar_no, Phone, Address from CITIZEN  where Adhar_no in (select Adhar_no from complaint where Adhar_no = Adhar_no)";
            $excecuteQuery = pg_exec($con, $getQuery);
            if ($excecuteQuery) {
                echo '<center>';
                echo '<table  style="background-color: white; padding: 10px; margin-top: 30px;">';
                if (pg_num_rows($excecuteQuery) > 0) {
                    echo '<tr>';
                    echo '<th style="padding-right: 50px; text-align: center"> Name </th>';
                    echo '<th style="padding-right: 50px; text-align: center"> Adhar anumber </th>';
                    echo '<th style="padding-right: 50px; text-align: center"> Phne Number </th>';
                    echo '<th style="padding-right: 50px; text-align: center"> Address </th>';
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
                    echo '<th style="padding: 10px; text-align: center"> No record found...! </th>';
                    echo '</tr>';
                    echo '</table>';
                    echo '</center>';                        
                }
            } else {
                echo 'Some error occured while fetching detail...!';
            }
        ?>
    </body>
</html>