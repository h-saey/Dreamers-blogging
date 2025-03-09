<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $title = $_POST['title'];
  $content = $_POST['content']; // This will be in HTML format
  $image = $_POST['image']; // Store image URL
  $description = $_POST['description'];

  $sql = "INSERT INTO blogposts (title, content, image, description) VALUES (?, ?, ?, ?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ssss", $title, $content, $image, $description);

  if ($stmt->execute()) {
    echo "Blog post added successfully!";
  } else {
    echo "Error: " . $stmt->error;
  }

  $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Add Blog Post</title>
  <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
  <link
    rel="stylesheet"
    href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
  <link rel="stylesheet" href="style.css" />
  <!--Custom CSS -->
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
    integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer" />
  <!-- Font Awesome for icons -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Cookie&family=DM+Serif+Text:ital@0;1&family=Dancing+Script:wght@400..700&family=Fleur+De+Leah&family=Kaushan+Script&family=Playwrite+GB+S:ital,wght@0,100..400;1,100..400&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet" />
  <link
    href="https://fonts.googleapis.com/css2?family=Cookie&family=DM+Serif+Text:ital@0;1&family=Dancing+Script:wght@400..700&family=Fleur+De+Leah&family=Kaushan+Script&family=Oswald:wght@200..700&family=Playwrite+GB+S:ital,wght@0,100..400;1,100..400&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet" />
  <style>
    input {
      border-radius: 10px;
      border: none;
      width: 50%;
      margin-bottom: 5px;
      padding: 6px;
    }
  </style>
</head>

<body>
  <h2>Add a New Blog Post</h2>
  <form method="POST">
    <label>Title:</label><br>
    <input type="text" name="title" required><br><br>

    <label>Cover Image URL:</label><br>
    <input type="text" name="image"><br><br>

    <label>Description:</label><br>
    <textarea name="description"></textarea><br><br>

    <label>Content:</label><br>
    <textarea name="content" id="editor" style="margin:0;"></textarea><br><br>

    <button type="submit">Add Blog</button>
  </form>

  <script>
    CKEDITOR.replace('editor');
  </script>
</body>

</html>