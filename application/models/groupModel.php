<?php

class GroupModel
{
    /**
     * Every model needs a database connection, passed to the model
     * @param object $db A PDO database connection
     */
    function __construct($db) {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    /**
     * Get all groups from database
     */
    public function getAllGroup()
    {
        
        $sql = "SELECT * FROM `group`";
        $query = $this->db->prepare($sql);

       
      
            $query->execute();

        // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in
        // libs/controller.php! If you prefer to get an associative array as the result, then do
        // $query->fetchAll(PDO::FETCH_ASSOC); or change libs/controller.php's PDO options to
        // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...
        return $query->fetchAll();
    }
    
        /**
     * Get just group's name from database
     */
    public function getGroupName()
    {
        
        $sql = "SELECT `name` FROM `group`";
        $query = $this->db->prepare($sql);

       
      
            $query->execute();

        // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in
        // libs/controller.php! If you prefer to get an associative array as the result, then do
        // $query->fetchAll(PDO::FETCH_ASSOC); or change libs/controller.php's PDO options to
        // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...
        return $query->fetchAll();
    }
    
    

    /**
     * Add a group to database
     * @param string $Name of Group
     */
    public function addGroup($name)
    {
        
        //  Insert record if not exists in table
       $sql =" INSERT INTO `group` (`name`) SELECT '$name' FROM `group` WHERE NOT EXISTS (SELECT * FROM `group`  WHERE `name`='$name')  LIMIT 1";
        // clean the input from javascript code for example
     
        //  $sql = "INSERT INTO `group` (`name`) VALUES ('$name')";
            $query = $this->db->prepare($sql);
            $query->execute(); 
    }

    
        /**
     * Delete a group in the database
     * Please note: this is just an example! In a real application you would not simply let everybody
     * add/update/delete stuff!
     * @param int group_id Id of group
     */
    public function viewGroup($group_id)
    {
        $sql = "SELECT  * FROM `group` WHERE `id` = :group_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':group_id' => $group_id));
        return $query->fetchAll();
        
    }
    
    
    /**
     * Delete a group in the database
     * Please note: this is just an example! In a real application you would not simply let everybody
     * add/update/delete stuff!
     * @param int group_id Id of group
     */
    public function deleteGroup($group_id)
    {
        $sql = "DELETE FROM `group` WHERE `id` = :group_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':group_id' => $group_id));
    }
}
