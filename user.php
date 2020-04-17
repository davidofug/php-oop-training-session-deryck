<?php

// -> This is an operator used in PHP to access properties and methods of a class and object
require_once 'config.php';

class User extends Config {

    private $id;
    // private $connection;

    public $first_name;
    public $last_name;
    public $other_names;
    public $updated_at;
    public $email;
    public $password;

    //Create a user
    function save() {

        $stmt = $this->connection->prepare("INSERT INTO derrick_users( email, secret) VALUES(?, ?)");
        $stmt->bind_param("ss", $this->email , trim(str_trip_tags(str_strip_slashes($this->password))));
        
        if($stmt->execute()) :
            $user = $this->get( $this->connection->insert_id );
            return ($user->id) ? (int) $user->id : $this->connection->error;         
        else:
            return $this->connection->error;
        endif;

    }

    function get( $id ) {

        if( !$id || !is_int($id)) return false;

        $sql = "SELECT 
                    id,
                    email,
                    first_name,
                    last_name
                        FROM derrick_users
                        WHERE id = $id
                ";

        $result = $this->connection->query($sql);

        if( $result->num_rows != 1 ) return false;

        $row = $result->fetch_assoc();
        /*  
            $this->id = $row['id'];
            $this->first_name = $row['first_name'];
            $this->last_name = $row['last_name'];
            $this->email = $row['email'];
        */
        // Type cast/ Type conversion 

        return (object) [
            'name' => (object) [
                'first' => $row['first_name'],
                'last' => $row['last_name'],
            ],
            'email' => $row['email'],
            'id' => $row['id']
        ];

    }

    //Edit 
    function edit( $id ) {
        
        if( !$id || !$is_int($id))  return false;

        $user = $this->get($id);

        $sql = "UPDATE users
                    SET 
                        first_name = $this->first_name,
                        last_name = $this->last_name,
                        email = $this->email,
                        pwd = $this->password
                    WHERE 
                        id = $user->id
                ";

        if($this->connection->query($sql)) return $this->get($id);

        return false;
    }

    //Delete
    function delete($id) {
        if( !$id || !$is_int($id))  return false;

        $user = $this->get($id);

        if(!$user) return false;

        $sql = "DELETE 
                    FROM users
                    WHERE id = $user->id
                ";
        
        if($this->connection->query($sql)) return true;

        return false;

    }
}