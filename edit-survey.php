<?php include_once '../config/db.php';
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
/** @var TYPE_NAME $con */
$message = '';
$page_id = '';
if (isset($_GET['edit_id'])) {
    $page_id = intval($_GET['edit_id']);
    $sql_query = "SELECT * FROM surveys WHERE id=" . $page_id;
    $result_set = mysqli_query($con, $sql_query);
    $fetched_row = mysqli_fetch_array($result_set, MYSQLI_ASSOC);
}
if (isset($_POST['btn-update'])) {
    // variables for input data
    $page_id = intval($_POST['page_id']);
    $sql_query = "SELECT * FROM sub_categories WHERE id=" . $page_id;
    $result_set = mysqli_query($con, $sql_query);
    $fetched_row = mysqli_fetch_array($result_set, MYSQLI_ASSOC);
    $survey_title = $_POST['survey_title'];

    if ($_FILES["banner_image"]["name"] == '') {
        $banner_image = $fetched_row['banner_image'];
    } else {
        $banner_image = $_FILES["banner_image"]["name"];
        $file_name = $_FILES["banner_image"]["name"];
        $file_tmp = $_FILES["banner_image"]["tmp_name"];
        if ($file_name != '') {
            move_uploaded_file($file_tmp, "uploads/" . $file_name);

        }
    }

    $survey_description = $_POST['survey_description'];
    // variables for input data

    // sql query for update data into database
    $sql_query = "UPDATE surveys SET `survey_title`='$survey_title',`banner_image`='$banner_image',`survey_description`='$survey_description' WHERE id=" . $page_id;

    // sql query for update data into database

    // sql query execution function
    if (mysqli_query($con, $sql_query)) {
        for ( $jj = 1; $jj < $_POST['counter']; $jj++ ) {
            $qstn = $_POST['qstn' . $jj ];
            $qstn_type = $_POST['qstn_type' . $jj ];
            $choice1 = $_POST['qstn_' . $jj .'_choice_1' ];
            $choice2 = $_POST['qstn_' . $jj .'_choice_2' ];
            $choice3 = $_POST['qstn_' . $jj .'_choice_3' ];
            $choice4 = $_POST['qstn_' . $jj .'_choice_4' ];

            if ( isset( $_POST['qstn_' . $jj .'_id'] ) ) {
                //update
//                echo "<br />if";
                $id = $_POST['qstn_' . $jj .'_id'];
                $sql_query="UPDATE survey_question SET `qstn`='$qstn',`qstn_type`='$qstn_type',`choice_1`='$choice1',`choice_2`='$choice2',`choice_3`='$choice3',`choice_4`='$choice4' WHERE id=".$id;

                if(mysqli_query($con,$sql_query))
                {
                    // Success
                } else {
                    ?>
                    <script type="text/javascript">
                        alert('error occurred while updating data');
                    </script>
                    <?php
                }
            } else {
//                echo "<br />else";
                $sql_query = "INSERT INTO survey_question (`qstn`,`qstn_type`,`choice_1`, `choice_2`,`choice_3`,`choice_4`, `surveyId`) VALUES(?, ?, ?, ?, ?, ?, ?)";
                $stmt = $con->prepare($sql_query);
                if ( $stmt === false ) {
                    die ('prepare() failed: ' . $con->error);
                }
                $stmt->bind_param("ssssssi", $qstn, $qstn_type, $choice1, $choice2, $choice3, $choice4, $page_id);
                if ($stmt->execute()) {
                    $stmt->close();
                }
            }


        }
        exit;
        ?>
        <script type="text/javascript">
            // alert('surveys updated successfully');
            // window.location.href = 'surveys.php';
        </script>
        <?php
    } else {
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
                                <h4 class="mb-4">New Survey</h4>
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
                                        <label for="">Survey Title</label>
                                        <input type="text" name="survey_title" value="<?php echo $fetched_row['survey_title']; ?>" class="form-control">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Survey Description</label>
                                        <textarea name="survey_description" id="" rows="3"
                                                  class="form-control"><?php echo $fetched_row['survey_description']; ?></textarea>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="">Banner Image</label>
                                        <div class="input-group mb-3">
                                            <input type="file" value="<?php echo $fetched_row['survey_description']; ?>" name="banner_image" class="form-control"
                                                   id="inputGroupFile02">
                                            <!-- <label class="input-group-text" for="inputGroupFile02">Upload</label> -->
                                        </div>
                                    </div>
                                    <input type="hidden" name="page_id" value="<?php echo $_GET['edit_id']; ?>">
                                    <h4 class="mt-5">Survey Questions</h4>
                                    <?php
                                    $sql_query="SELECT * FROM survey_question WHERE surveyId=".$_GET['edit_id'];
                                    $result_set2=mysqli_query($con,$sql_query);
                                    $ii = 1;
                                    while ($row = mysqli_fetch_assoc($result_set2)):
                                    ?>
                                    <div class="single-survey-qn">
                                        <div class="form-group mb-3">
                                            <label for="" class="label qstn-label">Question <?php echo $ii; ?></label>
                                            <input type="text" name="qstn<?php echo $ii; ?>" id="qstn<?php echo $ii; ?>" value="<?php echo $row['qstn']; ?>" class="form-control qstn">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="" class="label">Question Type</label>
                                            <select name="qstn_type<?php echo $ii; ?>" id="qstn_type<?php echo $ii; ?>"
                                                    class="form-control qstn-type form-select">
                                                <option value="multiple">Multiple Choice</option>
                                                <option value="text">Text Answer</option>
                                                <option value="rating">Rating</option>
                                            </select>
                                        </div>
                                        <div class="multiple-choice-option">
                                            <div class="form-group mb-3">
                                                <label for="" class="label">Choice 1</label>
                                                <input type="text" name="qstn_<?php echo $ii; ?>_choice_1" id="qstn_<?php echo $ii; ?>_choice_1"
                                                       class="form-control qstn1-choice1" value="<?php echo $row['choice_1']; ?>">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="" class="label">Choice 2</label>
                                                <input type="text" name="qstn_<?php echo $ii; ?>_choice_2" id="qstn_<?php echo $ii; ?>_choice_2"
                                                       class="form-control qstn1-choice2" value="<?php echo $row['choice_2']; ?>">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="" class="label">Choice 3</label>
                                                <input type="text" name="qstn_<?php echo $ii; ?>_choice_3" id="qstn_<?php echo $ii; ?>_choice_3"
                                                       class="form-control qstn1-choice3" value="<?php echo $row['choice_3']; ?>">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="">Choice 4</label>
                                                <input type="text" name="qstn_<?php echo $ii; ?>_choice_4" id="qstn_<?php echo $ii; ?>_choice_4"
                                                       class="form-control qstn1-choice4" value="<?php echo $row['choice_4']; ?>">
                                            </div>
                                            <input type="hidden" name="qstn_<?php echo $ii; ?>_id"" value="<?php echo $row['id']; ?>">
                                        </div>
                                    </div>
                                    <?php $ii++; endwhile; ?>
                                    <div class="form-group mb-3">
                                        <small class="add-faq" id="add_new_qstn"><a href="#">+ Add New
                                                Question</a></small>
                                    </div>
                                    <input type="hidden" name="counter" id="counter" value="<?php echo $ii; ?>">
                                    <div class="form-group mb-3">
                                        <button type="submit" name="btn-update" class="btn btn-primary">Update Survey
                                            Now
                                        </button>
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
                    <a a="freshman.html" class="btn btn-lg btn-primary"><i class="bi bi-journal-check"></i> Freshman
                        Site</a>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function () {
        $('.js-example-basic-multiple').select2();
        let counter = 2;
        $('#add_new_qstn').on('click', function (e) {
            e.preventDefault();

            let newQstn = $('div.single-survey-qn:first').clone();
            newQstn.find('label.qstn-label').text('Question ' + counter);
            newQstn.find('input.qstn').attr('name', 'qstn' + counter).attr('id', 'qstn_' + counter);
            newQstn.find('select.qstn-type').attr('name', 'qstn_type' + counter).attr('id', 'qstn_type' + counter);
            newQstn.find('input.qstn1-choice1').attr('name', 'qstn_' + counter + '_choice_1').attr('id', 'qstn_' + counter + '_choice_1');
            newQstn.find('input.qstn1-choice2').attr('name', 'qstn_' + counter + '_choice_2').attr('id', 'qstn_' + counter + '_choice_2');
            newQstn.find('input.qstn1-choice3').attr('name', 'qstn_' + counter + '_choice_3').attr('id', 'qstn_' + counter + '_choice_3');
            newQstn.find('input.qstn1-choice4').attr('name', 'qstn_' + counter + '_choice_4').attr('id', 'qstn_' + counter + '_choice_4');

            // newQstn.each(function() {
            //     $(this).find('label.qstn-label').text('Question ' + counter)//attr('id', 'label-element-' + counter);
            //     $(this).find('input.af-inputtext').attr('name', 'element-' + counter).attr('id', 'element-' + counter);
            //     $(this).find('input[type="checkbox"]').val(counter);
            //
            //     //increment the counter
            //     counter++;
            //
            // });
            $('div.single-survey-qn:last').after(newQstn);
            $('#counter').val(counter);
            counter++;
        })
    });


</script>
<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
-->
</body>

</html>
