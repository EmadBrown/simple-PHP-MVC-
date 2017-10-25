<?php

/**
 * Class ItemController
 * This is a demo class.
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 *
 */
class Item extends Controller
{
    
  
    /**
     * PAGE: index
     */
    public function index()
    {
        // simple message to show where you are
       //  echo 'Message from Controller: You are in the Controller: entities, using the method index().';

        // load a model, perform an action, pass the returned data to a variable
        // NOTE: please write the name of the model "LikeThis"
        $items_model = $this->loadModel('ItemModel');
   
        
        $items = $items_model->getAllItem();
        

        // load views. within the views we can echo out $entities and $amount_of_entities easily
        require 'application/views/_templates/header.php';
        require 'application/views/item/index.php';
        require 'application/views/_templates/footer.php';
    }   

    
     /**
     * PAGE: add
     */
    public function add()
    {
        // simple message to show where you are
       //  echo 'Message from Controller: You are in the Controller: entities, using the method add().';

        // load a model, perform an action, pass the returned data to a variable
        // NOTE: please write the name of the model "LikeThis"
        $items_model = $this->loadModel('ItemModel');

        $items = $items_model->getAllItem();
        
        $groups_model = $this->loadModel('GroupModel');
        
        $groups = $groups_model->getGroupName();

        // load views. within the views we can echo out $entities and $amount_of_entities easily
        require 'application/views/_templates/header.php';
        require 'application/views/item/add.php';
        require 'application/views/_templates/footer.php';
    }   
    
    /**
     * ACTION: addItem
     * This method handles what happens when you move to http://yourproject/entities/addItem
     * IMPORTANT: This is not a normal page, it's an ACTION. This is where the "add a Item" form on entities/index
     * directs the user after the form submit. This method handles all the POST data from the form and then redirects
     * the user back to entities/index via the last line: header(...)
     * This is an example of how to handle a POST request.
     */
    public function addItem()
    {
        // simple message to show where you are
        //echo 'Message from Controller: You are in the Controller: entities, using the method addItem().';

        // if we have POST data to create a new item entry
        if (isset($_POST["submit"]) && !empty($_POST["item"]) ) {
            // load model, perform an action on the model
            $items_model = $this->loadModel('ItemModel');
            $items_model->addItem($_POST["item"], $_POST['groupOption']);
        }
       

        // where to go after item has been added
         header('location: ' . URL . 'item/index');
    }
    
      /**
     * PAGE: add
     */
    public function view($item_id)
    {
        // simple message to show where you are
       //  echo 'Message from Controller: You are in the Controller: entities, using the method add().';

        // load a model, perform an action, pass the returned data to a variable
        // NOTE: please write the name of the model "LikeThis"
        $items_model = $this->loadModel('ItemModel');
   

        $items = $items_model->viewItem($item_id);

        // load views. within the views we can echo out $entities and $amount_of_entities easily
        require 'application/views/_templates/header.php';
        require 'application/views/item/view.php';
        require 'application/views/_templates/footer.php';
    }   
    

    /**
     * ACTION: deleteItem
     * This method handles what happens when you move to http://yourproject/entities/deleteItem
     * IMPORTANT: This is not a normal page, it's an ACTION. This is where the "delete a item" button on entities/index
     * directs the user after the click. This method handles all the data from the GET request (in the URL!) and then
     * redirects the user back to entities/index via the last line: header(...)
     * This is an example of how to handle a GET request.
     * @param int $item_id Id of the to-delete item
     */
    public function deleteItem($item_id)
    {
        // simple message to show where you are
        //echo 'Message from Controller: You are in the Controller: entities, using the method deleteItem().';

        // if we have an id of a item that should be deleted
        if (isset($item_id)) {
            // load model, perform an action on the model
            $items_model = $this->loadModel('ItemModel');
            $items_model->deleteItem($item_id);
        }

        // where to go after item has been deleted
        header('location: ' . URL . 'item/index');
    }
}
