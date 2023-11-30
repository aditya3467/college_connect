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
        $product = getByID("products", $id);

        if(mysqli_num_rows($product) >0){
            $data = mysqli_fetch_array($product);

        

        

        
        
        ?>
            <div class="card">
                <div class="card-header">
                    <h4>Edit Product</h4>
                </div>
                <div class="card-body ">
                    <form action="code.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12">
                                <input type="hidden" name="product_id" value="<?= $data['id']?>" >
                            <label class="mb-0">Select Stream</label>
                                <select name = "stream" class="form-select mb-2" required>
                                
                                    <option selected>Select Stream</option>
                                    <?php
                                $category = getAll("categories");
                                if(mysqli_num_rows($category)>0){
                                foreach($category as $item){
                                    ?>
                                    

                                    <option value="<?= $item['stream']; ?>" <?= $data['stream'] == $item['stream']? 'selected' : '' ?>><?= $item['stream']; ?></option>
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
                                    <label for="">Exam_Type</label>
                                    <input type="text" name="exam_type" value="<?= $data['exam_type']?>"  class="form-control" placeholder="Enter examtype ">
                                </div>
                            <div class="col-md-6">
                                <label class="mb-0">Subject</label>
                                <input type="text" required name="subject" class="form-control mb-2" value="<?= $data['subject']?>" placeholder="Enter Subject ">
                            </div>
                            <div class="col-md-6">
                                <label class="mb-0">semester</label>
                                <input type="text" required name="semester"  value="<?= $data['semester']?>"class="form-control mb-2" placeholder="Enter semester ">
                            </div>
                             
                            <div class="col-md-6">
                                <label class="mb-0">Year</label>
                                <input type="text" required name="year" value="<?= $data['year']?>" class="form-control mb-2" placeholder="Enter year ">
                            </div>
                            

                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary" name="update_product_btn">Update</button>
                            </div>
                        </div>
                    </form>



                </div>
            </div>
        

        <?php 
        }
        else{
            echo "Product Not Found";

        } 
        }
        else{
            echo "Id missing from URL";
        }
        ?>
        </div>
    </div>
</div>
<?php include('includes/footer.php')?>