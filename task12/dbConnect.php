<?php
class DBConnect {
    //відображення помилок


    private $dbName = "blog";
    private $dbUser = "root";
    private $dbPass = "1111";

    private function connect() {
        ini_set('error_reporting', E_ALL);
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        $var = "bal";
        $dbLink = new mysqli("localhost", $this->dbUser, $this->dbPass, $this->dbName);
        $dbLink->query("SET NAMES 'utf8'"); 
        $dbLink->query("SET CHARACTER SET 'utf8'");
        $dbLink->query("SET SESSION collation_connection = 'utf8_general_ci'");
        return $dbLink;
    }
    public function select($sql) {
        $dbLink = $this->connect();
        $result = $dbLink->query($sql);
        while ($row = $result->fetch_assoc()) {
            
            $postData[] = $row;
            
            
        }

        $dbLink->close();
        return $postData;
    }
}
$sql = "SELECT posts.post_id, posts.post_name, posts.post_description, posts.date, users.nickname FROM posts INNER JOIN users ON posts.user_id=users.user_id ORDER BY posts.date DESC";
$conn = new DBConnect();

var_dump($conn->select($sql));
$rows = $conn->select($sql);

?>