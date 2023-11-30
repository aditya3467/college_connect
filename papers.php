<?php 
session_start();


include('includes/header.php');
include('functions/userfunctions.php');

?>

<style>
    a {
    color: black;
    text-decoration: none;
}
</style>


<div class="container">
    <div class="row">
        <div class="col-md-12">

        <?php 

        if(isset($_GET['id'])){
            $subject = $_GET['id'];
        $papers = getBySubject("products", $subject);

        if(mysqli_num_rows($papers) >0){
            $data = mysqli_fetch_array($papers);
            // $data_unique= array_unique($data);

        
            
        

        
        
        ?>
            <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Collections</h1>
                <div class="row">
                    <?php
                
                if(mysqli_num_rows($papers)>0){
                    foreach($papers as $item){
                        ?>
                        <div class="col-md-4 mb-4">
                            <div class="card shadow">
                                <div class="card-body">
                                <img src="uploads/<?= $item['image'] ?>" height="350px" width="350px" alt="">
                                <h4> <?= $item['year']  ?>  <?= $item['exam_type']  ?></h4>
                                

                                </div>
                            </div>
                        </div>
                    


                    <?php
                    }
                }

                ?>
                </div>

            </div>
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