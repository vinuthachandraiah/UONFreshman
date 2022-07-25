<?php include_once '../config/db.php';
/** @var TYPE_NAME $con */
$message = '';
$page_id = '';
if(isset($_GET['edit_id']))
{
    $page_id = intval($_GET['edit_id']);
    $sql_query="SELECT * FROM students WHERE id=".$page_id;
    $result_set=mysqli_query($con,$sql_query);
    $fetched_row=mysqli_fetch_array($result_set,MYSQLI_ASSOC);
}
if(isset($_POST['btn-update']))
{
    // variables for input data
    $page_id = intval($_POST['page_id']);
    $sql_query="SELECT * FROM students WHERE id=".$page_id;

    $result_set=mysqli_query($con,$sql_query);
    $fetched_row=mysqli_fetch_array($result_set,MYSQLI_ASSOC);

    $student_name = $_POST['student_name'];

    $student_email = $_POST['student_email'];

    $student_Id = $_POST['student_Id'];
    // variables for input data

    // sql query for update data into database
    $sql_query="UPDATE students SET `student_name`='$student_name',`student_email`='$student_email', `student_Id`='$student_Id' WHERE id=".$page_id;

    // sql query for update data into database

    // sql query execution function
    if(mysqli_query($con,$sql_query))
    {
        ?>
        <script type="text/javascript">
            // alert('students updated successfully');
            window.location.href='students.php';
        </script>
        <?php
    }
    else
    {
        ?>
        <script type="text/javascript">
            alert('error occurred while updating data');
        </script>
        <?php
    }
    // sql query execution function
}

include_once('templates/header.php'); ?>

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
                            <h4 class="mb-4">Edit Student</h4>
                          </div>
                          <div class="col-md-4 text-end">
                            <!-- <a href="#" class="btn btn-primary">Add New</a> -->
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                              <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post"
                                    class="form" enctype='multipart/form-data'>
                                <div class="form-group mb-3">
                                    <label for="">Student Name</label>
                                    <input type="text" value="<?php echo $fetched_row['student_name']; ?>" name="student_name" class="form-control" required>
                                </div>
                                  <div class="form-group mb-3">
                                      <label for="">Student ID</label>
                                      <div class="input-group mb-3">
                                          <input type="text" value="<?php echo $fetched_row['student_Id'] ?>" name="student_Id" id="student_Id" class="form-control" required>
                                          <!-- <label class="input-group-text" for="inputGroupFile02">Upload</label> -->
                                      </div>
                                  </div>
                                <div class="form-group mb-3">
                                    <label for="">Student Email</label>
                                    <input type="email" value="<?php echo $fetched_row['student_email'] ?>" name="student_email" id="student_email" class="form-control" readonly required>
                                </div>

<!--                                  <div class="form-group mb-3">-->
<!--                                      <label for="">Password</label>-->
<!--                                      <input type="text" name="student_password" id="student_password" class="form-control" required>-->
<!--                                  </div>-->
                                  <input type="hidden" name="page_id" value="<?php echo $_GET['edit_id']; ?>">
                                <div class="form-group mb-3">
                                    <button type="submit" name="btn-update" class="btn btn-primary">Update Student</button>
                                    <div class="help mt-3 hide">
                                        <p class="help text-success">Success</p>
                                        <p class="help text-danger">Error!</p>
                                    </div>
                                </div>
                            </form>
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
            <h5 class="modal-title" id="exampleModalLabel">Delete Cateogry</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p>Are you sure you want to delete category?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-danger">Delete Now</button>
          </div>
        </div>
      </div>
    </div>



    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#student_Id').focusout(function()  {
                //
                let email = $(this).val() + '@uon.edu.au';
                $('#student_email').val(email);
            });
        });


    </script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>
