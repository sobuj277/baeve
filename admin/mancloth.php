<?php
// Header
include "inc/header.php";

// Sidebar
include "inc/sidebar.php";

?>




<?php

$image = $title = $price = '';

if(isset($_POST['submit'])){
    $title = $_POST['title'];
    $price = $_POST['price'];
    $image = $_FILES['clothimage']['name'];
    $tamp_image = $_FILES['clothimage']['tamp_name'];
    move_uploaded_file($tamp_image, $image);
}
$sql = "INSERT INTO mancloth (title, price, image)
VALUES ('$title', '$price','$image')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}





?>
 <div class="mancloth">
    <h4>Man's Cloth Post</h4>
    <form action="" method="POST" enctype="maltipart/form-data" class="form">
        <label for="">Insert Image</label>
        <input type="file" name="clothimage" required>
        <label for="">Product Title</label>
        <input type="text" name="title" required>
        <label for="">Product Price</label>
        <input type="number" name="price" required>
        <button class="btn btn-success mt-2" type="submit" name="submit">Add Post</button>
    </form>
 </div>



<?php

// Footer
include "inc/footer.php";

?>