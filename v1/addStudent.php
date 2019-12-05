  
<?php 
require_once '../includes/DbOperations.php';
 
$response_data = array();
if($_SERVER['REQUEST_METHOD']=='POST'){

    if($_POST['reg_no'] == ""  )
       {
        $response_data = array();
        $response_data['error'] = true; 
        $response_data['message'] = "Please enter Student's Registration number"; 
        } 

    elseif($_POST['name'] =="")
        {
         $response_data = array();
         $response_data['error'] = true; 
         $response_data['message'] = "Please enter Student's name"; 
         } 
    elseif( $_POST['phone'] == "")
         {
          $response_data = array();
          $response_data['error'] = true; 
          $response_data['message'] = "Please enter email"; 
          } 

    elseif( $_POST['email'] == ""  )
          {
           $response_data = array();
           $response_data['error'] = true; 
           $response_data['message'] = "Please enter email"; 
           } 

    elseif($_POST['major'] == ""  )
           {
            $response_data = array();
            $response_data['error'] = true; 
            $response_data['message'] = "Please enter major"; 
            } 

           
         else {
                if ( isset($_POST['reg_no']) and    isset($_POST['name']) and  isset($_POST['email']) and  isset($_POST['phone']) and  isset($_POST['major'])) {    
                $db = new DbOperations; 
                $ticket = $db->addStudents($_POST['reg_no'],
                $_POST['name'],$_POST['major'],$_POST['phone'],$_POST['email']);
                $response_data = array();
                $response_data['error'] = false; 
                $response_data['message'] = $ticket; 
            }
}
}
echo json_encode($response_data);