

<?php
class DatabaseConnection {
    private $hostName = 'localhost'; // Replace with your MySQL server host
    private $userName = 'new_user'; // Replace with your MySQL username
    private $password = 'password'; // Replace with your MySQL password
    private $dbName = 'crud'; // Replace with your MySQL database name
    private $conn;

    public function __construct() {
        $this->conn = new mysqli($this->hostName, $this->userName, $this->password, $this->dbName);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function getConnection() {
        return $this->conn;
    }

    public function closeConnection() {
        $this->conn->close();
    }
}
?>

</body>
</html>
