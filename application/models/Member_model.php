<?php
class Member_model extends CI_Model {
    public function addmember()
    {
        
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
        // decrypted_idnumber_adding คืออันที่บันทึกเข้าไปใหม่ แล้วก็ decrypt ออกมาแล้ว
        $decrypted_idnumber_adding = $this->encryption->decrypt($data['c_idnumber']);
        $query = $this->db->get('tbl_idcard');
        $rows = $query->result();
        $canSave = true;

        foreach ($rows as $row) {
            $tbl_c_idnumber = $row->c_idnumber;
            $decrypted_tbl_c_idnumber = $this->encryption->decrypt($tbl_c_idnumber);
            if ($decrypted_tbl_c_idnumber === $decrypted_idnumber_adding) {
                // พบข้อมูลที่ตรงกัน, ไม่สามารถบันทึกได้
                $canSave = false;
                break;
            }
        }
        if ($canSave) {
            $this->db->insert('tbl_idcard', $data);
            echo '<script>alert("บันทึกสำเร็จแล้ว")</script>';
            // return xxx;
        } else {   
            echo '<script>alert("ไม่สามารถบันทึกได้")</script>';
            // return yyy;
        }
        
    }
    
   
    public function editmember()
    {
            // ตรวจสอบว่ามีข้อมูลที่ถูกส่งมาหรือไม่
        if (!$this->input->post('c_id') || !$this->input->post('c_thname') || !$this->input->post('c_enname')) {
            // ถ้าไม่มีข้อมูล, ทำการ redirect ไปที่หน้าที่ต้องการ
            redirect(base_url()); // หรือไปที่หน้าอื่นที่คุณต้องการ
        }

        // มีข้อมูล, ดำเนินการอัปเดตตามปกติ
        $data = array(
            'c_thname' => $this->encryption->encrypt($this->input->post('c_thname')),
            'c_enname' => $this->encryption->encrypt($this->input->post('c_enname'))
        );
        $this->db->where('c_id', $this->input->post('c_id'));
        $this->db->update('tbl_idcard', $data);

        // ทำการ redirect หลังจากการอัปเดต
        redirect(base_url()); // หรือไปที่หน้าอื่นที่คุณต้องการ
    }


        // $query1=$this->db->update('tbl_idcard', $data);
        // if ($query1){
        //     echo '<pre>';
        //     print_r($data);
        //     echo '</pre>';
        // }
        // else {
        //     echo 'false';
        // }
    public function decrypt_c_idnumber()
    {
        $this->db->select('c.c_id, c.c_idnumber, c.c_thname, c.c_enname, c.c_gender, c.c_dob, c.c_religion, c.c_address, c.c_issuer, c.c_doi, c.c_doe, c.c_photo_base64');
        $this->db->from('tbl_idcard as c');
        $query1 = $this->db->get();

            if ($query1->num_rows() > 0) {
                $results = $query1->result();
                foreach ($results as $row) {
                    $row->c_idnumber = $this->encryption->decrypt($row->c_idnumber);
                    $row->c_thname = $this->encryption->decrypt($row->c_thname);
                    $row->c_enname = $this->encryption->decrypt($row->c_enname);
                    
                }
                return $results;
            }
    }
    public function showdata8()
    {        
        // เลือกคอลัมน์ที่ต้องการจากตาราง tbl_idcard
        $this->db->select('c.c_id, c.c_thname, c.c_enname, c.c_gender, c.c_dob, c.c_religion, c.c_address, c.c_issuer, c.c_doi, c.c_doe, c.c_photo_base64');
        
        // เลือกตารางที่ต้องการดึงข้อมูล
        $this->db->from('tbl_idcard as c');
        
        // ดึงข้อมูลจากฐานข้อมูล
        $query = $this->db->get();
        
        // ตรวจสอบว่ามีข้อมูลที่ดึงมาหรือไม่
        if ($query->num_rows() > 0) {
            // ส่งข้อมูลที่ดึงมาในรูปแบบของอาร์เรย์กลับ
            return $query->result();
        }
    }
    public function addmember2()
    {
                    $config['upload_path'] = './img/';
                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['max_size'] = '2000';
                    $config['max_width'] = '3000';
                    $config['max_height'] = '3000';
                    $config['encrypt_name'] = TRUE;

            $this -> load -> library('upload',$config);
            if ( ! $this -> upload -> do_upload('m_img'))
            {
                echo $this->upload->display_errors();
            }
            else
            {
            $data = $this -> upload -> data();
                    //print_r($data);
            $filename = $data['file_name'];
            $data = array(
            'm_name' => $this->input->post('m_name'),
            'm_lname' => $this->input->post('m_lname'),
            'm_img' => $filename
            );

            $query=$this->db->insert('tbl_member2', $data);
            // if ($query){
            //     echo 'add ok';
            // }
            // else {
            //     echo 'false';
            // }
        }
    }

    

    public function editmember2()
    {   
                $config['upload_path'] = './img/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2000';
                $config['max_width'] = '3000';
                $config['max_height'] = '3000';
                $config['encrypt_name'] = TRUE;

        $this -> load -> library('upload',$config);
        if ( ! $this -> upload -> do_upload('m_img'))
        {
            echo $this->upload->display_errors();
        }
        else
        {
        $data = $this -> upload -> data();
                //print_r($data);
        $filename = $data['file_name'];
        $data = array(
        'm_name' => $this->input->post('m_name'),
        'm_lname' => $this->input->post('m_lname'),
        'm_img' => $filename
        );
        $this->db->where('m_id',$this->input->post('m_id'));
        $query=$this->db->update('tbl_member2', $data);
        

        // if ($query){
        //     echo 'edit ok';
        // }
        // else {
        //     echo 'false';
        // }
        }
        
    }
    public function showdata()
        {
                $query = $this->db->get('tbl_member');
                return $query->result();
        }

    public function showdata2()
    {
        $this->db->select('m.m_id,m.m_img,m.m_firstname,m.m_name,m.m_lname,m.m_datesave,m.m_level,p.pname');
        $this->db->from('tbl_member2 as m');
        $this->db->join('tbl_position as p', 'm.pid=p.pid');
        $query=$this->db->get();
        //ปกติ
        if($query->num_rows()> 0){
            return $query->result();
        }
    }

    public function showdata3()
    {
        $this->db->select('m.*,p.*');
        $this->db->from('tbl_member as m');
        $this->db->join('tbl_position as p', 'm.pid=p.pid','left');
        $query=$this->db->get();
        if($query->num_rows()> 0){
            return $query->result();
        }
    }

    public function showdata4()
    {
        $this->db->select('m.m_id,m.m_img,m.m_firstname,m.m_name,m.m_lname,m.m_datesave,p.pname,m.m_level');
        $this->db->from('tbl_member2 as m');
        $this->db->join('tbl_position as p', 'm.pid=p.pid');
        $this->db->where('m.m_level','S');
        // การแสดงข้อมูลแบบมีเงื่อนไข ตาม level
        $query=$this->db->get();
        if($query->num_rows()> 0){
            return $query->result();
        }
    }

    public function showdata5()
    {
        $this->db->select('m.m_id,m.m_img,m.m_firstname,m.m_name,m.m_lname,m.m_datesave,p.pname,m.m_level');
        $this->db->from('tbl_member2 as m');
        $this->db->join('tbl_position as p', 'm.pid=p.pid');
        $this->db->where('m.pid','1');
        // การแสดงข้อมูลแบบมีเงื่อนไข ตาม position
        $query=$this->db->get();
        if($query->num_rows()> 0){
            return $query->result();
        }
    }

    public function showdata6()
    {
        $this->db->select('m.m_id,m.m_img,m.m_firstname,m.m_name,m.m_lname,m.m_datesave,p.pname,m.m_level');
        $this->db->from('tbl_member2 as m');
        $this->db->join('tbl_position as p', 'm.pid=p.pid');
        $this->db->where_in('m.pid',array('1','3'));
        // การแสดงข้อมูลแบบมีเงื่อนไข ตาม position
        $query=$this->db->get();
        if($query->num_rows()> 0){
            return $query->result();
        }
    }

    public function showdata7()
    {
        $this->db->select('m.m_id,m.m_img,m.m_firstname,m.m_name,m.m_lname,m.m_datesave,p.pname,m.m_level');
        $this->db->from('tbl_member2 as m');
        $this->db->join('tbl_position as p', 'm.pid=p.pid');
        $this->db->where('m.pid <> 2');
        // การแสดงข้อมูลแบบมีเงื่อนไข ใช้มากกว่าเท่ากับหรืออื่นๆ
        $query=$this->db->get();
        if($query->num_rows()> 0){
            return $query->result();
        }
    }
    

    public function read($c_id){
            $this->db->select('*');
            $this->db->from('tbl_idcard');
            $this->db->where('c_id',$c_id);
            $query=$this->db->get();
            if($query->num_rows()> 0){
                $data = $query->row();
                $data->c_idnumber = $this->encryption->decrypt($data->c_idnumber);
                $data->c_thname = $this->encryption->decrypt($data->c_thname);
                $data->c_enname = $this->encryption->decrypt($data->c_enname);
                return $data;
            }
            return false;
    }
    
    public function deldata1($c_id)
    {
            $this->db->delete('tbl_idcard',array('c_id'=>$c_id));
            redirect('','refresh');
    }
    public function delete_member($c_id)
    {
        return $this->db->delete('tbl_idcard', array('c_id' => $c_id));
    }
    
    public function encryptText($text)
    {
        $this->load->library('encryption');
        return $this->encryption->encrypt($text);
    }

    public function decryptText($encryptedText)
    {
        $this->load->library('encryption');
        
        return $this->encryption->decrypt($encryptedText);
    }


}
