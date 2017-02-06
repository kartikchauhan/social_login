<?php

class User
{
	
    private $_db = null;

	public function __construct()
    {
        $this->_db = DB::getInstance();
    }
	

    public function checkUser($userData = array())
    {
        if(!empty($userData))
        {
            $data = $this->_db->get('users', array('email', '=', $userData['email']));
            if($data->count() > 0)
            {
                $userId = $data->first()->id;
                $updateData = $this->_db->update('users', $userId, array('oauth_uid', '=', $userData['oauth_uid']));
                $data = $this->_db->get('users', array('email', '=', $userData['email']));
                return $data->first();
            }
            else
            {
                die("You are not a registered user. <a href='register.php'>Register first</a>");

            }
        }
    }

}
?>