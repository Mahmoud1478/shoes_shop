<?php
include_once '../layout/header.php';
$model = new \database\Users();
$users = $model->all()

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
                                        <th class="text-left">First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Password</th>
                                        <th>permissions</th>
                                        <th>operations</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    foreach ($users as $user)
                                    echo '
                                    <tr>
                                        <td class="text-left">'.$user['fname'].'</td>
                                        <td>'.$user['lname'].'</td>
                                        <td>'.$user['email'].'</td>
                                        <td>'.$user['password'].'</td>
                                        <td>'.\mappers\PermissionsMapper::getPermission($user['permissions']).'</td>
                                       <td class="d-flex justify-content-end" >
                                       <form action="'.CWD.'/delete.php?id='.$user['id'].'" method="post">
                                           <button class="mdc-button mdc-button--raised icon-button filled-button--secondary" style="margin-right: 10px" type="submit">
                                                <i class="material-icons mdc-button__icon">delete</i>
                                          </button>
                                       </form>
                                      <a class="mdc-button mdc-button--raised icon-button filled-button--success" href="'.CWD.'/show.php?id='.$user['id'].'">
                                            <i class="material-icons mdc-button__icon">edite</i>
                                      </a>
                                      
                                       </td>
                                    </tr>
                                    '
                                    ?>
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