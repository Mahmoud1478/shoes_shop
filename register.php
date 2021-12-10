<?php
    require_once "layout/head_main.php";

    if (isset($_SESSION['user'])){
        redirect('');
    }
    if ($_SERVER['REQUEST_METHOD'] === "POST"){

        if ($_REQUEST['fname'] ===''){
            $errors['fname'] = 'field is required';
        }else{
            unset($errors['fname']);
        }
        if ($_REQUEST['lname'] ===''){
            $errors['lname'] = 'field is required';
        }else{
            unset($errors['lname']);
        }
        if ($_REQUEST['email'] ===''){
            $errors['email'] = 'field is required';
        }else{
            unset($errors['email']);
        }
        if ($_REQUEST['password'] ===''){
            $errors['password'] = 'field is required';
        }else{
            unset($errors['password']);
        }
        if(!count($errors) > 0 ){
            unset($errors);
            $user = New \database\Users();
            $user->create([
                'fname'=>$_REQUEST['fname'],
                'lname'=>$_REQUEST['lname'],
                'email'=>$_REQUEST['email'],
                'password'=>$_REQUEST['password'],
            ]);
            $_SESSION['user'] = $_REQUEST;
            redirectFromCurrent('');
        }
    }
?>
<!-- header section end -->
<div class="collection_text">Register</div>
<div class="layout_padding collection_section">
    <div class="container">
        <div class="register-form mr-auto ml-auto w-50 p-5">
            <form action="register.php" method="post">
                <div class="d-flex">
                    <div class="form-group mr-3" style="flex: 1">
                        <label for="first_name">First name</label>
                        <input type="text" name="fname" class="form-control" id="first_name" aria-describedby="first_nameHelp" placeholder="Enter first name">
                        <small id="first_nameHelp" class="form-text text-muted <?php if (isset($errors['fname'])){ echo 'danger';} ?>">
                            <?php if (isset($errors['fname'])){ echo $errors['fname'] ;} ?>
                        </small>
                    </div>
                    <div class="form-group" style="flex: 1">
                        <label for="last_name">Last name</label>
                        <input type="text" name="lname" class="form-control" id="last_name" aria-describedby="last_nameHelp" placeholder="Enter last name">
                        <small id="last_nameHelp" class="form-text text-muted <?php if (isset($errors['lname'])){ echo 'danger';} ?> ">
                            <?php if (isset($errors['lname'])){ echo $errors['lname'] ;} ?>
                        </small>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted <?php if (isset($errors['email'])){ echo 'danger';} ?> ">
                        <?php if (isset($errors['email'])){ echo $errors['email'] ;}else{ echo 'We\'ll never share your email with anyone else.';} ?>
                    </small>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" id="password"  aria-describedby="passwordHelp" placeholder="Password">
                    <small id="passwordHelp" class="form-text text-muted <?php if (isset($errors['password'])){ echo 'danger';} ?>  ">
                        <?php if (isset($errors['password'])){ echo $errors['password'] ;}else{ echo 'We\'ll never share your email with anyone else.';} ?>
                    </small>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
    <!-- section footer start -->
    <?php include_once "layout/footer.php"; ?>