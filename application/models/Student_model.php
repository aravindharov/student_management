<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
Class Student_model extends CI_Model
{
    public function insertStudentDetail($student, $language=array())
    {
        $this->db->trans_begin();
        $q = $this->db->select('max(studentNo) as last')->from('student')->get();
        $res = $q->result_array();
        $firstNo = 1;
        if(!empty($res[0]['last']))
        {
            $firstNo = $res[0]['last']+1;
        }
        $student['studentNo']=$firstNo;
        $no=cleanData($firstNo,4,0,'prefix');
        $student['regno']='stu'.$no;
        $this->db->insert('student', $student);
        $lastid = $this->db->insert_id();
        
        if (!empty($language)) {
            foreach ($language as $key => $item) {
                $language[$key]['studentId'] = $lastid;
                $this->db->insert('student_language', $language[$key]);
            }
        }
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }
    public function updateStudentDetail($student, $language_data=array(),$id)
    {
        $this->db->trans_begin();
        $this->db->where($id);
        $this->db->update('student', $student);
        
        if (!empty($language_data)) {
            $stu_id=$id['id'];
            foreach ($language_data as $key => $item) {
                $language_data[$key]['studentId'] = $stu_id;
                $this->db->insert('student_language', $language_data[$key]);
            }
        }
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }
    public function fetch_student($where=array())
    {
        $this->db->select('*');
        $this->db->from('student as a');
        $this->db->join('student_language as b','a.id=b.studentId','left');
        $this->db->where('a.removed', 0);
        if (!empty($where)) {
            $this->db->where($where);
        }
        
        $query = $this->db->get();
        $data = $query->result_array();
        if ($query->num_rows()) {
            return $data;
        } else {
            return false;
        }
    }
    public function fetch_language($where=array()){
        $this->db->select('a.*,b.title');
        $this->db->from('student_language as a');
        $this->db->join('language as b','b.id=a.languageId');
        $this->db->where('a.removed',0);
        if (!empty($where)) {
            $this->db->where($where);
        }

        $query = $this->db->get();
        
        $data = $query->result_array();
        if ($query->num_rows()) {
            return $data;
        } else {
            return false;
        }
    }
    public function fetchStudentList($data)
    {
        $this->db->select('a.*,' . $data['start'] . ' as start,GROUP_CONCAT(c.title)as languageTitle');        
        $this->db->from('student as a');
        $this->db->join('student_language as b','b.studentId=a.id');
        $this->db->join('language as c','b.languageId=c.id');
        $this->db->group_by('a.id ');
        if (!empty($data['search']['value'])) {
            $this->db->where('(`name`  LIKE \'%' . $data['search']['value'] . '%\' OR        
                `mobile_no`  LIKE \'%' . $data['search']['value'] . '%\' OR        
                `regno`  LIKE \'%' . $data['search']['value'] . '%\')', NULL, FALSE);
        }
        if (!empty($data['start'])) {
            $this->db->limit($data['length'], $data['start']);
            
        } else if (!empty($data['length'])) {
            
            $this->db->limit($data['length']);
            
        }
        
        $this->db->where('a.removed', 0);
        $this->db->where('b.removed', 0);
        
        $query = $this->db->get();
        
        // var_dump($this->db->last_query());
        //   die();
        $data = $query->result_array();
        if ($query->num_rows()) {
            return returnResponse(1, '', $data);
        } else {
            return returnResponse(0, 'Please try again!');
        }
    }
}
