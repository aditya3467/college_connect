<?php 
session_start();
include('../middleware/adminMiddleware.php');
include('includes/header.php');
?>
<style>
    .td{
        text-align : "center";
    }
</style>



<div class="container">
    <div class="row"> 
       <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Products</h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered tabel-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Stream</th>
                            <th>Image</th>
                            <th>Exam Type</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $products = getAll("products");
                            if(mysqli_num_rows($products) > 0){
                                foreach($products as $item){
                                    ?>
                                    <tr>
                                        <td><?= $item['id']; ?></td>
                                        <td><?= $item['stream']; ?></td>
                                        <td>
                                            <img src="../uploads/<?= $item['image']; ?>" height="50px" width="50px" alt="<?= $item['stream']; ?>" >
                                        </td>
                                        <td><?= $item['exam_type']; ?></td>
                                        <!-- <td><?= $item['subject']; ?></td>
                                        <td><?= $item['semester']; ?></td>
                                        <td><?= $item['year']; ?></td> -->
                                        <td><a href="edit-product.php?id=<?= $item['id']; ?>" class="btn btn-sm btn-primary">Edit</a>
                                        
                                    </td>
                                    <td>
                                    <form action="code.php" method="POST">
                                            <input type="hidden" name="product_id" value="<?= $item['id']; ?>">
                                        <button class="btn btn-sm btn-danger" name="delete_product_btn">Delete</button>
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