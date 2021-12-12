<?php
include_once '../../app.php';
if (!$_SESSION['user']->permissions == 2){
    redirect('');
}
use Http\Server;
use database\Products;
use database\Categories;
$model_category = new Categories();
$categories = $model_category->all();

if (Server::method() === 'POST'){
    $fields = ['name','price','picture','category'];
    foreach ($fields as $field) {
        if (isset($_REQUEST[$field]) && $_REQUEST[$field] === '') {
            $errors[$field] = 'field is required';
        } else {
            unset($errors['$field']);
        }
    }
    if(!count($errors) > 0 ){
        unset($errors);
        $model = new Products();
        $model->create([
            'name'=>$_REQUEST['name'],
            'price'=>$_REQUEST['price'],
            'category_id' => $_REQUEST['category'],
            'picture' => $_REQUEST['picture'],
        ]);
        redirectFromCurrent('/all-products.php');
    }
}

include_once '../layout/header.php';
?>
<!-- partial -->
<div class="page-wrapper mdc-toolbar-fixed-adjust">
    <main class="content-wrapper">
        <div class="d-flex from-wrapper">
            <form method="post" action="<?php echo urlFromCurrent('/new-product.php');?>" class="custom-form w-sm-100 w-md-50">
                <div class="mdc-layout-grid__inner">
                    <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
                        <div class="mdc-text-field">
                            <input class="mdc-text-field__input" id="name" type="text" name="name" value="">
                            <div class="mdc-line-ripple"></div>
                            <label for="name" class="mdc-floating-label">name</label>
                        </div>
                    </div>
                    <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
                        <div class="mdc-text-field">
                            <input class="mdc-text-field__input" id="price" type="text" name="price" value="">
                            <div class="mdc-line-ripple"></div>
                            <label for="name" class="mdc-floating-label">price</label>
                        </div>
                    </div>
                    <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
                        <div class="mdc-text-field">
                            <input class="mdc-text-field__input" id="picture" type="text" name="picture" value="">
                            <div class="mdc-line-ripple"></div>
                            <label for="name" class="mdc-floating-label">picture</label>
                        </div>
                    </div>
                    <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
                        <div class="mdc-select demo-width-class w-100" data-mdc-auto-init="MDCSelect">
                            <input type="hidden" name="category" value="">
                            <i class="mdc-select__dropdown-icon"></i>
                            <div class="mdc-select__selected-text"></div>
                            <div class="mdc-select__menu mdc-menu-surface demo-width-class">
                                <ul class="mdc-list">
                                   <?php foreach ($categories as $category) { ?>

                                    <li class="mdc-list-item" data-value="<?php echo $category->id?>">
                                        <?php echo $category->name?>
                                    </li>

                                   <?php };?>
                                </ul>
                            </div>
                            <span class="mdc-floating-label">Pick Category</span>
                            <div class="mdc-line-ripple"></div>
                        </div>
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