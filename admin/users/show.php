<?php
include_once'../../app.php';
if (isset(\Http\Server::query()['id'])){
    $model = new \database\Users();
    $user = $model->find(\Http\Server::query()['id']);
    if (!$user){
        redirect('admin/404.php',404);
    }
    include_once '../layout/header.php';
}

?>
<!-- partial -->
<div class="page-wrapper mdc-toolbar-fixed-adjust">
    <main class="content-wrapper">
        <div style="width:70%;margin: 0 auto;">
            <div class="mdc-layout-grid__inner">
                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
                    <div class="mdc-text-field">
                        <input class="mdc-text-field__input" id="text-field-hero-input" name="fname" value="<?php echo $user['fname']?>">
                        <div class="mdc-line-ripple"></div>
                        <label for="text-field-hero-input" class="mdc-floating-label">First Name</label>
                    </div>
                </div>
                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
                    <div class="mdc-text-field">
                        <input class="mdc-text-field__input" id="text-field-hero-input" name="lname" value="<?php echo $user['lname']?>">
                        <div class="mdc-line-ripple"></div>
                        <label for="text-field-hero-input" class="mdc-floating-label">Last Name</label>
                    </div>
                </div>
                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12-desktop">
                    <div class="mdc-text-field">
                        <input class="mdc-text-field__input" id="text-field-hero-input" type="email" name="email" value="<?php echo $user['email']?>">
                        <div class="mdc-line-ripple"></div>
                        <label for="text-field-hero-input" class="mdc-floating-label">email</label>
                    </div>
                </div>
                <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12-desktop">
                    <div class="mdc-text-field mdc-text-field--with-trailing-icon">
                        <i class="material-icons mdc-text-field__icon">visibility</i>
                        <input class="mdc-text-field__input" id="text-field-hero-input" type="password" name="password" value="<?php echo $user['password']?>">
                        <div class="mdc-notched-outline">
                            <div class="mdc-notched-outline__leading"></div>
                            <div class="mdc-notched-outline__notch">
                                <label for="text-field-hero-input" class="mdc-floating-label">password</label>
                            </div>
                            <div class="mdc-notched-outline__trailing"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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