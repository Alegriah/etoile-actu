<?php 
abstract class GlobalController
{
    public static function addImage($title, $file, $dir)
    {

        $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $random = rand(0, 99999);
        $file['name'] = str_replace(" ", "_", $title . "." . $extension);
        $target_file = $dir . $random . "_" . $file['name'];
        if (!move_uploaded_file($file['tmp_name'], $target_file)){
            throw new Exception("l'ajout de l'image n'a pas fonctionné");
        }
            return ($random . "_" . $file['name']); 
    }

    public static function throwMultipleErrors($error){
        if(!empty($error)){
            $error = json_encode($error);
            throw new Exception($error);
        }
    }

    public static function alert($type,$message){
        $_SESSION['alert'] = [
            "type" => $type,
            "msg" => $message
        ];
        return $_SESSION['alert'];
    }
}
?>