<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Upload extends CI_Controller {

		public function __construct() {
	        parent::__construct();
			$this->load->helper(array('form', 'url'));
			$this->load->library(array('upload', 'session', 'image_moo'));
	    }

		public function index() {
			$this->load->view('upload');
		}

		public function image_upload() {
			$image_name = time();
			$config['upload_path']          = 'upload/';
			$config['allowed_types']        = 'gif|jpg|jpeg|png';
			$config['file_name']        	= $image_name;
			$config['max_size']             = 2048;
			$this->upload->initialize($config);

            if (!$this->upload->do_upload('userfile')) {
                $this->load->view('upload');
				$this->session->set_flashdata('error', $this->upload->display_errors());
            } else {
				$upload_data = $this->upload->data();
                $this->load->view('upload_success', array('upload_data' => $upload_data));
				$this->image_size('upload/'.$image_name . $upload_data['file_ext'], 500, 300);
            }
		}

		public function image_delete() {
			if ($this->input->get() && !empty($this->input->get('image_delete'))) {

				$image_thumb = $this->find_image_thumb($this->input->get('image_delete'), '500x300');

				$path  = str_replace('index.php', '', $_SERVER['DOCUMENT_ROOT'].$_SERVER['SCRIPT_NAME'].'/upload/'.$this->input->get('image_delete'));
				$path2 = str_replace('index.php', '', $_SERVER['DOCUMENT_ROOT'].$_SERVER['SCRIPT_NAME'].'/upload/'.$image_thumb);

				if (file_exists($path)) {
					if (unlink($path) && unlink($path2)) {
						$this->session->set_flashdata('success', 'Your file was successfully deleted!');
					} else {
						$this->session->set_flashdata('error', 'Your file could not be deleted!');
					}
				} else {
					$this->session->set_flashdata('error', 'The file you requested to delete was not found!');
				}
			} else{
				$this->session->set_flashdata('error', 'The file parameter or image not found!');
			}
			redirect();
		}

		public function image_size($image, $x, $y){
			$this->image_moo
				->load($image)
				->resize_crop($x, $y)
				->save_pa($prepend = '', $append = '-'.$x.'x'.$y, $overwrite = TRUE);
		}

		public function find_image_thumb($image_name, $olcu) {
	        $pathinfo           = pathinfo($image_name);
	        $ext             	= $pathinfo["extension"];
	        $path_lenght    	= strlen($ext) +1;
	        return substr($image_name, 0, -$path_lenght).'-'.$olcu.'.'.$ext;
	    }
	}
