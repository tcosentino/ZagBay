<?php 
	class Database {
		
		public $dbHost = 'ada.gonzaga.edu';
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
		public function insertProduct($name, $price, $shippingPrice, $description, $imgUrl, $category) {
			$query = 'INSERT INTO Product VALUES (DEFAULT, "'.$name.'",'.$price.','.$shippingPrice.',"'.$description.'","'.$imgUrl.'",'.$category.')';
			
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

		public function addInventory($productId, $qty) {
		    $query = 'INSERT INTO Inventory VALUES (1,'.$productId.','.$qty.');';

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

	    public function updateInventory($productId, $qty) {
		    $query = 'UPDATE Inventory SET seller=1,quantity='.$qty.' WHERE product='.$productId.';';
		    
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
		public function getProducts($category){
			$query = 'SELECT * FROM Product WHERE category = '.$category.';';
			$result = "";
			$i= 0; //index
		
			if ($stmt = $this->db->prepare($query)){ 
				/* execute statement */
				if($stmt->execute()) {
					$stmt->bind_result($id, $name, $price, $shippingPrice, $description, $imageURL, $category);
					while($stmt->fetch()) {
						$result[$i] = array('id' => $id, 
											'name' => $name,
											'price' => $price,
											'shippingPrice' => $shippingPrice,
											'description' => $description,
											'imageURL' => $imageURL,
											'category' => $category);
						$i++;
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

		public function getTotalInventory() {
			$query = 'SELECT SUM(quantity) as qty FROM Inventory WHERE seller = 1;';
			$result = "";
			
			if ($stmt = $this->db->prepare($query)){ 
				/* execute statement */
				if($stmt->execute()) {
					$stmt->bind_result($qty);
					while($stmt->fetch()) {
						$result =  $qty;
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

		public function getInventory() {
			$query = 'SELECT p.id, p.name, SUM(i.quantity) as qty FROM Inventory as i JOIN Product as p ON p.id = i.product WHERE i.seller = 1 GROUP BY p.id;';
			$result = "";
			$i= 0; //index
			
			if ($stmt = $this->db->prepare($query)){ 
				/* execute statement */
				if($stmt->execute()) {
					$stmt->bind_result($id, $name, $qty);
					while($stmt->fetch()) {
						$result[$i] = array('id' => $id, 
											'name' => $name,
											'qty' => $qty);
						$i++;
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

		public function getTopProducts($num = 3) {
			$query = 'SELECT p.id, p.name, p.description, p.imageURL FROM Product as p JOIN ProductOrder as o ON p.id = o.product ORDER BY o.quantity DESC LIMIT 0,'.$num.';';
			$result = "";
			$i= 0; //index
			
			if ($stmt = $this->db->prepare($query)){ 
				/* execute statement */
				if($stmt->execute()) {
					$stmt->bind_result($id, $name, $description, $imageURL);
					while($stmt->fetch()) {
						$result[$i] = array('id' => $id, 
											'name' => $name,
											'description' => $description,
											'imageURL' => $imageURL);
						$i++;
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

		public function searchProducts($searchText, $maxPrice, $minPrice, $category, $seller) {
				
			$maxContraint = '';
			if ($maxPrice != '') {
				$maxContraint = ' AND p.price < '.$maxPrice;
			}

			$minContraint = '';
			if ($minPrice != '') {
				$minContraint = ' AND p.price > '.$minPrice;
			}
			
			$categoryContraint = '';
			if ($category = 0) {
				$categoryConstraint = ' AND p.category = '.$category;
			}
			
			$sellerConstraint = '';
			if ($seller = 0) {
				$sellerConstraint = ' AND s.id = '.$seller;
			}
			
			$query = 'SELECT DISTINCT p.id, p.name, p.description, p.imageURL FROM Product as p JOIN Category as c ON c.id = p.category JOIN Inventory as i ON i.product = p.id JOIN Seller as s ON i.seller = s.id WHERE LOWER(p.name) LIKE "%'.$searchText.'%" '.$maxContraint.$minContraint.$categoryContraint.$sellerConstraint.';';
			//echo $query;
			$result = "";
			$i= 0; //index
			
			if ($stmt = $this->db->prepare($query)){ 
				/* execute statement */
				if($stmt->execute()) {
					$stmt->bind_result($id, $name, $description, $imageURL);
					while($stmt->fetch()) {
						$result[$i] = array('id' => $id, 
											'name' => $name,
											'description' => $description,
											'imageURL' => $imageURL);
						$i++;
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

		public function getOrders() {
			$query = 'SELECT s.firstName, s.lastName, (p.shippingPrice + (po.quantity * p.price)) as totalPrice, o.fulfilled FROM BuyOrder as o JOIN ProductOrder as po ON o.id = po.orderID JOIN Product as p ON po.product = p.id JOIN Inventory as i ON i.product = p.id JOIN Seller as s ON s.id = i.seller;';
			$result = "";
			$i= 0; //index
			
			if ($stmt = $this->db->prepare($query)){ 
				/* execute statement */
				if($stmt->execute()) {
					$stmt->bind_result($firstName, $lastName, $totalPrice, $fulfilled);
					while($stmt->fetch()) {
						$result[$i] = array('firstName' => $firstName, 
											'lastName' => $lastName,
											'totalPrice' => $totalPrice,
											'fulfilled' => $fulfilled);
						$i++;
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

		public function getOrdersPerDay() {
			$query = 'SELECT date(bo.date) as day, COUNT(*) as count FROM BuyOrder as bo JOIN ProductOrder as po ON bo.id = po.orderID JOIN Product as p ON p.id = po.product WHERE bo.buyer = 1 GROUP BY date(bo.date);';
			$result = "";
			$i= 0; //index
			
			if ($stmt = $this->db->prepare($query)){ 
				/* execute statement */
				if($stmt->execute()) {
					$stmt->bind_result($day, $count);
					while($stmt->fetch()) {
						$result[$i] = array('day' => $day, 'count' => $count);
						$i++;
					}
				} else
					echo "error";
				/* close statement */
				$stmt->close();
			} else {
				echo "Prepare failed: (" . $stmt->errno . ") " . $stmt->error;
			}
			var_dump($result);
			//$result -= "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
			return $result;
		}

		public function getProduct($id) {
			$query = 'SELECT p.name, p.description, s.email, p.price, p.imageURL FROM Product as p JOIN Inventory as i ON i.product = p.id JOIN Seller as s ON s.id = i.seller WHERE p.id = '.$id.';';
			$result = "";
			
			if ($stmt = $this->db->prepare($query)){ 
				/* execute statement */
				if($stmt->execute()) {
					$stmt->bind_result($name, $description, $email, $price, $imageURL);
					while($stmt->fetch()) {
						$result = array('name' => $name, 
											'description' => $description,
											'email' => $email,
											'price' => $price,
											'imageURL' => $imageURL);
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

		public function getTopSellers() {
			$query = 'SELECT s.firstName, s.lastName, s.imageURL FROM Seller as s JOIN Inventory as i ON s.id = i.seller JOIN Product as p ON i.product = p.id ORDER BY (i.quantity * p.price) DESC LIMIT 0,3;';
			$result = "";
			$i= 0; //index
			
			if ($stmt = $this->db->prepare($query)){ 
				/* execute statement */
				if($stmt->execute()) {
					$stmt->bind_result($firstName, $lastName, $imageURL);
					while($stmt->fetch()) {
						$result[$i] = array('firstName' => $firstName, 
											'lastName' => $lastName,
											'imageURL' => $imageURL);
						$i++;
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
		
		// Gets sellers
		public function getSellers() {
			$query = 'SELECT id, firstName, lastName FROM Seller ORDER BY lastName ASC;';
			$result = "";
			$i= 0; //index
			
			if ($stmt = $this->db->prepare($query)){ 
				/* execute statement */
				if($stmt->execute()) {
					$stmt->bind_result($id, $firstName, $lastName);
					while($stmt->fetch()) {
						$result[$i] = array('id' => $id, 
											'firstName' => $firstName,
											'lastName' => $lastName);
						$i++;
					}
				} else
					echo "error";
			
				/* close statement */
				$stmt->close();
			} else {
				echo "Prepare failed: (" . $stmt->errno . ") " . $stmt->error;
			}

			return $result;
		}
		
		// Gets categories
		public function getCategories() {
			$query = 'SELECT id, name FROM Category ORDER BY name ASC;';
			$result = "";
			$i= 0; //index
			
			if ($stmt = $this->db->prepare($query)){ 
				/* execute statement */
				if($stmt->execute()) {
					$stmt->bind_result($id, $name);
					while($stmt->fetch()) {
						$result[$i] = array('id' => $id, 
											'name' => $name);
						$i++;
					}
				} else
					echo "error";
			
				/* close statement */
				$stmt->close();
			} else {
				echo "Prepare failed: (" . $stmt->errno . ") " . $stmt->error;
			}

			return $result;
		}
		
		// Get cartItems
		public function getCartItems() {
			$query = 'SELECT p.id, p.name, po.quantity, p.imageURL, p.price, p.shippingPrice FROM BuyOrder as o JOIN Buyer as b ON b.id = o.buyer JOIN ProductOrder as po ON po.orderID = o.id JOIN Product as p ON p.id = po.product WHERE o.fulfilled = 0 AND b.id = 1;';
			$result = "";
			$i= 0; //index
			
			if ($stmt = $this->db->prepare($query)){ 
				/* execute statement */
				if($stmt->execute()) {
					$stmt->bind_result($id, $name, $quantity, $imageURL, $price, $shippingPrice);
					while($stmt->fetch()) {
						$result[$i] = array('id' => $id, 
											'name' => $name,
											'quantity' => $quantity,
											'imageURL' => $imageURL,
											'price' => $price,
											'shippingPrice' => $shippingPrice);
						$i++;
					}
				} else
					echo "error";
			
				/* close statement */
				$stmt->close();
			} else {
				echo "Prepare failed: (" . $stmt->errno . ") " . $stmt->error;
			}

			return $result;
		}

		public function __destruct(){}
	
	}
	
?>