<?php 

function get_faqs(){
    global $db;
    try{
        $stmt = $db->prepare("SELECT * FROM faqs");
        $stmt->execute();
        return $stmt;
    }catch (PDOException $e){
        return null;
    }
}

function insert_faq($question,$answer){
    global $db;
    try{
        $stmt=$db->prepare("INSERT INTO faqs (question,answer) VALUES (:question,:answer)");
        $stmt->bindParam(':question',$question);
        $stmt->bindParam(':answer',$answer);
        $stmt->execute();
        return $stmt;
    }catch(PDOException $e){
        return null;
    }
}
function AlreadyExistsQuestion($question){
    global $db;
    try{
        $stmt = $db->prepare("SELECT * FROM faqs WHERE question = ?");
        $stmt -> execute(array($question));
        return $stmt -> fetch() == false ? false : true;
    }catch (PDOException $e){
        return true;
    }
}

function delete_FAQ($question){
    global $db;
    try{
        $stmt = $db->prepare("DELETE FROM faqs WHERE question = ?");
        $stmt -> execute(array($question));
        return $stmt;
    }catch (PDOException $e){
        return null;
    }
}


?>