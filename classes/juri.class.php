<?php

class Juri
{
    // table name definition and database connection
    public $db_conn;
    public $table_name = "tb_juri";

    // object properties
    public $id_juri;
    public $nama_juri;
    public $asal_daerah;
    public $jekel;


    public function __construct($db)
    {
        $this->db_conn = $db;
    }


    function create()
    {
        //write query
        $sql = "INSERT INTO " . $this->table_name . " SET nama_juri = ?, asal_daerah = ?, jekel = ? ";

        $prep_state = $this->db_conn->prepare($sql);

        $prep_state->bindParam(1, $this->nama_juri);
        $prep_state->bindParam(2, $this->asal_daerah);
        $prep_state->bindParam(4, $this->jekel);

        if ($prep_state->execute()) {
            return true;
        } else {
            return false;
        }

    }

    // for pagination
    public function countAll()
    {
        $sql = "SELECT id_juri FROM " . $this->table_name . "";

        $prep_state = $this->db_conn->prepare($sql);
        $prep_state->execute();

        $num = $prep_state->rowCount(); //Returns the number of rows affected by the last SQL statement
        return $num;
    }


    function update()
    {
        $sql = "UPDATE " . $this->table_name . " SET nama_juri = :nama_juri, asal_daerah = :asal_daerah, jekel = :jekel WHERE id_juri = :id";
        // prepare query
        $prep_state = $this->db_conn->prepare($sql);


        $prep_state->bindParam(':nama_juri', $this->nama_juri);
        $prep_state->bindParam(':asal_daerah', $this->asal_daerah);
        $prep_state->bindParam(':jekel', $this->jekel);
        $prep_state->bindParam(':id', $this->id);

        // execute the query
        if ($prep_state->execute()) {
            return true;
        } else {
            return false;
        }
    }


    function delete($id_juri)
    {
        $sql = "DELETE FROM " . $this->table_name . " WHERE id_juri = :id ";

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
        $sql = "SELECT id_juri, nama_juri, asal_daerah, jekel FROM " . $this->table_name . " ORDER BY nama_juri ASC LIMIT ?, ?";


        $prep_state = $this->db_conn->prepare($sql);


        $prep_state->bindParam(1, $from_record_num, PDO::PARAM_INT); //Represents the SQL INTEGER data type.
        $prep_state->bindParam(2, $records_per_page, PDO::PARAM_INT);


        $prep_state->execute();

        return $prep_state;
        $db_conn = NULL;
    }

    // for edit user form when filling up
    function getUser()
    {
        $sql = "SELECT nama_juri, asal_daerah, jekel FROM " . $this->table_name . " WHERE id_juri = :id";

        $prep_state = $this->db_conn->prepare($sql);
        $prep_state->bindParam(':id', $this->id);
        $prep_state->execute();

        $row = $prep_state->fetch(PDO::FETCH_ASSOC);

        $this->nama_juri = $row['nama_juri'];
        $this->asal_daerah = $row['asal_daerah'];
        $this->jekel = $row['jekel'];
    }
}







