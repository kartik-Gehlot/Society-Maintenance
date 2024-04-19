<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("Link.php") ?>
</head>

<body class="back">
    <?php include("Navbar.php") ?>
    <div class="container mt-5">

        <ul class="nav nav-tabs nav-justified mb-3" id="ex1" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active text-dark fw-bold fs-3" id="ex3-tab-1" data-bs-toggle="tab" href="#ex3-tabs-1"
                    role="tab" aria-controls="ex3-tabs-1" aria-selected="true">User</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link text-dark  fw-bold fs-3" id="ex3-tab-2" data-bs-toggle="tab" href="#ex3-tabs-2"
                    role="tab" aria-controls="ex3-tabs-2" aria-selected="false">Admin</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link text-dark  fw-bold fs-3" id="ex3-tab-3" data-bs-toggle="tab" href="#ex3-tabs-3"
                    role="tab" aria-controls="ex3-tabs-3" aria-selected="false">Security</a>
            </li>

        </ul>

        <div class="tab-content" id="ex2-content">
            <div class="tab-pane fade show active" id="ex3-tabs-1" role="tabpanel" aria-labelledby="ex3-tab-1">
                <div class="row">
                    <div class="col-sm-5">
                        <h1 class="text-center">User login</h1>
                        <?php
                        if (isset($_GET['error']) == 1) {
                            echo "<h3 class='text-center text-danger'>Username and Password not match</h3>";
                        }

                        ?>
                        <form action="action.php" method="post" class="mt-5">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" placeholder="Username"
                                    name="username">
                                <label for="floatingInput">Username</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="floatingPassword" placeholder="Password"
                                    name="password">
                                <label for="floatingPassword">Password</label>
                            </div>
                            <div class="text-center">
                                <input type="submit" class="btn btn-warning btn-lg" value="Login" name="log">
                            </div>
                        </form>
                    </div>
                    <div class="col-sm-2"></div>
                    <div class="col-sm-5">
                        <h1 class="text-center">User registeration</h1>
                        <form action="action.php" method="post" class="mt-5">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" placeholder="Username"
                                    name="username" required>
                                <label for="floatingInput">Username</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="floatingPassword" placeholder="Password"
                                    name="password" required>
                                <label for="floatingPassword">Password</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" placeholder="flat No."
                                    name="flatNo" required>
                                <label for="floatingInput">Flat Number</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" id="floatingInput" placeholder="Mobile no."
                                    name="mobileNo" required>
                                <label for="floatingInput">Mobile number</label>
                            </div>
                            <div class="text-center">
                                <input type="submit" class="btn btn-danger btn-lg" value="Register" name="reg">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="ex3-tabs-2" role="tabpanel" aria-labelledby="ex3-tab-2">
                <div class="row">
                    <div class="col-sm-4"></div>
                    <div class="col-sm-4">
                        <h1 class="text-center">Admin</h1>
                        <form action="./Admin/action.php" method="post" class="mt-5">
                        <?php
                        if (isset($_GET['error']) == 2) {
                            echo "<h3 class='text-center text-danger'>Username and Password not match</h3>";
                        }

                        ?>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" placeholder="Username" name="username">
                                <label for="floatingInput">Username</label>
                            </div>
                            <div class="form-floating">
                                <input type="password" class="form-control" id="floatingPassword"
                                    placeholder="Password" name="password">
                                <label for="floatingPassword">Password</label>
                            </div>
                            <div class="text-center">
                            <input type="submit" name="Adminlog" class="btn btn-warning mt-3" value="Login">
                            </div>
                        </form>
                    </div>
                    <div class="col-sm-4"></div>
                </div>
            </div>
            <div class="tab-pane fade" id="ex3-tabs-3" role="tabpanel" aria-labelledby="ex3-tab-3">
                <div class="row">
                    <div class="col-sm-4"></div>
                    <div class="col-sm-4">
                        <h1 class="text-center">Security</h1>
                        <form action="" method="" class="mt-5">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" placeholder="Username">
                                <label for="floatingInput">Username</label>
                            </div>
                            <div class="form-floating">
                                <input type="password" class="form-control" id="floatingPassword"
                                    placeholder="Password">
                                <label for="floatingPassword">Password</label>
                            </div>
                        </form>
                    </div>
                    <div class="col-sm-4"></div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>