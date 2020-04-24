<?php

require_once dirname(__DIR__).'/config.php';

class User extends Config {

    private $id;

    public $first_name;
    public $last_name;
    public $other_names;
    public $updated_at;
    public $email;
    public $roles;
    public $password;

    //Create a user

    function save( $data = [] ) {

        if(isset($data['id'])) {
            return $this->edit($data);
        }

        $stmt = $this->connection->prepare("INSERT INTO derrick_users( registration_date, email, user_login, first_name, last_name, user_pass, roles) VALUES(?, ?, ?, ?, ?, ?, ?)");
        
        $stmt->bind_param("sssssss",
            $data['date'],
            $data['email'],
            $data['user_name'],
            $data['first_name'],
            $data['last_name'],
            $data['password'],
            $data['roles']
        );
        
        if($stmt->execute()) :
            $user = $this->get( $this->connection->insert_id );
            return ($user) ? $user : $this->connection->error;         
        else:
            return $this->connection->error;
        endif;

    }

    function get( $id = null ) {

        //if( !$id || !is_int($id)) return false;

        $sql = isset($id) && is_int($id) ? "SELECT * FROM derrick_users WHERE id = $id" : "SELECT * FROM derrick_users" ;

        $result = $this->connection->query($sql);
        
        //if( $result->num_rows != 1 ) return false;

        return $result->fetch_assoc();
    }

    //Edit 
    function edit( $data = [] ) {

        if( !$data || !is_array($data))  return false;

        $sql = "UPDATE derrick_users
                    SET 
                        email = ?,
                        user_pass = ?,
                        roles = ?,
                        first_name = ?,
                        last_name = ?,
                        other_names = ?,
                        updated_at = ?
                    WHERE 
                        id = ?
                ";

        $stmt = $this->connection->prepare($sql);

        $stmt->bind_param("sssssssi", 
            $data['email'],
            $data['password'],
            $data['roles'],
            $data['first_name'],
            $data['last_name'],
            $data['other_names'],
            $data['updated_at'],
            $data['id']
        );

        $stmt->execute();
        $stmt->store_result();

        return  ($stmt->affected_rows == 1)? $this->get($data['id']) : $this->connection->error;
    }

    //Delete
    function delete($id) {
        if( !$id || !is_int($id)) return false;

        $user = $this->get($id);

        if(!isset($user['id'])) return false;

        $sql = "DELETE FROM derrick_users WHERE id = ?";

        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("i",$user['id']);
        $stmt->execute();
        $stmt->store_result();

        return $stmt->affected_rows > 0 ? true : $this->connection->error;

    }
}