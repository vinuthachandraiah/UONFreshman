<?php
include_once '../config/db.php';

/** @var TYPE_NAME $con */
if (isset($_GET['delete_id'])) {
    $sql_query = "DELETE FROM students WHERE id=" . $_GET['delete_id'];

    mysqli_query($con, $sql_query);
    header("Location: $_SERVER[PHP_SELF]");
}

?>
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
                      <div class="card-body p-40">
                        <div class="row align-items-center">
                          <div class="col-md-8">
                            <h4 class="mb-0">Students</h4>
                          </div>
                          <div class="col-md-4 text-end">
                            <a href="new-student.php" class="btn btn-primary" type="button">Add New</a>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <table class="table table-hover mt-4">
                              <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Student ID</th>
                                <th>Email</th>
                                <th>Action</th>
                              </tr>
                                <?php
                                $sql_query = "SELECT * FROM students";
                                $result_set = mysqli_query($con, $sql_query);
                                $i = 1;
                                while ($row = mysqli_fetch_assoc($result_set)) {
                                ?>
                              <tr>
                                  <td><?php echo $i; ?></td>
                                <td><p class="text-bold"><?php echo $row['student_name']; ?></p></td>
                                <td><?php echo $row['student_Id']; ?> </td>
                                <td><?php echo $row['student_email']; ?></td>
                                  <td>
                                      <a href="#" class="btn btn-secondary btn-sm" onclick="edt_id(<?php echo $row['id']; ?>)">Edit</a>
                                      <a href="#" class="btn btn-danger btn-sm" onclick="delete_id(<?php echo $row['id']; ?>)" type="button"
                                      >Delete</a>
                                      <!--                                                data-bs-toggle="modal" data-bs-target="#delete"-->
                                  </td>
                              </tr>
                                    <?php
                                    $i++;
                                }
                                ?>
                            </table>
                          </div>
                        </div>
                      </div>
                    </article>
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

    <div class="modal fade" id="delete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Delete Student</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p>Are you sure you want to delete this student?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-danger">Delete Now</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="new-student" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">New Student</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="" class="form">
                <div class="form-group mb-3">
                    <label for="">Student Name</label>
                    <input type="text" class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">Student ID</label>
                    <input type="text" class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="">Student Email</label>
                    <input type="text" class="form-control">
                </div>
                <div class="form-group mb-3">
                    <button type="submit" class="btn btn-primary">Add New Student</button>
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

<script type="text/javascript">
    function edt_id(id) {
        window.location.href = 'edit-student.php?edit_id=' + id;
    }

    // function view_id(id)
    // {
    //     window.location.href='view_categories.php?view_id='+id;
    // }
    function delete_id(id) {
        if (confirm('Sure to Delete ?')) {
            window.location.href = 'students.php?delete_id=' + id;
        }
    }
</script>

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
