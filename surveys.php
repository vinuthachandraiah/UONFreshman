<?php
include_once '../config/db.php';

/** @var TYPE_NAME $con */
if (isset($_GET['delete_id'])) {
    $sql_query = "DELETE FROM surveys WHERE id=" . $_GET['delete_id'];

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
                    <!-- COMPONENT MENU LIST -->
                    <?php include_once('templates/sub-nav.php'); ?>
                </aside>
                <div class="col-lg-9">
                    <article class="card">
                      <div class="card-body p-40">
                        <div class="row align-items-center">
                          <div class="col-md-8">
                            <h4 class="mb-0">Surveys</h4>
                          </div>
                          <div class="col-md-4 text-end">
                            <a href="new-survey.php" class="btn btn-primary">Add New</a>
                          </div>
                        </div>
                          <div class="row">
                              <div class="col">
                                  <table class="table table-hover mt-4">
                                      <tr>
                                          <td>Sl.no</td>
                                          <th>Title</th>
                                          <!--                                <th>Date</th>-->
                                          <th>Action</th>
                                      </tr>
                                      <?php
                                      $sql_query = "SELECT * FROM surveys";
                                      $result_set = mysqli_query($con, $sql_query);
                                      $i = 1;
                                      while ($row = mysqli_fetch_assoc($result_set)) {
                                          ?>
                                          <tr>
                                              <td><?php echo $i; ?></td>
                                              <td><p class="text-bold"><?php echo $row['survey_title']; ?></p></td>
                                              <!--                                <td><p>15-06-2022</p></td>-->
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
<script type="text/javascript">
    function edt_id(id) {
        window.location.href = 'edit-survey.php?edit_id=' + id;
    }

    // function view_id(id)
    // {
    //     window.location.href='view_categories.php?view_id='+id;
    // }
    function delete_id(id) {
        if (confirm('Sure to Delete ?')) {
            window.location.href = 'surveys.php?delete_id=' + id;
        }
    }
</script>
<?php include_once('templates/footer.php'); ?>
