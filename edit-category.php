<?php
include_once '../config/db.php';

/** @var TYPE_NAME $con */
$page_id = '';
if(isset($_GET['edit_id']))
{
    $page_id = intval($_GET['edit_id']);
    $sql_query="SELECT * FROM categories WHERE id=".$_GET['edit_id'];
    $result_set=mysqli_query($con,$sql_query);
    $fetched_row=mysqli_fetch_array($result_set,MYSQLI_ASSOC);
} else {
    header("Location: categories.php");
}
if(isset($_POST['btn-update']))
{
    // variables for input data
    $page_id = intval($_POST['page_id']);
    $sql_query="SELECT * FROM categories WHERE id=".$page_id;
    $result_set=mysqli_query($con,$sql_query);
    $fetched_row=mysqli_fetch_array($result_set,MYSQLI_ASSOC);

    $page_title = $_POST['page_title'];

    if($_FILES["banner_image"]["name"]==''){
        $banner_image =  $fetched_row['banner_image'];
    }else{
        $banner_image =  $_FILES["banner_image"]["name"];
        $file_name = $_FILES["banner_image"]["name"];
        $file_tmp = $_FILES["banner_image"]["tmp_name"];
        if($file_name!=''){
            move_uploaded_file($file_tmp,"../uploads/".$file_name);

        }
    }

    $sub_heading = $_POST['sub_heading'];

    $heading = $_POST['heading'];

    $content = $_POST['content'];

    $sub_categories = implode(",", $_POST['sub_categories']);

//    $faq = $_POST['faq'];
    // variables for input data

    // sql query for update data into database
    $sql_query="UPDATE categories SET `page_title`='$page_title',`banner_image`='$banner_image',`sub_heading`='$sub_heading',`heading`='$heading',`content`='$content',`sub_categories`='$sub_categories' WHERE id=".$page_id;

    // sql query for update data into database

    // sql query execution function
    if(mysqli_query($con,$sql_query))
    {
        ?>
        <script type="text/javascript">
            window.location.href='categories.php';
        </script>
        <?php
    }
    else
    {
        ?>
        <script type="text/javascript">
            alert('error occured while updating data');
        </script>
        <?php
    }
    // sql query execution function
}
if(isset($_POST['btn-cancel']))
{
//    header("Location: categories.php");
}
?>
<?php include_once('templates/header.php'); ?>

<body>
<?php include_once('templates/nav.php'); ?>
    <section class="padding-y bg-light">
        <div class="container">
            <div class="row">
                <aside class="col-lg-3">
                    <!-- COMPONENT MENU LIST -->
                    <?php include_once('templates/sub-nav.php'); ?>
                </aside>
                <div class="col-lg-9">
                    <article class="card">
                      <div class="card-body p-40">
                        <div class="row align-items-center">
                          <div class="col-md-8">
                            <h4 class="mb-4">New Category</h4>
                          </div>
                          <div class="col-md-4 text-end">
                            <!-- <a href="#" class="btn btn-primary">Add New</a> -->
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="form" enctype='multipart/form-data'>
                                <div class="form-group mb-3">
                                    <label for="">Page Title</label>
                                    <input type="text" class="form-control" id="page_title" name="page_title" value="<?php echo $fetched_row['page_title'] ?>" required placeholder="Page_title">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="">Banner Image</label>
                                    <div class="input-group mb-3">
                                        <input type="file" value="<?php echo $fetched_row['banner_image'] ?>" class="form-control" id="banner_image" name="banner_image" placeholder="Banner_image">
<!--                                        <input type="file" class="form-control" id="inputGroupFile02">-->
                                      <!-- <label class="input-group-text" for="inputGroupFile02">Upload</label> -->
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="">Sub Heading</label>
                                    <input type="text" class="form-control" value="<?php echo $fetched_row['sub_heading'] ?>" id="sub_heading" name="sub_heading" required placeholder="Sub_heading">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="">Heading</label>
                                    <input type="text" class="form-control" value="<?php echo $fetched_row['heading'] ?>" id="heading" name="heading" required placeholder="Heading">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="">Content</label>
                                    <textarea  class="form-control" id="content" name="content" rows="10"><?php echo $fetched_row['content'] ?></textarea>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="">Sub Categories</label>
                                    <?php
                                        $catgs = explode(',', $fetched_row['sub_categories'])
                                    ?>
                                    <select name="sub_categories[]" id="sub_categories" class="js-example-basic-multiple form-control" multiple="multiple">
                                        <option value=""<?php if($fetched_row['sub_categories'] == ""){ echo "selected"; } ?> ></option>
                                        <option value="1" <?php if (in_array("1", $catgs)) echo "selected"; ?>>Academic support</option>
                                        <option value="2" <?php if (in_array("2", $catgs)) echo "selected"; ?>>Personal support</option>
                                        <option value="3" <?php if (in_array("3", $catgs)) echo "selected"; ?>>Wellness Services</option>
                                        <option value="4" <?php if (in_array("4", $catgs)) echo "selected"; ?>>Disability Support Services</option>
                                        <option value="5" <?php if (in_array("5", $catgs)) echo "selected"; ?>>Libraries and Facilities</option>
                                        <option value="6" <?php if (in_array("6", $catgs)) echo "selected"; ?>>IT support</option>
                                    </select>
                                </div>
                                <input type="hidden" name="page_id" value="<?php echo $_GET['edit_id']; ?>">
                                <div class="form-group mb-3">
                                    <button type="submit" name="btn-update" class="btn btn-primary">Update Category</button>
                                    <div class="help mt-3">
<!--                                        <p class="help text-success">Success</p>-->
                                        <p class="help text-danger"></p>
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





    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>
