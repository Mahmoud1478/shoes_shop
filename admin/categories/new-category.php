<?php
include_once '../../app.php';
use Http\Server;
use database\Categories;

if (Server::method() === 'POST'){
    $fields = ['name'];
    foreach ($fields as $field) {
        if (isset($_REQUEST[$field]) && $_REQUEST[$field] === '') {
            $errors[$field] = 'field is required';
        } else {
            unset($errors['$field']);
        }
    }
    if(!count($errors) > 0 ){
        unset($errors);
        $model = new Categories();
        $model->create([
            'name'=>$_REQUEST['name'],

        ]);
        redirectFromCurrent('/all-categories.php');
    }
}

include_once '../layout/header.php';
?>
<!-- partial -->
<div class="page-wrapper mdc-toolbar-fixed-adjust">
    <main class="content-wrapper">
        <div class="d-flex from-wrapper">
            <form method="post" action="<?php echo urlFromCurrent('/new-category.php');?>" class="custom-form w-sm-100 w-md-50">
                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12-desktop">
                    <div class="mdc-text-field">
                        <input class="mdc-text-field__input" id="name" type="text" name="name" value="">
                        <div class="mdc-line-ripple"></div>
                        <label for="name" class="mdc-floating-label">name</label>
                    </div>
                </div>
                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12-desktop mt-4">
                    <button class="mdc-button mdc-button--raised" type="submit">save</button>
                </div>
            </form>
        </div
    </main>
    <!-- partial:../../partials/_footer.html -->
    <?php include_once '../layout/footer.php';?>
    <!-- partial -->
</div>
</div>
</div>
<!-- plugins:js -->
<script src="../assets/vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="../assets/js/material.js"></script>
<script src="../assets/js/misc.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->

<!-- End custom js for this page-->
</body>
</html>