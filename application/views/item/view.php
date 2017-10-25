 <div class="container">
         <div class="starter-template">
                    <!-- add $item form -->

                    <table class="table table-striped">
                            <thead>
                            <tr>
                                <td>Id</td>
                                <td>Item Name</td>
                                <td>Group Name</td>

                            </tr>
                            </thead>
                            <tbody>
                                    <?php foreach ($items as $item ) { ?>
                                <tr>
                                     
                                    <td><?php if (isset($item->id)) echo $item->id; ?></td>
                                    <td><?php if (isset($item->itemName)) echo $item->itemName; ?></td>
                                    <td><?php if (isset($item->groupName)) echo $item->groupName; ?></td>
                                    <td>
                                            <a href="<?php echo URL . 'item/deleteItem/' . $item->id; ?>" class="btn btn-danger"> Delete </a>
                                            
                                    </td>
                                            
                                </tr>
                                <?php } ?>
                            </tbody>
                   </table>
         </div>

</div>
 