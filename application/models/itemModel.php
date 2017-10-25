<?php

class ItemModel
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
     * Get all entities from database
     */
    public function getAllItem()
    {
        
        $sql = "SELECT * FROM `item`";
        $query = $this->db->prepare($sql);

        $query->execute();

        // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in
        // libs/controller.php! If you prefer to get an associative array as the result, then do
        // $query->fetchAll(PDO::FETCH_ASSOC); or change libs/controller.php's PDO options to
        // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...
        return $query->fetchAll();
    }
    
    

    /**
     * Add a item to database
     * @param string $Name of item
     */
    public function addItem($itemName , $groupName)
    {
        //  Insert record if not exists in table
        $sql = "INSERT INTO `item` (`itemName`, `groupName`) VALUES ('$itemName','$groupName')";
        $query = $this->db->prepare($sql);
        $query->execute();
    }
        

    
        /**
     * Delete a item in the database
     * Please note: this is just an example! In a real application you would not simply let everybody
     * add/update/delete stuff!
     * @param int item_id Id of item
     */
    public function viewItem($item_id)
    {
        $sql = "SELECT  * FROM `item` WHERE `id` = :item_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':item_id' => $item_id));
        return $query->fetchAll();
        
    }
    
    
    /**
     * Delete a item in the database
     * Please note: this is just an example! In a real application you would not simply let everybody
     * add/update/delete stuff!
     * @param int item_id Id of item
     */
    public function deleteItem($item_id)
    {
        $sql = "DELETE FROM `item` WHERE `id` = :item_id";
        $query = $this->db->prepare($sql);
        $query->execute(array(':item_id' => $item_id));
    }
}
