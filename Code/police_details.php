<!DOCTYPE html>
<html>
    <head>
        <?php
            include 'manage_page.php';
            include 'connection.php';
        ?>
    </head>
    <body>
        <div class="d-flex">
            <div style="margin-left: 20px;">
                <form action='action.php' method="post">
                    <center>
                        <table style="background-color: black; color: white; opacity: 0.8; padding: 20px; margin-top: 30px;">
                            <tr>
                                <td colspan="2" style="text-align: center; padding-bottom: 20px; font-size: 20px;">Details</td>
                            </tr>
                            <tr>
                                <td>Police ID</td>
                                <td>
                                    <input style="padding: 10px; padding-right: 35px; padding-top: 2px; padding-bottom: 2px;" type="text" id="police_id" name="police_id" placeholder="Police ID">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" style="text-align: center;"><br>
                                    <input style="background-color: green" type="submit" name="submit" value="Details">
                                </td>
                            </tr>
                        </table>
                    </center>
                </form>
            </div>
            <div style="margin-left: 20px;">
                <?php
                    $getQuery = "SELECT Fname, Pid, Age, Gender, Address, Ward_no FROM POLICE";
                    $excecuteQuery = pg_exec($con, $getQuery);
                    if ($excecuteQuery) {
                        echo '<center>';
                        echo '<table  style="background-color: white; padding: 10px; margin-top: 30px;">';
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
                ?>
            </div>
        </div>
    </body>
</html>