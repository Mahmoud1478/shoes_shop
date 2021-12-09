<?php
    require_once "layout/head_main.php";
    if ($_SERVER['REQUEST_METHOD'] === "GET"){
        $_SESSION['errors']=[];

    }
    if (!isset($_SESSION['errors'])){
        $_SESSION['errors']=[];
    }
    if ($_SERVER['REQUEST_METHOD'] === "POST"){

        if ($_REQUEST['fname'] ===''){
            $_SESSION['errors']['fname'] = 'field is required';
        }else{
            unset($_SESSION['errors']['fname']);
        }
        if ($_REQUEST['lname'] ===''){
            $_SESSION['errors']['lname'] = 'field is required';
        }else{
            unset($_SESSION['errors']['lname']);
        }
        if ($_REQUEST['email'] ===''){
            $_SESSION['errors']['email'] = 'field is required';
        }else{
            unset($_SESSION['errors']['email']);
        }
        if ($_REQUEST['password'] ===''){
            $_SESSION['errors']['password'] = 'field is required';
        }else{
            unset($_SESSION['errors']['password']);
        }
        if(!count($_SESSION['errors']) > 0 ){
            unset($_SESSION['errors']);
            header('location:index.php');
            die();

        }
        $user = New \database\Users();
        //print_r($user->prepare('select * from users')->execute()->get_all())  ;
        $user->prepare('insert into users (fname,lname,email,password,permisions) values(?,?,?,?,?) ')->bind(['mostafa','ali','mahmoud@exmp.com','125',3])->execute();


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
                        <small id="first_nameHelp" class="form-text text-muted <?php if (isset($_SESSION['errors']['fname'])){ echo 'danger';} ?>">
                            <?php if (isset($_SESSION['errors']['fname'])){ echo $_SESSION['errors']['fname'] ;} ?>
                        </small>
                    </div>
                    <div class="form-group" style="flex: 1">
                        <label for="last_name">Last name</label>
                        <input type="text" name="lname" class="form-control" id="last_name" aria-describedby="last_nameHelp" placeholder="Enter last name">
                        <small id="last_nameHelp" class="form-text text-muted <?php if (isset($_SESSION['errors']['lname'])){ echo 'danger';} ?> ">
                            <?php if (isset($_SESSION['errors']['lname'])){ echo $_SESSION['errors']['lname'] ;} ?>
                        </small>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted <?php if (isset($_SESSION['errors']['email'])){ echo 'danger';} ?> ">
                        <?php if (isset($_SESSION['errors']['email'])){ echo $_SESSION['errors']['email'] ;}else{ echo 'We\'ll never share your email with anyone else.';} ?>
                    </small>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control" id="password"  aria-describedby="passwordHelp" placeholder="Password">
                    <small id="passwordHelp" class="form-text text-muted <?php if (isset($_SESSION['errors']['password'])){ echo 'danger';} ?>  ">
                        <?php if (isset($_SESSION['errors']['password'])){ echo $_SESSION['errors']['password'] ;}else{ echo 'We\'ll never share your email with anyone else.';} ?>
                    </small>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
    <!-- section footer start -->
    <?php include_once "layout/footer.php"; ?>