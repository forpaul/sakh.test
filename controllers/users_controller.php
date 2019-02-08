<?
    include '../models/users_model.php';

    class GetData{
        public function getUserData(){
            if(isset($_POST['adduser'])){ //get data for add user
                $username = $_POST['username'];
                $balance = $_POST['balance'];
                $about = $_POST['about'];

                $sendmodel = new TreatmentData();
                $sendmodel->checkfields($username, $balance, $about);
            }
        }    
    }
    $get = new GetData();
    $get->getUserData();
?>
