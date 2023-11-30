<?php
session_start();
include('includes/header.php');
include('functions/userfunctions.php');

?>


<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Collections</h1>
                <div class="row">
                    <?php
                $categories = getAllActive("categories");
                if(mysqli_num_rows($categories)>0){
                    foreach($categories as $item){
                        ?>
                        <div class="col-md-4 mb-4">
                            <div class="card shadow">
                                <div class="card-body">
                                <a href="subject.php?id=<?= $item['stream']; ?>" ><img src="src/<?= $item['image'] ?>" height="350px" width="400px" alt=""></a>
                                <h4><?= $item['stream'] ?></h4>

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
</div>


<?php
include('includes/footer.php');
?>