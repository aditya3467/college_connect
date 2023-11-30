<?php 
session_start();
include('../middleware/adminMiddleware.php');

include('includes/header.php');
?>




<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Add Procuct</h4>
                </div>
                <div class="card-body ">
                    <form action="code.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12">
                            <label class="mb-0">Select Stream</label>
                                <select name = "stream_id" class="form-select mb-2" required>
                                
                                    <option selected>Select Stream</option>
                                    <?php
                                $category = getAll("categories");
                                if(mysqli_num_rows($category)>0){
                                foreach($category as $item){
                                    ?>
                                    

                                    <option value="<?= $item['stream']; ?>"><?= $item['stream']; ?></option>
                                    <?php
                                

                                
                                }
                                }
                                else{
                                    echo "No Categories Available";
                                }
                                
                                ?>
                                </select>

                            </div>
                            <div class="col-md-6">
                                <label class="mb-0">Exam_Type</label>
                                <input type="text" required name="exam_type" class="form-control mb-2" placeholder="Enter Exam Type">
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0">Subject</label>
                                <input type="text" required name="subject" class="form-control mb-2" placeholder="Enter Subject ">
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0">semester</label>
                                <input type="text" required name="semester" class="form-control mb-2" placeholder="Enter semester ">
                            </div>
                             <div class="col-md-6">
                                <label class="mb-0">Upload Image</label>
                                <input type="file" required name="image" class="form-control mb-2">
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0">Year</label>
                                <input type="text" required name="year" class="form-control mb-2" placeholder="Enter year ">
                            </div>
                            

                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary" name="add_product_btn">Submit</button>
                            </div>
                        </div>
                    </form>



                </div>
            </div>
        </div>
    </div>
</div>
<?php include('includes/footer.php')?>