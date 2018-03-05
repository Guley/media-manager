<?php
/**
 * Media manager
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package	Medialibrary
 * @author	Gulshan
 * @author	http://gulshan.atspace.co.uk
 * @copyright	Copyright (c) 2017, Gulshan. (http://iamguley.atspace.co.uk/media)
 * @link	http://iamguley.atspace.co.uk/media
 * @since	Version 1.0.0
 * @filesource
 */
/*

defined('BASEPATH') OR exit('No direct script access allowed');

class Media extends MY_Controller {
    
    public function __construct(){
        parent::__construct();
         
        $this->load->model('Media_m');
    }
    
   /*==Display MEdia==*/
    public function index($category=''){
        $cond = [
            'status <' => 2
        ];
        
        $offset = $this->input->get('per_page');
        $offset = isset($offset)?$offset:0;
        
        $total = $this->Media_m->getmedia($cond, 0 ,false,true);
        
        $this->init_pagination(base_url('media'), $total);
        $mediaList = $this->Media_m->getmedia($cond, $offset);
       
        $data['mediaData'] = $mediaList;

        $data['page_icon'] = '<i class="icon-paint-format"></i>';
        $data['meta_title'] = 'Media Management';

        $data['add_js'] = ['common.js','fileinput.min.js'];
        $data['add_custom_js'] = $this->load->view('media/gallery-inline-js', ['module' => 'Category'], true);
        $data['template_file'] = 'media/lists';
        
        $this->load_view($data);
    }
   
    
    /*
     * Get Media list for gallery
     */
    public function get() {
        $cond = [
            'status <' => 2
        ];
        $page = $this->input->get('page');
        $get_module = $this->input->get('module');
        $search = $this->input->get('search');
        $offset = $page ? ($page-1)*PAGE_RECORD_LIMIT : 0;
        
        $set_module = '';
        if(!empty($get_module)){
            $set_module = strip_tags($get_module);
            
            $cond['module'] = $set_module;
            if($set_module == 'Uncategorised'){
                $cond['module'] = '';
            }
        }
        if(!empty($search)){
                $cond['search_query'][] = '(file_name  LIKE "%'.$search.'%")';
                
        }
        /* $total = $this->Media_m->getmedia($cond, $offset,false,true);
        $this->ajax_init_pagination(base_url('media/ajaxPaginationData'), $total);
        $data['mediaList'] = $this->Media_m->getmedia($cond,$offset);
        $this->load->view('media/popgalleryajax', $data, false); */
        $modules = $this->Media_m->getmediacategory();
        $moduleArr = '<option value="">- All -</option>';
        if(!empty($modules)){
            foreach($modules as $module){
                $module_name = empty($module['module'])?'Uncategorised':$module['module'];
                //$moduleArr[$module_id] = $module['module'];
                $selected_modules = '';
                if($set_module == $module_name){
                    $selected_modules = 'selected="selected"';
                }
                $moduleArr .= '<option value="'.$module_name.'" '.$selected_modules.' >'.$module_name.'</option>';
            }
        }
        $total_images = $this->Media_m->getmedia($cond, 0, false, true);
        $mediaList = $this->Media_m->getmedia($cond, $offset);
        $imgArr = [];
        if(!empty($mediaList)){
            foreach($mediaList as $list){
                $imgArr[] = [
                    'image_id' => $list['media_id'],
                    'image_url' => $list['base_url'].'small/'.$list['file_name'],
                    'image_name' => $list['file_name'],
                ];
            }
        }
        $pages = ceil($total_images / PAGE_RECORD_LIMIT);
        
        echo json_encode(['list' => $imgArr, 'total' => $total_images, 'pages' => $pages, 'module' => $moduleArr]);
    }
    
    /*
     * Upload images
     */
    public function upload(){
        if(!empty($_FILES['upload_img']))
        {
           $date=date('m/Y');
           $date = str_replace( '/', '', $date);
           $upload_path = DOCUMENT_ROOT_CDN.'uploads/'.$date;
           $upload_path_base_url = CDN_PATH.'uploads/'.$date.'/';
           
           if (!is_dir( $upload_path)) {
               mkdir( $upload_path, 0777, TRUE);
           }
           if (!is_dir( $upload_path.'/large')) {
               mkdir( $upload_path.'/large', 0777, TRUE);
           }
           if (!is_dir( $upload_path.'/medium')) {
               mkdir( $upload_path.'/medium', 0777, TRUE);
           }
           if (!is_dir( $upload_path.'/small')) {
               mkdir( $upload_path.'/small', 0777, TRUE);
           }
           
            $file_module =  $this->input->get('m')?$this->input->get('m'):'';

            //$counts = count($_FILES['myfile']['name']);
            $config['upload_path'] = $upload_path.'/large/'; 
            $config['allowed_types'] = 'png|jpg|jpeg|gif';
            $config['remove_spaces']=TRUE;
            $config['max_filename'] = 30;
            //$config['encrypt_name']=TRUE;
            $files = $_FILES;
            //for($i=0; $i<$counts; $i++){
                   //if($files['upload_img']['name'][$i]!=''){
                        /*$_FILES['myfile']['name']= $files['myfile']['name'][$i];
                        $_FILES['myfile']['type']= $files['myfile']['type'][$i];
                        $_FILES['myfile']['tmp_name']= $files['myfile']['tmp_name'][$i];
                        $_FILES['myfile']['error']= $files['myfile']['error'][$i];
                        $_FILES['myfile']['size']= $files['myfile']['size'][$i]; */
                $this->load->library('upload', $config);
                //$this->upload->initialize($config);

                /* Upload image. */
                if($this->upload->do_upload('upload_img')){
                    $uploaded = $this->upload->data();

                    /* resize images */
                    $this->_resize_image($uploaded['full_path'], $upload_path, 'medium', 400, 300);
                    $this->_resize_image($uploaded['full_path'], $upload_path, 'small', 200, 200);
                    
                    $media_id = $this->Common_m->save('media', [
                        'base_url' => $upload_path_base_url,
                        'original_name' => $uploaded['orig_name'],
                        'file_name' => $uploaded['file_name'],
                        'file_path' => $date,
                        'file_size' => $uploaded['file_size'],
                        'mime_type' => $uploaded['image_type'],
                        'module' => $file_module
                    ]);      
                    if($media_id){

                        $res = [
                            'initialPreview' => [],
                            'initialPreviewConfig' => [],
                            'append' => false
                        ];
                        //$imgid=array('res_id'=>$lastid,'img_url'=>$date.'/'.$uploaded['file_name']);
                    } else {
                        $res['error'] = 'Image uploaded successfully. But unable to save.';
                    }
                } else {
                    $res['error'] = $this->upload->display_errors();
                }
                    //}
               //}
              //echo json_encode($imgid);
        } else {
            $res['error'] = 'Image not found!';
        }
        echo json_encode($res);
        exit;
    }
    
    private function _resize_image($full_image_path, $root_path = '', $folder_name = 'small', $width = 200, $height = 200){
        $resize_config = [
            'image_library' => 'gd2',
            'source_image' => $full_image_path,
            'maintain_ratio' => TRUE,
            'width' => $width,
            'height' => $height,
            'new_image' => $root_path.'/'.$folder_name.'/'
        ];

        $this->load->library('image_lib');
        $this->image_lib->initialize($resize_config);
        $this->image_lib->resize();
        $this->image_lib->clear();
    }
    
    public function delete($media_id){
        
        $mediaInfo = $this->Media_m->getmedia(['media_id' => $media_id], 0, true);
        if(!empty($mediaInfo)){
            unlink(CDN_PATH.'uploads/'.$mediaInfo['file_path'].'/small/'.$mediaInfo['file_name']);
            unlink(CDN_PATH.'uploads/'.$mediaInfo['file_path'].'/medium/'.$mediaInfo['file_name']);
            unlink(CDN_PATH.'uploads/'.$mediaInfo['file_path'].'/large/'.$mediaInfo['file_name']);
            
            if($this->Common_m->save('media', ['status' => 2], ['media_id' => $media_id])){
                $this->session->set_flashdata('success', 'Image deleted successfully.');
            } else {
                $this->session->set_flashdata('error', 'Unable to delete image.');
            }
        }
        redirect(base_url('media'));
    }
    
}
