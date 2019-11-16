<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftar extends MY_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Model_registrant','reg');
        $this->load->model('Model_parent','parent');   
    }
    
    // ================= AFTER LOGIN ===========================
    
    public function beranda($id){
        $this->blockUnloggedOne($id);
        $username = $this->session->registrant->getUsername();
        $registrant = $this->reg->getDataByUsername($username);
        $this->session->registrant = $registrant;
        $data = [
            'title' => 'Beranda',
            'username' => $username,
            'id' => $this->session->registrant->getId(),
            'registrant' => $registrant,
            'img_receipt' => $this->getImgLink($id, 'kwitansi'),
            'status' => $this->reg->cek_status($this->session->registrant),
            'nav_pos' => 'home'
        ];
        $this->CustomView('registrant/dashboard', $data);
    }
    
    public function password($id){
        $this->blockUnloggedOne($id);
        $data = [
            'title' => 'Password',
            'username' => $this->session->registrant->getName(),
            'id' => $this->session->registrant->getId(),
            'registrant' => $this->session->registrant,
            'nav_pos' => 'home'
        ];
        $this->CustomView('registrant/password', $data);
    }
    
    public function change_password($id){
        $this->blockUnloggedOne($id);
        $registrant = $this->reg->getData(null, $id);
        $data = $this->input->post(null, true);
        if($data['new_password'] == $data['confirm_password']){
            if(password_verify($data['stored_password'], $registrant->getPassword())){
                $this->do_change_password(['password' => $data['new_password'], 'id' => $id]);
            } else {
                $this->session->set_flashdata("errors", [0 => "Maaf, Password lama anda salah <br />"
                    . "Silahkan di periksa kembali."]);
                redirect($id.'/password');
            }
        } else {
            $this->session->set_flashdata("errors", [0 => "Maaf, Password baru dan konfirmasi password tidak sama, <br />"
                . "Silahkan di periksa kembali."]);
            redirect($id.'/password');
        }        
    }
    
    private function do_change_password($data){
        $res = $this->reg->updateData($data);
        if($res){
            $this->session->set_userdata('registrant', $this->reg->getRegistrant());
            $this->session->set_flashdata("notices", [0 => "Passsword sudah berhasil diubah."]);
            redirect($data['id'].'/password');
        } else {
            $this->session->set_flashdata("errors", [0 => "Maaf, Terjadi Kesalahan"]);
            redirect($data['id'].'/password');
        }
    }
    
    public function generate_kodeunik($id, $gender){
        $this->blockUnloggedOne($id);
        $res = $this->reg->genKode($id, $gender);
        if($res['status']){
            echo json_encode([
                'status' => true,
                'kode' => $res['kode'],
            ]);
        } else {
            echo json_encode([
                'status' => false,
                'kode' => $res['kode'],
            ]);
        }
    }
    
    public function getFoto($id, $hash){
        $this->blockUnloggedOne($id, true);
        $registrant = $this->reg->getRegistrant($id);
        $imagine = new Imagine\Gd\Imagine();
        $image = $imagine->open(FCPATH.'data/'.$registrant->getUploadDir().'/foto.png');
        $this->session->set_userdata('random_hash', $hash);
        $image->show('png');
    }
    
    public function ajax_edit_profil($id){
        $this->blockUnloggedOne($id);
        $data = $this->input->post(null, true);
        $data['id'] = $id;
        $res = $this->reg->updateData($data);
        if($res){
            $this->session->set_userdata('registrant', $this->reg->getRegistrant());
            echo json_encode([
                'status' => true,
                'profile' => $data,
            ]);
        } else {
            echo json_encode([
                'status' => false,
                'profile' => $data,
            ]);
        }
    }
    
    public function formulir($id){
        $this->blockUnloggedOne($id);
        $this->blockNonPayers($this->session->registrant);
        $reg_data = $this->reg->getRegistrantData($this->session->registrant);
        $parent_form = $this->parents($id, 'father').' '.$this->parents($id, 'mother');
        $data = [
            'title' => 'Formulir',
            'username' => $this->session->registrant->getName(),
            'id' => $this->session->registrant->getId(),
            'registrant' => $this->session->registrant,
            'reg_data' => $reg_data,
            'parent_form' => $parent_form,
            'nav_pos' => 'formulir',
            'img_link' => $this->getImgLink($id),
        ];
        $this->CustomView('registrant/forms', $data);
    }
    
    public function guardian($id){
        $this->blockUnloggedOne($id);
        $this->blockNonPayers($this->session->registrant);
        $reg_data = $this->reg->getRegistrantData($this->session->registrant);
        $data = [
            'title' => 'Wali',
            'username' => $this->session->registrant->getName(),
            'id' => $this->session->registrant->getId(),
            'registrant' => $this->session->registrant,
            'reg_data' => $reg_data,
            'parent' => $this->parents($id, 'guardian'),
            'nav_pos' => 'wali',
        ];
        $this->CustomView('registrant/guardian', $data);
    }
    
    private function parents($id, $type){
        $key_arr = [
            'father' => 'ayah',
            'mother' => 'ibu',
            'guardian' => 'wali'
        ];
        $parent_data = (empty($this->parent->getData($id, [$type])[$type]))? $parent_data = $this->parent->create(): $this->parent->getData($id, [$type])[$type];
        $string = $this->load->view("registrant/parent",[
            'parent_data' => $parent_data,
            'key' => $key_arr[$type],
            'type' => $type
        ],true);
        return $string;
    }
    
    public function ajax_edit_all($id){
        $this->blockUnloggedOne($id);
        $data = $this->input->post(null, true);
        $res = $this->do_edit_all($id, $data);
        if($res['success'] ==  1){
            $this->session->set_userdata('registrant', $this->reg->getRegistrant());
            echo json_encode([
                'status' => true,
                'detail' => $data,
            ]);
        } else {
            echo json_encode([
                'status' => false,
                'detail' => $data,
                'inputerror' => $res['errorred'],
            ]);
        }
    }
    
    public function do_edit_guardian($id){
        $this->blockUnloggedOne($id);
        $data = $this->input->post(null, true);
        $types = ['guardian'];
        $res = false;
        foreach($types as $type){
            $parent_data = [
                'type' => $type,
                'name' => $data[$type.'_name'],
                'nik' => $data[$type.'_nik'],
                'status' => $data[$type.'_status'], 
                'birth_place' => $data[$type.'_birth_place'],
                'birth_date'=> $data[$type.'_birth_date'],
                'street' => $data[$type.'_street'],
                'RT' => $data[$type.'_RT'],
                'RW' => $data[$type.'_RW'],
                'village' => $data[$type.'_village'],
                'district' => $data[$type.'_district'],
                'city' => $data[$type.'_city'],
                'province' => $data[$type.'_province'],
                'country' => $data[$type.'_country'],
                'postal_code' => $data[$type.'_postal_code'],
                'contact' => $data[$type.'_contact'],
                'relation' => $data[$type.'_relation'],
                'nationality' => $data[$type.'_nationality'],
                'religion' => $data[$type.'_religion'],
                'education_level' => $data[$type.'_education_level'],
                'job' => $data[$type.'_job'],
                'position' => $data[$type.'_position'],
                'company' => $data[$type.'_company'],
                'income' => $data[$type.'_income'],
                'burden_count' => $data[$type.'_burden_count']
            ];
            $val[$type] = $this->parent->ajaxValidation($parent_data, $type);
            if($val[$type]['valid']){
               $res = $this->parent->updateData($id, $parent_data, $type);
            } else {
                $res = false;
            }
            if($res){
                $this->session->set_flashdata("notices", [0 => "Data Sudah berhasil disimpan"]);
                redirect($id.'/surat');
            } else {
                $this->session->set_flashdata("errors", [0 => "Maaf, Terjadi Kesalahan, silahkan diulangi lagi..."]);
                redirect($id.'/wali');
            }
        }
    }
    
    private function do_edit_all($id, $data){
        $types = ['father', 'mother'];
        $val['registrant'] = $this->reg->ajaxValidation($data);
        $agg_res = true;
        foreach($types as $type){
            $parent_data = [
                'type' => $type,
                'name' => $data[$type.'_name'],
                'nik' => $data[$type.'_nik'],
                'status' => $data[$type.'_status'], 
                'birth_place' => $data[$type.'_birth_place'],
                'birth_date'=> $data[$type.'_birth_date'],
                'street' => $data[$type.'_street'],
                'RT' => $data[$type.'_RT'],
                'RW' => $data[$type.'_RW'],
                'village' => $data[$type.'_village'],
                'district' => $data[$type.'_district'],
                'city' => $data[$type.'_city'],
                'province' => $data[$type.'_province'],
                'country' => $data[$type.'_country'],
                'postal_code' => $data[$type.'_postal_code'],
                'contact' => $data[$type.'_contact'],
                'relation' => $data[$type.'_relation'],
                'nationality' => $data[$type.'_nationality'],
                'religion' => $data[$type.'_religion'],
                'education_level' => $data[$type.'_education_level'],
                'job' => $data[$type.'_job'],
                'position' => $data[$type.'_position'],
                'company' => $data[$type.'_company'],
                'income' => $data[$type.'_income'],
                'burden_count' => $data[$type.'_burden_count']
            ];
            $val[$type] = $this->parent->ajaxValidation($parent_data, $type);
            if($val[$type]['valid']){
               $res[$type] = $this->parent->updateData($id, $parent_data, $type);
            } else {
                $agg_res = false;
            }
        }
        if($val['registrant']['valid']){
            $res['registrant'] = $this->reg->updateDetail($id, $data);
        } else {
            $res['registrant'] = false;
        }
        $final_result = $res['registrant'] && $agg_res;
        $errored = array_merge($val['registrant']['errored'], $val['father']['errored'], $val['mother']['errored']);
        return ['success'=>$final_result,'errorred'=>$errored];
    }

    public function finalisasi($id, $finalized){
        $this->blockUnloggedOne($id);
        $data['id'] = $id;
        $data['finalized'] = ($finalized == 'true');
        $res = $this->reg->updateData($data);
        if($res){
            $this->session->set_userdata('registrant', $this->reg->getRegistrant());
            $this->session->set_flashdata("notices", [0 => "Data Sudah berhasil disimpan"]);
            redirect($id.'/beranda');
        } else {
            $this->session->set_flashdata("errors", [0 => "Maaf, Terjadi Kesalahan"]);
            redirect($id.'/beranda');
        }
    }

    public function upload_foto($id, $redirUrl = 'formulir') {
        $this->blockUnloggedOne($id);
        $fileUrl = $_FILES['file']["tmp_name"];
        $registrant = $this->reg->getRegistrant($id);
        $res = false;
        if (!is_null($registrant->getUploadDir())) {
            $upload_dir = FCPATH.'data/'.$registrant->getUploadDir();
            $res = $this->reg->uploadFoto($fileUrl, $upload_dir);
        }
        if ($res) {
            $this->session->set_flashdata("notices", [0 => "Upload Foto Berhasil!"]);
            redirect($id.'/'.$redirUrl);
        } else {
            $this->session->set_flashdata("errors", [0 => "Upload Foto Gagal!"]);
            redirect($id.'/'.$redirUrl);
        }
    }
    
    public function upload_receipt($id) {
        $this->blockUnloggedOne($id);
        $data = $this->input->post(null, true);
        $fileUrl = $_FILES['file']["tmp_name"];
        $res = false;
        $registrant = $this->reg->getRegistrant($id);
        if (!is_null($registrant->getUploadDir())) {
            $upload_dir = FCPATH.'data/'.$registrant->getUploadDir();
            $res = $this->reg->uploadReceipt($fileUrl, $upload_dir, $id, $data);
        }
        if ($res) {
            $this->session->set_flashdata("notices", [0 => "Upload Kwitansi Berhasil!"]);
            redirect($id.'/beranda');
        } else {
            $this->session->set_flashdata("errors", [0 => "Upload Kiwtansi Gagal!"]);
            redirect($id.'/beranda');
        }
    }

    public function upload_dokumen_gambar($id, $type = 'akte')
    {
        $this->blockUnloggedOne($id);
        $fileUrl = $_FILES['file']["tmp_name"];
        $registrant = $this->reg->getRegistrant($id);
        $res = false;
        if (!is_null($registrant->getUploadDir())) {
            $upload_dir = FCPATH.'data/'.$registrant->getUploadDir();
            $res = $this->reg->uploadDocumentImage($fileUrl, $upload_dir, $type);
        }
        if ($res) {
            $this->session->set_flashdata("notices", [0 => "Upload Foto Berhasil!"]);
            redirect($id.'/dokumen');
        } else {
            $this->session->set_flashdata("errors", [0 => "Upload Foto Gagal!"]);
            redirect($id.'/dokumen');
        }
    }

    public function upload_dokumen_pdf($id, $type)
    {
        $registrant = $this->reg->getRegistrant($id);
        $config['upload_path'] = $upload_dir = FCPATH.'data/'.$registrant->getUploadDir();
        $config['allowed_types'] = 'pdf';
        $config['file_name'] = $type.'.pdf';
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('file'))
        {
            $this->session->set_flashdata("errors", [0 => "Upload PDF Gagal!"]);
            redirect($id.'/dokumen');
        }
        else
        {
            $this->session->set_flashdata("notices", [0 => "Upload PDF Berhasil!"]);
            redirect($id.'/dokumen');
        }
    }
    
    private function getImgReceipt($id){
        $this->load->helper('file');
        $registrant = $this->reg->getRegistrant($id);
        $img_link = '';
        $file = read_file(FCPATH.'data/'.$registrant->getUploadDir().'/kwitansi.png');
        $datetime = new DateTime('now');
        if($file == false){
            $img_link = null;
        }  else {
            $img_link = base_url().'pendaftar/getReceipt/'.$id.'/'.hash('md2', $datetime->format('Y-m-d H:i:s'));
        }
        return $img_link;
    }
    
    public function getReceipt($id, $hash){
        $this->blockUnloggedOne($id, true);
        $registrant = $this->reg->getRegistrant($id);
        $imagine = new Imagine\Gd\Imagine();
        $image = $imagine->open(FCPATH.'data/'.$registrant->getUploadDir().'/kwitansi.png');
        $this->session->set_userdata('random_hash_2', $hash);
        $image->show('png');
    }

    public function getDocument($id, $type, $hash = '000'){
        $this->blockUnloggedOne($id, true);
        $registrant = $this->reg->getRegistrant($id);
        if(($type == 'ijazah') || ($type == 'skhun')){
            $file = FCPATH.'data/'.$registrant->getUploadDir().'/'.$type.'.pdf';
            if (file_exists($file)) {
                $filename = $registrant->getUploadDir().'-'.$type.'pdf';
                header('Content-type: application/pdf');
                header('Content-Disposition: inline; filename="' . $filename . '"');
                header('Content-Transfer-Encoding: binary');
                header('Content-Length: ' . filesize($file));
                header('Accept-Ranges: bytes');
                @readfile($file);
            } else {
                header("HTTP/1.0 404 Not Found");
                header("Status: 404 Not Found");
                echo "<h1>404 File not found</h1>";
            }
        } else {
            try {
                $imagine = new Imagine\Gd\Imagine();
                $image = $imagine->open(FCPATH.'data/'.$registrant->getUploadDir().'/'.$type.'.png');
                $this->session->set_userdata('random_hash_2', $hash);
                $image->show('png');
            } catch (Imagine\Exception\InvalidArgumentException $e) {
                header("HTTP/1.0 404 Not Found");
                header("Status: 404 Not Found");
                echo "<h1>404 File not found</h1>";
            }
        }
    }
    
    public function rekap($id){
        $this->blockUnloggedOne($id);
        $this->blockNonPayers($this->session->registrant);
        $registrant = $this->reg->getData(null, $id);
        $this->session->set_userdata('registrant', $registrant);
        $data = [
            'title' => 'Rekap Data',
            'username' => $this->session->registrant->getName(),
            'id' => $this->session->registrant->getId(),
            'nav_pos' => 'recap',
            'img_link' => $this->getImgLink($id),
            'registrant' => $this->session->registrant,
        ];
        $this->CustomView('registrant/recap', $data);
    }
    
    public function print_data_pendaftaran($id, $action = 'download'){
        $this->blockUnloggedOne($id);
        $registrant = $this->reg->getRegistrant($id);
        $this->session->set_userdata('registrant', $registrant);
        $pdf = new mikehaertl\wkhtmlto\Pdf();
        $pdf->setOptions($this->pdfOption());
        $kartu = $this->load->view('registrant/print', ['registrant' => $registrant], true);
        $pdf->addPage($kartu);
        $data = [
            'title' => 'Print Surat Pernyataan',
            'username' => $registrant->getName(),
            'id' => $registrant->getId(),
            'nav_pos' => 'recap',
            'img_link' => $this->getImgLink($id),
            'registrant' => $registrant,
        ];
        $reg_data = $this->load->view('registrant/print/registrant_data', $data, TRUE);
        $pdf->addPage($reg_data);
        if(($registrant->getCompleted())){
            $reg_letter = $this->load->view('registrant/print/statement_letter', $data, TRUE);
            $pdf->addPage($reg_letter);
        }
        if ($action == 'download'){
            $res = $pdf->send('Data Pendaftaran '.$registrant->getUploadDir().' .pdf');
        } else {
            $res = $pdf->send();
        }
        if (!$res) { echo $pdf->getError(); }
    }
    
    public function surat($id){
        $this->blockUnloggedOne($id);
        $this->blockNonPayers($this->session->registrant);
        $data = [
            'title' => 'Surat Pernyataan',
            'username' => $this->session->registrant->getName(),
            'id' => $this->session->registrant->getId(),
            'registrant' => $this->session->registrant,
            'nav_pos' => 'letter'
        ];
        $this->CustomView('registrant/letter', $data);
    }
    
    public function sertifikat($id){
        $this->blockUnloggedOne($id);
        $this->blockNonPayers($this->session->registrant);
        $data = [
            'title' => 'Upload Sertifikat',
            'username' => $this->session->registrant->getName(),
            'id' => $this->session->registrant->getId(),
            'registrant' => $this->reg->getRegistrant($this->session->registrant),
            'nav_pos' => 'certificate'
        ];
        $this->CustomView('registrant/certificate_upload', $data);
    }
    
    public function isi_pernyataan($id){
        error_reporting(0);
        $this->blockUnloggedOne($id);
        $data = $this->input->post(null, true);
        $data['initial_cost'] = ($data['raw_icost'] == '-999')?$data['other_icost']:$data['raw_icost'];
        $data['subscription_cost'] = ($data['raw_scost'] == '-999')?$data['other_scost']:$data['raw_scost'];
        $data['land_donation'] = ($data['raw_lcost'] == '-999')?$data['other_lcost']:$data['raw_lcost'];
        $data['id'] = $id;
        $qurban = "-";
        for ($i=1; $i <= 3; $i++) { 
            if (array_key_exists ( 'q'.$i ,$data )) {
                $qurban = $qurban.$data['q'.$i].'-';
            }
        }
        $data['qurban'] = $qurban;
        $res = $this->reg->updateData($data);
        if($res){
            $this->session->set_userdata('registrant', $this->reg->getRegistrant());
            $this->session->set_flashdata("notices", [0 => "Data Sudah berhasil disimpan"]);
            redirect($id.'/rekap');
        } else {
            $this->session->set_flashdata("errors", [0 => "Maaf, Terjadi Kesalahan"]);
            redirect($id.'/surat');
        }
    }
    
    public function upload_cert($id){
        $this->blockUnloggedOne($id);
        $data = $this->input->post(null, true);
        $fileUrl = $_FILES['file']["tmp_name"];
        $res = $this->reg->addCertificate($id, $data, $fileUrl);
        if($res){
            $this->session->set_userdata('registrant', $this->reg->getRegistrant());
            $this->session->set_flashdata("notices", [0 => "Data Sudah berhasil disimpan"]);
            redirect($id.'/sertifikat');
        } else {
            $this->session->set_flashdata("errors", [0 => "Maaf, Terjadi Kesalahan"]);
            redirect($id.'/sertifikat');
        }
    }
    
    public function img_sertifikat($id, $fileName){
        $this->blockUnloggedOne($id, true);
        $imagine = new Imagine\Gd\Imagine();
        $image = $imagine->open(FCPATH.'data/sertifikat/'.$fileName.'.png');
        $image->show('png');
    }
    
    public function hapus_sertifikat($id){
        $this->blockUnloggedOne($this->session->registrant->getId());
        $res = $this->reg->deleteCertificate($id);
        if($res){
            $this->session->set_flashdata("notices", [0 => "Data Sudah berhasil dihapus"]);
            redirect($this->session->registrant->getId().'/sertifikat');
        } else {
            $this->session->set_flashdata("errors", [0 => "Maaf, Terjadi Kesalahan"]);
            redirect($this->session->registrant->getId().'/sertifikat');
        }
    }
    
    public function print_kartu(){
        $registrant = $this->session->registrant;
        $this->blockUnloggedOne($registrant->getId(),true);
        if(!empty($registrant)){
            $pdf = new mikehaertl\wkhtmlto\Pdf();
            $pdf->setOptions($this->pdfOption());
            $reg_data = $this->load->view('registrant/print', ['registrant' => $registrant], true);
            $pdf->addPage($reg_data);
            $res = $pdf->send('Kartu Pendaftaran '.$registrant->getId().' .pdf');
            if (!$res) { echo $pdf->getError(); }
        } else {
            $this->session->set_flashdata("errors", [0 => "Maaf, Anda tidak boleh melihat halaman ini lagi!"]);
            redirect('login/index');
        }
    }

    public function halaman_dokumen($id)
    {
        // tambahi scan dir!!
        $this->blockUnloggedOne($id);
        $registrant = $this->reg->getRegistrant($id);
        $upload_dir = FCPATH.'data/'.$registrant->getUploadDir();
        $data = [
            'title' => 'Upload Sertifikat',
            'username' => $this->session->registrant->getName(),
            'id' => $this->session->registrant->getId(),
            'registrant' => $this->reg->getRegistrant($this->session->registrant),
            'nav_pos' => 'documents',
            'status_upload' => $this->reg->scanRegDir($upload_dir)
        ];
        $this->CustomView('registrant/documents', $data);
    }
    
    // =========================================================
    
    // ================= Lihat Pendaftar ===========================
    
    public function lihat($gender = 'L'){
        //$registrant_data = $this->reg->getArrayData($gender, null);
        $this->load->view('registrant/list', [
            'gender' => $gender, 
            //'data_registrant' => $registrant_data
        ]);
    }
    
    public function lihat_ajax($gender = 'L', $completed = false){
        //$registrant_data = $this->reg->getArrayData($gender, null, $completed);
        $registrant_data = $this->reg->getArrayData($gender);
        $data = [];
        $id = 1;
        foreach ($registrant_data as $registrant){
            $row = [];
            $row[] = $id;
            $id++;
            $row[] = $registrant['regId'];
            $row[] = $registrant['name'];
            $row[] = ($registrant['gender'] == 'L') ? 'Ikhwan' : 'Akhwat';
            $row[] = $registrant['previousSchool'];
            $row[] = ucfirst($registrant['program']);
//            $row[] = $registrant['status'];
            $data [] = $row;
        }
        echo json_encode(['data' => $data]);
    }
}