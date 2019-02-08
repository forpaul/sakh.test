<?
    include '../models/transfer_model.php';

    class getTransfer{
        public function DataTransfer(){
            if(isset($_POST['transfer'])) //get data from transfer form
                $fromuser = $_POST['fromuser'];
                $howmany = $_POST['howmany'];
                $msg = $_POST['message'];
                $touser = $_POST['touser'];

                $setdata = new treatmentTransfer();  //generate new object for transfer
                $setdata->treat($fromuser, $howmany, $msg, $touser);
        }
    }
    $getTr = new getTransfer();
    $getTr->DataTransfer();
?>
