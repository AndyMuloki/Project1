<?php
    class Operations {
        function __construct(){}
        public function saveUser ($pdo, $fName, $userName, $email, $city_of_residence, $password){
        	 try {
			        $stmt=$pdo->prepare("INSERT INTO users (fName, userName, email, city_of_residence, password)VALUES (?,?,?,?,?)");
			        $stmt->execute([$fName,$userName,$email,$city_of_residence,$password]);
			        $stmt = null;
			        return "User has been saved";
				  } catch (PDOException $e) {
    					return $e->getMessage();
    			  }
        }
        public function searchUser ($pdo, $userID){
		    try {
		        $stmt=$pdo->prepare("SELECT * FROM users WHERE userID=?");
		        $stmt->execute([$companyId]);
		        $result = $stmt->fetch();
		        return json_encode($result);
		    } catch (PDOException $e) {
		    	return $e->getMessage(); 
		    }
		}
		public function readUser ($pdo){
		    try {
		        $stmt=$pdo->prepare("SELECT * FROM users");
		        $stmt->execute();
		        $result = $stmt->fetchAll();
		        $stmt=null;
		        return json_encode($result);
		    } catch (PDOException $e) {
		    	return $e->getMessage();
		    }
		}
		public function saveManyUser ($pdo, $userList){
		    try {
		        $stmt = $pdo->prepare ("INSERT INTO users (fName, userName, email, city_of_residence) VALUES (?,?,?,?)");

		        foreach ($userList as $user){
		        	$stmt->execute([$user->fName,$user->userName,$user->email,$user->city_of_residence,$user->password]);
		        }                           
		        return "Users have been saved";
		    } catch (PDOException $e) {
		    	return $e->getMessage();
		    }
		}

    }

?>
