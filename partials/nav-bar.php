<div class="col-12">
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarPillsExample"
                aria-controls="navbarExample" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="<?php echo env('APP_URL') ?>"><img src="./assets/image/todo-logo.png"
                    width="50" />
            </a>
            <div class="collapse navbar-collapse" id="navbarPillsExample">
                <ul class="navbar-nav navbar-nav-pills">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo env('APP_URL') ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./add-task.php">Add Task</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>