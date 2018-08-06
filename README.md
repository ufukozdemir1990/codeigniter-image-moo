# codeigniter-image-moo + upload + delete
The CI library for image manipulation


## Start
1. In the Codeigniter folder create a new folder name upload
2. application->libraries->image_moo (PHP Image manipulation class)
3. controllers->Upload (Upload, Delete, Image Crop)
4. application->config->routes (`$route['default_controller'] = 'upload';`)
5. application->views->upload.php (HTML Form)


### image-moo usage
`$this->image_size('upload/test-name.jpg', 500, 300);`
