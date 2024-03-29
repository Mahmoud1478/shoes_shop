<?php
include_once '../../app.php';
if (!$_SESSION['user']->permissions == 2){
    redirect('');
}
$model = new \database\Categories();
$categories = $model->all();
$title = 'categories';
include_once '../layout/header.php';
?>
<!-- partial -->
<div class="page-wrapper mdc-toolbar-fixed-adjust">
    <main class="content-wrapper">
        <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12">
            <div class="mdc-card p-0">
                <h6 class="card-title card-padding pb-0">All Users</h6>
                <div class="table-responsive">
                    <table class="table table-hoverable">
                        <thead>
                        <tr>
                            <th class="text-left"> Name</th>
                            <th>operations</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($categories as $category){ ?>

                            <tr>
                                <td class="text-left"> <?php echo $category->name ?></td>
                               <td class="d-flex justify-content-end" >
                               <form action="<?php printf('%s/delete.php?id=%s',CWD,$category->id??'') ?>" method="post">
                                   <button class="mdc-button mdc-button--raised icon-button filled-button--secondary" style="margin-right: 10px" type="submit">
                                        <i class="material-icons mdc-button__icon">delete</i>
                                  </button>
                               </form>
                              <a class="mdc-button mdc-button--raised icon-button filled-button--success" href="<?php printf('%s/show.php?id=%s',CWD,$category->id??'') ?>">
                                    <i class="material-icons mdc-button__icon">edit</i>
                              </a>

                               </td>
                            </tr>
                         <?php };?>

                        </tbody>
                    </table>
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