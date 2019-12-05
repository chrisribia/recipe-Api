<?php 
require_once '../includes/DbOperations.php';
 
 
                            
        $db = new DbOperations; 
        $ticket = $db->getStudents();
        $response_data = array();
        $response_data['error'] = false; 
        $response_data['Students'] = $ticket; 
   
echo json_encode($response_data);