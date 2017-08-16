<?php

class Sudut
{
    // table name definition and database connection
    private $db_conn;
    private $table_name = "tb_pesilat";

    // object properties
    public $id_pesilat;
    public $nama_pesilat;
    public $kelas;

    public function __construct($db)
    {
        $this->db_conn = $db;
    }

    // used by create.php and edit.php to select category drop-down list
    function getAll()
    {
        //select all data
        $sql = "SELECT id_pesilat, nama_pesilat, kelas FROM " . $this->table_name . "  ORDER BY kelas";

        $prep_state = $this->db_conn->prepare($sql);
        $prep_state->execute();

        return $prep_state;
    }

    // used by index.php to read category name
    function getName()
    {

        $sql = "SELECT nama_pesilat FROM " . $this->table_name . " WHERE id_pesilat = ? limit 0,1";

        $prep_state = $this->db_conn->prepare($sql);
        $prep_state->bindParam(1, $this->id); // und somit der Platzhalter der SQL Anweisung :id durch die angegebene Variable $id ersetzt.
        $prep_state->execute();

        $row = $prep_state->fetch(PDO::FETCH_ASSOC);

        $this->nama_pesilat = $row['nama_pesilat'];
    }
}

