<?php 
session_start();
include('includes/header.php');
include('../middleware/adminMiddleware.php');
?>




<div class="container">
    <div class="row"> 
      <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Add category</h4>
            </div>
            <div class="card-body " >
                <form action="code.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Stream</label>
                            <input type="text" name="stream" class="form-control" placeholder="Enter stream">
                        </div>
                        <div class="col-md-6">
                            <label for="">Exam Type</label>
                            <input type="text" name="exam_type" class="form-control" placeholder="Enter Exam Type(1,2 or 3) ">
                        </div>
                        <div class="col-md-6">
                            <label for="">Subject</label>
                            <input type="text" name="subject" class="form-control" placeholder="Enter Subject">
                        </div>
                        <div class="col-md-6">
                            <label for="">Semester</label>
                            <input type="text" name="semester" class="form-control" placeholder="Enter Semester">
                        </div>
                        
                    
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary" name="add_category_btn">Submit</button>
                        </div>
                    </div>
                </form>
                    
                
                
            </div>
        </div>
      </div>
    </div>
</div>
<?php include('includes/footer.php')?>