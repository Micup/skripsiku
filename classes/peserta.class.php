<?php

class Peserta
{
    public $db_conn;
    public $table_name = "tb_pesilat";

    public $id_pesilat;
    public $nama_pesilat;
    public $kontingen;
    public $kelas;
    public $jekel;


    public function __construct($db)
    {
        $this->db_conn = $db;
    }


    function create()
    {
        $sql = "INSERT INTO " . $this->table_name . " SET nama_pesilat = ?, kontingen = ?, kelas = ?, jekel = ? ";

        $prep_state = $this->db_conn->prepare($sql);

        $prep_state->bindParam(1, $this->nama_pesilat);
        $prep_state->bindParam(2, $this->kontingen);
        $prep_state->bindParam(3, $this->kelas);
        $prep_state->bindParam(4, $this->jekel);

        if ($prep_state->execute()) {
            return true;
        } else {
            return false;
        }

    }

    public function countAll()
    {
        $sql = "SELECT id_pesilat FROM " . $this->table_name . "";

        $prep_state = $this->db_conn->prepare($sql);
        $prep_state->execute();

        $num = $prep_state->rowCount(); 
        return $num;
    }


    function update()
    {
        $sql = "UPDATE " . $this->table_name . " SET nama_pesilat = :nama_pesilat, kontingen = :kontingen, kelas = :kelas, jekel = :jekel WHERE id_pesilat = :id";

        $prep_state = $this->db_conn->prepare($sql);


        $prep_state->bindParam(':nama_pesilat', $this->nama_pesilat);
        $prep_state->bindParam(':kontingen', $this->kontingen);
        $prep_state->bindParam(':kelas', $this->kelas);
        $prep_state->bindParam(':jekel', $this->jekel);
        $prep_state->bindParam(':id', $this->id);

        if ($prep_state->execute()) {
            return true;
        } else {
            return false;
        }
    }


    function delete($id_pesilat)
    {
        $sql = "DELETE FROM " . $this->table_name . " WHERE id_pesilat = :id ";

        $prep_state = $this->db_conn->prepare($sql);
        $prep_state->bindParam(':id', $this->id);

        if ($prep_state->execute(array(":id" => $_GET['id']))) {
            return true;
        } else {
            return false;
        }
    }


    function getAllUsers($from_record_num, $records_per_page)
    {
        

        $sql = "SELECT id_pesilat, nama_pesilat, kontingen, kelas, jekel FROM " . $this->table_name . " ORDER BY id_pesilat ASC LIMIT ?, ?";

        $prep_state = $this->db_conn->prepare($sql);



        $prep_state->bindParam(1, $from_record_num, PDO::PARAM_INT); //Represents the SQL INTEGER data type.
        $prep_state->bindParam(2, $records_per_page, PDO::PARAM_INT);


        $prep_state->execute();

        return $prep_state;
        $db_conn = NULL;
    }

    function getUser()
    {
        $sql = "SELECT nama_pesilat, kontingen, kelas, jekel FROM " . $this->table_name . " WHERE id_pesilat = :id";

        $prep_state = $this->db_conn->prepare($sql);
        $prep_state->bindParam(':id', $this->id);
        $prep_state->execute();

        $row = $prep_state->fetch(PDO::FETCH_ASSOC);

        $this->nama_pesilat = $row['nama_pesilat'];
        $this->kontingen = $row['kontingen'];
    }

    function getAll()
    {
        //select all data
        $sql = "SELECT id_pesilat, nama_pesilat FROM " . $this->table_name . "  ORDER BY nama_pesilat";

        $prep_state = $this->db_conn->prepare($sql);
        $prep_state->execute();

        return $prep_state;
    }

    // used by index.php to read category name
    function getName()
    {

        $sql = "SELECT nama_pesilat FROM " . $this->table_name . " WHERE id_pesilat = ? limit 0,1";

        $prep_state = $this->db_conn->prepare($sql);
        $prep_state->bindParam(1, $this->id);
        $prep_state->execute();

        $row = $prep_state->fetch(PDO::FETCH_ASSOC);

        $this->nama_pesilat = $row['nama_pesilat'];
    }
}







