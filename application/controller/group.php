<?php

/**
 * Class GroupController
 * This is a demo class.
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 *
 */
class Group extends Controller
{
    /**
     * PAGE: index
     */
    public function index()
    {
        // simple message to show where you are
       //  echo 'Message from Controller: You are in the Controller: groups, using the method index().';

        // load a model, perform an action, pass the returned data to a variable
        // NOTE: please write the name of the model "LikeThis"
        $groups_model = $this->loadModel('GroupModel');
   

        $groups = $groups_model->getAllGroup();

        // load views. within the views we can echo out $groups and $amount_of_groups easily
        require 'application/views/_templates/header.php';
        require 'application/views/group/index.php';
        require 'application/views/_templates/footer.php';
    }   

    
     /**
     * PAGE: add
     */
    public function add()
    {
        // simple message to show where you are
       //  echo 'Message from Controller: You are in the Controller: groups, using the method add().';

        // load a model, perform an action, pass the returned data to a variable
        // NOTE: please write the name of the model "LikeThis"
        $groups_model = $this->loadModel('GroupModel');
   

        $groups = $groups_model->getAllGroup();

        // load views. within the views we can echo out $groups and $amount_of_groups easily
        require 'application/views/_templates/header.php';
        require 'application/views/group/add.php';
        require 'application/views/_templates/footer.php';
    }   
    
    /**
     * ACTION: addGroup
     * This method handles what happens when you move to http://yourproject/groups/addgroup
     * IMPORTANT: This is not a normal page, it's an ACTION. This is where the "add a group" form on groups/index
     * directs the user after the form submit. This method handles all the POST data from the form and then redirects
     * the user back to groups/index via the last line: header(...)
     * This is an example of how to handle a POST request.
     */
    public function addGroup()
    {
        // simple message to show where you are
        //echo 'Message from Controller: You are in the Controller: Groups, using the method addGroup().';

        // if we have POST data to create a new group entry
        if (isset($_POST["submit"]) && !empty($_POST["name"]) ) {
            // load model, perform an action on the model
            $groups_model = $this->loadModel('GroupModel');
            $groups_model->addGroup($_POST["name"]);
        }

        // where to go after group has been added
         header('location: ' . URL . 'group/index');
    }
    
      /**
     * PAGE: add
     */
    public function view($group_id)
    {
        // simple message to show where you are
       //  echo 'Message from Controller: You are in the Controller: groups, using the method add().';

        // load a model, perform an action, pass the returned data to a variable
        // NOTE: please write the name of the model "LikeThis"
        $groups_model = $this->loadModel('GroupModel');
   

        $groups = $groups_model->viewGroup($group_id);

        // load views. within the views we can echo out $groups and $amount_of_groups easily
        require 'application/views/_templates/header.php';
        require 'application/views/group/view.php';
        require 'application/views/_templates/footer.php';
    }   
    

    /**
     * ACTION: deleteGroup
     * This method handles what happens when you move to http://yourproject/groups/deletegroup
     * IMPORTANT: This is not a normal page, it's an ACTION. This is where the "delete a group" button on groups/index
     * directs the user after the click. This method handles all the data from the GET request (in the URL!) and then
     * redirects the user back to groups/index via the last line: header(...)
     * This is an example of how to handle a GET request.
     * @param int $group_id Id of the to-delete group
     */
    public function deleteGroup($group_id)
    {
        // simple message to show where you are
        //echo 'Message from Controller: You are in the Controller: Groups, using the method deleteGroup().';

        // if we have an id of a group that should be deleted
        if (isset($group_id)) {
            // load model, perform an action on the model
            $groups_model = $this->loadModel('GroupModel');
            $groups_model->deletegroup($group_id);
        }

        // where to go after group has been deleted
        header('location: ' . URL . 'group/index');
    }
}
