<?php 
	class Database {
		
		public $dbHost = 'localhost';
		public $dbUser = 'pmosca';
		public $dbPass = 'pmosca1234';
		public $dbName = 'pmosca';
		
		public $db;
		
		public function __construct(){ 
			$this->dbConnect();
		}
		
		public function dbConnect(){
			
			$this->db = new mysqli($this->dbHost, $this->dbUser, $this->dbPass, $this->dbName);
		
			/* check connection */
			if (mysqli_connect_errno()){
				printf("Connect failed: %s\n", mysqli_connect_error());
				exit();
			}else{
				//echo 'connection made';
			}
		}
		
		// Insert example
		public function insertOrder($date, $fulfilled, $end) {
			$query = 'INSERT INTO Order (date, fulfilled) VALUES("'.$date.'","'.$fulfilled.'")';
			
			if ($stmt = $this->db->prepare($query)){ 
				/* execute statement */
				if($stmt->execute()) {
					//nothing
				} else
					echo "error";
				/* close statement */
				$stmt->close();
			} else {
				echo "Prepare failed: (" . $stmt->errno . ") " . $stmt->error;
			}
		}

		public function insertProduct($name, $price, $shippingPrice, $description, $category) {
			$query = 'INSERT INTO Product (name, price, shippingPrice, description, category) VALUES("'.$name.'","'.$price.'","'.$shippingPrice.'","'.$description.'","'.$category.'")';
			
			if ($stmt = $this->db->prepare($query)){ 
				/* execute statement */
				if($stmt->execute()) {
					//nothing
				} else
					echo "error";
				/* close statement */
				$stmt->close();
			} else {
				echo "Prepare failed: (" . $stmt->errno . ") " . $stmt->error;
			}
		}

		// Update example
		public function editAnnouncment($id, $text, $start, $end){
			$query = 'UPDATE announcement SET  start = "'.$start.'", expire = "'.$end.'", text = "'.$text.'" WHERE  id ='.$id;
		
			if ($stmt = $this->db->prepare($query)){ 
				/* execute statement */
				if($stmt->execute()) {
					//nothing
				} else
					echo "error";
				/* close statement */
				$stmt->close();
			} else {
				echo "Prepare failed: (" . $stmt->errno . ") " . $stmt->error;
			}
		}

		// Delete example
		public function deleteAnnouncment($id){
			$query = 'DELETE FROM announcement WHERE id = '.$id;
			
			if ($stmt = $this->db->prepare($query)){ 
				/* execute statement */
				if($stmt->execute()) {
					//nothing
				} else
					echo "error";
				/* close statement */
				$stmt->close();
			} else {
				echo "Prepare failed: (" . $stmt->errno . ") " . $stmt->error;
			}
		}

		// Fetch example
		public function fetch_announcments(){
			$query = 'SELECT * FROM announcement';
			$result = "";
		
			if ($stmt = $this->db->prepare($query)){ 
				/* execute statement */
				if($stmt->execute()) {
					$stmt->bind_result($id, $text, $expire);
					while($stmt->fetch()) {
						if( strtotime('now') < strtotime($expire))
							$result .= $text."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
					}
				} else
					echo "error";
		
				/* close statement */
				$stmt->close();
			} else {
				echo "Prepare failed: (" . $stmt->errno . ") " . $stmt->error;
			}
			
			//$result -= "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
			return $result;
		}
		
		public function __destruct(){}
	
	}
	
?>