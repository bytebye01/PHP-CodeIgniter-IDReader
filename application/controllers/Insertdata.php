<?php
defined('BASEPATH') OR exit('No direct script access allowed'); 


class Insertdata extends CI_Controller {
    public function __construct()
        {
                parent::__construct();
                $this->load->model('member_model');
                $this->load->library('encryption');
                
        }
    public function addmember_ajax()
    {
        $response = array();
        $data = array(
            'c_idnumber' => $this->encryption->encrypt($this->input->post('c_idnumber')),
            'c_thname' => $this->encryption->encrypt($this->input->post('c_thname')),
            'c_enname' => $this->encryption->encrypt($this->input->post('c_enname')),
            'c_gender' => $this->input->post('c_gender'),
            'c_dob' => $this->input->post('c_dob'),
            'c_religion' => $this->input->post('c_religion'),
            'c_address' => $this->input->post('c_address'),
            'c_issuer' => $this->input->post('c_issuer'),
            'c_doi' => $this->input->post('c_doi'),
            'c_doe' => $this->input->post('c_doe'),
            'c_photo_base64' => $this->input->post('c_photo_base64')
        );

        $decrypted_idnumber_adding = $this->encryption->decrypt($data['c_idnumber']);
        $query = $this->db->get('tbl_idcard');
        $rows = $query->result();
        $canSave = true;

        foreach ($rows as $row) {
            $tbl_c_idnumber = $row->c_idnumber;
            $decrypted_tbl_c_idnumber = $this->encryption->decrypt($tbl_c_idnumber);
            if ($decrypted_tbl_c_idnumber === $decrypted_idnumber_adding) {
                $canSave = false;
                break;
            }
        }

        if ($canSave) {
            $this->db->insert('tbl_idcard', $data);
            $response['success'] = true;
            $response['message'] = 'บันทึกสำเร็จแล้ว';
        } else {
            $response['success'] = false;
            $response['message'] = 'มีข้อมูลนี้อยู่แล้ว';
        }

        echo json_encode($response);
    }
    
    //ajax-table-get
    public function get_member_data()
    {
        $data['success'] = false;
        $data['message'] = 'ไม่สามารถดึงข้อมูลได้';

        // ดึงข้อมูลจากฐานข้อมูล และส่งกลับเป็น JSON
        $result = $this->member_model->decrypt_c_idnumber();

        if (!empty($result)) {
            $data['success'] = true;
            $data['message'] = 'ดึงข้อมูลสำเร็จ';
            $data['data'] = $result;
        }

        echo json_encode($data);
    }

    public function index()
    {
        
        // $data['query'] = $this->member_model->showdata8();
        $data['query1'] = $this->member_model->decrypt_c_idnumber();
        
        // echo '<pre>';
        // print_r ($data);
        // echo '</pre>';
        // exit;

        

        $this->load->view('css');
        $this->load->view('header');
        $this->load->view('banner');
        $this->load->view('navbar');
        $this->load->view('insert_view2');
        $this->load->view('member_view', $data);
        $this->load->view('footer');
        $this->load->view('js');
    }
    // Insertdata.php (controller)
    public function edit($cid)
	{
        $data['rsedit'] = $this->member_model->read($cid);

        //print_r($data);
        //exit;
        $this->load->view('css');
		$this->load->view('header');
		$this->load->view('banner');
		$this->load->view('navbar');
		$this->load->view('edit_view', $data); 
		$this->load->view('footer');
        $this->load->view('js');
	}
    public function adding()
	{
        $this->member_model->addmember();
        redirect('','refresh');
	}
    public function adding2()
	{
        $this->member_model->addmember2();
        redirect('','refresh');
	}
    public function editing()
	{
        $this->member_model->editmember();
        redirect('','refresh');
	}
    public function editing_ajax()
    {
        $this->member_model->editmember();
        $response['success'] = true;
        echo json_encode($response);
    }

    public function editing2()
	{
        $this->member_model->editmember2();
        redirect('','refresh');
	}
    public function del($c_id)
	{
        //print_r($_POST);
        $this->member_model->deldata($c_id);
	}
    public function del_ajax()
    {
        $c_id = $this->input->post('c_id');
        $result = $this->member_model->deldata($c_id);
    
        // if ($result) {
        //     echo json_encode(['success' => true]);
        // } else {
        //     echo json_encode(['success' => false]);
        // }
    }
    public function delete_member()
    {
        $data['success'] = false;
        $data['message'] = 'ไม่สามารถลบข้อมูลได้';

        $memberId = $this->input->post('id');

        // ดำเนินการลบข้อมูลจากฐานข้อมูล และส่งกลับเป็น JSON
        // (เพิ่มโค้ดลบข้อมูลตาม ID ที่รับมาจาก Ajax)

        if ($this->member_model->delete_member($memberId)) {
            $data['success'] = true;
            $data['message'] = 'ลบข้อมูลสำเร็จ';
        }

        echo json_encode($data);
    }
    
}