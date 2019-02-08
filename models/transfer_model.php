<?
    include 'dbconnect.php';

    class treatmentTransfer extends Dbconnect{
        public function treat($fromuser, $howmany, $msg, $touser){

            $transfer = "INSERT INTO transfers (id, fromuser, howmany, msg, touser); //подготовка запросов  и обновление данных 
            VALUES ('', '$fromuser','$howmany', '$msg', '$touser')";                //для записи трансфера в таблицу
            $updateSender = "UPDATE users SET balance = balance - '$howmany' WHERE username = '$fromuser'"; //у пользователей
            $updateRecipient = "UPDATE users SET balance = balance + '$howmany' WHERE username = '$touser'";
            $checkBalance = "SELECT balance FROM users WHERE username = '$fromuser'"; //запрос на получение информации о балансе, для проверки во время перевода(целостность данных)
            $checkBalance_result = $this->connect()->query($checkBalance);
                while($row = $checkBalance_result->fetch_assoc()){  //получаем данные о балансе
                    $tmp = $row['balance'] - $howmany;
            }
            if(!treatmentTransfer::checkBalance($howmany)){ //проверка на корректность ввода баланса(числовое значение)
                echo 'Balance should be number' . '<br>';
                echo 'Example: 12345';
                header('refresh:2; url=../views/index.php');
                
            }
            if($tmp < 0){  //проверка баланса
                echo 'Insufficient funds' . '<br>';
                header('refresh:2 url=../views/index.php');
            }
            if ($fromuser == $touser){ //проверка на отпрвку самому себе
                echo 'Transfer is not possible to yourself' . '<br>';
                header('refresh:2; url=../views/index.php');
            }
            
            else{ //если всё хорошо, то совершаем запросы
            $transfer_result = $this->connect()->query($transfer);
            $updateSender_result = $this->connect()->query($updateSender);
            $updateRecipient_result = $this->connect()->query($updateRecipient);
            echo 'Transfer completed successfully';
            header('refresh:2; url=../views/index.php');
            }
            
        }

        public static function checkBalance($howmany){ //фукнция проверки
            if((int) $howmany) return true;
            else return false;
        }
    }

?>
