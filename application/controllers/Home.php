<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
	{
	 	parent::__construct();
        $this->load->model('student_model');
	}
	public function index()
	{
        $data['title']='Home'.title_tag; 
        $data['menu']=1; 
        $data['language']=$this->common_model->__fetch_contents1('language',array('removed'=>0));
        $data['students']=$this->common_model->__fetch_contents1('student',array('removed'=>0));
        if($data['students']!=false){
            foreach($data['students'] as $key=>$val){
                $data['students'][$key]['language']=$this->student_model->fetch_language(array('studentId'=>$val['id']));
            }
        }

        $this->load->view('main_menu',$data);
 	}
    public function add_student_process()
    {
        if ($this->input->is_ajax_request()) {
            // die;
            $this->load->library('form_validation');
            $this->form_validation->set_rules('name', 'Name', 'trim|xss_clean|required|max_length[150]');
            $this->form_validation->set_rules('dob', 'Date of Birth', 'trim|xss_clean|required|max_length[12]');
            $this->form_validation->set_rules('mobile_no', 'Mobile No.', 'trim|xss_clean|required|max_length[10]');
            $this->form_validation->set_rules('gender', 'Gender', 'trim|xss_clean|required|max_length[10]');
            $this->form_validation->set_rules('language[]', 'Language', 'trim|xss_clean|required|max_length[10]');
            if ($this->form_validation->run()) {
                $data=$this->input->post();
                $student=array();
                $language_data=array();
                if (isset($data['language'])&&!empty($data['language'])) {
                    foreach ($data['language'] as $lan_key => $lan_value) {
                        $language_data[$lan_key]['languageId']=$lan_value;
                    }
                }
                $today = date("Y-m-d");
                $dateOfBirth = dateFormatter($data['dob'],'d/m/Y','d-m-Y');            
                $diff=date_diff(date_create($dateOfBirth), date_create($today));
                $your_age=$diff->format('%y');
                $student['name']=$data['name'];
                $student['dob']=$data['dob'];
                $student['mobile_no']=$data['mobile_no'];
                $student['gender']=$data['gender'];
                $student['address']=$data['address'];
                $student['age']=$your_age;
                if ($data['id']==0) {
                    $insert=$this->student_model->insertStudentDetail($student,$language_data);
                    if ($insert!=false) {
                        $message = 'Added Student Successfully';
                        $report  = array(
                            'status' => 1,
                            'message' => $message
                        );
                        echo json_encode($report);
                        exit;
                    }
                    else{
                        $message = 'Something went worng';
                        $report  = array(
                            'status' => 0,
                            'message' => $message
                        );
                        echo json_encode($report);
                        exit;
                    }
                }
                else{
                    $where['id']=$data['id'];
                    $where_language['studentId']=$data['id'];
                    $language['removed']=1;
                    if (!empty($language_data)) {
                        $this->common_model->__update_table('student_language',$language,$where_language);
                    }
                    $insert=$this->student_model->updateStudentDetail($student,$language_data,$where);
                    if ($insert!=false) {
                        $message = 'Update Student Successfully';
                        $report  = array(
                            'status' => 1,
                            'message' => $message
                        );
                        echo json_encode($report);
                        exit;
                    }
                    else{
                        $message = 'Something went worng';
                        $report  = array(
                            'status' => 0,
                            'message' => $message
                        );
                        echo json_encode($report);
                        exit;
                    }
                }
            }
            else{
                $message = $this->form_validation->error_array();
                    $report  = array(
                        'status' => 0,
                        'message' => $message
                    );
                    echo json_encode($report);
                    exit;
            }
        }
        else{
            show_error("No direct accees allowed");
        }
    }
    public function edit_student()
    {
        if ($this->input->is_ajax_request()) {
            $data=$this->input->post();
            $fetch=$this->common_model->__fetch_contents1('student',$data);
            if ($fetch!=false) {
                $data = $fetch[0];
                $data['language']=$this->common_model->__fetch_contents1('student_language',array('studentId'=>$data['id'],'removed'=>0),'languageId as langId');
                $report  = array(
                    'status' => 1,
                    'data' => $data
                );
                echo json_encode($report);
                exit;
            }
            else{
                $message = 'Something went worng';
                $report  = array(
                    'status' => 0,
                    'message' => $message
                );
                echo json_encode($report);
                exit;
            }
        }
    }
    public function delete_student()
    {
        if ($this->input->is_ajax_request()) {
            $data=$this->input->post();
            $fetch=$this->common_model->__fetch_contents1('student',$data);
            if ($fetch!=false) {
                $delete_data['removed']=1;
                $update=$this->common_model->__update_table('student',$delete_data,$data);
                if ($update!=false) {
                    $message = 'Student Deleted!';
                    $report  = array(
                        'status' => 1,
                        'message' => $message
                    );
                    echo json_encode($report);
                    exit;
                }
                else{
                    $message = 'Something went worng in update';
                    $report  = array(
                        'status' => 0,
                        'message' => $message
                    );
                    echo json_encode($report);
                    exit;
                }
            }
            else{
                $message = 'Something went worng';
                $report  = array(
                    'status' => 0,
                    'message' => $message
                );
                echo json_encode($report);
                exit;
            }
        }
    }
    public function student_list(){
        $data['title']='Home'.title_tag; 
        $data['menu']=2;
        $this->load->view('student_list',$data);

    }
    public function student_list_process()
    {
        $table_data = $this->input->post();
        if ($this->input->is_ajax_request()) {
            $draw         = $table_data['draw'];
            $rpt_list     = $this->student_model->fetchStudentList($table_data);
            $rpt_list_tot = count($rpt_list['data']);
            if ($rpt_list['status']!=0) {
                $tot_val = $rpt_list_tot;
                $report  = array(
                    'draw' => $draw,
                    'iTotalRecords' => $tot_val,
                    'iTotalDisplayRecords' => $tot_val,
                    'aaData' => $rpt_list['data']
                );
                echo json_encode($report);
                exit;
            } else {
                $report  = array(
                    'draw' => 0,
                    'iTotalRecords' => 0,
                    'iTotalDisplayRecords' => 0,
                    'aaData' => array()
                );
                echo json_encode($report);
                exit;
            }
        } else {
            show_error("No direct access allowed");
            //or redirect to wherever you would like
        }
    }
        
}