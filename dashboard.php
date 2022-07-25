<?php include_once('templates/header.php'); ?>

<body>
<?php include_once('templates/nav.php'); ?>
    <section class="padding-y bg-light">
        <div class="container">
            <div class="row">
                <aside class="col-lg-3">
                    <?php include_once('templates/sub-nav.php'); ?>
                </aside>
                <div class="col-lg-9">
                    <article class="card">
                        <div class="card-body">
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
                                    <aside class="col-lg-4">
                                        <div class="text-lg-center mt-3"> <img class="img-lg mb-3 img-avatar" src="../assets/img/avatar1.jpg" alt="User Photo">
                                            <div> <a class="btn btn-sm btn-light" href="#"> <i class="fa fa-camera"></i> Upload </a> <a class="btn btn-sm btn-outline-danger" href="#"> <i class="bi bi-trash3-fill"></i> </a> </div>
                                        </div>
                                    </aside> <!-- col.// -->
                                </div> <!-- row.// --> <br> <button class="btn btn-primary" type="submit">Save changes</button>
                            </form>
                            <hr class="my-4">
                            <div class="row" style="max-width:920px">
                                <div class="col-md">
                                    <article class="box mb-3 bg-light"> <a class="btn float-end btn-light btn-sm" href="#">Change</a>
                                        <p class="title mb-0">Password</p> <small class="text-muted d-block" style="width:70%">You can reset or change your password by clicking here</small>
                                    </article>
                                </div> <!-- col.// -->
                                <div class="col-md">
                                    <article class="box mb-3 bg-light"> <a class="btn float-end btn-outline-danger btn-sm" href="#">Deactivate</a>
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
<?php include_once('templates/footer.php'); ?>
