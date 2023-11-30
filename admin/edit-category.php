<?php 

session_start();
include('../middleware/adminMiddleware.php');

include('includes/header.php');
?>




<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php

        if(isset($_GET['id'])){

            $id = $_GET['id'];
            $category= getByID("categories", $id);

            if(mysqli_num_rows($category)>0){
                $data= mysqli_fetch_array($category);
            ?>

                <div class="card">
                    <div class="card-header">
                        <h4>Edit category</h4>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Name</label>
                                    <input type="hidden" name="category_id" value=<?=$data['id']?>>
                                    <input type="text" name="stream" value="<?= $data['stream']?>"  class="form-control" placeholder="Enter stream">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Exam_Type</label>
                                    <input type="text" name="exam_type" value="<?= $data['exam_type']?>"  class="form-control" placeholder="Enter examtype ">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Subject</label>
                                    <input type="text" name="subject" value="<?= $data['subject']?>"  class="form-control" placeholder="Enter Subject ">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Semester</label>
                                    <input type="text" name="semester" value="<?= $data['semester']?>"  class="form-control" placeholder="Enter Semester ">
                                </div>
                               
                                
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary" name="update_category_btn">Update</button>
                                </div>
                            </div>
                        </form>



                    </div>
                </div>
            <?php
            }
            else{
                echo "Categories not found";
            }
        }
        
        else{
            echo "Id missing from Url";
        }

        ?>

        </div>
    </div>
</div>
<?php include('includes/footer.php')?>