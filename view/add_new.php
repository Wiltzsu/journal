<?php
/**
 * Require header, database and options files.
 * 
 * Also require 'addnew' controller to handle form submissions.
 */
require_once 'header.php';
require_once __DIR__ . '/../controller/AddNewController.php';
require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../model/AddNewOptions.php';

ini_set('log_errors', 1);
ini_set('display_errors', 1);
error_reporting(E_ALL)
?>

<div class="container centered-container">
    
    <div class="card p-4">
        <h2 class="text-center mb-4">Grappling Technique Journal</h2>
        <p class="text-center"><?php echo $greeting; ?></p>

        <div id="accordion">

        <a href="/technique-db-mvc/" class="btn btn-primary btn1">Back</a>

            <div class="card">
                <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Add a technique to the database.
                        </button>
                    </h5>
                </div>

                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">

                    <!-- Technique Form Column -->

                        <form method="POST" action="">
                            <h4>Add a New Technique</h4>
                            <!-- Name -->
                            <div class="form-group<?= !empty($errors['fieldEmpty']) ? ' has-error' : '' ?>">
                                <label for="techniqueName">Technique Name:</label>
                                <input type="text"  size=10 class="form-control" id="techniqueName" name="techniqueName" required>
                                <?php if (!empty($errors['emptyField'])): ?>
                                    <span class="help-block"><?= htmlspecialchars($errors["emptyField"]) ?></span>
                                <?php endif; ?>
                            </div>

                            <!-- Description -->
                            <div class="form-group<?= !empty($errors['fieldEmpty']) ? ' has-error' : '' ?>">
                                <label for="techniqueDescription">Description:</label>
                                <textarea class="form-control" id="techniqueDescription" name="techniqueDescription" required></textarea>
                                <?php if (!empty($errors['emptyField'])): ?>
                                    <span class="help-block"><?= htmlspecialchars($errors["emptyField"]) ?></span>
                                <?php endif; ?>
                            </div>

                            <!-- Category -->
                            <div class="form-group<?= !empty($errors['fieldEmpty']) ? ' has-error' : '' ?>">
                                <label for="techniqueCategory">Category:</label>
                                <select class="form-control" id="categoryID" name="categoryID" required>
                                    <option value="">Select a Category</option>
                                    <?= $categoryOptions; ?>
                                </select>
                                <?php if (!empty($errors['emptyField'])): ?>
                                    <span class="help-block"><?= htmlspecialchars($errors["emptyField"]) ?></span>
                                <?php endif; ?>
                            </div>

                            <!-- Position -->
                            <div class="form-group<?= !empty($errors['fieldEmpty']) ? ' has-error' : '' ?>">
                                <label for="techniquePosition">Position:</label>
                                <select class="form-control" id="positionID" name="positionID" required>
                                    <option value="">Select a Position</option>
                                    <?= $positionOptions; ?>
                                </select>
                                <?php if (!empty($errors['emptyField'])): ?>
                                    <span class="help-block"><?= htmlspecialchars($errors["emptyField"]) ?></span>
                                <?php endif; ?>
                            </div>

                            <!-- Difficulty -->
                            <div class="form-group<?= !empty($errors['fieldEmpty']) ? ' has-error' : '' ?>">
                                <label for="techniqueDifficulty">Difficulty:</label>
                                <select class="form-control" id="difficultyID" name="difficultyID" required>
                                    <option value="">Select a Difficulty</option>
                                    <?= $difficultyOptions; ?>
                                </select>
                                <?php if (!empty($errors['emptyField'])): ?>
                                    <span class="help-block"><?= htmlspecialchars($errors["emptyField"]) ?></span>
                                <?php endif; ?>
                            </div>

                            <button type="submit" name="submitTechnique" class="btn btn-primary btn2">Add Technique</button>
                        </form>

                </div>
            </div>
        </div>

    <div class="card">
        <div class="card-header" id="headingTwo">
            <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                Add a category to the database.
                </button>
            </h5>
        </div>

        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
            <div class="card-body">

                <!-- Category Form Column -->

                    <form method="POST" action="">
                        <h4>Add a New Category</h4>
                        <!-- Category name -->
                        <div class="form-group<?= !empty($errors['fieldEmpty']) ? ' has-error' : '' ?>">
                            <label for="categoryName">Category Name:</label>
                            <input type="text" class="form-control" id="categoryName" name="categoryName" required>
                            <?php if (!empty($errors['emptyField'])): ?>
                                <span class="help-block"><?= htmlspecialchars($errors["emptyField"]) ?></span>
                            <?php endif; ?>
                        </div>

                        <!-- Description -->
                        <div class="form-group<?= !empty($errors['fieldEmpty']) ? ' has-error' : '' ?>">
                            <label for="categoryDescription">Description:</label>
                            <textarea class="form-control" id="categoryDescription" name="categoryDescription" required></textarea>
                            <?php if (!empty($errors['emptyField'])): ?>
                                <span class="help-block"><?= htmlspecialchars($errors["emptyField"]) ?></span>
                            <?php endif; ?>
                        </div>

                        <button type="submit" name="submitCategory" class="btn btn-primary btn2">Add Category</button>
                    </form>
     
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header" id="headingThree">
            <h5 class="mb-0">
                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                Add a position to the database.
                </button>
            </h5>
        </div>

        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
            <div class="card-body">
                <!-- Position Form Column -->
                    <form method="POST" action="" >

                        <!-- Position name -->
                        <h4>Add a New Position</h4>
                        <div class="form-group<?= !empty($errors['fieldEmpty']) ? ' has-error' : '' ?>">
                                <label for="positionName">Position Name:</label>
                                <input type="text"  size=10 class="form-control" id="positionName" name="positionName" required>
                                <?php if (!empty($errors['emptyField'])): ?>
                                    <span class="help-block"><?= htmlspecialchars($errors["emptyField"]) ?></span>
                                <?php endif; ?>
                            </div>

                            <!-- Description -->
                            <div class="form-group<?= !empty($errors['fieldEmpty']) ? ' has-error' : '' ?>">
                                <label for="positionDescription">Description:</label>
                                <textarea class="form-control" id="positionDescription" name="positionDescription" required></textarea>
                                <?php if (!empty($errors['emptyField'])): ?>
                                    <span class="help-block"><?= htmlspecialchars($errors["emptyField"]) ?></span>
                                <?php endif; ?>
                            </div>
                        <button type="submit" name="submitPosition" class="btn btn-primary btn2">Add Position</button>
                    </form>
            </div>
        </div>
    </div>


        <?php if (isset($_SESSION['username']) && !empty($_SESSION['username'])) {?>
            <div class="text-center mt-3">
                <a href="view/logout.php" class="btn btn-primary btn1">Logout</a>
            </div>
        <?php }?>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
