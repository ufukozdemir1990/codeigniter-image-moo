# codeigniter-image-moo + upload + delete
The CI library for image manipulation <br>
The Codeigniter latest is Version 3.1.9 <br>
[http://www.matmoo.com/digital-dribble/codeigniter/image_moo/](http://www.matmoo.com/digital-dribble/codeigniter/image_moo/)


## Start
1. In the Codeigniter folder create a new folder name upload
2. application->libraries->image_moo (PHP Image manipulation class)
3. controllers->Upload (Upload, Delete, Image Crop)
4. application->config->routes (`$route['default_controller'] = 'upload';`)
5. application->views->upload.php (HTML Form)


### image-moo usage
```php
public function image_size($image, $x, $y){
    $this->image_moo
        ->load($image)
        ->resize_crop($x, $y)
        ->save_pa($prepend = '', $append = '-'.$x.'x'.$y, $overwrite = TRUE);
}
```
```php
$this->image_size('upload/test-name.jpg', 500, 300);`
```
