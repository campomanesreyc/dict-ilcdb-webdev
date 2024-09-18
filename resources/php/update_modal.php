<div class="modal fade" id="update_modal<?php echo $row['id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="add_modal_label">Add New Record</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="resources/php/update.php" method="POST">

          <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $row['id']; ?>" required>

          <div class="mb-3">
            <label for="name" class="form-label">Full Name (FN MI. LN)</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name']; ?>" required>
          </div>

          <div class="mb-3">
            <label for="sex" class="form-label">Sex</label>
            <select class="form-select" name="sex" required>
              <option selected disabled value="">--Click to select--</option>
              <option value="Male" <?php if ($row['sex'] == "Male") echo "selected"; ?>>Male</option>
              <option value="Female" <?php if ($row['sex'] == "Female") echo "selected"; ?>>Female</option>
            </select>
          </div>

          <div class="mb-3">
            <label for="age" class="form-label">Age</label>
            <input type="number" class="form-control" id="age" name="age" min=0 max=100 value="<?php echo $row['age']; ?>" required>
          </div>

          <div class="mb-3">
            <label for="phone" class="form-label">Mobile Number</label>
            <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $row['phone']; ?>" required>
          </div>

          <div class="mb-3">
            <label for="body_temp" class="form-label">Body Temperature</label>
            <input type="number" step="any" class="form-control" id="body_temp" name="body_temp" value="<?php echo $row['body_temp']; ?>" required>
          </div>

          <div class="mb-3">
            <label for="diagnosed" class="form-label">Diagnosed with COVID-19?</label>
            <select class="form-select" name="diagnosed">
              <option selected disabled value="">--Click to select--</option>
              <option value="Yes" <?php if ($row['diagnosed'] == "Yes") echo "selected"; ?>>Yes</option>
              <option value="No" <?php if ($row['diagnosed'] == "No") echo "selected"; ?>>No</option>
            </select>
          </div>

          <div class="mb-3">
            <label for="encountered" class="form-label">Encountered COVID-19?</label>
            <select class="form-select" name="encountered">
              <option selected disabled value="">--Click to select--</option>
              <option value="Yes" <?php if ($row['encountered'] == "Yes") echo "selected"; ?>>Yes</option>
              <option value="No" <?php if ($row['encountered'] == "No") echo "selected"; ?>>No</option>
            </select>
          </div>

          <div class="mb-3">
            <label for="vaccinated" class="form-label">Vaccinated?</label>
            <select class="form-select" name="vaccinated">
              <option selected disabled value="">--Click to select--</option>
              <option value="Yes" <?php if ($row['vaccinated'] == "Yes") echo "selected"; ?>>Yes</option>
              <option value="No" <?php if ($row['vaccinated'] == "No") echo "selected"; ?>>No</option>
            </select>
          </div>

          <div class="mb-3">
            <label for="nationality" class="form-label">Nationality</label>
            <?php
            $filename = 'resources/txt/nationalities_list.txt';
            $eachlines = file($filename, FILE_IGNORE_NEW_LINES);
            echo '<select class="form-select" name="nationality" id="nationality">';
            echo '<option selected disabled value="">Click to Select One</option>';
            foreach ($eachlines as $lines) {

              if ($lines == $row['nationality'])
                echo "<option selected>{$lines}</option>";
              else
                echo "<option>{$lines}</option>";
            }
            echo '</select>';
            ?>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" name="btn_save" id="btn_save" class="btn btn-success">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>