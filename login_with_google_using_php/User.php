<?php

class User {
	// private $dbHost     = "localhost";
    // private $dbUsername = "root";
    // private $dbPassword = "";
    // private $dbName     = "blog";
    // private $userTbl    = 'users';
	
    private $_db = null;

	public function __construct()
    {
        $this->_db = DB::getInstance();
        // if(!isset($this->db)){
        //     // Connect to the database
        //     $conn = new mysqli($this->dbHost, $this->dbUsername, $this->dbPassword, $this->dbName);
        //     if($conn->connect_error){
        //         die("Failed to connect with MySQL: " . $conn->connect_error);
        //     }else{
        //         $this->db = $conn;
        //     }
        // }
    }
	

    function checkUser($userData = array())
    {
        $data = $this->_db->get('users', array(
                'oauth_provider' => $userData['oauth_provider'],
                'oauth_uid' => $userData['oauth_uid']
                ));
        die($data->first());

        if(!empty($userData))
        {
            $data = $this->_db->get('users', array(
                'oauth_provider' => $userData['oauth_provider'],
                'oauth_uid' => $userData['oauth_uid']
                ));
            var_dump('<br><br>'.$data);
            if($data->count() > 0)
            {
                $userId = $data->first()->id;
                $updateData = $this->_db->update('users', $userId, array('oauth_uid', '=', $userData['']));
            }
            else
            {
                $insertData = $this->_db->insert('users', array('oauth_uid', '=', $userData['oauth_uid']));
            }
        }
        $result = $this->_db->get('users', array(
            'oauth_provider' => $userData['oauth_provider'],
            'oauth_uid' => $userData['oauth_uid']
            ));
        return $userData->first();
    }








	// function checkUser($userData = array()){
 //        if(!empty($userData))
 //        {
 //            //Check whether user data already exists in database
 //            $prevQuery = "SELECT * FROM ".$this->userTbl." WHERE oauth_provider = '".$userData['oauth_provider']."' AND oauth_uid = '".$userData['oauth_uid']."'";
 //            $prevResult = $this->db->query($prevQuery);
 //            if($prevResult->num_rows > 0)
 //            {
 //                //Update user data if already exists
 //                $query = "UPDATE ".$this->userTbl." SET first_name = '".$userData['first_name']."', last_name = '".$userData['last_name']."', email = '".$userData['email']."', gender = '".$userData['gender']."', locale = '".$userData['locale']."', picture = '".$userData['picture']."', link = '".$userData['link']."', modified = '".date("Y-m-d H:i:s")."' WHERE oauth_provider = '".$userData['oauth_provider']."' AND oauth_uid = '".$userData['oauth_uid']."'";
 //                $update = $this->db->query($query);
 //            }
 //            else
 //            {
 //                //Insert user data
 //                $query = "INSERT INTO ".$this->userTbl." SET oauth_provider = '".$userData['oauth_provider']."', oauth_uid = '".$userData['oauth_uid']."', first_name = '".$userData['first_name']."', last_name = '".$userData['last_name']."', email = '".$userData['email']."', gender = '".$userData['gender']."', locale = '".$userData['locale']."', picture = '".$userData['picture']."', link = '".$userData['link']."', created = '".date("Y-m-d H:i:s")."', modified = '".date("Y-m-d H:i:s")."'";
 //                $insert = $this->db->query($query);
 //            }
            
 //            //Get user data from the database
 //            $result = $this->db->query($prevQuery);
 //            $userData = $result->fetch_assoc();
 //        }
        
 //        //Return user data
 //        return $userData;
 //    }
}
?>