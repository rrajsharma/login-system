<?php
// Handle image upload
if (isset($_POST["submit"])) {
    $imageDir = "img1/";
    $uploadMessage = "";

   
    if (isset($_FILES["file_upld"]) && $_FILES["file_upld"]["error"] == 0) {
        $imageName = basename($_FILES["file_upld"]["name"]);
        $imageTmpName = $_FILES["file_upld"]["tmp_name"];
        
      
        $imageFileType = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));
        $allowedTypes = array("jpg", "jpeg", "png");

       
        if (!is_dir($imageDir)) {
            mkdir($imageDir, 0755, true);
        }

        // Generate unique file name to prevent overwriting
        $uniqueImageName = uniqid() . '.' . $imageFileType;
        $image = $imageDir . $uniqueImageName;

        // Validate MIME type for additional security
        $mimeType = mime_content_type($imageTmpName);
        $allowedMimeTypes = ['image/jpeg', 'image/png'];

        if (in_array($mimeType, $allowedMimeTypes) && in_array($imageFileType, $allowedTypes)) {
            
            if (move_uploaded_file($imageTmpName, $image)) {
                $uploadMessage = "Image uploaded successfully!";
            } else {
                $uploadMessage = "Sorry, there was an error uploading your file.";
            }
        } else {
            $uploadMessage = "Only JPG, JPEG, and PNG files are allowed.";
        }
    } else {
        $uploadMessage = "No file uploaded or there was an error with the file.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Image Upload and Gallery</title>
    <style>
        #section-1 {
            display: flex;
            text-align: center;
            justify-content: center;
            margin-top: 16vh;
        }

        #card {
            height: 450px;
            width: 350px;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        #image {
            height: 200px;
            width: 200px;
            border-radius: 50%;
            border: 2px solid;
        }

        #upload-btn {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        #upload-btn:hover {
            background-color: #45a049;
        }

        #imageu {
            max-height: 200px;
            max-width: 200px;
            object-fit: cover;
            border-radius: 50%; /* Ensure the preview image is circular */
            border: 2px solid;
        }

        .message {
            margin-top: 10px;
            font-size: 16px;
            color: green;
        }
    </style>
</head>
<body>

    <section id="section-1">
        <div id="card">
            <h1>My Profile</h1>

            <!-- Display uploaded image message -->
            <?php
            if (isset($uploadMessage)) {
                echo "<p class='message'>{$uploadMessage}</p>";
            }

            $img_loc = 'img1/';
            // Ensure that the directory exists
            if (is_dir($img_loc)) {
                // Get all image files in the directory
                $images = glob($img_loc . '*.{jpg,jpeg,png,JPG,JPEG,PNG}', GLOB_BRACE);

                if (empty($images)) {
                    echo "<p>No images found in the 'img1/' directory.</p>";
                } else {
                    // Display the first image in a circle
                    echo '<img src="' . $images[0] . '" alt="Profile Image" id="imageu">';
                }
            } else {
                echo "<p>The image directory does not exist!</p>";
            }
            ?>

            <!-- Display upload form -->
            <form action="" method="post" enctype="multipart/form-data">
                <label for="file_upld">Upload Image:</label>
                <input type="file" name="file_upld" id="file_upld" required>
                <img id="preview" src="#" alt="Image Preview" style="display: none; border-radius: 50%; width: 200px; height: 200px; margin-top: 10px;">
                <input type="submit" value="Upload Image" name="submit" id="upload-btn">
            </form>
        </div>
    </section>

    <script>
        var upld = document.getElementById("file_upld");
        var preview = document.getElementById("preview");

        upld.addEventListener("change", function(event) {
            const file = event.target.files[0];
            const fileType = file.type;
            show.innerHTML = ""; 
            
            if (fileType.startsWith("image/")) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.style.display = "block";
                    preview.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    </script>

</body>
</html>
