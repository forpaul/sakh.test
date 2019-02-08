<?
    include 'dbconnect.php';

    class TreatmentData extends Dbconnect{
        public function treatment($username, $balance, $about){
            $addUser = "INSERT INTO users (id, username, balance, about)
            VALUES ('', '$username', '$balance', '$about')";

            if(($result_add = $this->connect()->query($addUser)) === TRUE){
                echo 'User added successfully!';
                header('refresh:2; url=../views/index.php');
            }
            else{
                echo 'Error database';
            }
        
        }

        public function checkfields($username, $balance, $about){
            $check = "SELECT * FROM users WHERE username = '$username'";
            $result_check = $this->connect()->query($check);

            if(($result_check->num_rows) > 0){
                echo 'This username is used. Use other username';
                header('refresh:2; url=../views/index.php');
            }
            if(!TreatmentData::checkBalance($balance)){
                echo 'Balance should be number' . '<br>';
                echo 'Example: 12345.12';
                header('refresh:2; url=../views/index.php');
            }         
            else{
                $this->treatment($username, $balance, $about);
            }
        }
        
        public static function checkBalance($balance){
            if((float) $balance) return true;
            else return false;
        }

    }

    class ShowUsers extends Dbconnect{
        public function getUsers(){

            $get = "SELECT * FROM users";
            $result_get = $this->connect()->query($get);

            if(($result_get->num_rows) > 0){
                while($row = $result_get->fetch_assoc()){
                    echo '<div class="user">';
                    echo $row['username'] . '<br>';
                    echo $row['balance'] . '<br>';
                    echo $row['about'] . '<br>' . '<br>';
                    echo '</div>';
                }
            }
        }
    }

    class Generate extends Dbconnect{
        public function genSelect(){
            $get = "SELECT username FROM users";
            $result_get = $this->connect()->query($get);
            //echo '<select name="fromuser" id="sel1">';
            if(($result_get->num_rows) > 0){
                while($row = $result_get->fetch_assoc()){
                    echo '<option>';
                    echo $row['username'] . '<br>';
                    echo '</option>';
                }
            }
            //echo '</select>';
        }
    }

?>