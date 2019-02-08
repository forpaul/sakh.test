<?
    class Dbconnect{
        private $server;
        private $username;
        private $password;
        private $dbname;

        protected function connect(){
            $this->server = 'localhost';
            $this->username = 'root';
            $this->password = '';
            $this->dbname = 'sakh';

            $connection = new mysqli($this->server, $this->username, $this->password, $this->dbname);
            return $connection;
        }

    }
?>