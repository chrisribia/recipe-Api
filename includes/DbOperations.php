  
<?php 
	class DbOperations{
		private $con; 
		function __construct(){
			require_once dirname(__FILE__).'/DbConnect.php';
			$db = new DbConnect();
			$this->con = $db->connect();
        }
    
        public function addStudents($reg_no,$name, $major, $phone,$email)
        {            
            $stmt = $this->con->prepare("INSERT INTO `students` (`id`, `reg_no`, `name`,`major`, `phone`,`email`) VALUES (NULL,?,?,?,?,?);");
            $stmt->bind_param("sssss",$reg_no,$name,$major,$phone,$email); 
            if($stmt->execute())
            {
                return "SuccessFul"; 
            }
            else
            {
                return "Failed!!"; 
            }
        
        }

        
		public function getevents(){
			$stmt = $this->con->prepare("SELECT id,event_code FROM tic_events");	
			$stmt->execute();
			$stmt->bind_result( $id, $event_code);				 		 
			$events = array();              
                 while ($stmt->fetch()) {
					 $event = array();
					 $event['id'] = $id;
					 $event['event_code'] = $event_code; 
					 array_push($events, $event);					
					}					 
            return $events;
		}
    
    
    }