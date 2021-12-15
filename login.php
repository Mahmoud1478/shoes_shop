<?php
    include_once 'layout/head_main.php';
    if (isset($_SESSION['user'])){
        redirectFromCurrent('');
    }
    $model = new \database\Users();
    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $model = new \database\Users();
        $fields = ['email','password'];
        foreach ($fields as $field){
            if ($_REQUEST[$field] ===''){
                $errors[$field] = 'field is required';
            }else{
                unset($errors[$field]);
            }
        }

        if (! count($errors) > 0){
            $user = $model->select('*')->where('email',$_REQUEST['email'])->where('password',$_REQUEST['password'])->first();
            //dd($model->where('id',5)->update(['name'=>'mahmoud','password'=>'1234'])->getQuery());
            if($user){
                $_SESSION['user']=$user;
                redirectFromCurrent('');
            }else{
                $errors['password'] = 'password maybe wrong';
                $errors['email'] = 'email maybe wrong';
            }
        }

    }
?>
<!-- header section end -->
<div class="collection_text">login</div>
<div class="layout_padding collection_section">
    <div class="container">
        <div class="login-form mr-auto ml-auto w-50 p-5">
            <form method="post" action="login.php">
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted"><?php if (isset($errors['email'])){ echo $errors['email'] ;}else{ echo 'We\'ll never share your email with anyone else.';} ?></small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    <small id="emailHelp" class="form-text text-muted"><?php if (isset($errors['password'])){ echo $errors['password'] ;}else{ echo 'We\'ll never share your email with anyone else.';} ?></small>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

    </div>
</div>

<!-- section footer start -->
<?php include_once 'layout/footer.php';?>