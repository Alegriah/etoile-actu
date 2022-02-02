<?php 

// Cette classe abstraite est à mon avis mal nommée. Un "GlobalController" pourrait être une classe parent de tout tes controlleurs. 
// Elle implémenterait des méthodes d'ajout/suppression/edition commune à tous les controlleurs.  Ici se sont des méthodes qui pourraient être dans un service.
// Un service pour la gestion d'image, et un pour la gestion d'erreurs/alert. 

abstract class GlobalController
{
    // Problème d'espace en trop

    public static function addImage($title, $file, $dir)
    {
        // Ta méthode fait trop de choses. Elle format le nom du fichier et stocke l'image. Tu pourrais avoir une méthode private qui s'occuperait du traitement du nom genre getFileName() ou formatFileName()
        // qui retournerait le nom du fichier formatté
        $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $random = rand(0, 99999);
        $file['name'] = str_replace(" ", "_", $title . "." . $extension);
        $target_file = $dir . $random . "_" . $file['name'];

        // Il manque les {} après le if, ce n'est pas indenté
        if (!move_uploaded_file($file['tmp_name'], $target_file))
        throw new Exception("l'ajout de l'image n'a pas fonctionné");
        else return ($random . "_" . $file['name']); // pas besoin du else

        // Exemple :
        // if (!move_uploaded_file($file['tmp_name'], $target_file)) {
        //     throw new Exception("l'ajout de l'image n'a pas fonctionné");
        // }
       
        // return ($random . "_" . $file['name']);

        
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
