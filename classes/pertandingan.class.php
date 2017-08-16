<?php

class Pertandingan
{
    public $db_conn;
    public $table_name = "tb_pertandingan";
    public $table_name2 = "tb_pesilat";
    public $id_pertadingan;
    public $sudut_biru;
    public $sudut_merah;
    public $kelas;
    public $jekel;
    public $selesai;


    public function __construct($db)
    {
        $this->db_conn = $db;
    }


    function create()
    {
        $sql = "INSERT INTO " . $this->table_name . " SET sudut_merah = ?, sudut_biru = ?, kelas = ?, jekel = ? ";

        $prep_state = $this->db_conn->prepare($sql);

        $prep_state->bindParam(1, $this->sudut_merah);
        $prep_state->bindParam(2, $this->sudut_biru);
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
        $sql = "SELECT id_pertadingan FROM " . $this->table_name . "";

        $prep_state = $this->db_conn->prepare($sql);
        $prep_state->execute();

        $num = $prep_state->rowCount(); 
        return $num;
    }


    function update()
    {
        $sql = "UPDATE " . $this->table_name . " SET sudut_merah = :sudut_merah, sudut_biru = :sudut_biru, kelas = :kelas, jekel = :jekel WHERE id_pertadingan = :id";

        $prep_state = $this->db_conn->prepare($sql);


        $prep_state->bindParam(':sudut_merah', $this->nama_pesilat);
        $prep_state->bindParam(':sudut_biru', $this->kontingen);
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
        $sql = "DELETE FROM " . $this->table_name . " WHERE id_pertadingan = :id ";

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
        $sql = "SELECT id_pertandingan, sudut_merah, sudut_biru, kelas, jekel FROM " . $this->table_name . " ORDER BY kelas ASC LIMIT ?, ?";

        $prep_state = $this->db_conn->prepare($sql);



        $prep_state->bindParam(1, $from_record_num, PDO::PARAM_INT); //Represents the SQL INTEGER data type.
        $prep_state->bindParam(2, $records_per_page, PDO::PARAM_INT);


        $prep_state->execute();

        return $prep_state;
        $db_conn = NULL;
    }

    function getUser()
    {
        $sql = "SELECT sudut_merah, sudut_biru, kelas, jekel FROM " . $this->table_name . " WHERE id_pertadingan = :id";

        $prep_state = $this->db_conn->prepare($sql);
        $prep_state->bindParam(':id', $this->id);
        $prep_state->execute();

        $row = $prep_state->fetch(PDO::FETCH_ASSOC);
    }


}







