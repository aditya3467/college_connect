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
            $stream = $_GET['id'];
        $product = getByStream("products", $stream);

        if(mysqli_num_rows($product) >0){
            $data = mysqli_fetch_array($product);
            // $data_unique= array_unique($data);

        
            
        

        
        
        ?>
            <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Collections</h1>
                <div class="row">
                    <?php
                
                if(mysqli_num_rows($product)>0){
                    foreach($product as $item){
                        ?>
                        <div class="col-md-4 mb-4">
                            <div class="card shadow">
                                <div class="card-body">
                                <a href="papers.php?id=<?= $item['subject']; ?>" text-decoration = "none" ><h4><?= $item['subject'] ?></h4></a>
                                

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