<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends CI_Controller {
    public function __construct() { 
        parent::__construct();
        // Load the admin model
        $this->load->model('Admin_model'); 
    }
  /*Function to set JSON output*/
  public function output($Return=array()){
    /*Set response header*/
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, OPTIONS");
    header("Content-Type: application/json; charset=UTF-8");
    /*Final JSON response*/
    exit(json_encode($Return));
  }

  public function changelanguage()
  {   
      $session = $this->session->userdata('lang');
      $language = $this->input->post('lang');
      if($language == 'en'){
         $this->session->set_userdata('dir', 'ltr');
       }else{
         $this->session->set_userdata('dir', 'rtl');
       }
      if(!empty($session)){
        $this->session->set_userdata('lang', $language);
      }else{
        $this->session->set_userdata('lang', 'en');
        $this->session->set_userdata('dir', 'ltr');
         
      } 
     //echo $this->session->userdata('language').' - '.$this->session->userdata('dir') ;
  }

   public function index()
  {   
    $session = $this->session->userdata('lang');
    if(empty($session)){ 
    $this->session->set_userdata('lang', 'en');
    $this->session->set_userdata('dir', 'ltr');
    } 
    $this->load->view('admin/login');
  }
   
 
  public function login() {
  
    $username = $this->input->post('username');
    $password = $this->input->post('password');
    /* Define return | here result is used to return user data and error for error message */
    $Return = array('result'=>'', 'error'=>'');
    /* Server side PHP input validation */
    if($username==='') {
      $Return['error'] = $this->Admin_model->translate('Invalid username')  ;
    } elseif($password===''){
      $Return['error'] = $this->Admin_model->translate('Invalid Password');
    }
    if($Return['error']!=''){
      $this->output($Return);
    }
    //get data from users table for the entered username and password
     $userdata = $this->Admin_model->get_single_data('users',array('user_name'=>$username,'password'=>md5($password)));
    if (!empty($userdata)) {
        $session_data = array(
        'user_id' => $userdata->id,
        'username' => $userdata->user_name,
        'useremail' => $userdata->email, 
        );
        // Add user data in session
        $this->session->set_userdata('userdet', $session_data);
        $lan = $this->session->userdata('lang');
        if(empty($lan)){
        $this->session->set_userdata('lang', 'en');
        $this->session->set_userdata('dir', 'ltr');
        }
         
        $Return['result'] = 'Logged In Successfully'  ;      
        $this->output($Return);
      } else {
        $Return['error'] = 'Invalid Credentials' ;
        $this->output($Return);
      }
  }


  public function banners()
  {   
    $session = $this->session->userdata('userdet');
    if(empty($session)){ 
      redirect('admin');
    } 
    $data['title'] = 'Dashboard';
    $data['data'] = $this->Admin_model->get_all_data('banner_images') ;
    $this->load->view('admin/banners', $data);
  }

        
public function new_banner()
{  
  $session = $this->session->userdata('userdet');
  if(empty($session)){ 
    redirect('admin');
  } 
  $data['title'] = 'Dashboard';
  $data['pages'] = $this->Admin_model->get_all_data('menu_controller_relation') ;
  $this->load->view('admin/add_banner', $data);
}

  public function add_banner()
  {   
       $session = $this->session->userdata('userdet');
      if(empty($session)){ 
        redirect('admin');
      }
     $Return = array('result'=>'', 'error'=>'');
      if(empty($_FILES['image']['name'])){
        $Return['error'] = "Image Required ";
      }else if($this->input->post('page_type')==='') {
          $Return['error'] = "Select type";
      }  
      if($Return['error']!=''){
            $this->output($Return);
             exit ;
        }
      if(is_uploaded_file($_FILES['image']['tmp_name'])) {
      //checking image type
      $allowed =  array( 'png','jpg','jpeg','pdf','gif','PNG','JPG','JPEG','PDF','GIF','svg','webp');
      $filename = $_FILES['image']['name'];
      $ext = pathinfo($filename, PATHINFO_EXTENSION);
      if(in_array($ext,$allowed)){
      $tmp_name = $_FILES["image"]["tmp_name"];
      $profile = "uploads/images/banners/";
        // basename() may prevent filesystem traversal attacks;
        // further validation/sanitation of the filename may be appropriate
      $name = basename($_FILES["image"]["name"]);
       // $newfilename = 'cat_'.round(microtime(true)).'.'.$ext;
      $newfilename = $name ;
      move_uploaded_file($tmp_name, $profile.$newfilename);
      $image  = $newfilename;
    }else {
          $Return['error'] = "Invalid file format";
        }
      if($Return['error']!=''){
        $this->output($Return);
      }
    }
      $data = array(   
      'image' => $image,
      'type' => $this->input->post('type'),
      'banner_title' => $this->input->post('banner_title'),
      'banner_title_ar' => $this->input->post('banner_title_ar'),
      'banner_content' => $this->input->post('banner_content'),
      'banner_content_ar' => $this->input->post('banner_content_ar'),
      // 'banner_btn_text' => $this->input->post('banner_btn_text'),
      // 'banner_btn_text_ar' => $this->input->post('banner_btn_text_ar'),
      'status' => 'Y',
      'created_by' => $session['username']
        );
    //  $result = $this->Admin_model->insert_data('supp_org', $data);
      $result = $this->db->insert('banner_images',$data);
     $inserid =  $this->db->insert_id();
      if ($result == TRUE) {
        //get setting info    
         $Return['result'] = 'Banner added successfully.';
      } else {
        $Return['error'] =  'Bug. Something went wrong, please try again';
      }
      $this->output($Return);
      exit;
    }

    public function edit_banner()
    {
      $session = $this->session->userdata('userdet');
          if(empty($session)){ 
            redirect('admin');
          }
       $data['pages'] = $this->Admin_model->get_all_data('menu_controller_relation') ;
       $id = $this->uri->segment(3) ;
       $data['data'] = $this->Admin_model->get_single_data('banner_images',array('id'=>$id)) ;
         $this->load->view('admin/edit_banner', $data);
    }

    public function update_banner()
    {   
       $session = $this->session->userdata('userdet');
      if(empty($session)){ 
        redirect('admin');
      }
      $id = $this->input->post('id');
       $Return = array('result'=>'', 'error'=>'');
      /* Server side PHP input validation */    
       $image = $this->input->post('old_image') ;
      //  if(empty($_FILES['image']['name']) && empty($image)) {
      //   $Return['error'] = "Image Required ";
      // }else
       if($this->input->post('page_type')==='') {
          $Return['error'] = "Select type";
      }   
      if($Return['error']!=''){
            $this->output($Return);
             exit ;
        }
      if(is_uploaded_file($_FILES['image']['tmp_name'])) {
      //checking image type
      $allowed =  array('png','jpg','jpeg','pdf','gif','PNG','JPG','JPEG','PDF','GIF','svg','webp');
      $filename = $_FILES['image']['name'];
      $ext = pathinfo($filename, PATHINFO_EXTENSION);
      if(in_array($ext,$allowed)){
        $tmp_name = $_FILES["image"]["tmp_name"];
        $profile = "uploads/images/banners/";
        $set_img = base_url()."uploads/images";
        // basename() may prevent filesystem traversal attacks;
        // further validation/sanitation of the filename may be appropriate
        $name = basename($_FILES["image"]["name"]);
       // $newfilename = 'cat_'.round(microtime(true)).'.'.$ext;
        $newfilename = $name ;
        move_uploaded_file($tmp_name, $profile.$newfilename);
        $image  = $newfilename;
    }else {
          $Return['error'] = "Invalid file format";
        }
      if($Return['error']!=''){
        $this->output($Return);
      }
    }
      $data = array(        
      'image' => $image,
      'type' => $this->input->post('type'),
      'banner_title' => $this->input->post('banner_title'),
      'banner_title_ar' => $this->input->post('banner_title_ar'),
      'banner_content' => $this->input->post('banner_content'),
      'banner_content_ar' => $this->input->post('banner_content_ar'),
      // 'banner_btn_text' => $this->input->post('banner_btn_text'),
      // 'banner_btn_text_ar' => $this->input->post('banner_btn_text_ar'),
      'status' => 'Y',
      'created_by' => $session['username']
        );
      $result = $this->Admin_model->update_data('banner_images',array('id'=>$id),$data);
      $inserid =  $this->db->insert_id();
      if ($result == TRUE) {   
       //get setting info 
         $Return['result'] = 'Banner updated successfully.';
      } else {
        $Return['error'] =  'Bug. Something went wrong, please try again';
      }
      $this->output($Return);
      exit;
    }

  public function change_status()
  {  
    $session = $this->session->userdata('userdet');
    if(empty($session)){ 
      redirect('admin');
    } 
    
    $id = $this->input->post('id');
    $status = $this->input->post('status');
    $table = $this->input->post('table');

    $this->Admin_model->update_data($table,array('id'=>$id),array('status'=>$status)); 
    return $id ; 
  }

  public function delete_entry()
  {  
   $session = $this->session->userdata('userdet');
    if(empty($session)){ 
      redirect('admin');
    } 
    $id = $this->input->post('id');
    $table = $this->input->post('table');
    $this->Admin_model->delete_data($table,array('id'=>$id)); 
    return $id ; 
  }

  public function delete_reportdetail()
  {  
   $session = $this->session->userdata('userdet');
    if(empty($session)){ 
      redirect('admin');
    } 
    $id = $this->input->post('id');
    $table = $this->input->post('table');
    if($table == "annual_year")
    {
      $this->Admin_model->delete_data("annual_report",array('year_id'=>$id)); 
    }else if($table == "financial_year")
    {
      $this->Admin_model->delete_data("financial_report",array('year_id'=>$id)); 
    } 
    $this->Admin_model->delete_data($table,array('id'=>$id)); 
    return $id ; 
  }

  public function navigation()
  {
    $session = $this->session->userdata('userdet');
        if(empty($session)){ 
          redirect('admin');
        }
    $data['data'] = $this->Admin_model->get_single_data('top_header',array('id'=>'1')) ;
    $this->load->view('admin/edit_navigation', $data); 
  }

  public function update_navigation()
  {   
      $session = $this->session->userdata('userdet');
      if(empty($session)){ 
        redirect('admin');
      }
     $Return = array('result'=>'', 'error'=>'');
         
      /* Server side PHP input validation */    
      if($this->input->post('menu1')==='') {
            $Return['error'] = "Menu 1 Required";
      }else if($this->input->post('menu1_ar')==='') {
            $Return['error'] = "Menu 1 arabic Required ";
      }else if($this->input->post('menu2')==='') {
            $Return['error'] = "Menu 2 Required ";
      }else if($this->input->post('menu2_ar')==='') {
            $Return['error'] = "Menu 2 arabic Required ";
      }else if($this->input->post('menu3')==='') {
            $Return['error'] = "Menu 3 Required ";
      }else if($this->input->post('menu3_ar')==='') {
            $Return['error'] = "Menu 3 arabic Required ";
      }else if($this->input->post('menu4')==='') {
            $Return['error'] = "Menu 4 Required ";
      }else if($this->input->post('menu4_ar')==='') {
            $Return['error'] = "Menu 4 arabic Required ";
      }else if($this->input->post('menu5')==='') {
            $Return['error'] = "Menu 5 Required ";
      }else if($this->input->post('menu5_ar')==='') {
            $Return['error'] = "Menu 5 arabic Required ";
      }else if($this->input->post('menu6')==='') {
            $Return['error'] = "Menu 6 Required ";
      }else if($this->input->post('menu6_ar')==='') {
            $Return['error'] = "Menu 6 arabic Required ";
      } else if($this->input->post('menu7')==='') {
            $Return['error'] = "Menu 7 Required ";
      }else if($this->input->post('menu7_ar')==='') {
            $Return['error'] = "Menu 7 arabic Required ";
      }else if($this->input->post('menu8')==='') {
            $Return['error'] = "Menu 8 Required ";
      }else if($this->input->post('menu8_ar')==='') {
            $Return['error'] = "Menu 8 arabic Required ";
      }

      else if($this->input->post('submenu1')==='') {
        $Return['error'] = "subMenu 1 Required ";
      }else if($this->input->post('submenu1_ar')==='') {
            $Return['error'] = "subMenu 1 arabic Required ";
      }else if($this->input->post('submenu2')==='') {
        $Return['error'] = "subMenu 2 Required ";
      }else if($this->input->post('submenu2_ar')==='') {
            $Return['error'] = "subMenu 2 arabic Required ";
      }else if($this->input->post('submenu3')==='') {
        $Return['error'] = "subMenu 3 Required ";
      }else if($this->input->post('submenu3_ar')==='') {
            $Return['error'] = "subMenu 3 arabic Required ";
      }else if($this->input->post('submenu4')==='') {
        $Return['error'] = "subMenu 4 Required ";
      }else if($this->input->post('submenu4_ar')==='') {
            $Return['error'] = "subMenu 4 arabic Required ";
      }else if($this->input->post('submenu5')==='') {
        $Return['error'] = "subMenu 5 Required ";
      }else if($this->input->post('submenu5_ar')==='') {
            $Return['error'] = "subMenu 5 arabic Required ";
      }else if($this->input->post('submenu6')==='') {
        $Return['error'] = "subMenu 6 Required ";
      }else if($this->input->post('submenu6_ar')==='') {
            $Return['error'] = "subMenu 6 arabic Required ";
      }
      else if($this->input->post('submenu7')==='') {
            $Return['error'] = "subMenu 7 Required ";
      }else if($this->input->post('submenu7_ar')==='') {
            $Return['error'] = "subMenu 7 arabic Required ";
      }
       
      if($Return['error']!=''){
            $this->output($Return);
      }
    //      $image1 =  $this->input->post('old_image');
    //      if(is_uploaded_file($_FILES['image']['tmp_name'])) {
    //       //checking image type
    //       $allowed =  array('png','jpg','jpeg','pdf','gif','PNG','JPG','JPEG','PDF','GIF','svg','webp');
    //       $filename = $_FILES['image']['name'];
    //       $ext = pathinfo($filename, PATHINFO_EXTENSION);
    //       if(in_array($ext,$allowed)){
    //         $tmp_name = $_FILES["image"]["tmp_name"];
    //         $profile = "uploads/images/";
    //         $set_img = base_url()."uploads/images/";
    //         // basename() may prevent filesystem traversal attacks;
    //         // further validation/sanitation of the filename may be appropriate
    //         $name = basename($_FILES["image"]["name"]);
    //         $newfilename = $name ;
    //         move_uploaded_file($tmp_name, $profile.$newfilename);
    //         $image1 = $newfilename;
    //       }else {
    //             $Return['error'] = "Invalid file format";
    //           }
    //         if($Return['error']!=''){
    //           $this->output($Return);
    //         }
    // } 
        $image2 =  $this->input->post('old_image-w');
        if(is_uploaded_file($_FILES['image-w']['tmp_name'])) {
          //checking image type
          $allowed =  array('png','jpg','jpeg','pdf','gif','PNG','JPG','JPEG','PDF','GIF','svg','webp');
          $filename = $_FILES['image-w']['name'];
          $ext = pathinfo($filename, PATHINFO_EXTENSION);
          if(in_array($ext,$allowed)){
            $tmp_name = $_FILES["image-w"]["tmp_name"];
            $profile = "uploads/images/";
            $set_img = base_url()."uploads/images/";
            // basename() may prevent filesystem traversal attacks;
            // further validation/sanitation of the filename may be appropriate
            $name = basename($_FILES["image-w"]["name"]);
            $newfilename = $name ;
            move_uploaded_file($tmp_name, $profile.$newfilename);
            $image2 = $newfilename;
          }
          else {
              $Return['error'] = "Invalid file format";
              }
          if($Return['error']!=''){
                $this->output($Return);
          }
       }
      $data = array(   
        'menu1' => $this->input->post('menu1'),
        'menu1_ar' => $this->input->post('menu1_ar'),
        'menu2' => $this->input->post('menu2'),
        'menu2_ar' => $this->input->post('menu2_ar'),
        'menu3' => $this->input->post('menu3'),
        'menu3_ar' => $this->input->post('menu3_ar'),
        'menu4' => $this->input->post('menu4'),
        'menu4_ar' => $this->input->post('menu4_ar'),
        'menu5' => $this->input->post('menu5'),
        'menu5_ar' => $this->input->post('menu5_ar'),
        'menu6' => $this->input->post('menu6'),
        'menu6_ar' => $this->input->post('menu6_ar'),
        'menu7' => $this->input->post('menu7'),
        'menu7_ar' => $this->input->post('menu7_ar'),
        'menu8' => $this->input->post('menu8'),
        'menu8_ar' => $this->input->post('menu8_ar'),       
        // 'logo' => $image1,
        'logoe' => $image2,
        'submenu1' => $this->input->post('submenu1'),
        'submenu1_ar' => $this->input->post('submenu1_ar'),
        'submenu2' => $this->input->post('submenu2'),
        'submenu2_ar' => $this->input->post('submenu2_ar'),
        'submenu3' => $this->input->post('submenu3'),
        'submenu3_ar' => $this->input->post('submenu3_ar'),
        'submenu4' => $this->input->post('submenu4'),
        'submenu4_ar' => $this->input->post('submenu4_ar'),
        'submenu5' => $this->input->post('submenu5'),
        'submenu5_ar' => $this->input->post('submenu5_ar'),
        'submenu6' => $this->input->post('submenu6'),
        'submenu6_ar' => $this->input->post('submenu6_ar'),
        'submenu7' => $this->input->post('submenu7'),
        'submenu7_ar' => $this->input->post('submenu7_ar'),
      );
      $result = $this->Admin_model->update_data('top_header',array('id'=>1), $data);
      if ($result == TRUE) {
         $Return['result'] = 'Top navigation updated successfully.';
      } else {
        $Return['error'] =  'Bug. Something went wrong, please try again';
      }
      $this->output($Return);
      exit;
  }

  public function messages() {
	  $session = $this->session->userdata('userdet');
      if(empty($session)){ 
        redirect('admin');
      }
		$data['messages'] = $this->Admin_model->get_all_data('contact_messages');
		$this->load->view('admin/contact_messages', $data);
	}

  public function career_request() {
	  $session = $this->session->userdata('userdet');
      if(empty($session)){ 
        redirect('admin');
      }
		$data['data'] = $this->Admin_model->get_all_data('career_requests');
		$this->load->view('admin/career_requests', $data);
	}

    public function view_career()
  {
    $session = $this->session->userdata('userdet');
    if(empty($session)){ 
      redirect('admin');
    }
    $id = $this->uri->segment(3) ;
    $data['data'] = $this->Admin_model->get_single_data('career_requests',array('id'=>$id));
    $this->load->view('admin/view_career', $data);
  }
   
  public function gallery()
  {
   $session = $this->session->userdata('userdet');
    if(empty($session)){ 
      redirect('admin');
    }
    $data['dataset'] = $this->Admin_model->get_all_data('gallery'); 
    $this->load->view('admin/gallery', $data);
  }

  public function gallery_new_image()
  {
   $session = $this->session->userdata('userdet');
    if(empty($session)){ 
      redirect('admin');
    }
    $data['types'] = $this->Admin_model->get_all_data('gallery_type');
    $this->load->view('admin/add_gallery',$data);
  }

  public function gallery_add_image()
   {   
     $session = $this->session->userdata('userdet');
    if(empty($session)){ 
      redirect('admin');
    }
    $Return = array('result'=>'', 'error'=>'');
     if(empty($_FILES['image']['name'])){
      $Return['error'] = "Image Required ";
    }    
    if($Return['error']!=''){
          $this->output($Return);
           exit ;
      }
    if(is_uploaded_file($_FILES['image']['tmp_name'])) {
    //checking image type
    $allowed =  array('png','jpg','jpeg','pdf','gif','PNG','JPG','JPEG','PDF','GIF','svg','webp');
    $filename = $_FILES['image']['name'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    if(in_array($ext,$allowed)){
      $tmp_name = $_FILES["image"]["tmp_name"];
      $profile = "uploads/images/gallery/";
      $set_img = base_url()."uploads/images//";
      // basename() may prevent filesystem traversal attacks;
      // further validation/sanitation of the filename may be appropriate
      $name = basename($_FILES["image"]["name"]);
     // $newfilename = 'cat_'.round(microtime(true)).'.'.$ext;
      $newfilename = $name ;
      move_uploaded_file($tmp_name, $profile.$newfilename);
      $image  = $newfilename;
    }else {
          $Return['error'] = "Invalid file format";
        }
      if($Return['error']!=''){
        $this->output($Return);
      }
    }
    $data = array(   
     'type' => $this->input->post('type'),
    'image' => $image,
    'status' => 'Y',
    'created_by' => $session['username']
      );
    $result = $this->db->insert('gallery',$data);
    $inserid =  $this->db->insert_id();
    if ($result == TRUE) {
      $Return['result'] = 'Gallery image added successfully.';   
    } else {
      $Return['error'] =  'Bug. Something went wrong, please try again';
    }
    $this->output($Return);
    exit;
  }

  public function gallery_edit_image()
  {
    $session = $this->session->userdata('userdet');
        if(empty($session)){ 
          redirect('admin');
        }
     $id = $this->uri->segment(3) ;
     $data['dataset'] = $this->Admin_model->get_single_data('gallery',array('id'=>$id)) ;
     $data['types'] = $this->Admin_model->get_all_data('gallery_type');
    $this->load->view('admin/edit_gallery', $data);
  }

  public function gallery_update_image()
  {   
     $session = $this->session->userdata('userdet');
    if(empty($session)){ 
      redirect('admin');
    }
    $id = $this->input->post('id');
    $Return = array('result'=>'', 'error'=>''); 
    /* Server side PHP input validation */    
      $image = $this->input->post('old_image');
     if(empty($_FILES['image']['name']) && empty($image)){
      $Return['error'] = "Image Required ";
    }
    if($Return['error']!=''){
          $this->output($Return);
           exit ;
      }
    if(is_uploaded_file($_FILES['image']['tmp_name'])) {
    //checking image type
    $allowed =  array('png','jpg','jpeg','pdf','gif','PNG','JPG','JPEG','PDF','GIF','svg','webp');
    $filename = $_FILES['image']['name'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    if(in_array($ext,$allowed)){
      $tmp_name = $_FILES["image"]["tmp_name"];
      $profile = "uploads/images/gallery/";
      // basename() may prevent filesystem traversal attacks;
      // further validation/sanitation of the filename may be appropriate
      $name = basename($_FILES["image"]["name"]);
     // $newfilename = 'cat_'.round(microtime(true)).'.'.$ext;
      $newfilename = $name ;
      move_uploaded_file($tmp_name, $profile.$newfilename);
      $image  = $newfilename;
      }else {
            $Return['error'] = "Invalid file format";
          }
        if($Return['error']!=''){
          $this->output($Return);
        }
      }
    $data = array(   
    'type' => $this->input->post('type'),
    'image' => $image,
    'status' => 'Y',
    'created_by' => $session['username']
      );
    $result = $this->Admin_model->update_data('gallery',array('id'=>$id),$data);
     $inserid =  $this->db->insert_id();
    if ($result == TRUE) {
       $Return['result'] = 'Gallery image updated successfully.';
    } else {
      $Return['error'] =  'Bug. Something went wrong, please try again';
    }
    $this->output($Return);
    exit;
  }

  public function services()
  {
   $session = $this->session->userdata('userdet');
    if(empty($session)){ 
      redirect('admin');
    }
    $data['dataset'] = $this->Admin_model->get_all_data('services'); 
    $this->load->view('admin/services', $data);
  }

  public function service_new()
  {
   $session = $this->session->userdata('userdet');
    if(empty($session)){ 
      redirect('admin');
    }
    $this->load->view('admin/add_service');
  }

  public function service_add()
   {   
     $session = $this->session->userdata('userdet');
    if(empty($session)){ 
      redirect('admin');
    }
    $Return = array('result'=>'', 'error'=>'');
     if(empty($_FILES['image']['name'])){
      $Return['error'] = "Image Required ";
     }else if($this->input->post('name')===''){
      $Return['error'] = "Name Required ";
     }else if($this->input->post('name_ar')===''){
      $Return['error'] = "Arabic Name Required ";
     }else if($this->input->post('link')==='') {
      $Return['error'] = "Link Required";
    }     
    if($Return['error']!=''){
          $this->output($Return);
           exit ;
      }
    if(is_uploaded_file($_FILES['image']['tmp_name'])) {
    //checking image type
    $allowed =  array('png','jpg','jpeg','pdf','gif','PNG','JPG','JPEG','PDF','GIF','svg','webp');
    $filename = $_FILES['image']['name'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    if(in_array($ext,$allowed)){
      $tmp_name = $_FILES["image"]["tmp_name"];
      $profile = "uploads/images/services/";
      $set_img = base_url()."uploads/images//";
      // basename() may prevent filesystem traversal attacks;
      // further validation/sanitation of the filename may be appropriate
      $name = basename($_FILES["image"]["name"]);
     // $newfilename = 'cat_'.round(microtime(true)).'.'.$ext;
      $newfilename = $name ;
      move_uploaded_file($tmp_name, $profile.$newfilename);
      $image  = $newfilename;
    }else {
          $Return['error'] = "Invalid file format";
        }
      if($Return['error']!=''){
        $this->output($Return);
      }
    }
    $data = array(   
     'name' => $this->input->post('name'),
     'name_ar' => $this->input->post('name_ar'),
     'image' => $image,
     'link' => $this->input->post('link'),
     'status' => 'Y',
     'created_by' => $session['username']
      );
    $result = $this->db->insert('services',$data);
    $inserid =  $this->db->insert_id();
    if ($result == TRUE) {
      $Return['result'] = 'Service added successfully.';   
    } else {
      $Return['error'] =  'Bug. Something went wrong, please try again';
    }
    $this->output($Return);
    exit;
  }

  public function service_edit()
  {
    $session = $this->session->userdata('userdet');
        if(empty($session)){ 
          redirect('admin');
        }
     $id = $this->uri->segment(3) ;
     $data['dataset'] = $this->Admin_model->get_single_data('services',array('id'=>$id)) ;
    $this->load->view('admin/edit_service', $data);
  }

  public function service_update()
  {   
     $session = $this->session->userdata('userdet');
    if(empty($session)){ 
      redirect('admin');
    }
    $id = $this->input->post('id');
    $Return = array('result'=>'', 'error'=>''); 
    /* Server side PHP input validation */    
    $image = $this->input->post('old_image');
     if(empty($_FILES['image']['name']) && empty($image)){
      $Return['error'] = "Image Required ";
      }else if($this->input->post('name')===''){
      $Return['error'] = "Name Required ";
      }else if($this->input->post('name_ar')===''){
      $Return['error'] = "Arabic Name Required ";
      }else if($this->input->post('link')==='') {
        $Return['error'] = "Link Required";
      } 
       if($Return['error']!=''){
          $this->output($Return);
           exit ;
      }
    if(is_uploaded_file($_FILES['image']['tmp_name'])) {
    //checking image type
    $allowed =  array('png','jpg','jpeg','pdf','gif','PNG','JPG','JPEG','PDF','GIF','svg','webp');
    $filename = $_FILES['image']['name'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    if(in_array($ext,$allowed)){
      $tmp_name = $_FILES["image"]["tmp_name"];
      $profile = "uploads/images/services/";
      // basename() may prevent filesystem traversal attacks;
      // further validation/sanitation of the filename may be appropriate
      $name = basename($_FILES["image"]["name"]);
     // $newfilename = 'cat_'.round(microtime(true)).'.'.$ext;
      $newfilename = $name ;
      move_uploaded_file($tmp_name, $profile.$newfilename);
      $image  = $newfilename;
      }else {
            $Return['error'] = "Invalid file format";
          }
        if($Return['error']!=''){
          $this->output($Return);
        }
      }
    $data = array(   
    'name' => $this->input->post('name'),
    'name_ar' => $this->input->post('name_ar'),   
    'image' => $image,
    'link' => $this->input->post('link'),
    'status' => 'Y',
    'created_by' => $session['username']
      );
    $result = $this->Admin_model->update_data('services',array('id'=>$id),$data);
     $inserid =  $this->db->insert_id();
    if ($result == TRUE) {
       $Return['result'] = 'Services updated successfully.';
    } else {
      $Return['error'] =  'Bug. Something went wrong, please try again';
    }
    $this->output($Return);
    exit;
  }

  public function products()
  {
   $session = $this->session->userdata('userdet');
    if(empty($session)){ 
      redirect('admin');
    }
    $data['dataset'] = $this->Admin_model->get_all_data('products'); 
    $this->load->view('admin/products', $data);
  }

  public function product_new()
  {
   $session = $this->session->userdata('userdet');
    if(empty($session)){ 
      redirect('admin');
    }
    $this->load->view('admin/add_products');
  }

  public function product_add()
   {   
     $session = $this->session->userdata('userdet');
    if(empty($session)){ 
      redirect('admin');
    }
    $Return = array('result'=>'', 'error'=>'');
     if(empty($_FILES['image']['name'])){
      $Return['error'] = "Image Required ";
     }else if($this->input->post('name')===''){
      $Return['error'] = "Name Required ";
     }else if($this->input->post('name_ar')===''){
      $Return['error'] = "Arabic Name Required ";
     }else if($this->input->post('decription')===''){
      $Return['error'] = "Description Required ";
     }else if($this->input->post('decription_ar')===''){
      $Return['error'] = "Arabic Description Required ";
     }    
     if($Return['error']!=''){
          $this->output($Return);
           exit ;
      }
    if(is_uploaded_file($_FILES['image']['tmp_name'])) {
    //checking image type
    $allowed =  array('png','jpg','jpeg','pdf','gif','PNG','JPG','JPEG','PDF','GIF','svg','webp');
    $filename = $_FILES['image']['name'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    if(in_array($ext,$allowed)){
      $tmp_name = $_FILES["image"]["tmp_name"];
      $profile = "uploads/images/products/";
      $set_img = base_url()."uploads/images//";
      // basename() may prevent filesystem traversal attacks;
      // further validation/sanitation of the filename may be appropriate
      $name = basename($_FILES["image"]["name"]);
     // $newfilename = 'cat_'.round(microtime(true)).'.'.$ext;
      $newfilename = $name ;
      move_uploaded_file($tmp_name, $profile.$newfilename);
      $image  = $newfilename;
    }else {
          $Return['error'] = "Invalid file format";
        }
      if($Return['error']!=''){
        $this->output($Return);
      }
    }
    $data = array(   
     'name' => $this->input->post('name'),
     'name_ar' => $this->input->post('name_ar'),
     'description' => $this->input->post('description'),
     'description_ar' => $this->input->post('description_ar'),     
     'image' => $image,
     'status' => 'Y',
     'created_by' => $session['username']
      );
    $result = $this->db->insert('products',$data);
    $inserid =  $this->db->insert_id();
    if ($result == TRUE) {
      $Return['result'] = 'Products added successfully.';   
    } else {
      $Return['error'] =  'Bug. Something went wrong, please try again';
    }
    $this->output($Return);
    exit;
  }

  public function product_edit()
  {
    $session = $this->session->userdata('userdet');
        if(empty($session)){ 
          redirect('admin');
        }
     $id = $this->uri->segment(3) ;
     $data['dataset'] = $this->Admin_model->get_single_data('products',array('id'=>$id)) ;
    $this->load->view('admin/edit_product', $data);
  }

  public function product_update()
  {   
     $session = $this->session->userdata('userdet');
    if(empty($session)){ 
      redirect('admin');
    }
    $id = $this->input->post('id');
    $Return = array('result'=>'', 'error'=>''); 
    /* Server side PHP input validation */    
    $image = $this->input->post('old_image');
     if(empty($_FILES['image']['name']) && empty($image)){
      $Return['error'] = "Image Required ";
      }else if($this->input->post('name')===''){
      $Return['error'] = "Name Required ";
      }else if($this->input->post('name_ar')===''){
      $Return['error'] = "Arabic Name Required ";
      }else if($this->input->post('decription')===''){
      $Return['error'] = "Description Required ";
      }else if($this->input->post('decription_ar')===''){
      $Return['error'] = "Arabic Description Required ";
      } 
         if($Return['error']!=''){
          $this->output($Return);
           exit ;
      }
    if(is_uploaded_file($_FILES['image']['tmp_name'])) {
    //checking image type
    $allowed =  array('png','jpg','jpeg','pdf','gif','PNG','JPG','JPEG','PDF','GIF','svg','webp');
    $filename = $_FILES['image']['name'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    if(in_array($ext,$allowed)){
      $tmp_name = $_FILES["image"]["tmp_name"];
      $profile = "uploads/images/products/";
      // basename() may prevent filesystem traversal attacks;
      // further validation/sanitation of the filename may be appropriate
      $name = basename($_FILES["image"]["name"]);
     // $newfilename = 'cat_'.round(microtime(true)).'.'.$ext;
      $newfilename = $name ;
      move_uploaded_file($tmp_name, $profile.$newfilename);
      $image  = $newfilename;
      }else {
            $Return['error'] = "Invalid file format";
          }
        if($Return['error']!=''){
          $this->output($Return);
        }
      }
    $data = array(   
    'name' => $this->input->post('name'),
    'name_ar' => $this->input->post('name_ar'), 
    'description' => $this->input->post('description'),
    'description_ar' => $this->input->post('description_ar'),   
    'image' => $image,
    'status' => 'Y',
    'created_by' => $session['username']
      );
    $result = $this->Admin_model->update_data('products',array('id'=>$id),$data);
     $inserid =  $this->db->insert_id();
    if ($result == TRUE) {
       $Return['result'] = 'Products updated successfully.';
    } else {
      $Return['error'] =  'Bug. Something went wrong, please try again';
    }
    $this->output($Return);
    exit;
  }

  public function management()
  {
   $session = $this->session->userdata('userdet');
    if(empty($session)){ 
      redirect('admin');
    }
    $data['dataset'] = $this->Admin_model->get_all_data('management') ;
    $this->load->view('admin/management',$data);
  }

  public function management_new()
  {
   $session = $this->session->userdata('userdet');
    if(empty($session)){ 
      redirect('admin');
    }
    $data['types'] = $this->Admin_model->get_all_data('committee_type') ;
    $this->load->view('admin/add_management',$data);
  }

  public function management_add()
   {   
     $session = $this->session->userdata('userdet');
    if(empty($session)){ 
      redirect('admin');
    }
    $Return = array('result'=>'', 'error'=>'');
     if(empty($_FILES['image']['name'])){
      $Return['error'] = "Image Required ";
     }else if($this->input->post('name')===''){
      $Return['error'] = "Name Required ";
     }else if($this->input->post('name_ar')===''){
      $Return['error'] = "Arabic Name Required ";
     }else if($this->input->post('designation')===''){
      $Return['error'] = "Designation Required ";
     }else if($this->input->post('designation_ar')===''){
      $Return['error'] = "Arabic Designation Required ";
     }else if($this->input->post('type')===''){
      $Return['error'] = " Type Required ";
     }else if($this->input->post('type') !='' && $this->input->post('subtype') ===''){
      $Return['error'] = " Sub Type Required ";
     }  
     if($Return['error']!=''){
          $this->output($Return);
           exit ;
      }
    if(is_uploaded_file($_FILES['image']['tmp_name'])) {
    //checking image type
    $allowed =  array('png','jpg','jpeg','pdf','gif','PNG','JPG','JPEG','PDF','GIF','svg','webp');
    $filename = $_FILES['image']['name'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    if(in_array($ext,$allowed)){
      $tmp_name = $_FILES["image"]["tmp_name"];
      $profile = "uploads/images/management/";
      $set_img = base_url()."uploads/images//";
      // basename() may prevent filesystem traversal attacks;
      // further validation/sanitation of the filename may be appropriate
      $name = basename($_FILES["image"]["name"]);
     // $newfilename = 'cat_'.round(microtime(true)).'.'.$ext;
      $newfilename = $name ;
      move_uploaded_file($tmp_name, $profile.$newfilename);
      $image  = $newfilename;
    }else {
          $Return['error'] = "Invalid file format";
        }
      if($Return['error']!=''){
        $this->output($Return);
      }
    }
    if($this->input->post('type') == "Board of Directors")
    {
      $ar_desg = "أعضاء مجلس الإدارة";
    }
    else{
      $ar_desg = "لجان مجلس الإدارة";
    }
    $data = array(   
     'name' => $this->input->post('name'),
     'name_ar' => $this->input->post('name_ar'),
     'designation' => $this->input->post('designation'),
     'designation_ar' => $this->input->post('designation_ar'), 
     'type' => $this->input->post('type'),
     'type_ar' => $ar_desg,
     'sub_type' => $this->input->post('subtype'),    
     'image' => $image,
     'status' => 'Y',
     'created_by' => $session['username']
      );
    $result = $this->db->insert('management',$data);
    $inserid =  $this->db->insert_id();
    if ($result == TRUE) {
      $Return['result'] = 'Management added successfully.';   
    } else {
      $Return['error'] =  'Bug. Something went wrong, please try again';
    }
    $this->output($Return);
    exit;
  }

  public function management_edit()
  {
    $session = $this->session->userdata('userdet');
        if(empty($session)){ 
          redirect('admin');
        }
     $id = $this->uri->segment(3) ;
     $data['dataset'] = $this->Admin_model->get_single_data('management',array('id'=>$id)) ;
     $data['types'] = $this->Admin_model->get_all_data('committee_type') ;
    $this->load->view('admin/edit_management', $data);
  }

  public function management_update()
  {   
     $session = $this->session->userdata('userdet');
    if(empty($session)){ 
      redirect('admin');
    }
    $id = $this->input->post('id');
    $Return = array('result'=>'', 'error'=>''); 
    /* Server side PHP input validation */    
    $image = $this->input->post('old_image');
    if(empty($_FILES['image']['name']) && empty($image)){
      $Return['error'] = "Image Required ";
     }else if($this->input->post('name')===''){
      $Return['error'] = "Name Required ";
     }else if($this->input->post('name_ar')===''){
      $Return['error'] = "Arabic Name Required ";
     }else if($this->input->post('designation')===''){
      $Return['error'] = "Designation Required ";
     }else if($this->input->post('designation_ar')===''){
      $Return['error'] = "Arabic Designation Required ";
     }else if($this->input->post('type')===''){
      $Return['error'] = " Type Required ";
     }else if($this->input->post('type') !='' && $this->input->post('subtype') ===''){
      $Return['error'] = " Sub Type Required ";
     }  
         if($Return['error']!=''){
          $this->output($Return);
           exit ;
      }
    if(is_uploaded_file($_FILES['image']['tmp_name'])) {
    //checking image type
    $allowed =  array('png','jpg','jpeg','pdf','gif','PNG','JPG','JPEG','PDF','GIF','svg','webp');
    $filename = $_FILES['image']['name'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    if(in_array($ext,$allowed)){
      $tmp_name = $_FILES["image"]["tmp_name"];
      $profile = "uploads/images/management/";
      // basename() may prevent filesystem traversal attacks;
      // further validation/sanitation of the filename may be appropriate
      $name = basename($_FILES["image"]["name"]);
     // $newfilename = 'cat_'.round(microtime(true)).'.'.$ext;
      $newfilename = $name ;
      move_uploaded_file($tmp_name, $profile.$newfilename);
      $image  = $newfilename;
      }else {
            $Return['error'] = "Invalid file format";
          }
        if($Return['error']!=''){
          $this->output($Return);
        }
      }
      if($this->input->post('type') == "Board of Directors")
      {
        $ar_desg = "أعضاء مجلس الإدارة";
      }
      else{
        $ar_desg = "لجان مجلس الإدارة";
      }
      $data = array(   
       'name' => $this->input->post('name'),
       'name_ar' => $this->input->post('name_ar'),
       'designation' => $this->input->post('designation'),
       'designation_ar' => $this->input->post('designation_ar'), 
       'type' => $this->input->post('type'),
       'type_ar' => $ar_desg,
       'sub_type' => $this->input->post('subtype'),    
       'image' => $image,
       'status' => 'Y',
       'created_by' => $session['username']
        );
    $result = $this->Admin_model->update_data('management',array('id'=>$id),$data);
     $inserid =  $this->db->insert_id();
    if ($result == TRUE) {
       $Return['result'] = 'Management updated successfully.';
    } else {
      $Return['error'] =  'Bug. Something went wrong, please try again';
    }
    $this->output($Return);
    exit;
  }
  
  public function career()
  {
   $session = $this->session->userdata('userdet');
    if(empty($session)){ 
      redirect('admin');
    }
    $data['data'] = $this->Admin_model->get_single_data('career',array('id'=>'1')) ;
    $this->load->view('admin/career',$data);
  }

  public function update_career()
    {   
      $session = $this->session->userdata('userdet');
      if(empty($session)){ 
        redirect('admin');
      }
     $Return = array('result'=>'', 'error'=>'');         
      /* Server side PHP input validation */    
      for ($i=1; $i < 52; $i++) { 
        if($this->input->post('form_field'.$i)==='') {
          $this->output( array("error" => "Form field ".$i." Required") );
        }else if($this->input->post('form_field'.$i.'_ar')==='') {
          $this->output( array("error" => "Form field ".$i."arabic Required") );
        }
      }
      if($Return['error']!=''){
            $this->output($Return);
        }
        $data = [];
              for ($i=1; $i < 52; $i++) { 
                $data['form_field'.$i] = $this->input->post('form_field'.$i);
                $data['form_field'.$i.'_ar'] = $this->input->post('form_field'.$i.'_ar');
              }
      $result = $this->Admin_model->update_data('career',array('id'=>1), $data);
      if ($result == TRUE) {       
         $Return['result'] = 'Career page updated successfully.';
      } else {
        $Return['error'] =  'Bug. Something went wrong, please try again';
      }
      $this->output($Return);
      exit;
    }

  public function footer()
  {
    $session = $this->session->userdata('userdet');
    if(empty($session)){ 
      redirect('admin');
    }
    $data['link'] = $this->Admin_model->get_all_data('related_link') ;
    $data['address'] = $this->Admin_model->get_all_data('address') ;    
    $data['contact'] = $this->Admin_model->get_single_data('contact',array('id'=>'1')) ;
    $this->load->view('admin/edit_footer',$data);
  }

  
  public function update_footer()
  {   
    $session = $this->session->userdata('userdet');
    if(empty($session)){ 
      redirect('admin');
    }
   $Return = array('result'=>'', 'error'=>'');
    $image1 =  $this->input->post('old_image');
       
    /* Server side PHP input validation */    
    if(empty($_FILES['image']['name']) && empty($image1)) {
      $Return['error'] = "Image Required ";
    }else if($this->input->post('address')==='') {
      $Return['error'] = "Address Required";
    }else if($this->input->post('address_ar')==='') {
      $Return['error'] = "Addresst arabic Required ";
    }else if($this->input->post('website')==='') {
      $Return['error'] = "Website Required";
    }else if($this->input->post('email')==='') {
      $Return['error'] = "Email Required";
    }else if($this->input->post('facebook')==='') {
      $Return['error'] = "Facebook link Required";
    }else if($this->input->post('twitter')==='') {
      $Return['error'] = "Twitter link Required";
    }else if($this->input->post('instagram')==='') {
      $Return['error'] = "Instagram link Required";
    }else if($this->input->post('whatsapp')==='') {
      $Return['error'] = "Whatsapp link Required";
    }
    if($Return['error']!=''){
          $this->output($Return);
    }
       if(is_uploaded_file($_FILES['image']['tmp_name'])) {
      //checking image type
        $allowed =  array('png','jpg','jpeg','pdf','gif','PNG','JPG','JPEG','PDF','GIF','svg','webp');
        $filename = $_FILES['image']['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(in_array($ext,$allowed)){
          $tmp_name = $_FILES["image"]["tmp_name"];
          $profile = "uploads/images/";
          $set_img = base_url()."uploads/images/";
          // basename() may prevent filesystem traversal attacks;
          // further validation/sanitation of the filename may be appropriate
          $name = basename($_FILES["image"]["name"]);
          $newfilename = $name ;
          move_uploaded_file($tmp_name, $profile.$newfilename);
          $image1 = $newfilename; 
        }else {
              $Return['error'] = "Invalid file format";
            }
          if($Return['error']!=''){
            $this->output($Return);
          }
        }
    $data = array(   
    'address' => $this->input->post('address'),
    'address_ar' => $this->input->post('address_ar'),          
    'website' => $this->input->post('website'),
    'email' => $this->input->post('email'),
    'fb' => $this->input->post('facebook'),
    'twitter' => $this->input->post('twitter'),
    'instagram' => $this->input->post('instagram'),
    'linkdin' => $this->input->post('linkdin'),
    'footer_logo' => $image1,
      );
    $result = $this->Admin_model->update_data('contact',array('id'=>1), $data);

    if ($result == TRUE) {
       $Return['result'] = 'Footer section updated successfully.';
    } else {
      $Return['error'] =  'Bug. Something went wrong, please try again';
    }
    $this->output($Return);
    exit;
  }

  public function edit_Rlink()
  {
    $session = $this->session->userdata('userdet');
    if(empty($session)){ 
      redirect('admin');
    }
    $id = $this->uri->segment(3) ;
    $data['data'] = $this->Admin_model->get_single_data('related_link',array('id'=>$id)) ;
   $this->load->view('admin/edit_Rlink', $data);
  }

  public function update_Rlink()
  {
    $session = $this->session->userdata('userdet');
    if(empty($session)){ 
      redirect('admin');
    }
    $id = $this->input->post('id');
     $Return = array('result'=>'', 'error'=>'');
    if($this->input->post('name')==='') {
        $Return['error'] = "Name Required";
    }else if($this->input->post('name_ar')==='') {
      $Return['error'] = "Arabic Name Required";
    }else if($this->input->post('link')==='') {
      $Return['error'] = "Link Required";
    }       
    if($Return['error']!=''){
          $this->output($Return);
           exit ;
      }
    $data = array(       
    'name' => $this->input->post('name'),
    'name_ar' => $this->input->post('name_ar'),
    'link' => $this->input->post('link'),
      );
     $result = $this->Admin_model->update_data('related_link',array('id'=>$id),$data);
     $inserid =  $this->db->insert_id();
    if ($result == TRUE) {
       $Return['result'] = 'Related Link updated successfully.';
    } else {
      $Return['error'] =  'Bug. Something went wrong, please try again';
    }
    $this->output($Return);
    exit;
  }

  public function branch_new()
  {
   $session = $this->session->userdata('userdet');
    if(empty($session)){ 
      redirect('admin');
    }
    $this->load->view('admin/add_branch');
  }


    public function add_branch()
  {   
     $session = $this->session->userdata('userdet');
    if(empty($session)){ 
      redirect('admin');
    }
    $Return = array('result'=>'', 'error'=>'');
    if($this->input->post('address')==='') {
          $Return['error'] = "Branch Required";
    }else if($this->input->post('address_ar')==='') {
      $Return['error'] = "Arabic Branch Required";
    }else if($this->input->post('phone1')==='') {
      $Return['error'] = "Phone 1 Required";
    }else if($this->input->post('phone2')==='') {
      $Return['error'] = "Phone 2 Required";
    }else if($this->input->post('lat')==='') {
      $Return['error'] = "Latitude Required";
    }else if($this->input->post('lng')==='') {
      $Return['error'] = "Longitute Required";
    }
        
    if($Return['error']!=''){
          $this->output($Return);
           exit ;
      }
      $mapurl = $this->input->post('lat').",".$this->input->post('lat');
    $data = array(   
    'address' => $this->input->post('address'),
    'address_ar' => $this->input->post('address_ar'),
    'phone1' => $this->input->post('phone1'),
    'phone2' => $this->input->post('phone2'),
    'mapurl' => $mapurl,
      );
  //  $result = $this->Admin_model->insert_data('supp_org', $data);
    $result = $this->db->insert('address',$data);
    $inserid =  $this->db->insert_id();
    if ($result == TRUE) {     
       $Return['result'] = 'Branch added successfully.';
    } else {
      $Return['error'] =  'Bug. Something went wrong, please try again';
    }
    $this->output($Return);
    exit;
  }
    public function edit_branch()
    {
    $session = $this->session->userdata('userdet');
        if(empty($session)){ 
          redirect('admin');
        }
     $id = $this->uri->segment(3) ;
     $data['data'] = $this->Admin_model->get_single_data('address',array('id'=>$id)) ;
       $this->load->view('admin/edit_branch', $data);
    }

  public function update_branch()
  {   
     $session = $this->session->userdata('userdet');
    if(empty($session)){ 
      redirect('admin');
    }
    $id = $this->input->post('id');
   $Return = array('result'=>'', 'error'=>'');
   if($this->input->post('address')==='') {
    $Return['error'] = "Address Required";
    }else if($this->input->post('address_ar')==='') {
    $Return['error'] = "Arabic Address Required";
    }else if($this->input->post('phone1')==='') {
    $Return['error'] = "Phone 1 Required";
    }else if($this->input->post('phone2')==='') {
    $Return['error'] = "Phone 2 Required";
    }else if($this->input->post('lat')==='') {
    $Return['error'] = "Latitude Required";
    }else if($this->input->post('lng')==='') {
    $Return['error'] = "Longitute Required";
    }
        
    if($Return['error']!=''){
          $this->output($Return);
           exit ;
      }
       
      $mapurl = $this->input->post('lat').",".$this->input->post('lng');
      $data = array(   
      'address' => $this->input->post('address'),
      'address_ar' => $this->input->post('address_ar'),
      'phone1' => $this->input->post('phone1'),
      'phone2' => $this->input->post('phone2'),
      'mapurl' => $mapurl,
        );
    $result = $this->Admin_model->update_data('address',array('id'=>$id),$data);
   $inserid =  $this->db->insert_id();
    if ($result == TRUE) {
       $Return['result'] = 'Test updated successfully.';
    } else {
      $Return['error'] =  'Bug. Something went wrong, please try again';
    }
    $this->output($Return);
    exit;
  }

  public function contact()
  {
    $session = $this->session->userdata('userdet');
    if(empty($session)){ 
      redirect('admin');
    }
    $data['data'] = $this->Admin_model->get_single_data('contact',array('id'=>1)) ;
    $this->load->view('admin/edit_contact', $data);
  }

  public function update_contact()
  {   
     $session = $this->session->userdata('userdet');
    if(empty($session)){ 
      redirect('admin');
    }
   $Return = array('result'=>'', 'error'=>'');
    if($this->input->post('section3')==='') {
        $Return['error'] = "Section Required";
    }else if($this->input->post('section3_ar')==='') {
      $Return['error'] = "Arabic Section Required";
    }else if($this->input->post('form_field1')==='') {
      $Return['error'] = "Form Field 1 Required";
    }else if($this->input->post('form_field1_ar')==='') {
      $Return['error'] = "Arabic Form Field 1 Required";
    }else if($this->input->post('form_field2')==='') {
      $Return['error'] = "Form Field 2 Required";
    }else if($this->input->post('form_field2_ar')==='') {
      $Return['error'] = "Arabic Form Field 2 Required";
    }else if($this->input->post('form_field3')==='') {
      $Return['error'] = "Form Field 3 Required";
    }else if($this->input->post('form_field3_ar')==='') {
      $Return['error'] = "Arabic Form Field 3 Required";
    }else if($this->input->post('form_field4')==='') {
      $Return['error'] = "Form Field 4 Required";
    }else if($this->input->post('form_field4_ar')==='') {
      $Return['error'] = "Arabic Form Field 4 Required";
    }
    if($Return['error']!=''){
          $this->output($Return);
           exit ;
      }
    $data = array(   
    'section3' => $this->input->post('section3'),
    'section3_ar' => $this->input->post('section3_ar'),
    'form_field1' => $this->input->post('form_field1'),
    'form_field1_ar' => $this->input->post('form_field1_ar'),
    'form_field2' => $this->input->post('form_field2'),
    'form_field2_ar' => $this->input->post('form_field2_ar'),
    'form_field3' => $this->input->post('form_field3'),
    'form_field3_ar' => $this->input->post('form_field3_ar'),
    'form_field4' => $this->input->post('form_field4'),
    'form_field4_ar' => $this->input->post('form_field4_ar'),
      );
    $result = $this->Admin_model->update_data('contact',array('id'=>1),$data);
    $inserid =  $this->db->insert_id();
    if ($result == TRUE) {
       $Return['result'] = 'Test updated successfully.';
    } else {
      $Return['error'] =  'Bug. Something went wrong, please try again';
    }
    $this->output($Return);
    exit;
  }

  public function home()
  {
    $session = $this->session->userdata('userdet');
    if(empty($session)){ 
      redirect('admin');
    }
    $data['home'] = $this->Admin_model->get_single_data('home_page',array('id'=>1)) ;
    $data['pf'] = $this->Admin_model->get_all_data('product_feature') ;
    $data['news'] = $this->Admin_model->get_all_data('latest_news') ;
    $this->load->view('admin/edit_home', $data);
  }

  public function update_home()
  {   
     $session = $this->session->userdata('userdet');
    if(empty($session)){ 
      redirect('admin');
    }

    
    $secsub1_img =  $this->input->post('old_secsub1_img');
    $secsub2_img =  $this->input->post('old_secsub2_img');
    $secsub3_img =  $this->input->post('old_secsub3_img');
    $secsub4_img =  $this->input->post('old_secsub4_img');
    $sec3_img =  $this->input->post('old_sec3_img');
    $sec4_img1 =  $this->input->post('old_sec4_img1');
    $sec4_img2 =  $this->input->post('old_sec4_img2');

   $Return = array('result'=>'', 'error'=>'');

    if($this->input->post('sec1_title')==='') {
        $Return['error'] = "Section 1 title Required";
    }else if($this->input->post('sec1_title_ar')==='') {
      $Return['error'] = "Section 1 title Arabic Required";
    }else if($this->input->post('secsub1_title')==='') {
      $Return['error'] = "Section 1 Point 1 title Required";
    }else if($this->input->post('secsub1_title_ar')==='') {
      $Return['error'] = "Section 1 Point 1 title arabic Required";
    }else if($this->input->post('secsub1_content')==='') {
      $Return['error'] = "Section 1 Point 1 content Required";
    }else if($this->input->post('secsub1_content_ar')==='') {
      $Return['error'] = "Section 1 Point 1 content arabic Required";
    }else if($this->input->post('secsub2_title')==='') {
      $Return['error'] = "Section point 2 title Required";
    }else if($this->input->post('secsub2_title_ar')==='') {
      $Return['error'] = "Section point 2 title arabic Required";
    }else if($this->input->post('secsub2_content')==='') {
      $Return['error'] = "Section point 2 content Required";
    }else if($this->input->post('secsub2_content_ar')==='') {
      $Return['error'] = "Section point 2 content arabic Required";
    }else if($this->input->post('secsub3_title')==='') {
      $Return['error'] = "Section point 3 title Required";
    }else if($this->input->post('secsub3_title_ar')==='') {
      $Return['error'] = "Section point 3 title arabic Required";
    }else if($this->input->post('secsub3_content')==='') {
      $Return['error'] = "Section point 3 content Required";
    }else if($this->input->post('secsub3_content_ar')==='') {
      $Return['error'] = "Section point 3 content arabic Required";
    }else if($this->input->post('secsub4_title')==='') {
      $Return['error'] = "Section point 4 title Required";
    }else if($this->input->post('secsub4_title_ar')==='') {
      $Return['error'] = "Section point 4 title arabic Required";
    }else if($this->input->post('secsub4_content')==='') {
      $Return['error'] = "Section point 4 content Required";
    }else if($this->input->post('secsub4_content_ar')==='') {
      $Return['error'] = "Section point 4 content arabic Required";
    }else if($this->input->post('sec2_title')==='') {
      $Return['error'] = "Section 2 title Required";
    }else if($this->input->post('sec2_title_ar')==='') {
      $Return['error'] = "Section 2 title arabic Required";
    }else if($this->input->post('sec2_content')==='') {
      $Return['error'] = "Section 2 content Required";
    }else if($this->input->post('sec2_content_ar')==='') {
      $Return['error'] = "Section 2 content arabic Required";
    }else if($this->input->post('sec2_btn')==='') {
      $Return['error'] = "Section 2 button Required";
    }else if($this->input->post('sec2_btn_ar')==='') {
      $Return['error'] = "Section 2 button arabic Required";
    }else if($this->input->post('sec3_title')==='') {
      $Return['error'] = "Section 3 title Required";
    }else if($this->input->post('sec3_title_ar')==='') {
      $Return['error'] = "Section 3 title arabic Required";
    }else if($this->input->post('sec3_content')==='') {
      $Return['error'] = "Section 3 content Required";
    }else if($this->input->post('sec3_content_ar')==='') {
      $Return['error'] = "Section 3 content arabic Required";
    }else if($this->input->post('sec4_title')==='') {
      $Return['error'] = "Section 4 title Required";
    }else if($this->input->post('sec4_title_ar')==='') {
      $Return['error'] = "Section 4 title arabic Required";
    }else if($this->input->post('sec5_title')==='') {
      $Return['error'] = "Section 5 title Required";
    }else if($this->input->post('sec5_title_ar')==='') {
      $Return['error'] = "Section 5 title arabic Required";
    }else if($this->input->post('sec6_title')==='') {
      $Return['error'] = "Section 6 title Required";
    }else if($this->input->post('sec6_title_ar')==='') {
      $Return['error'] = "Section 6 title arabic Required";
    }else if(empty($_FILES['sec3_img']['name']) && empty($sec3_img)) {
      $Return['error'] = "Section 3 image Required ";
    }else if(empty($_FILES['sec4_img1']['name']) && empty($sec4_img1)) {
      $Return['error'] = "section 4 brand Image Required ";
    }else if(empty($_FILES['sec4_img2']['name']) && empty($sec4_img2)) {
      $Return['error'] = "section 4 brand Image Required ";
    }else if(empty($_FILES['secsub1_img']['name']) && empty($secsub1_img)) {
      $Return['error'] = "Section 1 Point 1 image Required ";
    }else if(empty($_FILES['secsub2_img']['name']) && empty($secsub2_img)) {
      $Return['error'] = "Section 1 Point 2 image Required ";
    }  
        
    if($Return['error']!=''){
          $this->output($Return);
           exit ;
      }

      if(is_uploaded_file($_FILES['secsub1_img']['tmp_name'])) {
        $allowed =  array('png','jpg','jpeg','pdf','gif','PNG','JPG','JPEG','PDF','GIF','svg','webp');
        $filename = $_FILES['secsub1_img']['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(in_array($ext,$allowed)){
          $tmp_name = $_FILES["secsub1_img"]["tmp_name"];
          $profile = "uploads/images/home/";
          $set_img = base_url()."uploads/images/home/";
          $name = basename($_FILES["secsub1_img"]["name"]);
          $newfilename = $name ;
          move_uploaded_file($tmp_name, $profile.$newfilename);
          $secsub1_img = $newfilename;
        }else {
            $Return['error'] = "Invalid file format";
          }
        if($Return['error']!=''){
          $this->output($Return);
        }
      }

      if(is_uploaded_file($_FILES['secsub2_img']['tmp_name'])) {
        $allowed =  array('png','jpg','jpeg','pdf','gif','PNG','JPG','JPEG','PDF','GIF','svg','webp');
        $filename = $_FILES['secsub2_img']['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(in_array($ext,$allowed)){
          $tmp_name = $_FILES["secsub2_img"]["tmp_name"];
          $profile = "uploads/images/home/";
          $set_img = base_url()."uploads/images/home/";
          $name = basename($_FILES["secsub2_img"]["name"]);
          $newfilename = $name ;
          move_uploaded_file($tmp_name, $profile.$newfilename);
          $secsub2_img = $newfilename;
        }else {
            $Return['error'] = "Invalid file format";
          }
        if($Return['error']!=''){
          $this->output($Return);
        }
      }

      if(is_uploaded_file($_FILES['secsub3_img']['tmp_name'])) {
        $allowed =  array('png','jpg','jpeg','pdf','gif','PNG','JPG','JPEG','PDF','GIF','svg','webp');
        $filename = $_FILES['secsub3_img']['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(in_array($ext,$allowed)){
          $tmp_name = $_FILES["secsub3_img"]["tmp_name"];
          $profile = "uploads/images/home/";
          $set_img = base_url()."uploads/images/home/";
          $name = basename($_FILES["secsub3_img"]["name"]);
          $newfilename = $name ;
          move_uploaded_file($tmp_name, $profile.$newfilename);
          $secsub3_img = $newfilename;
        }else {
            $Return['error'] = "Invalid file format";
          }
        if($Return['error']!=''){
          $this->output($Return);
        }
      }

      if(is_uploaded_file($_FILES['secsub4_img']['tmp_name'])) {
        $allowed =  array('png','jpg','jpeg','pdf','gif','PNG','JPG','JPEG','PDF','GIF','svg','webp');
        $filename = $_FILES['secsub4_img']['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(in_array($ext,$allowed)){
          $tmp_name = $_FILES["secsub4_img"]["tmp_name"];
          $profile = "uploads/images/home/";
          $set_img = base_url()."uploads/images/home/";
          $name = basename($_FILES["secsub4_img"]["name"]);
          $newfilename = $name ;
          move_uploaded_file($tmp_name, $profile.$newfilename);
          $secsub4_img = $newfilename;
        }else {
            $Return['error'] = "Invalid file format";
          }
        if($Return['error']!=''){
          $this->output($Return);
        }
      }

      if(is_uploaded_file($_FILES['sec3_img']['tmp_name'])) {
        $allowed =  array('png','jpg','jpeg','pdf','gif','PNG','JPG','JPEG','PDF','GIF','svg','webp');
        $filename = $_FILES['sec3_img']['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(in_array($ext,$allowed)){
          $tmp_name = $_FILES["sec3_img"]["tmp_name"];
          $profile = "uploads/images/home/";
          $set_img = base_url()."uploads/images/home/";
          $name = basename($_FILES["sec3_img"]["name"]);
          $newfilename = $name ;
          move_uploaded_file($tmp_name, $profile.$newfilename);
          $sec3_img = $newfilename;
        }else {
            $Return['error'] = "Invalid file format";
          }
        if($Return['error']!=''){
          $this->output($Return);
        }
      }

      if(is_uploaded_file($_FILES['sec4_img1']['tmp_name'])) {
        $allowed =  array('png','jpg','jpeg','pdf','gif','PNG','JPG','JPEG','PDF','GIF','svg','webp');
        $filename = $_FILES['sec4_img1']['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(in_array($ext,$allowed)){
          $tmp_name = $_FILES["sec4_img1"]["tmp_name"];
          $profile = "uploads/images/home/";
          $set_img = base_url()."uploads/images/home/";
          $name = basename($_FILES["sec4_img1"]["name"]);
          $newfilename = $name ;
          move_uploaded_file($tmp_name, $profile.$newfilename);
          $sec4_img1 = $newfilename;
        }else {
            $Return['error'] = "Invalid file format";
          }
        if($Return['error']!=''){
          $this->output($Return);
        }
      }

      if(is_uploaded_file($_FILES['sec4_img2']['tmp_name'])) {
        $allowed =  array('png','jpg','jpeg','pdf','gif','PNG','JPG','JPEG','PDF','GIF','svg','webp');
        $filename = $_FILES['sec4_img2']['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(in_array($ext,$allowed)){
          $tmp_name = $_FILES["sec4_img2"]["tmp_name"];
          $profile = "uploads/images/home/";
          $set_img = base_url()."uploads/images/home/";
          $name = basename($_FILES["sec4_img2"]["name"]);
          $newfilename = $name ;
          move_uploaded_file($tmp_name, $profile.$newfilename);
          $sec4_img2 = $newfilename;
        }else {
            $Return['error'] = "Invalid file format";
          }
        if($Return['error']!=''){
          $this->output($Return);
        }
      }

      

    $data = array(   
    'sec1_title' => $this->input->post('sec1_title'),
    'sec1_title_ar' => $this->input->post('sec1_title_ar'),
    'secsub1_title' => $this->input->post('secsub1_title'),
    'secsub1_title_ar' => $this->input->post('secsub1_title_ar'),
    'secsub1_content' => $this->input->post('secsub1_content'),
    'secsub1_content_ar' => $this->input->post('secsub1_content_ar'),
    'secsub2_title' => $this->input->post('secsub2_title'),
    'secsub2_title_ar' => $this->input->post('secsub2_title_ar'),
    'secsub2_content' => $this->input->post('secsub2_content'),
    'secsub2_content_ar' => $this->input->post('secsub2_content_ar'),
    'secsub3_title' => $this->input->post('secsub3_title'),
    'secsub3_title_ar' => $this->input->post('secsub3_title_ar'),
    'secsub3_content' => $this->input->post('secsub3_content'),
    'secsub3_content_ar' => $this->input->post('secsub3_content_ar'),
    'secsub4_title' => $this->input->post('secsub4_title'),
    'secsub4_title_ar' => $this->input->post('secsub4_title_ar'),
    'secsub4_content' => $this->input->post('secsub4_content'),
    'secsub4_content_ar' => $this->input->post('secsub4_content_ar'),
    'sec2_title' => $this->input->post('sec2_title'),
    'sec2_title_ar' => $this->input->post('sec2_title_ar'),
    'sec2_content' => $this->input->post('sec2_content'),
    'sec2_content_ar' => $this->input->post('sec2_content_ar'),
    'sec2_btn' => $this->input->post('sec2_btn'),
    'sec2_btn_ar' => $this->input->post('sec2_btn_ar'),
    'sec3_title' => $this->input->post('sec3_title'),
    'sec3_title_ar' => $this->input->post('sec3_title_ar'),
    'sec3_content' => $this->input->post('sec3_content'),
    'sec3_content_ar' => $this->input->post('sec3_content_ar'),
    'sec4_title' => $this->input->post('sec4_title'),
    'sec4_title_ar' => $this->input->post('sec4_title_ar'),
    'sec5_title' => $this->input->post('sec5_title'),
    'sec5_title_ar' => $this->input->post('sec5_title_ar'),
    'sec6_title' => $this->input->post('sec6_title'),
    'sec6_title_ar' => $this->input->post('sec6_title_ar'),
    'secsub1_img' => $secsub1_img,
    'secsub2_img' => $secsub2_img,
    'secsub3_img' => $secsub3_img,
    'secsub4_img' => $secsub4_img,
    'sec3_img' => $sec3_img,
    'sec4_img1' => $sec4_img1,
    'sec4_img2' => $sec4_img2,
      );
  //  $result = $this->Admin_model->insert_data('supp_org', $data);
    $result = $this->Admin_model->update_data('home_page',array('id'=> 1),$data);
   $inserid =  $this->db->insert_id();

    if ($result == TRUE) {
      //get setting info 
       $Return['result'] = 'Home Page updated successfully.';
    } else {
      $Return['error'] =  'Bug. Something went wrong, please try again';
    }
    $this->output($Return);
    exit;
  }

  public function edit_feature()
  {
    $session = $this->session->userdata('userdet');
    if(empty($session)){ 
      redirect('admin');
    }
    $id = $this->uri->segment(3) ;
    $data['pf'] = $this->Admin_model->get_single_data('product_feature',array('id'=>$id)) ;
    $this->load->view('admin/edit_feature', $data);
  }

  public function update_feature()
  {   
     $session = $this->session->userdata('userdet');
    if(empty($session)){ 
      redirect('admin');
    }
    $id = $this->input->post('id');
    $Return = array('result'=>'', 'error'=>''); 
    /* Server side PHP input validation */    
    $image = $this->input->post('old_image');
     if(empty($_FILES['image']['name']) && empty($image)){
      $Return['error'] = "Image Required ";
      }else if($this->input->post('name')===''){
      $Return['error'] = "Name Required ";
      }else if($this->input->post('name_ar')===''){
      $Return['error'] = "Arabic Name Required ";
      }
       if($Return['error']!=''){
          $this->output($Return);
           exit ;
      }
    if(is_uploaded_file($_FILES['image']['tmp_name'])) {
    $allowed =  array('png','jpg','jpeg','pdf','gif','PNG','JPG','JPEG','PDF','GIF','svg','webp');
    $filename = $_FILES['image']['name'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    if(in_array($ext,$allowed)){
      $tmp_name = $_FILES["image"]["tmp_name"];
      $profile = "uploads/images/services/";
      $name = basename($_FILES["image"]["name"]);
      $newfilename = $name ;
      move_uploaded_file($tmp_name, $profile.$newfilename);
      $image  = $newfilename;
      }else {
            $Return['error'] = "Invalid file format";
          }
        if($Return['error']!=''){
          $this->output($Return);
        }
      }
    $data = array(   
    'name' => $this->input->post('name'),
    'name_ar' => $this->input->post('name_ar'),   
    'img' => $image,
    'created_by' => $session['username']
      );
    $result = $this->Admin_model->update_data('product_feature',array('id'=>$id),$data);
     $inserid =  $this->db->insert_id();
    if ($result == TRUE) {
       $Return['result'] = 'Product Feature updated successfully.';
    } else {
      $Return['error'] =  'Bug. Something went wrong, please try again';
    }
    $this->output($Return);
    exit;
  }

  public function edit_news()
  {
    $session = $this->session->userdata('userdet');
    if(empty($session)){ 
      redirect('admin');
    }
    $id = $this->uri->segment(3) ;
    $data['news'] = $this->Admin_model->get_single_data('latest_news',array('id'=>$id)) ;
    $this->load->view('admin/edit_news', $data);
  }

  public function update_news()
  {   
     $session = $this->session->userdata('userdet');
    if(empty($session)){ 
      redirect('admin');
    }
    $id = $this->input->post('id');
    $Return = array('result'=>'', 'error'=>''); 
    /* Server side PHP input validation */    
    $image = $this->input->post('old_image');
     if(empty($_FILES['image']['name']) && empty($image)){
      $Return['error'] = "Image Required ";
      }else if($this->input->post('title')===''){
      $Return['error'] = "Title Required ";
      }else if($this->input->post('title_ar')===''){
      $Return['error'] = "Arabic Title Required ";
      }else if($this->input->post('min_content')===''){
      $Return['error'] = "Title Content Required ";
      }else if($this->input->post('min_content_ar')===''){
      $Return['error'] = "Arabic Title Content Required ";
      }else if($this->input->post('content')===''){
      $Return['error'] = "content Required ";
      }else if($this->input->post('st_date')==='' || $this->input->post('en_date')==='' ){
        $Return['error'] = "Blog Start and End Date Required ";
      }
      // else if($this->input->post('content_ar')===''){
      // $Return['error'] = "Arabic content Required ";
      // }
       if($Return['error']!=''){
          $this->output($Return);
           exit ;
      }
    if(is_uploaded_file($_FILES['image']['tmp_name'])) {
    $allowed =  array('png','jpg','jpeg','pdf','gif','PNG','JPG','JPEG','PDF','GIF','svg','webp');
    $filename = $_FILES['image']['name'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    if(in_array($ext,$allowed)){
      $tmp_name = $_FILES["image"]["tmp_name"];
      $profile = "uploads/images/services/";
      $name = basename($_FILES["image"]["name"]);
      $newfilename = $name ;
      move_uploaded_file($tmp_name, $profile.$newfilename);
      $image  = $newfilename;
      }else {
            $Return['error'] = "Invalid file format";
          }
        if($Return['error']!=''){
          $this->output($Return);
        }
      }

    //$day = $this->input->post('dbdate');
      if($this->input->post('st_date'))
      {
        $date = $this->input->post('st_date');
        $day = date('D, F, d', strtotime($date));
      }
      

    $data = array(   
    'title' => $this->input->post('title'),
    'title_ar' => $this->input->post('title_ar'),
    'min_content' => $this->input->post('min_content'),
    'min_content_ar' => $this->input->post('min_content_ar'),  
    'content' => $this->input->post('content'),
    'content_ar' =>"",    
    'img' => $image,
    'date' => $day,
    'st_date' => $this->input->post('st_date'),
    'en_date' => $this->input->post('en_date'),
    'created_by' => $session['username']
    );
    $result = $this->Admin_model->update_data('latest_news',array('id'=>$id),$data);
     $inserid =  $this->db->insert_id();
    if ($result == TRUE) {
       $Return['result'] = 'Latest News updated successfully.';
    } else {
      $Return['error'] =  'Bug. Something went wrong, please try again';
    }
    $this->output($Return);
    exit;
  }

  public function about()
  {
    $session = $this->session->userdata('userdet');
    if(empty($session)){ 
      redirect('admin');
    }
    $data['about'] = $this->Admin_model->get_single_data('about',array('id'=>1)) ;
    $data['purpose'] = $this->Admin_model->get_all_data('purpose') ;
    $this->load->view('admin/edit_about', $data);
  }

  public function update_about()
  {   
     $session = $this->session->userdata('userdet');
    if(empty($session)){ 
      redirect('admin');
    }

    $sec2_img =  $this->input->post('old_sec2_img');
    $sec2sub2_img =  $this->input->post('old_sec2sub2_img');
    $sec2sub3_img =  $this->input->post('old_sec2sub3_img');
    $sec5_img =  $this->input->post('old_sec5_img');
    $sec5sub2_img =  $this->input->post('old_sec5sub2_img');
    $sec7_link =  $this->input->post('old_sec7_link');

   $Return = array('result'=>'', 'error'=>'');     
    if($this->input->post('sec1_content')==='') {
        $Return['error'] = "Section 1 Content Required";
    }else if($this->input->post('sec1_content_ar')==='') {
      $Return['error'] = "Section 1 Content arabic Required";
    }else if($this->input->post('sec2_title')==='') {
      $Return['error'] = "Section 2 title Required";
    }else if($this->input->post('sec2_title_ar')==='') {
      $Return['error'] = "section 2 title arabic Required";
    }else if($this->input->post('sec2sub1_title')==='') {
      $Return['error'] = "section 2 Department title Required";
    }else if($this->input->post('sec2sub1_title_ar')==='') {
      $Return['error'] = "section 2 Department title arabic Required";
    }else if($this->input->post('sec2sub1_content')==='') {
      $Return['error'] = "section 2 Department content Required";
    }else if($this->input->post('sec2sub1_content_ar')==='') {
      $Return['error'] = "section 2 Department content arabic Required";
    }else if($this->input->post('sec2sub2_title')==='') {
      $Return['error'] = "section 2 Department 2 title Required";
    }else if($this->input->post('sec2sub2_title_ar')==='') {
      $Return['error'] = "section 2 Department 2 title arabic Required";
    }else if($this->input->post('sec2sub2_content')==='') {
      $Return['error'] = "section 2 Department 2 content Required";
    }else if($this->input->post('sec2sub2_content_ar')==='') {
      $Return['error'] = "section 2 Department 2 content arabic Required";
    }else if($this->input->post('sec2sub3_title')==='') {
      $Return['error'] = "section 2 Department 3 title Required";
    }else if($this->input->post('sec2sub3_title_ar')==='') {
      $Return['error'] = "section 2 Department 3 title arabic Required";
    }else if($this->input->post('sec2sub3_content')==='') {
      $Return['error'] = "section 2 Department 3 content Required";
    }else if($this->input->post('sec2sub3_content_ar')==='') {
      $Return['error'] = "section 2 Department 3 content arabic Required";
    }else if($this->input->post('sec3_title')==='') {
      $Return['error'] = "Section 3 title Required";
    }else if($this->input->post('sec3_title_ar')==='') {
      $Return['error'] = "Section 3 title arabic Required";
    }else if($this->input->post('sec3_content')==='') {
      $Return['error'] = "Section 3 Content Required";
    }else if($this->input->post('sec3_content_ar')==='') {
      $Return['error'] = "Section 3 Content arabic Required";
    }else if($this->input->post('sec4_title')==='') {
      $Return['error'] = "Section 3 title Required";
    }else if($this->input->post('sec4_title_ar')==='') {
      $Return['error'] = "Section 3 title arabic Required";
    }else if($this->input->post('sec4_content')==='') {
      $Return['error'] = "Section 3 Content Required";
    }else if($this->input->post('sec4_content_ar')==='') {
      $Return['error'] = "Section 3 Content arabic Required";
    }else if($this->input->post('sec5_title')==='') {
      $Return['error'] = "Section 4 title Required";
    }else if($this->input->post('sec5_title_ar')==='') {
      $Return['error'] = "Section 4 title arabic Required";
    }else if($this->input->post('sec5_content')==='') {
      $Return['error'] = "Section 4 Content Required";
    }else if($this->input->post('sec5_content_ar')==='') {
      $Return['error'] = "Section 4 Content arabic Required";
    }else if($this->input->post('sec5sub1_title')==='') {
      $Return['error'] = "Section 4 sub title 1 Required";
    }else if($this->input->post('sec5sub1_title_ar')==='') {
      $Return['error'] = "Section 4 sub title 1 arabic Required";
    }else if($this->input->post('sec5sub1_content')==='') {
      $Return['error'] = "Section 4 sub content 1 Required";
    }else if($this->input->post('sec5sub1_content_ar')==='') {
      $Return['error'] = "Section 4 sub content 1 arabic Required";
    }else if($this->input->post('sec5sub2_title')==='') {
      $Return['error'] = "Section 4 sub title 2 Required";
    }else if($this->input->post('sec5sub2_title_ar')==='') {
      $Return['error'] = "Section 4 sub title 2 Required";
    }else if($this->input->post('sec5sub2_content')==='') {
      $Return['error'] = "Section 4 sub content 2 Required";
    }else if($this->input->post('sec5sub2_contentt_ar')==='') {
      $Return['error'] = "Section 4 sub content 2 arabic Required";
    }else if($this->input->post('sec6_title')==='') {
      $Return['error'] = "Section 5 title Required";
    }else if($this->input->post('sec6_title_ar')==='') {
      $Return['error'] = "Section 5 title arabic Required";
    }else if($this->input->post('sec7_title')==='') {
      $Return['error'] = "Section 6 title Required";
    }else if($this->input->post('sec7_title_ar')==='') {
      $Return['error'] = "Section 6 title arabic Required";
    }else if($this->input->post('sec7_content1')==='') {
      $Return['error'] = "Section 6 Content Required";
    }else if($this->input->post('sec7_content1_ar')==='') {
      $Return['error'] = "Section 6 Content arabic Required";
    }else if($this->input->post('sec7_link_con')==='') {
      $Return['error'] = "Section 6 Link title Required";
    }else if($this->input->post('sec7_link_con_ar')==='') {
      $Return['error'] = "Section 6 Link Arabic title Required";
    }
    else if($this->input->post('sec8_title')==='') {
      $Return['error'] = "Section 7 title Required";
    }else if($this->input->post('sec8_title_ar')==='') {
      $Return['error'] = "Section 7 title arabic Required";
    }else if($this->input->post('sec8_content')==='') {
      $Return['error'] = "Section 7 Content Required";
    }else if($this->input->post('sec8_content_ar')==='') {
      $Return['error'] = "Section 7 Content arabic Required";
    }

    else if($this->input->post('sec8sub1_title')==='') {
      $Return['error'] = "Section 7 sub title 1 Required";
    }else if($this->input->post('sec8sub1_title_ar')==='') {
      $Return['error'] = "Section 7 sub title 1 arabic Required";
    }else if($this->input->post('sec8sub1_content')==='') {
      $Return['error'] = "Section 7 sub Content 1 Required";
    }else if($this->input->post('sec8sub1_content_ar')==='') {
      $Return['error'] = "Section 7 sub Content 1 arabic Required";
    }

    else if($this->input->post('sec8sub2_title')==='') {
      $Return['error'] = "Section 7 sub title 2 Required";
    }else if($this->input->post('sec8sub2_title_ar')==='') {
      $Return['error'] = "Section 7 sub title 2 arabic Required";
    }

    else if($this->input->post('sec8sub3_title')==='') {
      $Return['error'] = "Section 7 sub title 3 Required";
    }else if($this->input->post('sec8sub3_title_ar')==='') {
      $Return['error'] = "Section 7 sub title 3 arabic Required";
    }

    else if($this->input->post('sec8sub4_title')==='') {
      $Return['error'] = "Section 7 title 4 Required";
    }else if($this->input->post('sec8sub4_title_ar')==='') {
      $Return['error'] = "Section 7 title 4 arabic Required";
    }else if($this->input->post('sec8sub4_content')==='') {
      $Return['error'] = "Section 7 Content 4 Required";
    }else if($this->input->post('sec8sub4_content_ar')==='') {
      $Return['error'] = "Section 7 Content 4 arabic Required";
    }
        
    if($Return['error']!=''){
          $this->output($Return);
           exit ;
      }

      if(is_uploaded_file($_FILES['sec2_img']['tmp_name'])) {
        $allowed =  array('png','jpg','jpeg','pdf','gif','PNG','JPG','JPEG','PDF','GIF','svg','webp');
        $filename = $_FILES['sec2_img']['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(in_array($ext,$allowed)){
          $tmp_name = $_FILES["sec2_img"]["tmp_name"];
          $profile = "uploads/images/";
          $set_img = base_url()."uploads/images/";
          $name = basename($_FILES["sec2_img"]["name"]);
          $newfilename = $name ;
          move_uploaded_file($tmp_name, $profile.$newfilename);
          $sec2_img = $newfilename;
        }else {
            $Return['error'] = "Invalid file format";
          }
        if($Return['error']!=''){
          $this->output($Return);
        }
      }

      if(is_uploaded_file($_FILES['sec2sub2_img']['tmp_name'])) {
        $allowed =  array('png','jpg','jpeg','pdf','gif','PNG','JPG','JPEG','PDF','GIF','svg','webp');
        $filename = $_FILES['sec2sub2_img']['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(in_array($ext,$allowed)){
          $tmp_name = $_FILES["sec2sub2_img"]["tmp_name"];
          $profile = "uploads/images/";
          $set_img = base_url()."uploads/images/";
          $name = basename($_FILES["sec2sub2_img"]["name"]);
          $newfilename = $name ;
          move_uploaded_file($tmp_name, $profile.$newfilename);
          $sec2sub2_img = $newfilename;
        }else {
            $Return['error'] = "Invalid file format";
          }
        if($Return['error']!=''){
          $this->output($Return);
        }
      }

      if(is_uploaded_file($_FILES['sec2sub3_img']['tmp_name'])) {
        $allowed =  array('png','jpg','jpeg','pdf','gif','PNG','JPG','JPEG','PDF','GIF','svg','webp');
        $filename = $_FILES['sec2sub3_img']['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(in_array($ext,$allowed)){
          $tmp_name = $_FILES["sec2sub3_img"]["tmp_name"];
          $profile = "uploads/images/";
          $set_img = base_url()."uploads/images/";
          $name = basename($_FILES["sec2sub3_img"]["name"]);
          $newfilename = $name ;
          move_uploaded_file($tmp_name, $profile.$newfilename);
          $sec2sub3_img = $newfilename;
        }else {
            $Return['error'] = "Invalid file format";
          }
        if($Return['error']!=''){
          $this->output($Return);
        }
      }

      if(is_uploaded_file($_FILES['sec5_img']['tmp_name'])) {
        $allowed =  array('png','jpg','jpeg','pdf','gif','PNG','JPG','JPEG','PDF','GIF','svg','webp');
        $filename = $_FILES['sec5_img']['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(in_array($ext,$allowed)){
          $tmp_name = $_FILES["sec5_img"]["tmp_name"];
          $profile = "uploads/images/";
          $set_img = base_url()."uploads/images/";
          $name = basename($_FILES["sec5_img"]["name"]);
          $newfilename = $name ;
          move_uploaded_file($tmp_name, $profile.$newfilename);
          $sec5_img = $newfilename;
      }else {
            $Return['error'] = "Invalid file format";
          }
        if($Return['error']!=''){
          $this->output($Return);
        }
      }

      if(is_uploaded_file($_FILES['sec5sub2_img']['tmp_name'])) {
        $allowed =  array('png','jpg','jpeg','pdf','gif','PNG','JPG','JPEG','PDF','GIF','svg','webp');
        $filename = $_FILES['sec5sub2_img']['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(in_array($ext,$allowed)){
          $tmp_name = $_FILES["sec5sub2_img"]["tmp_name"];
          $profile = "uploads/images/";
          $set_img = base_url()."uploads/images/";
          $name = basename($_FILES["sec5sub2_img"]["name"]);
          $newfilename = $name ;
          move_uploaded_file($tmp_name, $profile.$newfilename);
          $sec5sub2_img = $newfilename;
      }else {
            $Return['error'] = "Invalid file format";
          }
        if($Return['error']!=''){
          $this->output($Return);
        }
      }

      if(is_uploaded_file($_FILES['sec7_link']['tmp_name'])) {
        $allowed =  array('png','jpg','jpeg','pdf','gif','PNG','JPG','JPEG','PDF','GIF','svg','webp');
        $filename = $_FILES['sec7_link']['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(in_array($ext,$allowed)){
          $tmp_name = $_FILES["sec7_link"]["tmp_name"];
          $profile = "uploads/images/";
          $set_img = base_url()."uploads/images/";
          $name = basename($_FILES["sec7_link"]["name"]);
          $newfilename = $name ;
          move_uploaded_file($tmp_name, $profile.$newfilename);
          $sec7_link = $newfilename;
      }else {
            $Return['error'] = "Invalid file format";
          }
        if($Return['error']!=''){
          $this->output($Return);
        }
      }
    
   
    $data = array(   
     
    'sec1_content' => $this->input->post('sec1_content'),
    'sec1_content_ar' => $this->input->post('sec1_content_ar'),
    'sec2_title' => $this->input->post('sec2_title'),
    'sec2_title_ar' => $this->input->post('sec2_title_ar'),
    'sec2sub1_title' => $this->input->post('sec2sub1_title'),
    'sec2sub1_title_ar' => $this->input->post('sec2sub1_title_ar'),
    'sec2sub1_content' => $this->input->post('sec2sub1_content'),
    'sec2sub1_content_ar' => $this->input->post('sec2sub1_content_ar'),
    'sec2sub2_title' => $this->input->post('sec2sub2_title'),
    'sec2sub2_title_ar' => $this->input->post('sec2sub2_title_ar'),
    'sec2sub2_content' => $this->input->post('sec2sub2_content'),
    'sec2sub2_content_ar' => $this->input->post('sec2sub2_content_ar'),
    'sec2sub3_title' => $this->input->post('sec2sub3_title'),
    'sec2sub3_title_ar' => $this->input->post('sec2sub3_title_ar'),
    'sec2sub3_content' => $this->input->post('sec2sub3_content'),
    'sec2sub3_content_ar' => $this->input->post('sec2sub3_content_ar'),
    'sec3_title' => $this->input->post('sec3_title'),
    'sec3_title_ar' => $this->input->post('sec3_title_ar'),
    'sec3_content' => $this->input->post('sec3_content'),
    'sec3_content_ar' => $this->input->post('sec3_content_ar'),
    'sec4_title' => $this->input->post('sec4_title'),
    'sec4_title_ar' => $this->input->post('sec4_title_ar'),
    'sec4_content' => $this->input->post('sec4_content'),
    'sec4_content_ar' => $this->input->post('sec4_content_ar'),  
    'sec5_title' => $this->input->post('sec5_title'),
    'sec5_title_ar' => $this->input->post('sec5_title_ar'),
     'sec5_content' => $this->input->post('sec5_content'),
    'sec5_content_ar' => $this->input->post('sec5_content_ar'),
    'sec5sub1_title' => $this->input->post('sec5sub1_title'),
    'sec5sub1_title_ar' => $this->input->post('sec5sub1_title_ar'),
    'sec5sub1_content' => $this->input->post('sec5sub1_content'),
    'sec5sub1_content_ar' => $this->input->post('sec5sub1_content_ar'),
    'sec5sub2_title' => $this->input->post('sec5sub2_title'),
    'sec5sub2_title_ar' => $this->input->post('sec5sub2_title_ar'),
    'sec5sub2_content' => $this->input->post('sec5sub2_content'),
    'sec5sub2_content_ar' => $this->input->post('sec5sub2_content_ar'),
    'sec6_title' => $this->input->post('sec6_title'),
    'sec6_title_ar' => $this->input->post('sec6_title_ar'),
    'sec7_title' => $this->input->post('sec7_title'),
    'sec7_title_ar' => $this->input->post('sec7_title_ar'),
    'sec7_content1' => $this->input->post('sec7_content1'),
    'sec7_content1_ar' => $this->input->post('sec7_content1_ar'),
    'sec7_link_con' => $this->input->post('sec7_link_con'),
    'sec7_link_con_ar' => $this->input->post('sec7_link_con_ar'),

    'sec8_title' => $this->input->post('sec8_title'),
    'sec8_title_ar' => $this->input->post('sec8_title_ar'),
    'sec8_content' => $this->input->post('sec8_content'),
    'sec8_content_ar' => $this->input->post('sec8_content_ar'),

    'sec8sub1_title' => $this->input->post('sec8sub1_title'),
    'sec8sub1_title_ar' => $this->input->post('sec8sub1_title_ar'),
    'sec8sub1_content' => $this->input->post('sec8sub1_content'),
    'sec8sub1_content_ar' => $this->input->post('sec8sub1_content_ar'),

    'sec8sub2_title' => $this->input->post('sec8sub2_title'),
    'sec8sub2_title_ar' => $this->input->post('sec8sub2_title_ar'),

    'sec8sub3_title' => $this->input->post('sec8sub3_title'),
    'sec8sub3_title_ar' => $this->input->post('sec8sub3_title_ar'),

    'sec8sub4_title' => $this->input->post('sec8sub4_title'),
    'sec8sub4_title_ar' => $this->input->post('sec8sub4_title_ar'),
    'sec8sub4_content' => $this->input->post('sec8sub4_content'),
    'sec8sub4_content_ar' => $this->input->post('sec8sub4_content_ar'),

    'sec7_link' => $sec7_link,
    'sec5_img' => $sec5_img,
    'sec2_img' => $sec2_img,
    'sec2sub2_img' => $sec2sub2_img,
    'sec2sub3_img' => $sec2sub3_img,
    'sec5sub2_img' => $sec5sub2_img,
      );
    $result = $this->Admin_model->update_data('about',array('id'=>1),$data);
   $inserid =  $this->db->insert_id();
    if ($result == TRUE) {  
       $Return['result'] = 'About page updated successfully.';
    } else {
      $Return['error'] =  'Bug. Something went wrong, please try again';
    }
    $this->output($Return);
    exit;
  }

  public function edit_purpose()
  {
    $session = $this->session->userdata('userdet');
    if(empty($session)){ 
      redirect('admin');
    }
    $id = $this->uri->segment(3) ;
    $data['data'] = $this->Admin_model->get_single_data('purpose',array('id'=>$id)) ;
    $this->load->view('admin/edit_purpose', $data);          
  }

  public function update_purpose()
  {   
      $session = $this->session->userdata('userdet');
      if(empty($session)){ 
          redirect('admin');
      }
      $id = $this->input->post('id');
     $Return = array('result'=>'', 'error'=>'');

        if($this->input->post('min_content')==='') {
            $Return['error'] = "Minimum Required Required";
        }else if($this->input->post('min_content_ar')==='') {
          $Return['error'] = "Arabic Minimum Required Required";
        }else if(empty($_FILES['file']['name'])){
          $Return['error'] = "Pdf Required ";
        }
            
        if($Return['error']!=''){
              $this->output($Return);
               exit ;
          }
        $data = array(   
        'min_content' => $this->input->post('min_content'),
        'min_content_ar' => $this->input->post('min_content_ar'),
        'content' => $this->input->post('content'),
        'content_ar' => $this->input->post('content_ar'),
          );
      //  $result = $this->Admin_model->insert_data('supp_org', $data);
        $result = $this->Admin_model->update_data('purpose',array('id'=>$id),$data);
        $inserid =  $this->db->insert_id();

        if ($result == TRUE) {
           $Return['result'] = 'Purpose updated successfully.';
          
        } else {
          $Return['error'] =  'Bug. Something went wrong, please try again';
        }
        $this->output($Return);
        exit;
  }

  public function academic_year()
  {
   $session = $this->session->userdata('userdet');
    if(empty($session)){ 
      redirect('admin');
    }
    $data['data'] = $this->Admin_model->get_all_data('annual_year'); 
    $this->load->view('admin/academic_year', $data); 
  }

  public function new_ac_year()
  {
   $session = $this->session->userdata('userdet');
    if(empty($session)){ 
      redirect('admin');
    }
    $this->load->view('admin/add_ac_year');
  }

    public function add_ac_year()
  {   
     $session = $this->session->userdata('userdet');
    if(empty($session)){ 
      redirect('admin');
    }
    $Return = array('result'=>'', 'error'=>'');
        
      if($this->input->post('name')==='') {
            $Return['error'] = "Title Required";
      }else if($this->input->post('name_ar')==='') {
        $Return['error'] = "Arabic Title Required";
      }       
      if($Return['error']!=''){
            $this->output($Return);
            exit ;
        }
      $data = array(   
      'name' => $this->input->post('name'),
      'name_ar' => $this->input->post('name_ar')
        );
      $result = $this->db->insert('annual_year',$data);
      $inserid =  $this->db->insert_id();

      if ($result == TRUE) {
        $Return['result'] = 'Annual Year added successfully.';
      } else {
        $Return['error'] =  'Bug. Something went wrong, please try again';
      }
      $this->output($Return);
      exit;
  }

  public function edit_ac_year()
  {
        $session = $this->session->userdata('userdet');
            if(empty($session)){ 
              redirect('admin');
            }
         $id = $this->uri->segment(3) ;
         $data['data'] = $this->Admin_model->get_single_data('annual_year',array('id'=>$id)) ;
        $this->load->view('admin/edit_ac_year', $data);
  }

  public function update_ac_yea()
  {   
      $session = $this->session->userdata('userdet');
      if(empty($session)){ 
          redirect('admin');
      }
        $id = $this->input->post('id');
       $Return = array('result'=>'', 'error'=>'');

       if($this->input->post('name')==='') {
        $Return['error'] = "Title Required";
      }else if($this->input->post('name_ar')==='') {
        $Return['error'] = "Arabic Title Required";
      } 
            
        if($Return['error']!=''){
              $this->output($Return);
               exit ;
          }

        $data = array(   
          'name' => $this->input->post('name'),
          'name_ar' => $this->input->post('name_ar')
          );
        $result = $this->Admin_model->update_data('annual_year',array('id'=>$id),$data);
        $inserid =  $this->db->insert_id();
        if ($result == TRUE) {
           $Return['result'] = 'Annual Year updated successfully.';
          
        } else {
          $Return['error'] =  'Bug. Something went wrong, please try again';
        }
        $this->output($Return);
        exit;
  }

  public function academic_report()
  {
   $session = $this->session->userdata('userdet');
    if(empty($session)){ 
      redirect('admin');
    }
    $data['data'] = $this->Admin_model->get_all_data('annual_report'); 
    $this->load->view('admin/annual_report', $data); 
  }

  public function new_ac_report()
  {
   $session = $this->session->userdata('userdet');
    if(empty($session)){ 
      redirect('admin');
    }
    $data['data'] = $this->Admin_model->get_all_data('annual_year'); 
    $this->load->view('admin/add_ac_report',$data);
  }

  public function add_ac_report()
  {   
     $session = $this->session->userdata('userdet');
    if(empty($session)){ 
      redirect('admin');
    }
    $Return = array('result'=>'', 'error'=>'');
        
      if($this->input->post('name')==='') {
            $Return['error'] = "Title Required";
      }else if($this->input->post('name_ar')==='') {
        $Return['error'] = "Arabic Title Required";
      }else if($this->input->post('year_id')==='') {
        $Return['error'] = "Academic Year Required";
      }       
      if($Return['error']!=''){
            $this->output($Return);
            exit ;
        }
        if(is_uploaded_file($_FILES['file']['tmp_name'])) {
          $allowed =  array('pdf','PDF');
          $filename = $_FILES['file']['name'];
          $ext = pathinfo($filename, PATHINFO_EXTENSION);
          if(in_array($ext,$allowed)){
            $tmp_name = $_FILES["file"]["tmp_name"];
            $profile = "uploads/images/about/";
            $name = basename($_FILES["file"]["name"]);
            $newfilename = $name ;
            move_uploaded_file($tmp_name, $profile.$newfilename);
            $pdf  = $newfilename;
      }else {
            $Return['error'] = "Invalid file format";
          }
        if($Return['error']!=''){
          $this->output($Return);
        }
      }
      $data = array(   
      'name' => $this->input->post('name'),
      'name_ar' => $this->input->post('name_ar'),
      'year_id' => $this->input->post('year_id'),
      'file' => $pdf
        );
      $result = $this->db->insert('annual_report',$data);
      $inserid =  $this->db->insert_id();

      if ($result == TRUE) {
        $Return['result'] = 'Annual Report added successfully.';
      } else {
        $Return['error'] =  'Bug. Something went wrong, please try again';
      }
      $this->output($Return);
      exit;
  }

  public function edit_ac_report()
  {
    $session = $this->session->userdata('userdet');
            if(empty($session)){ 
              redirect('admin');
            }
         $id = $this->uri->segment(3) ;
         $data['data'] = $this->Admin_model->get_single_data('annual_report',array('id'=>$id)) ;
         $data['year'] = $this->Admin_model->get_all_data('annual_year'); 
        $this->load->view('admin/edit_ac_report', $data);
  }

  public function update_ac_report()
  {   
      $session = $this->session->userdata('userdet');
      if(empty($session)){ 
          redirect('admin');
      }
        $id = $this->input->post('id');
       $Return = array('result'=>'', 'error'=>'');
       $pdf =  $this->input->post('old_file');

       if($this->input->post('name')==='') {
        $Return['error'] = "Title Required";
      }else if($this->input->post('name_ar')==='') {
        $Return['error'] = "Arabic Title Required";
      }else if($this->input->post('year_id')==='') {
        $Return['error'] = "Academic Year Required";
      } 
            
        if($Return['error']!=''){
              $this->output($Return);
               exit ;
          }

          if(is_uploaded_file($_FILES['file']['tmp_name'])) {
            $allowed =  array('pdf','PDF');
            $filename = $_FILES['file']['name'];
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            if(in_array($ext,$allowed)){
              $tmp_name = $_FILES["file"]["tmp_name"];
              $profile = "uploads/images/about/";
              $name = basename($_FILES["file"]["name"]);
              $newfilename = $name ;
              move_uploaded_file($tmp_name, $profile.$newfilename);
              $pdf  = $newfilename;
        }else {
              $Return['error'] = "Invalid file format";
            }
          if($Return['error']!=''){
            $this->output($Return);
          }
        }

        $data = array(   
          'name' => $this->input->post('name'),
          'name_ar' => $this->input->post('name_ar'),
          'year_id' => $this->input->post('year_id'),
          'file' => $pdf    
          );
        $result = $this->Admin_model->update_data('annual_report',array('id'=>$id),$data);
        $inserid =  $this->db->insert_id();
        if ($result == TRUE) {
           $Return['result'] = 'Annual Report updated successfully.';
          
        } else {
          $Return['error'] =  'Bug. Something went wrong, please try again';
        }
        $this->output($Return);
        exit;
  }

  public function financial_report()
  {
    $session = $this->session->userdata('userdet');
    if(empty($session)){ 
      redirect('admin');
    }
    $data['data'] = $this->Admin_model->get_all_data('financial_report'); 
    $this->load->view('admin/financial_report', $data); 
  }

  public function new_fn_report()
  {
    $session = $this->session->userdata('userdet');
    if(empty($session)){ 
      redirect('admin');
    }
    $this->load->view('admin/add_fn_report');
  }

  public function add_fn_report()
  {   
     $session = $this->session->userdata('userdet');
    if(empty($session)){ 
      redirect('admin');
    }
    $Return = array('result'=>'', 'error'=>'');
        
      if($this->input->post('name')==='') {
            $Return['error'] = "Title Required";
      }else if($this->input->post('name_ar')==='') {
        $Return['error'] = "Arabic Title Required";
      }else if($this->input->post('year_id')==='') {
        $Return['error'] = "Finanial Year Required";
      }       
      if($Return['error']!=''){
            $this->output($Return);
            exit ;
        }
        if(is_uploaded_file($_FILES['file']['tmp_name'])) {
          $allowed =  array('pdf','PDF');
          $filename = $_FILES['file']['name'];
          $ext = pathinfo($filename, PATHINFO_EXTENSION);
          if(in_array($ext,$allowed)){
            $tmp_name = $_FILES["file"]["tmp_name"];
            $profile = "uploads/images/about/";
            $name = basename($_FILES["file"]["name"]);
            $newfilename = $name ;
            move_uploaded_file($tmp_name, $profile.$newfilename);
            $pdf  = $newfilename;
      }else {
            $Return['error'] = "Invalid file format";
          }
        if($Return['error']!=''){
          $this->output($Return);
        }
      }
      $data = array(   
      'name' => $this->input->post('name'),
      'name_ar' => $this->input->post('name_ar'),
      'year_id' => $this->input->post('year_id'),
      'file' => $pdf
        );
      $result = $this->db->insert('financial_report',$data);
      $inserid =  $this->db->insert_id();

      if ($result == TRUE) {
        $Return['result'] = 'Annual Report added successfully.';
      } else {
        $Return['error'] =  'Bug. Something went wrong, please try again';
      }
      $this->output($Return);
      exit;
  }

  public function edit_fn_report()
  {
    $session = $this->session->userdata('userdet');
            if(empty($session)){ 
              redirect('admin');
            }
         $id = $this->uri->segment(3) ;
         $data['data'] = $this->Admin_model->get_single_data('financial_report',array('id'=>$id)) ;
        $this->load->view('admin/edit_fn_report', $data);
  }

  public function update_fn_report()
  {   
      $session = $this->session->userdata('userdet');
      if(empty($session)){ 
          redirect('admin');
      }
        $id = $this->input->post('id');
       $Return = array('result'=>'', 'error'=>'');
       $pdf =  $this->input->post('old_file');

       if($this->input->post('name')==='') {
        $Return['error'] = "Title Required";
      }else if($this->input->post('name_ar')==='') {
        $Return['error'] = "Arabic Title Required";
      }else if($this->input->post('year_id')==='') {
        $Return['error'] = "Finanial Year Required";
      } 
            
        if($Return['error']!=''){
              $this->output($Return);
               exit ;
          }

          if(is_uploaded_file($_FILES['file']['tmp_name'])) {
            $allowed =  array('pdf','PDF');
            $filename = $_FILES['file']['name'];
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            if(in_array($ext,$allowed)){
              $tmp_name = $_FILES["file"]["tmp_name"];
              $profile = "uploads/images/about/";
              $name = basename($_FILES["file"]["name"]);
              $newfilename = $name ;
              move_uploaded_file($tmp_name, $profile.$newfilename);
              $pdf  = $newfilename;
        }else {
              $Return['error'] = "Invalid file format";
            }
          if($Return['error']!=''){
            $this->output($Return);
          }
        }

        $data = array(   
          'name' => $this->input->post('name'),
          'name_ar' => $this->input->post('name_ar'),
          'year_id' => $this->input->post('year_id'),
          'file' => $pdf    
          );
        $result = $this->Admin_model->update_data('financial_report',array('id'=>$id),$data);
        $inserid =  $this->db->insert_id();
        if ($result == TRUE) {
           $Return['result'] = 'Financial Report updated successfully.';
          
        } else {
          $Return['error'] =  'Bug. Something went wrong, please try again';
        }
        $this->output($Return);
        exit;
  }

  public function logout() {
    $session = $this->session->userdata('userdet'); 
    $sess_array = array('userdet' => '');
    $this->session->sess_destroy();
    $Return['result'] = 'Successfully Logout.';
    redirect(base_url().'admin', 'refresh');
  }

  
  public function new_news()
  {
    $session = $this->session->userdata('userdet');
    if(empty($session)){ 
      redirect('admin');
    }
    $this->load->view('admin/add_news');
  }

  public function add_news()
  {   
     $session = $this->session->userdata('userdet');
    if(empty($session)){ 
      redirect('admin');
    }
    $id = $this->input->post('id');
    $Return = array('result'=>'', 'error'=>''); 
    /* Server side PHP input validation */    
     if(empty($_FILES['image']['name']) ){
      $Return['error'] = "Image Required ";
      }else if($this->input->post('title')===''){
      $Return['error'] = "Title Required ";
      }else if($this->input->post('title_ar')===''){
      $Return['error'] = "Arabic Title Required ";
      }else if($this->input->post('min_content')===''){
      $Return['error'] = "Title Content Required ";
      }else if($this->input->post('min_content_ar')===''){
      $Return['error'] = "Arabic Title Content Required ";
      }else if($this->input->post('content')===''){
      $Return['error'] = "Link Required ";
      }else if($this->input->post('st_date')==='' || $this->input->post('en_date')==='' ){
        $Return['error'] = "Blog Start and End Date Required ";
      }
      // else if($this->input->post('content_ar')===''){
      // $Return['error'] = "Arabic content Required ";
      // }
       if($Return['error']!=''){
          $this->output($Return);
           exit ;
      }
    if(is_uploaded_file($_FILES['image']['tmp_name'])) {
    $allowed =  array('png','jpg','jpeg','pdf','gif','PNG','JPG','JPEG','PDF','GIF','svg','webp');
    $filename = $_FILES['image']['name'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    if(in_array($ext,$allowed)){
      $tmp_name = $_FILES["image"]["tmp_name"];
      $profile = "uploads/images/blogs/";
      $name = basename($_FILES["image"]["name"]);
      $newfilename = $name ;
      move_uploaded_file($tmp_name, $profile.$newfilename);
      $image  = $newfilename;
      }else {
            $Return['error'] = "Invalid file format";
          }
        if($Return['error']!=''){
          $this->output($Return);
        }
      }

   
        $date = $this->input->post('st_date');
        $day = date('D, F, d', strtotime($date));
     
      

    $data = array(   
    'title' => $this->input->post('title'),
    'title_ar' => $this->input->post('title_ar'),
    'min_content' => $this->input->post('min_content'),
    'min_content_ar' => $this->input->post('min_content_ar'),  
    'content' => $this->input->post('content'),
    'content_ar' =>"",     
    'img' => $image,
    'date' => $day,
    'st_date' => $this->input->post('st_date'),
    'en_date' => $this->input->post('en_date'),
    'created_by' => $session['username']
    );
    $result = $this->db->insert('latest_news',$data);
     $inserid =  $this->db->insert_id();
    if ($result == TRUE) {
       $Return['result'] = 'Latest News Added successfully.';
    } else {
      $Return['error'] =  'Bug. Something went wrong, please try again';
    }
    $this->output($Return);
    exit;
  }

  public function gallery_type()
  {
    $session = $this->session->userdata('userdet');
    if(empty($session)){ 
      redirect('admin');
    }
    $data['data'] = $this->Admin_model->get_all_data('gallery_type'); 
    $this->load->view('admin/gallerytype', $data); 
  }

  public function new_gallertype()
  {
    $session = $this->session->userdata('userdet');
    if(empty($session)){ 
      redirect('admin');
    }
    $this->load->view('admin/new_gallertype');
  }

  public function add_gallery_type()
  {   
     $session = $this->session->userdata('userdet');
    if(empty($session)){ 
      redirect('admin');
    }
    $Return = array('result'=>'', 'error'=>'');
        
      if($this->input->post('name')==='') {
            $Return['error'] = "Title Required";
      }else if($this->input->post('name_ar')==='') {
        $Return['error'] = "Arabic Title Required";
      }       
      if($Return['error']!=''){
            $this->output($Return);
            exit ;
        }
      $data = array(   
      'type' => $this->input->post('name'),
      'type_ar' => $this->input->post('name_ar')
        );
      $result = $this->db->insert('gallery_type',$data);
      $inserid =  $this->db->insert_id();

      if ($result == TRUE) {
        $Return['result'] = 'Annual Year added successfully.';
      } else {
        $Return['error'] =  'Bug. Something went wrong, please try again';
      }
      $this->output($Return);
      exit;
  }

  public function edit_gallery_type()
  {
        $session = $this->session->userdata('userdet');
            if(empty($session)){ 
              redirect('admin');
            }
         $id = $this->uri->segment(3) ;
         $data['data'] = $this->Admin_model->get_single_data('gallery_type',array('id'=>$id)) ;
        $this->load->view('admin/edit_gallery_type', $data);
  }

  public function update_gallery_type()
  {   
      $session = $this->session->userdata('userdet');
      if(empty($session)){ 
          redirect('admin');
      }
        $id = $this->input->post('id');
       $Return = array('result'=>'', 'error'=>'');

       if($this->input->post('name')==='') {
        $Return['error'] = "Title Required";
      }else if($this->input->post('name_ar')==='') {
        $Return['error'] = "Arabic Title Required";
      } 
            
        if($Return['error']!=''){
              $this->output($Return);
               exit ;
          }

        $data = array(   
          'type' => $this->input->post('name'),
          'type_ar' => $this->input->post('name_ar')
          );
        $result = $this->Admin_model->update_data('gallery_type',array('id'=>$id),$data);
        $inserid =  $this->db->insert_id();
        if ($result == TRUE) {
           $Return['result'] = 'Annual Year updated successfully.';
          
        } else {
          $Return['error'] =  'Bug. Something went wrong, please try again';
        }
        $this->output($Return);
        exit;
  }

  public function delete_gallerytype()
  {  
   $session = $this->session->userdata('userdet');
    if(empty($session)){ 
      redirect('admin');
    } 
    $id = $this->input->post('id');
    $table = $this->input->post('table');
    $this->Admin_model->delete_data("gallery",array('type'=>$id)); 
    $this->Admin_model->delete_data($table,array('id'=>$id)); 
    return $id ; 
  }

}
