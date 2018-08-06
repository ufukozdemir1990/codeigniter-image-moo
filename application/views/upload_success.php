<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Upload Success</title>
    </head>
    <body style="max-width: 500px; margin:0 auto; padding-top: 50px">

        <h3 style="color:green">Your file was successfully uploaded!</h3>
        <img src="<?php echo base_url('upload/'.$upload_data['file_name']); ?>" alt="<?php echo $upload_data['file_name']; ?>" style="width: 100%">

        <p><?php echo anchor('upload/image_delete/?image_delete='.$upload_data['file_name'], 'This Delete Image'); ?> | <?php echo anchor('', 'Upload Another File!'); ?></p>

        <h3>Image Information</h3>
        <ul>
            <?php foreach ($upload_data as $item => $value):?>
            <li><?php echo $item;?>: <?php echo $value;?></li>
            <?php endforeach; ?>
        </ul>

    </body>
</html>
