<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Listado de usuarios</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
    <?php
    require_once "User.php";
    $id = filter_input(INPUT_GET, 'user', FILTER_VALIDATE_INT);
    if( ! $id ){
	    header("Location:list.php");
    }
    $user = get($id);
    $newUser = checkUser($user);
    $user = json_decode($user, true); 
    ?>
    <div class="container">
        <div class="col-lg-12">
            <h2 class="text-center text-primary">Edit user <?php echo $user['username'] ?></h2>
            <form action="update.php" method="POST">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" value="<?php echo $user['username'] ?>" class="form-control" id="username" placeholder="Username">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" value="<?php echo $user['password'] ?>" class="form-control" id="password" placeholder="Password">
                </div>
                <input type="hidden" name="id" value="<?php echo $user['id'] ?>" />
                <input type="submit" name="submit" class="btn btn-default" value="Update user" />
            </form>
        </div>
    </div>
</body>
</html>
