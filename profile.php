<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="assets/img/favicon.png" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/ui.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <title>The University of Newcastle, Australia</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light border-bottom">
        <div class="container"> <a class="navbar-brand" href="#"> <img src="assets/img/logo.png" height="80" class="logo"> </a> <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar_main1" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
            <div class="collapse navbar-collapse" id="navbar_main1">
                <ul class="navbar-nav ms-auto me-sm-2 mt-2 mt-lg-0">
                    <li class="nav-item me-2 active"> <a class="nav-link" href="#"> Campus</span> </a> </li>
                    <li class="nav-item me-2"> <a class="nav-link" href="#">For Parents</a> </li>
                    <li class="nav-item me-2"> <a class="nav-link" href="#">For Students</a> </li>
                    <li class="nav-item me-2"> <a class="nav-link" href="#">Career Help</a></li>
                    <li class="nav-item me-2"> <a class="nav-link btn btn-primary text-white" href="#">Freshman App</a></li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown"> <a class="nav-link py-0 dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <span class="icon-xs bg-gray rounded-circle me-2"><i class="bi bi-person-circle"></i> </span> <span>User</span> </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li> <a class="dropdown-item" href="#">Profile</a> </li>
                            <li> <a class="dropdown-item" href="#">Account Settings</a> </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li> <a class="dropdown-item" href="#">Sign Out</a> </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <section class="padding-y bg-light">
        <div class="container">
            <div class="row">
                <aside class="col-lg-3">
                    <!-- COMPONENT MENU LIST -->
                    <div class="card p-3 h-100">
                        <nav class="nav flex-column nav-pills">
                          <a class="nav-link" href="admin/categories.php">Categories</a>
                          <a class="nav-link" href="sub-categories.html">Sub Categories</a>
                          <a class="nav-link" href="surveys.html">Surveys</a>
                          <a class="nav-link" href="students.html">Students</a>
                          <a class="nav-link active" href="profile.html">Profile setting</a>
                          <a class="nav-link" href="#">Log out</a>
                        </nav>
                    </div> <!-- COMPONENT MENU LIST END .// -->
                </aside>
                <div class="col-lg-9">
                    <article class="card">
                        <div class="card-body p-40">
                            <div class="row align-items-center mb-5">
                              <div class="col-md-8">
                                <h4 class="mb-0">Profile Settings</h4>
                              </div>
                              <div class="col-md-4 text-end">
                              </div>
                            </div>
                            <form>
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="row gx-3">
                                            <div class="col-6 mb-3"> <label class="form-label">First name</label> <input class="form-control" type="text" placeholder=""> </div> <!-- col .// -->
                                            <div class="col-6 mb-3"> <label class="form-label">Last name</label> <input class="form-control" type="text" placeholder=""> </div> <!-- col .// -->
                                            <div class="col-lg-6 col-md-6 mb-3"> <label class="form-label">Email</label> <input class="form-control" type="email" placeholder=""> </div> <!-- col .// -->
                                            <div class="col-lg-6 col-md-6 mb-3"> <label class="form-label">Phone</label> <input class="form-control" type="tel" placeholder="+1234567890"> </div> <!-- col .// -->
                                            <div class="col-lg-12 mb-3"> <label class="form-label">Address</label> <input class="form-control" type="text" placeholder="Type here"> </div> <!-- col .// -->
                                            <div class="col-lg-6 col-6 mb-3"> <label class="form-label">Student ID</label> <input class="form-control" type="text"> </div>
                                            <div class="col-lg-6 col-6 mb-3"> <label class="form-label">Birthday</label> <input class="form-control" type="date"> </div> <!-- col .// -->
                                        </div> <!-- row.// -->
                                    </div> <!-- col.// -->

                                </div> <!-- row.// --> <br> <button class="btn btn-primary" type="submit">Save changes</button>
                                <div class="help mt-3 hide">
                                    <p class="help text-success">Success</p>
                                    <p class="help text-danger">Error!</p>
                                </div>
                            </form>
                            <hr class="my-4">
                            <div class="row" style="max-width:920px">
                                <div class="col-md">
                                    <article class="box mb-3 bg-light"> <a class="btn float-end btn-light btn-sm" href="" type="button" data-bs-toggle="modal" data-bs-target="#new-password">Change</a>
                                        <p class="title mb-0">Password</p> <small class="text-muted d-block" style="width:70%">You can reset or change your password by clicking here</small>
                                    </article>
                                </div> <!-- col.// -->
                                <div class="col-md">
                                    <article class="box mb-3 bg-light"> <a class="btn float-end btn-outline-danger btn-sm" href="" type="button" data-bs-toggle="modal" data-bs-target="#deactivate">Deactivate</a>
                                        <p class="title mb-0">Remove account</p> <small class="text-muted d-block" style="width:70%">Once you delete your account, there is no going back.</small>
                                    </article>
                                </div> <!-- col.// -->
                            </div> <!-- row.// -->
                        </div> <!-- card-body .// -->
                    </article> <!-- card .// -->
                </div>
            </div> <!-- row.// -->
            <!-- =============== COMPONENT ACCOUNT 3 END.// ================= -->
        </div> <!-- container .// -->
    </section>
    <footer class="section-footer bg-dark color-light shadow">
        <div class="container">
            <section class="footer-main py-5">
                <div class="row">
                    <aside class="col-lg col-md-4 col-6">
                        <h6 class="title">Quick links</h6>
                        <ul class="list-menu mb-4">
                            <li><a href="#">Degrees</a></li>
                            <li><a href="#">Library</a></li>
                            <li><a href="#">Maps</a></li>
                            <li><a href="#">Staff directory</a></li>
                        </ul>
                    </aside> <!-- col end.// -->
                    <aside class="col-lg col-md-4 col-6">
                        <h6 class="title">Information about</h6>
                        <ul class="list-menu mb-4">
                            <li><a href="#">Our Uni</a></li>
                            <li><a href="#">Strategic Plan</a></li>
                            <li><a href="#">Colleges and schools</a></li>
                            <li><a href="#">Campus life</a></li>
                        </ul>
                    </aside> <!-- col end.// -->
                    <aside class="col-lg col-md-4 col-6">
                        <h6 class="title"> Information for</h6>
                        <ul class="list-menu mb-4">
                            <li><a href="#">Study</a></li>
                            <li><a href="#">Research</a></li>
                            <li><a href="#">Business and Industry</a></li>
                            <li><a href="#">International</a></li>
                        </ul>
                    </aside> <!-- col end.// -->
                    <aside class="col-lg col-md-4 col-6">
                        <h6 class="title"> More </h6>
                        <ul class="list-menu mb-4">
                            <li><a href="#">MyUni</a></li>
                            <li><a href="#">Online tools</a></li>
                            <li><a href="#">AskUON</a></li>
                            <li><a href="#">The Shop</a></li>
                        </ul>
                    </aside> <!-- col end.// -->
                    <aside class="col-lg-3 col-md-6 col-12">
                        <h6 class="title">Got a question?</h6>
                        <a a="freshman.html" class="btn btn-lg btn-primary"><i class="bi bi-journal-check"></i> Freshman Site</a>
                    </aside>
                </div> <!-- row end.// -->
            </section>
            <section class="footer-bottom d-flex justify-content-center border-top">
                <nav> The University of Newcastle, Australia © 2022</nav>
            </section>
        </div> <!-- container end.// -->
    </footer>

     <div class="modal fade" id="deactivate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Remove account</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p>Are you sure you want to remove your account?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-danger">Deactivate Now</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="new-password" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="" class="form">
                <div class="form-group mb-3">
                    <label for="">Current Password</label>
                    <input type="text" class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">New Password</label>
                    <input type="text" class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">Confirm New Password</label>
                    <input type="text" class="form-control">
                </div>
                <div class="form-group mb-3">
                    <button type="submit" class="btn btn-primary">Change Password</button>
                    <div class="help mt-3 hide">
                        <p class="help text-success">Success</p>
                        <p class="help text-danger">Error!</p>
                    </div>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>
