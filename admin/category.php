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
                <h4>Categories</h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered tabel-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Stream</th>
                            <th>Exam</th>
                            <th>Subject</th>
                            <th>Semester</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $category = getAll("categories");
                            if(mysqli_num_rows($category) > 0){
                                foreach($category as $item){
                                    ?>
                                    <tr>
                                        <td><?= $item['id']; ?></td>
                                        <td><?= $item['stream']; ?></td>
                                        <td><?= $item['exam_type']; ?></td>
                                        <td><?= $item['subject']; ?></td>
                                        <td><?= $item['semester']; ?></td>
                                        
                                        
                                        <td><a href="edit-category.php?id=<?= $item['id']; ?>" class="btn btn-primary">Edit</a>
                                        <form action="code.php" method="POST">
                                            <input type="hidden" name="category_id" value="<?= $item['id']; ?>">
                                        <button class="btn btn-danger" name="delete_category_btn">Delete</button>
                                        </form>
                                    </td>
                                        
                                        
                                    </tr>
                                    <?php

                                }

                            }
                            else{
                                echo "No records Found";
                            }

                        ?>
                        
                    </tbody>
                
                </table>
            </div>
        </div>
       </div>
    </div>
</div>
<?php include('includes/footer.php')?>