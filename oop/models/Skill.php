<?php
class Skill
{
    // Connection
    private $conn;
    // Table
    private $db_table = "tb_skill";
    // Columns
    public $id_user;
    public $id_skill;
    public $skill;
    public $lembaga;
    public $nilai;
    // Db connection
    public function __construct($db)
    {
        $this->conn = $db;
    }
    //read
    public function getUser()
    {
        $sqlQuery = "SELECT * FROM " . $this->db_table . "";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }
    public function getUserId()
    {
        $sqlQuery = "SELECT
        id_user,
        id_skill,
        skill,
        lembaga,
        nilai
        FROM
        " . $this->db_table . "
        WHERE
        id_user = ?
        LIMIT 0,1";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->bindParam(1, $this->id_user);
        $stmt->execute();
        $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->id_skill = $dataRow['id_skill'];
        $this->skill = $dataRow['skill'];
        $this->lembaga = $dataRow['lembaga'];
        $this->nilai = $dataRow['nilai'];
    }

    public function getskillId()
    {
        $sqlQuery = "SELECT
        id_user,
        id_skill,
        skill,
        lembaga,
        nilai
        FROM
        " . $this->db_table . "
        WHERE
        id_skill = ?
        LIMIT 0,1";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->bindParam(1, $this->id_skill);
        $stmt->execute();
        $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->id_user = $dataRow['id_user'];
        $this->skill = $dataRow['skill'];
        $this->lembaga = $dataRow['lembaga'];
        $this->nilai = $dataRow['nilai'];
    }
    //CREATE
    public function createSkill()
    {
        $sqlQuery = "INSERT INTO
         " . $this->db_table . "
         SET
         id_user = :id_user,
         skill = :skill,
         lembaga = :lembaga,
         nilai = :nilai";
        $stmt = $this->conn->prepare($sqlQuery);
        // sanitize
        $this->id_user = htmlspecialchars(strip_tags($this->id_user));
        $this->skill = htmlspecialchars(strip_tags($this->skill));
        $this->lembaga = htmlspecialchars(strip_tags($this->lembaga));
        $this->nilai = htmlspecialchars(strip_tags($this->nilai));
        // bind data
        $stmt->bindParam(":id_user", $this->id_user);
        $stmt->bindParam(":skill", $this->skill);
        $stmt->bindParam(":lembaga", $this->lembaga);
        $stmt->bindParam(":nilai", $this->nilai);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
    //UPDATE
    public function updateSkill()
    {
        $sqlQuery = "UPDATE
        " . $this->db_table . "
        SET
        id_user = :id_user,
        skill = :skill,
        lembaga = :lembaga,
        nilai = :nilai
        WHERE
        id_skill = :id_skill";
        $stmt = $this->conn->prepare($sqlQuery);
        $this->id_skill = htmlspecialchars(strip_tags($this->id_skill));
        $this->skill = htmlspecialchars(strip_tags($this->skill));
        $this->lembaga = htmlspecialchars(strip_tags($this->lembaga));
        $this->nilai = htmlspecialchars(strip_tags($this->nilai));
        $this->id_user = htmlspecialchars(strip_tags($this->id_user));
        // bind data
        $stmt->bindParam(":id_skill", $this->id_skill);
        $stmt->bindParam(":skill", $this->skill);
        $stmt->bindParam(":lembaga", $this->lembaga);
        $stmt->bindParam(":nilai", $this->nilai);
        $stmt->bindParam(":id_user", $this->id_user);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
    //DELETE
    function deleteSkill()
    {
        $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE id_skill = ?";
        $stmt = $this->conn->prepare($sqlQuery);
        $this->id_skill = htmlspecialchars(strip_tags($this->id_skill));
        $stmt->bindParam(1, $this->id_skill);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
