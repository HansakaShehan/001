<?php

require_once './helper.php';

$categoriesData = file_get_contents('./assets/data/category.json');
$categories = json_decode($categoriesData, true);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add Task</title>
    <?php require_once './partials/header-links.php' ?>
</head>

<body>
    <div class="container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <?php require_once './partials/nav-bar.php' ?>

                    <div class="col-12 p-lg-10 p-1">

                        <div class="row">
                            <div class="mb-3 col-12">
                                <label for="title" class="form-label">Title</label>
                                <input required type="test" class="form-control" id="title" name="title"
                                    placeholder="Task Title">
                            </div>
                            <div class="mb-3 col-12">
                                <label for="description" class="form-label">Description</label>
                                <textarea required class="form-control" id="description" name="description" rows="4"
                                    placeholder="Task ..."></textarea>
                            </div>
                            <div class="mb-3 col-lg-4">
                                <label for="category" class="form-label">Category</label>
                                <select required class="form-select" id="category" name="category">
                                    <option value="" selected disabled>Choose...</option>
                                    <?php 
                                    foreach($categories as $category){
                                    ?>
                                    <option value="<?php echo $category['name'] ?>"><?php echo $category['name'] ?></option>
                                    <?php
                                    }
                                    ?>
                                    </select>
                            </div>
                            <div class="mb-3 col-lg-4">
                                <label for="due_date" class="form-label">Due Date</label>
                                <input required type="date" class="form-control" id="due_date" name="due_date">
                            </div>
                            <div class="mb-3 col-lg-4">
                                <label for="due_time" class="form-label">Due Time</label>
                                <input required type="time" class="form-control" id="due_time" name="due_time">
                            </div>
                        </div>

                        <div class="text-end mt-2">
                            <button type="button" class="btn btn-subtle me-2">Cancel</button>
                            <button type="submit" id="add-task-btn" class="btn btn-primary">+ Add Task</button>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

    <?php require_once './partials/add-task-floating-button.php' ?>
    <?php require_once './partials/scripts.php' ?>

</body>

</html>