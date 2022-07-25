<?php
include_once '../config/db.php';

/** @var TYPE_NAME $con */
if (isset($_GET['delete_id'])) {
    $sql_query = "DELETE FROM sub_categories WHERE id=" . $_GET['delete_id'];

    mysqli_query($con, $sql_query);
    header("Location: $_SERVER[PHP_SELF]");
}
include_once('templates/header.php'); ?>

<body>
<?php include_once('templates/nav.php'); ?>
<section class="padding-y bg-light">
    <div class="container">
        <div class="row">
            <aside class="col-lg-3">
                <?php include_once('templates/sub-nav.php'); ?><!-- COMPONENT MENU LIST END .// -->
            </aside>
            <div class="col-lg-9">
                <article class="card">
                    <div class="card-body p-40">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <h4 class="mb-0">Sub Categories</h4>
                            </div>
                            <div class="col-md-4 text-end">
                                <a href="new-sub-category.php" class="btn btn-primary">Add New</a>
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
                                    $sql_query = "SELECT * FROM sub_categories";
                                    $result_set = mysqli_query($con, $sql_query);
                                    $i = 1;
                                    while ($row = mysqli_fetch_assoc($result_set)) {
                                        ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><p class="text-bold"><?php echo $row['page_title']; ?></p></td>
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

<script type="text/javascript">
    function edt_id(id) {
        window.location.href = 'edit-sub-category.php?edit_id=' + id;
    }

    // function view_id(id)
    // {
    //     window.location.href='view_categories.php?view_id='+id;
    // }
    function delete_id(id) {
        if (confirm('Sure to Delete ?')) {
            window.location.href = 'sub-categories.php?delete_id=' + id;
        }
    }
</script>
<?php include_once('templates/footer.php'); ?>
