<div class="container">
          <div class="starter-template">
                    <form method="POST" action="addItem">
                                  <div class="form-group">
                                        <label for="disabledTextInput">New Item Name</label>
                                        <input type="text" id="name" name="item" class="form-control" placeholder="New Item">
                                  </div>
                               <div class="form-group">
                                        <label for="sel1">Select Group :</label>
                                        <select class="selectpicker show-tick" name="groupOption">
                                                <option></option>
                                                <?php foreach ($groups as $group ) { ?>
                                                <option>
                                                        <?php if (isset($group->name)) echo $group->name; ?>
                                                </option>
                                        <?php } ?>
                                        </select>
                               </div>

                                  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </form>
          </div>
</div>