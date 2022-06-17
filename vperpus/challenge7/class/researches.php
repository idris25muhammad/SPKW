<?php
    class Research {
        // Connection
        private $conn;
        // Table
        private $db_table = "penelitian";
        // Columns
        public $nip;
        public $judul_penelitian;
        public $tahun;
        public $link_pdf;

        // Db connection
        public function __construct($db){
            $this->conn = $db;
        }
        // GET ALL
        public function getPenelitian(){
            $sqlQuery = "SELECT * FROM " . $this->db_table . "";
            $stmt = $this->conn->prepare($sqlQuery);
            $stmt->execute();
            return $stmt;
        }
    }
?>