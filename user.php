<?php
class User {
    private $conn;

    public function __construct($dbConnection) {
        $this->conn = $dbConnection;
    }

    public function create($id, $naam, $email, $gewerkteuren, $locatie) {
        $id = $this->conn->real_escape_string($id);
        $naam = $this->conn->real_escape_string($naam);
        $email = $this->conn->real_escape_string($email);
        $gewerkteuren = $this->conn->real_escape_string($gewerkteuren);
        $locatie = $this->conn->real_escape_string($locatie);


        $sql = "INSERT INTO werknemer (id, naam, email, gewerkteuren, locatie) VALUES ('$id','$naam', '$email', '$gewerkteuren', '$locatie')";

        return $this->conn->query($sql);
    }

    public function read() {
        $users = [];
        $result = $this->conn->query("SELECT * FROM werknemer");

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $users[] = $row;
            }
        }

        return $users;
    }

    public function update($id, $naam, $email, $gewerkteuren, $locatie) {
        $id = (int) $id;
        $naam = $this->conn->real_escape_string($naam);
        $email = $this->conn->real_escape_string($email);
        $gewerkteuren = $this->conn->real_escape_string($gewerkteuren);
        $locatie = $this->conn->real_escape_string($locatie);

        $sql = "UPDATE werknemer SET naam='$naam', email='$email', gewerkteuren='$gewerkteuren', locatie='$locatie' WHERE id=$id";

        return $this->conn->query($sql);
    }

    public function delete($id) {
        $sql = "DELETE FROM werknemer WHERE id=$id";

        return $this->conn->query($sql);
    }
}
?>