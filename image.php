<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="image.css">
    <title>Image Gallery</title>
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
            border-radius: 100%;
            border: 2px solid;
        }

        #imageu {
            height: 200px;
            width: 200px;
            border-radius: 100%;
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
    </style>
</head>
<body>
  <section id="section-1">
        <div id="card">
            <h1>My Profile</h1>

            <?php
            $img_loc = 'img1/';  
            $images = glob($img_loc . '*.{jpg,jpeg,png,JPG,JPEG,PNG}', GLOB_BRACE);

            if (empty($images)) {
                echo "No images found in the 'img1/' directory.";
            } else {
                foreach ($images as $image) {
                    echo '<img src="' . $image . '" alt="Gallery Image" id="imageu">';
                }
            }
            ?>
          <h3> <?php echo "Name:", $username; ?> </h3>
          
              <input type="file">
         <button id="upload-btn">Upload Image</button>

    </section>
</body>
</html>
