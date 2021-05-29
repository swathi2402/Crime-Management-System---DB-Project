<!DOCTYPE html>
<html>
    <head>
        <?php
            include 'manage_page.php';
            include 'connection.php';
        ?>
    </head>
    <body>
        <center>
            <form action='action4.php' method="post">
                <center>
                    <table style="background-color: black; color: white; opacity: 0.8; padding: 20px; margin-top: 30px;">
                        <tr>
                            <td colspan="2" style="text-align: center; padding-bottom: 20px; font-size: 20px;">Details of Police Incharge</td>
                        </tr>
                        <tr>
                            <td>Police ID</td>
                            <td>
                                <input style="padding: 10px; padding-right: 35px; padding-top: 2px; padding-bottom: 2px;" type="text" id="pid" name="pid" placeholder="Police ID">
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
        </center>>
    </body>
</html>