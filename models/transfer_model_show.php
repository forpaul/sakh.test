<?
    //include 'dbconnect.php';

    class ShowLogs extends Dbconnect{
        function generateLog(){

            $getlogs = "SELECT * FROM transfers ORDER BY id LIMIT 0, 3";
            $result_logs = $this->connect()->query($getlogs);

            if(($result_logs->num_rows) > 0){
                while($row = $result_logs->fetch_assoc()){
                    echo $row['id'] . '<br>';
                    echo $row['fromuser'] . '<br>';
                    echo $row['howmany'] . '<br>';
                    echo $row['msg'] . '<br>';
                    echo $row['touser'] . '<br>';
                    echo '<hr>';
                }
            }
        }
    }


?>