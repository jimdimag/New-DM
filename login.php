<?php

session_start();

/**
 * define autoloader.
 * @param string $class_name
 */
function __autoload($class_name) {
    include 'class.' . $class_name . '.inc';
}

/**
     * Get and verify the password and username.
     * @return string
     */
   function _verifyUser($user,$pass) {
        $db = Database::getInstance();
        $mysqli = $db->getConnection();
        
        $sql_query = 'SELECT postal_code ';
        $sql_query .= 'FROM location ';
        
        $city_name = $mysqli->real_escape_string($this->city_name);
        $sql_query .='WHERE city_name = "' .$city_name. '" ';
        
        $subdivision_name = $mysqli->real_escape_string($this->subdivision_name);
        $sql_query .= 'AND subdivision_name = "' .$subdivision_name. '" ';
    
        $result = $mysqli->query($sql_query);
        
        if($row = $result->fetch_assoc()) {
            return $row['postal_code'];
        } 
    }