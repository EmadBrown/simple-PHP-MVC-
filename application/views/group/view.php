 <div class="container">
         <div class="starter-template">
                    <!-- add Group form -->

                    <table class="table table-striped">
                            <thead>
                            <tr>
                                <td>Id</td>
                                     <td>Group Name</td>

                            </tr>
                            </thead>
                            <tbody>
                                    <?php foreach ($groups as $group ) { ?>
                                <tr>
                                     
                                    <td><?php if (isset($group->id)) echo $group->id; ?></td>
                                    <td><?php if (isset($group->name)) echo $group->name; ?></td>
                                    <td>
                                            <a href="<?php echo URL . 'group/deleteGroup/' . $group->id; ?>" class="btn btn-danger"> Delete </a>
                                            
                                    </td>
                                            
                                </tr>
                                <?php } ?>
                            </tbody>
                   </table>
         </div>
</div>
 