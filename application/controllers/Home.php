<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_Controller {

         public function __construct() { 
        parent::__construct();
              
              // Load the admin model
              $this->load->model('Admin_model'); 
       }

       public function output($Return=array()){
        /*Set response header*/
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET, OPTIONS");
        header("Content-Type: application/json; charset=UTF-8");
        /*Final JSON response*/
        exit(json_encode($Return));
      }
    
       public function index()
      {  
		  
		  $session = $this->session->userdata('lang');
    if(empty($session)){ 
    $this->session->set_userdata('lang', 'ar');
    $this->session->set_userdata('dir', 'rtl');
	}
                $data['menu'] = $this->Admin_model->get_single_data('top_header',array('id'=>'1')) ;
                $data['link'] = $this->Admin_model->get_all_data('related_link') ;
                $data['address'] = $this->Admin_model->get_all_data('address') ;    
                $data['contact'] = $this->Admin_model->get_single_data('contact',array('id'=>'1')) ;

                $data['home'] = $this->Admin_model->get_single_data('home_page',array('id'=>1)) ;
                $data['products'] = $this->db->query("SELECT * FROM products Where status='Y' limit 3")->result_array() ;
                $data['banner'] = $this->Admin_model->get_single_data('banner_images',array('type'=>'menu1')) ;  
                $data['feature'] = $this->Admin_model->get_all_data('product_feature') ;         
                $data['news'] = $this->Admin_model->get_all_data('latest_news',array('en_date >='=>date('Y-m-d'),'st_date <='=>date('Y-m-d'))) ;                     

    
			    $this->load->view('home/index',$data);
      }
      
      public function about()
      {   
             $data['menu'] = $this->Admin_model->get_single_data('top_header',array('id'=>'1')) ;
             $data['link'] = $this->Admin_model->get_all_data('related_link') ;
             $data['address'] = $this->Admin_model->get_all_data('address') ;    
             $data['contact'] = $this->Admin_model->get_single_data('contact',array('id'=>'1')) ;

              $data['about'] = $this->Admin_model->get_single_data('about',array('id'=>1)) ;
              $data['purpose'] = $this->Admin_model->get_all_data('purpose') ;
              $data['banner'] = $this->Admin_model->get_single_data('banner_images',array('type'=>'menu7')) ;  
              $data['annual_year'] = $this->Admin_model->get_all_data('annual_year','','id desc') ;
              $data['financial_year'] = $this->db->query("SELECT year_id FROM financial_report group by year_id order by year_id desc")->result_array() ;
              $data['banner'] = $this->Admin_model->get_single_data('banner_images',array('type'=>'menu2')) ;  
              $this->load->view('home/about',$data);
      }
      
      public function career()
      {   
                $data['menu'] = $this->Admin_model->get_single_data('top_header',array('id'=>'1')) ;
                $data['link'] = $this->Admin_model->get_all_data('related_link') ;
                $data['address'] = $this->Admin_model->get_all_data('address') ;    
                $data['contact'] = $this->Admin_model->get_single_data('contact',array('id'=>'1')) ;

              $data['career'] = $this->Admin_model->get_single_data('career',array('id'=>1)) ;
              $data['banner'] = $this->Admin_model->get_single_data('banner_images',array('type'=>'menu7')) ;  
              $this->load->view('home/career',$data);
      }

      public function add_career_old()
      {
            $newfilename = "";
            if(is_uploaded_file($_FILES['file']['tmp_name'])) {
            $allowed =  array('png','jpg','jpeg','pdf','gif','svg','doc', 'docx');
            $filename = $_FILES['file']['name'];
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            if(in_array($ext,$allowed)){
              $tmp_name = $_FILES["file"]["tmp_name"];
              $profile = "upload/files/";
              $set_img = base_url()."upload/files/";
             
              $name = basename($_FILES["file"]["name"]);
              $newfilename = 'profile_'.round(microtime(true)).'.'.$ext;
              move_uploaded_file($tmp_name, $profile.$newfilename);
              // $fname = $newfilename;
              // $data["file"]=$fname;
                }
              }
    
            $data =array
            (
              'profile'=>$newfilename,
              'name' => $this->input->post('form_field2'),
              'father_name' => $this->input->post('form_field3'),
              'grandfather_name' => $this->input->post('form_field4'),
              'family_name' => $this->input->post('form_field5'),
              'flat' => $this->input->post('form_field6'),
              'road' => $this->input->post('form_field7'),
              'block' => $this->input->post('form_field8'),
              'area' => $this->input->post('form_field9'),
              'nationality' => $this->input->post('form_field10'),
              'cpr_no' => $this->input->post('form_field11'),
              'sex' => $this->input->post('form_field12'),
              'marital_status' => $this->input->post('form_field13'),
              'dob' => $this->input->post('form_field14'),
              'last_education_qualification' => $this->input->post('form_field15'),
              'speciality' => $this->input->post('form_field16'),
              'email' => $this->input->post('form_field17'),
              'telephone_no1' => $this->input->post('form_field18'),
              'telephone_no2' => $this->input->post('form_field19'),
              'telephone_no3' => $this->input->post('form_field20'),
              'relative_fp_name' => $this->input->post('form_field21'),
              'relative_fp_job' => $this->input->post('form_field22'),
              'relative_fp_relationship' => $this->input->post('form_field23'),
              'relative_fp_telephone_no' => $this->input->post('form_field24'),
              'relative_sp_name' => $this->input->post('form_field25'),
              'relative_sp_job' => $this->input->post('form_field26'),
              'rlelative_sp_relationship' => $this->input->post('form_field27'),
              'relative_sp_telephone_no' => $this->input->post('form_field28'),
              'do_you_have_relative_person_in_the_company' => $this->input->post('form_field29'),
              'do_you_have_driving_licence' => $this->input->post('form_field30'),
              'do_you_suffer_from_chronic_diseace' => $this->input->post('form_field31'),
              'do_you_suffer_from_any_disability' => $this->input->post('form_field32'),
              'do_you_work_in_current_time' => $this->input->post('form_field33'),
              'do_accept_to_work_additional_time_&_shift_time' => $this->input->post('form_field34'),
              'requirement_job' => $this->input->post('form_field35'),
              'expected_salary' => $this->input->post('form_field36'),
              'work_exp_c1_name' => $this->input->post('form_field37'),
              'work_exp_c1_job' => $this->input->post('form_field38'),
              'work_exp_c1_from' => $this->input->post('form_field39'),
              'work_exp_c1_to' => $this->input->post('form_field40'),
              'work_exp_c1_reason_of_leaving' => $this->input->post('form_field41'),
              'work_exp_c2_name' => $this->input->post('form_field42'),
              'work_exp_c2_job' => $this->input->post('form_field43'),
              'work_exp_c2_from' => $this->input->post('form_field44'),
              'work_exp_c2_to' => $this->input->post('form_field45'),
              'work_exp_c2_reason_of_leaving' => $this->input->post('form_field46'),
              'work_exp_c3_name' => $this->input->post('form_field47'),
              'work_exp_c3_job' => $this->input->post('form_field48'),
              'work_exp_c3_from' => $this->input->post('form_field49'),
              'work_exp_c3_to' => $this->input->post('form_field50'),
              'work_exp_c3_reason_of_leaving' => $this->input->post('form_field51'),
             

              
            );    
            $result = $this->db->insert('career_requests',$data);
       if($result == TRUE )
        {
              $output['status'] = 'SUCCESS';
              $output['message'] = 'Contact mail has been sent.';
        }
        else
        {
              $output['status'] = 'ERR';
              $output['message'] = 'Problem in saving. Please try again.';        
        }
         echo json_encode($output);      
      }
      
      public function contact()
      {   
                $data['menu'] = $this->Admin_model->get_single_data('top_header',array('id'=>'1')) ;
                $data['link'] = $this->Admin_model->get_all_data('related_link') ;
                $data['address'] = $this->Admin_model->get_all_data('address') ;    

              $data['contact'] = $this->Admin_model->get_single_data('contact',array('id'=>1)) ;
              $data['banner'] = $this->Admin_model->get_single_data('banner_images',array('type'=>'menu8')) ;
              $data['address'] = $this->Admin_model->get_all_data('address') ;
              $this->load->view('home/contact',$data);
      }

       public function privacy_policy()
      {   
          $data['contact'] = $this->Admin_model->get_single_data('contact',array('id'=>1)) ;
           
                $data['menu'] = $this->Admin_model->get_single_data('top_header',array('id'=>'1')) ;
                $data['link'] = $this->Admin_model->get_all_data('related_link') ;
                $data['address'] = $this->Admin_model->get_all_data('address') ;    

              $data['privacy_policy'] = $this->Admin_model->get_single_data('privacy_policy',array('id'=>1)) ;
              $data['banner'] = $this->Admin_model->get_single_data('banner_images',array('type'=>'menu9')) ;
              $this->load->view('home/privacy_policy',$data);
      }

      public function add_contact()
      {
       
       $data =array
       (
         'name'=>$this->input->post('name'),
         'email' => $this->input->post('email'),
         'subject' => $this->input->post('subject'),
         'message' => $this->input->post('message'),

       );
       $result = $this->db->insert('contact_messages',$data);
         $subject = 'Website Notification : Contact Form Submission From ' . $this->input->post('email');

        $adminBody = '<html><body>';
        $adminBody .= '<table rules="all" style="border:1px solid #666;" cellpadding="10">';
        $adminBody .= "<tr><td><strong>First Name:</strong> </td><td>" . strip_tags($this->input->post('name')) . "</td></tr>";
        $adminBody .= "<tr><td><strong>Email:</strong> </td><td>" . strip_tags($this->input->post('email')) . "</td></tr>";
        $adminBody .= "<tr><td><strong>Subject:</strong> </td><td>" . strip_tags($this->input->post('subject')) . "</td></tr>";
        $adminBody .= "<tr><td><strong>Message:</strong> </td><td>" . strip_tags($this->input->post('message')) . "</td></tr>";

        $adminBody .= "</table>";
        $adminBody .= "</body></html>";
        
        $to = $this->input->post('email');
        $this->sendemail($to, $subject, $adminBody);
       if($result == TRUE )
        {
              $output['status'] = 'SUCCESS';
              $output['message'] = 'Contact mail has been sent.';
        }
        else
        {
              $output['status'] = 'ERR';
              $output['message'] = 'Problem in saving. Please try again.';        
        }
         echo json_encode($output);      
       }
      
      public function footer()
      {   
             $this->load->view('home/footer');
      }
      
      public function header()
      {      
             $this->load->view('home/header',$data);
      }
       public function page404()
      {      
             $this->load->view('home/404');
      }
      public function gallery()
      {   
		   $session = $this->session->userdata('lang');
    if(empty($session)){ 
    $this->session->set_userdata('lang', 'en');
    $this->session->set_userdata('dir', 'ltr');
	}
            
                $data['menu'] = $this->Admin_model->get_single_data('top_header',array('id'=>'1')) ;
                $data['link'] = $this->Admin_model->get_all_data('related_link') ;
                $data['address'] = $this->Admin_model->get_all_data('address') ;    
                $data['contact'] = $this->Admin_model->get_single_data('contact',array('id'=>'1')) ;

              $data['gallery_type'] = $this->Admin_model->get_all_data('gallery_type') ;
              $data['gallery'] = $this->Admin_model->get_all_data('gallery',array('status'=>'Y')) ;
              $data['banner'] = $this->Admin_model->get_single_data('banner_images',array('type'=>'menu6')) ;  
              $this->load->view('home/gallery', $data);
      }    

      public function management()
      {   
                $data['menu'] = $this->Admin_model->get_single_data('top_header',array('id'=>'1')) ;
                $data['link'] = $this->Admin_model->get_all_data('related_link') ;
                $data['address'] = $this->Admin_model->get_all_data('address') ;    
                $data['contact'] = $this->Admin_model->get_single_data('contact',array('id'=>'1')) ;

              $data['banner'] = $this->Admin_model->get_single_data('banner_images',array('type'=>'menu3')) ;  
              $data['type'] = $this->Admin_model->get_all_data('committee_type'); 
              $data['management'] = $this->Admin_model->get_all_data('management',array('status'=>'Y')); 
              $this->load->view('home/management',$data);
      }  

      public function product()
      { 
                $data['menu'] = $this->Admin_model->get_single_data('top_header',array('id'=>'1')) ;
                $data['link'] = $this->Admin_model->get_all_data('related_link') ;
                $data['address'] = $this->Admin_model->get_all_data('address') ;    
                $data['contact'] = $this->Admin_model->get_single_data('contact',array('id'=>'1')) ;

              $data['banner'] = $this->Admin_model->get_single_data('banner_images',array('type'=>'menu4')) ;  
              $data['products'] = $this->Admin_model->get_all_data('products',array('status'=>'Y')); 
              $this->load->view('home/product',$data);
      }

      public function services()
      {   
                $data['menu'] = $this->Admin_model->get_single_data('top_header',array('id'=>'1')) ;
                $data['link'] = $this->Admin_model->get_all_data('related_link') ;
                $data['address'] = $this->Admin_model->get_all_data('address') ;    
                $data['contact'] = $this->Admin_model->get_single_data('contact',array('id'=>'1')) ;

              $data['banner'] = $this->Admin_model->get_single_data('banner_images',array('type'=>'menu5')) ;  
              $data['services'] = $this->Admin_model->get_all_data('services',array('status'=>'Y')); 
              $this->load->view('home/services',$data);
      }

	function tf_convert_base64_to_image( $base64_code, $path, $image_name = null ) {
     
        if ( !empty($base64_code) && !empty($path) ) :
     
            // split the string to get extension and remove not required part
            // $string_pieces[0] = to get image extension
            // $string_pieces[1] = actual string to convert into image
            $string_pieces = explode( ";base64,", $base64_code);
     
            /*@ Get type of image ex. png, jpg, etc. */
            // $image_type[1] will return type
            $image_type_pieces = explode( "image/", $string_pieces[0] );
     
            $image_type = $image_type_pieces[1];
     
            /*@ Create full path with image name and extension */
            $store_at = $path.md5(uniqid()).'.'.$image_type;
     
            /*@ If image name available then use that  */
            if ( !empty($image_name) ) :
                $store_at = $path.$image_name.'.'.$image_type;
            endif;
     
            $decoded_string = base64_decode( $string_pieces[1] );
     
            file_put_contents( $store_at, $decoded_string );
     
        endif;
     
    }

       public function add_career()
      {
                $dataimg = $this->input->post('pro_file');
                $newfilename = 'profile_'.round(microtime(true)).'.png';
                $filename =  $this->tf_convert_base64_to_image( $dataimg, 'uploads/images/files/', $newfilename );  
          
		  $dataimg = "";
                $newfilename = "";
                if(is_uploaded_file($_FILES['file']['tmp_name'])) {
                $allowed =  array('png','jpg','jpeg','pdf','gif','svg','doc', 'docx');
                $filename = $_FILES['file']['name'];
                $ext = pathinfo($filename, PATHINFO_EXTENSION);
                if(in_array($ext,$allowed)){
                  $tmp_name = $_FILES["file"]["tmp_name"];
                  $profile = "uploads/images/files/";
                  $set_img = base_url()."uploads/images/files/";
                 
                  $name = basename($_FILES["file"]["name"]);
                  $newfilename = 'profile_'.round(microtime(true)).'.'.$ext;
                  move_uploaded_file($tmp_name, $profile.$newfilename);
                   $fname = $newfilename;
                   $data["file"]=$fname;
                    }
                  }

		    $data =array
            (
              'profile'=>$newfilename,
              'profile_link'=>$dataimg,
              'name' => $this->input->post('form_field2'),
              'father_name' => $this->input->post('form_field3'),
              'grandfather_name' => $this->input->post('form_field4'),
              'family_name' => $this->input->post('form_field5'),
              'flat' => $this->input->post('form_field6'),
              'road' => $this->input->post('form_field7'),
              'block' => $this->input->post('form_field8'),
              'area' => $this->input->post('form_field9'),
              'nationality' => $this->input->post('form_field10'),
              'cpr_no' => $this->input->post('form_field11'),
              'sex' => $this->input->post('form_field12'),
              'marital_status' => $this->input->post('form_field13'),
              'dob' => $this->input->post('form_field14'),
              'last_education_qualification' => $this->input->post('form_field15'),
              'speciality' => $this->input->post('form_field16'),
              'email' => $this->input->post('form_field17'),
              'telephone_no1' => $this->input->post('form_field18'),
              'telephone_no2' => $this->input->post('form_field19'),
              'telephone_no3' => $this->input->post('form_field20'),
              'relative_fp_name' => $this->input->post('form_field21'),
              'relative_fp_job' => $this->input->post('form_field22'),
              'relative_fp_relationship' => $this->input->post('form_field23'),
              'relative_fp_telephone_no' => $this->input->post('form_field24'),
              'relative_sp_name' => $this->input->post('form_field25'),
              'relative_sp_job' => $this->input->post('form_field26'),
              'rlelative_sp_relationship' => $this->input->post('form_field27'),
              'relative_sp_telephone_no' => $this->input->post('form_field28'),
              'do_you_have_relative_person_in_the_company' => $this->input->post('form_field29'),
              'do_you_have_driving_licence' => $this->input->post('form_field30'),
              'do_you_suffer_from_chronic_diseace' => $this->input->post('form_field31'),
              'do_you_suffer_from_any_disability' => $this->input->post('form_field32'),
              'do_you_work_in_current_time' => $this->input->post('form_field33'),
              'do_accept_to_work_additional_time_shift_time' => $this->input->post('form_field34'),
              'requirement_job' => $this->input->post('form_field35'),
              'expected_salary' => $this->input->post('form_field36'),
              'work_exp_c1_name' => $this->input->post('form_field37'),
              'work_exp_c1_job' => $this->input->post('form_field38'),
              'work_exp_c1_from' => $this->input->post('form_field39'),
              'work_exp_c1_to' => $this->input->post('form_field40'),
              'work_exp_c1_reason_of_leaving' => $this->input->post('form_field41'),
              'work_exp_c2_name' => $this->input->post('form_field42'),
              'work_exp_c2_job' => $this->input->post('form_field43'),
              'work_exp_c2_from' => $this->input->post('form_field44'),
              'work_exp_c2_to' => $this->input->post('form_field45'),
              'work_exp_c2_reason_of_leaving' => $this->input->post('form_field46'),
              'work_exp_c3_name' => $this->input->post('form_field47'),
              'work_exp_c3_job' => $this->input->post('form_field48'),
              'work_exp_c3_from' => $this->input->post('form_field49'),
              'work_exp_c3_to' => $this->input->post('form_field50'),
              'work_exp_c3_reason_of_leaving' => $this->input->post('form_field51'),
             

              
            );    
            $result = $this->db->insert('career_requests',$data);
       if($result == TRUE )
        {
              $output['status'] = 'SUCCESS';
              $output['message'] = 'Career Details saved successfully.';
        }
        else
        {
              $output['status'] = 'ERR';
              $output['message'] = 'Problem in saving. Please try again.';        
        }
         echo json_encode($output);      
      }


  function sendemail($to, $subject, $message)
  {
    /* Load PHPMailer library */

    $this->load->library("phpmailer_library");
    $mail = $this->phpmailer_library->load();

    /* SMTP configuration */
    $mail->isSMTP();
    $mail->Priority = 1;
    // MS Outlook custom header
    // May set to "Urgent" or "Highest" rather than "High"
    $mail->AddCustomHeader("X-MSMail-Priority: High");
    // Not sure if Priority will also set the Importance header:
    $mail->AddCustomHeader("Importance: High");

   $mail->Host     = 'smtp.gmail.com';
   $mail->SMTPAuth = true;
   $mail->Username = 'dawajenbahrain@gmail.com';
   $mail->Password = 'sxhwrjleeqqerjxu';
   $mail->SMTPSecure = 'ssl';
   $mail->Port     = 465;

    $mail->setFrom('dawajenbahrain@gmail.com', 'Delmon');
    $mail->addReplyTo($to, $subject);

    /* Add a recipient */
    $mail->addAddress('info@dawajen.bh');


    /* Email subject */
    $mail->Subject = $subject;

    /* Set email format to HTML */
    $mail->isHTML(true);

    /* Email body content */
    $mailContent = $message;
    $mail->Body = $mailContent;

    /* Send email */
    if (!$mail->send()) {
      echo 'Mail could not be sent.';
      echo 'Mailer Error: ' . $mail->ErrorInfo;
    }
  }

}
