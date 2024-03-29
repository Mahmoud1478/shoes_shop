<?php
use Http\Server;
use database\Users;
include_once'../../app.php';


if (!$_SESSION['user']->permissions == 2){
    redirect('');
}
if (!isset($_GET['id'] )){
    redirectFromCurrent('/all-users.php');
}
$model = new Users();

if (Server::method() === 'POST' ){
    $fields = ['fname','lname','permission','email','password'];
    foreach ($fields as $field){
        if (isset($_REQUEST[$field]) && $_REQUEST[$field] ===''){
            $errors[$field] = 'field is required';
        }else{
            unset($errors[$field]);
        }
    }
    if(!count($errors) > 0 ){
        unset($errors);
        $model->update([
            'fname'=>$_REQUEST['fname'],
            'lname'=>$_REQUEST['lname'],
            'email'=>$_REQUEST['email'],
            'password'=>$_REQUEST['password'],
            'permissions'=>$_REQUEST['permission']
        ])->where('id',$_GET['id'])->save();
        redirectFromCurrent('/all-users.php');
    }

}else{
    $user = $model->find($_GET['id']);
    if (!$user){
        redirect('admin/404.php',404);
    }
}
$title = 'show-user';
include_once '../layout/header.php';
?>
<!-- partial -->
<div class="page-wrapper mdc-toolbar-fixed-adjust">
    <main class="content-wrapper">
        <div class="d-flex from-wrapper">
            <form method="post" action="<?php echo urlFromCurrent('/show.php?id='.$user->id??'');?>" class="custom-form w-sm-100 w-md-50">
                <div class="mdc-layout-grid__inner">
                    <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
                        <div class="mdc-text-field">
                            <input class="mdc-text-field__input" id="fname" name="fname" value="<?php if(isset($user)) { echo $user->fname;} ?>">
                            <div class="mdc-line-ripple"></div>
                            <label for="fname" class="mdc-floating-label">First Name</label>
                        </div>
                    </div>
                    <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-6-desktop">
                        <div class="mdc-text-field">
                            <input class="mdc-text-field__input" id="lname" name="lname" value="<?php if(isset($user)) {echo $user->lname;}?>">
                            <div class="mdc-line-ripple"></div>
                            <label for="lname" class="mdc-floating-label">Last Name</label>
                        </div>
                    </div>
                    <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12-desktop">
                        <div class="mdc-text-field">
                            <input class="mdc-text-field__input" id="email" type="email" name="email" value="<?php if(isset($user)) { echo $user->email;}?>">
                            <div class="mdc-line-ripple"></div>
                            <label for="email" class="mdc-floating-label">email</label>
                        </div>
                    </div>
                    <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12-desktop">
                        <div class="mdc-select demo-width-class w-100" data-mdc-auto-init="MDCSelect">
                            <input type="hidden" name="permission" value="<?php if(isset($user)) { echo $user->permissions;}?>">
                            <i class="mdc-select__dropdown-icon"></i>
                            <div class="mdc-select__selected-text"></div>
                            <div class="mdc-select__menu mdc-menu-surface demo-width-class">
                                <ul class="mdc-list">
                                    <li class="mdc-list-item" data-value="1">
                                       User
                                    </li>
                                    <li class="mdc-list-item" data-value="2">
                                        Admin
                                    </li>
                                </ul>
                            </div>
                            <span class="mdc-floating-label">Pick Permission</span>
                            <div class="mdc-line-ripple"></div>
                        </div>
                    </div>
                    <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12-desktop">
                        <div class="mdc-text-field mdc-text-field--with-trailing-icon">
                            <i class="material-icons mdc-text-field__icon event-all" style="z-index: 50" id="show-field" data-show ="password">visibility</i>
                            <input class="mdc-text-field__input" id="password" type="password" name="password" value="<?php if(isset($user)) { echo $user->password;}?>">
                            <div class="mdc-notched-outline">
                                <div class="mdc-notched-outline__leading"></div>
                                <div class="mdc-notched-outline__notch">
                                    <label for="password" class="mdc-floating-label">password</label>
                                </div>
                                <div class="mdc-notched-outline__trailing"></div>
                            </div>
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
<script>
    window.addEventListener('load',()=>{
        const showBtn = document.getElementById('show-field');
        showBtn.addEventListener('click',()=>{
            const target = document.getElementById(showBtn.dataset.show);
            if (target.type ==='password'){
                target.type ='text'
            }else {
                target.type ='password'
            }
        })
    })
</script>
<!-- End custom js for this page-->
</body>
</html>