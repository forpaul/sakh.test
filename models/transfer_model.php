<?
    include 'dbconnect.php';

    class treatmentTransfer extends Dbconnect{
        public function treat($fromuser, $howmany, $msg, $touser){

            $transfer = "INSERT INTO transfers (id, fromuser, howmany, msg, touser)
            VALUES ('', '$fromuser','$howmany', '$msg', '$touser')";
            $updateSender = "UPDATE users SET balance = balance - '$howmany' WHERE username = '$fromuser'";
            $updateRecipient = "UPDATE users SET balance = balance + '$howmany' WHERE username = '$touser'";
            $checkBalance = "SELECT balance FROM users WHERE username = '$fromuser'";
            $checkBalance_result = $this->connect()->query($checkBalance);
                while($row = $checkBalance_result->fetch_assoc()){
                    $tmp = $row['balance'] - $howmany;
            }
            if(!treatmentTransfer::checkBalance($howmany)){
                echo 'Balance should be number' . '<br>';
                echo 'Example: 12345';
                header('refresh:2; url=../views/index.php');
                
            }
            if($tmp < 0){
                echo 'Insufficient funds' . '<br>';
                header('refresh:2 url=../views/index.php');
            }
            if ($fromuser == $touser){
                echo 'Transfer is not possible to yourself' . '<br>';
                header('refresh:2; url=../views/index.php');
            }
            
            else{
            $transfer_result = $this->connect()->query($transfer);
            $updateSender_result = $this->connect()->query($updateSender);
            $updateRecipient_result = $this->connect()->query($updateRecipient);
            echo 'Transfer completed successfully';
            header('refresh:2; url=../views/index.php');
            }
            
        }

        public static function checkBalance($howmany){
            if((int) $howmany) return true;
            else return false;
        }
    }

?>