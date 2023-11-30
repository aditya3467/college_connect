<?php
session_start();
include('../config/dbcon.php');
include('../middleware/adminMiddleware.php');

if(isset($_POST['add_category_btn'])){
    $stream = $_POST['stream'];
    // $slug = $_POST['slug'];
    $exam_type = $_POST['exam_type'];
    $subject = $_POST['subject'];
    $semester = $_POST['semester'];
    $image = $_POST['semester'];

    $cate_query = "INSERT INTO categories(stream,exam_type,subject,semester,image) 
    VALUES('$stream','$exam_type','$subject',$semester,$image)";

    $cate_query_run = mysqli_query($con, $cate_query);

    if($cate_query_run){
        redirect("add-category.php","Added Succesfully");
    }
    else{
        redirect("add-category.php", "Something Went wrong");
    }


}

else if(isset($_POST['update_category_btn'])){
    $category_id= $_POST['category_id'];
    $stream = $_POST['stream'];
    // $slug = $_POST['slug'];
    $exam_type = $_POST['exam_type'];
    $subject = $_POST['subject'];
    $semester = $_POST['semester'];


    
    $update_query = "UPDATE categories SET stream='$stream', exam_type='$exam_type',subject='$subject',
     semester='$semester' WHERE id='$category_id'  ";

      $update_query_run = mysqli_query($con, $update_query);


      if($update_query_run){
       
      redirect("edit-category.php?id=$category_id","Updated Successfully");   


}
}

else if(isset($_POST['delete_category_btn'])){
    $category_id = mysqli_real_escape_string($con,$_POST['category_id']);
    $category_query = "SELECT * FROM categories WHERE id='$category_id'";
    $category_query_run = mysqli_query($con,$category_query);
    $category_data = mysqli_fetch_array($category_query_run);
    

    $delete_query= "DELETE from categories WHERE id='$category_id'";
    $delete_query_run = mysqli_query($con,$delete_query);

    if($delete_query_run){
        
        
        redirect("category.php","Deleted  Successfully");  

    }
    else{
        redirect("category.php","Something went Wrong");  

    }

}

else if(isset($_POST['add_product_btn'])){
    $stream_id= $_POST['stream_id'];
    // $stream = $_POST['stream'];
    // $slug = $_POST['slug'];
    $exam_type = $_POST['exam_type'];
    $subject = $_POST['subject'];
    $semester = $_POST['semester'];
    $year = $_POST['year'];

    $image = $_FILES['image']['name'];

    $path = "../uploads";

    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time().'.'.$image_ext;

    

    $product_query = "INSERT INTO products(stream, exam_type, subject, semester, 
     image,year) VALUES ('$stream_id','$exam_type','$subject',$semester,'$filename','$year')";
    

    $product_query_run = mysqli_query($con,$product_query);

    if($product_query_run){
        move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$filename);
        redirect("add-product.php","Added Succesfully");
    }
    else{
        redirect("add-product.php", "Something Went wrong");
    
    }

}



else if(isset($_POST['update_product_btn'])){
    $product_id= $_POST['product_id'];
    $stream = $_POST['stream'];
    // $slug = $_POST['slug'];
    $exam_type = $_POST['exam_type'];
    $subject = $_POST['subject'];
    $semester = $_POST['semester'];
    $year = $_POST['year'];


    
    $update_query = "UPDATE products SET stream='$stream', exam_type='$exam_type',subject='$subject',
     semester='$semester', year='$year' WHERE id='$product_id'  ";

      $update_query_run = mysqli_query($con, $update_query);


      if($update_query_run){
       
      redirect("edit-product.php?id=$product_id","Updated Successfully");   


}
}



else if(isset($_POST['delete_product_btn'])){
    $product_id = mysqli_real_escape_string($con,$_POST['product_id']);
    $product_query = "SELECT * FROM products WHERE id='$product_id'";
    $product_query_run = mysqli_query($con,$product_query);
    $product_data = mysqli_fetch_array($product_query_run);
    $image = $product_data['image'];

    $delete_query= "DELETE from products WHERE id='$product_id'";
    $delete_query_run = mysqli_query($con,$delete_query);

    if($delete_query_run){
        if(file_exists("../uploads/".$image))
            {
                unlink("../uploads/".$image);
        }
        
        redirect("products.php","Deleted  Successfully");  

    }
    else{
        redirect("products.php","Something went Wrong");  

    }

}

?>