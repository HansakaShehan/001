<?php

require_once './helper.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo env('APP_NAME') ?></title>
    <?php require_once './partials/header-links.php' ?>
</head>

<body>
    <div class="container">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <?php require_once './partials/nav-bar.php' ?>

                    <div class="col-12 mt-5 d-flex justify-content-end px-lg-10 px-1">
                        <div class="btn-group" id="filter-btn-group">
                            <a href="#all" class="btn btn-primary active" aria-current="page">All</a>
                            <a href="#pending" class="btn btn-primary">Pending</a>
                            <a href="#done" class="btn btn-primary">Done</a>
                        </div>
                    </div>

                    <div id="taskContainer" class="col-12 p-lg-10 p-1 ">
                    </div>

                    <div id="emptyView" class="col-12 empty-view d-flex justify-content-center align-items-end d-none">
                        <label class="fs-5" for="">No Tasks</label>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <?php require_once './partials/add-task-floating-button.php' ?>
    <?php require_once './partials/scripts.php' ?>

    <script>
        viewTaks();

        const filterBtnGroup = document.getElementById("filter-btn-group");

        const filterLinks = filterBtnGroup.querySelectorAll("a");


        filterLinks.forEach((link) => {
            link.addEventListener("click", (event) => {
                event.preventDefault();

                filterLinks.forEach((btn) => btn.classList.remove("active"));

                link.classList.add("active");

                const filterType = link.getAttribute("href").substring(1);

                viewTaks(filterType);
            });
        });
    </script>
</body>

</html>