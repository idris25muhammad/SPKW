<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    
    include_once '../config/database.php';
    include_once '../class/researches.php';

    $database = new Database();
    $db = $database->getConnection();
    $items = new Research($db);
    $stmt = $items->getPenelitian();
    $itemCount = $stmt->rowCount();

    if($itemCount > 0){
        $researchArr = array();
        $researchArr["success"] = true;
        $researchArr["result"] = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $e = array(
                "nip" => $nip,
                "judul_penelitian" => $judul_penelitian,
                "tahun" => $tahun,
                "link_pdf" => $link_pdf
            );
            array_push($researchArr["result"], $e);
        }
        echo json_encode($researchArr);
    }
    else{
        http_response_code(404);
        echo json_encode(
            array("message" => "No record found.")
        );
    }
?>