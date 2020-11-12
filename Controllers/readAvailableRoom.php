<?php namespace Controllers;

use Controllers\RoomController as C_room;

    function getRooms(){
        
        $roomController = new C_room();

        $R_list = $roomController->readAll();
        $rooms = '<option value="0">Elije una sala</option>';
        if($R_list !=null){
            
            foreach($R_list as $room){

                $rooms .= "<option value='$room->getId()'>$room->getName()</option>";
                
            }
        }else{

            echo'no hay datos';
        }
    return $rooms;
    }

echo getRooms();
