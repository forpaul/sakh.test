<?
include '../models/users_model.php';
include '../models/transfer_model_show.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SAKH test.task</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="../css/main.css" />
    <script src="main.js"></script>
</head>
<body>
<h3>Transfer bitcoin from user to user</h3>
    <div class="operation">
        <div class="TransferLogs">
            <div class="transfer">
                <form action="../controllers/transfers_controller.php" method="post" id="transferForm">
                    <h4>From:</h4>
                    <select name="fromuser" id="sel1">
                    <?
                        $show = new Generate();
                        $show->genSelect();
                    ?>
                    </select>

                    <input type="text" name="howmany" required id="howmany" placeholder="How many to transfer">
                    <input type="text" name="message" required id="message" placeholder="Message for recipient">
                    <h4>To:</h4>
                    <select name="touser" id="sel2">
                    <?
                        $show = new Generate();
                        $show->genSelect();
                    ?>
                    </select>
                    <input type="submit" name="transfer" id="btn-transfer" value="Transfer">
                </form>  
            </div>
            <div class="logs">
            <h4>Logs</h4>
            <p>Last three transfers</p>
                <?
                    $showlogs = new ShowLogs();
                    $showlogs->generateLog();

                ?>
            </div>
        </div>
    </div>
    
    <div class="users">
        <h3>Users</h3>
        <form action="../controllers/users_controller.php" method="post" id="usersForm">
            <input type="text" name="username" id="" required placeholder="Username">
            <input type="text" name="balance" id="" required placeholder="Start balance">
            <input type="text" name="about" id="" required placeholder="About You">
            <input type="submit" value="Add user" name="adduser">
        </form>
        <div class="showUsers">
            <? 
                
                $show = new ShowUsers();
                $show->getUsers();
            ?>
        </div>
    </div>
</body>
</html>