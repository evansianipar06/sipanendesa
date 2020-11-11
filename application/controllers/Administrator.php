<?php
class Administrator extends CI_Controller{
    public function __construct(){
        parent:: __construct();
        $this->load->model('mlogin');
        
    }

    // public function __construct() {
    //     parent::__construct();

    // }
    public function index(){
        $path = './assets/captcha/';

        if(!file_exists($path)) {
            $buat = mkdir($path, 0777);
            if(!$buat) {
                return;
            }
        }

        $kata = array_merge(range('0','9'),range('A','Z'));
        $acak = shuffle($kata);
        $str = substr(implode($kata), 0,5);

        $data_ses = array('captcha_str'=>$str);
        $this->session->set_userdata($data_ses);

        $vals = array(
            'word' => $str,
            'img_path'=>$path,
            'img_url'=>base_url().'assets/captcha/',
            'img_width'=>'150',
            'img_height'=>40,
            'expiration'=>7200
        );
        $capc = create_captcha($vals);
        $data['captcha_image'] = $capc['image'];

        // $x['judul']="Silahkan Masuk..!";
        $this->load->view('admin/v_login',$data);
    }
    
    function cekuser(){
        $username=strip_tags(stripslashes($this->input->post('username',TRUE)));
        $password=strip_tags(stripslashes($this->input->post('password',TRUE)));
        $po_captcha = $this->input->post('captcha');
        $a = $this->session->userdata('captcha_str');
        $u=$username;
        $p=$password;
        $cadmin=$this->mlogin->cekadmin($u,$p);

        // if($po_captcha != $a) {
        //     $this->session->set_flashdata('msg','<div class="alert alert-warning">Captcha Salah</div>');
        //         redirect('administrator/gagallogin');
        // } else {
        //     redirect('administrator/berhasillogin');
        // }

        if($cadmin->num_rows > 0){
            $this->session->set_userdata('masuk',true);
            $this->session->set_userdata('user',$p);
            // $this->session->set_userdata('pass',$p);
            // $this->session->set_userdata('captcha_str');
            $xcadmin=$cadmin->row_array();
            if($xcadmin['user_level']=='1' && $xcadmin['user_status']=='1') {
                $this->session->set_userdata('akses','1');
                $idadmin=$xcadmin['user_id'];
                $user_nama=$xcadmin['user_nama'];
                $this->session->set_userdata('idadmin',$idadmin);
                $this->session->set_userdata('nama',$user_nama);
                
            }
         
            if($xcadmin['user_level']=='2' && $xcadmin['user_status']=='1'){
                $this->session->set_userdata('akses','2');
                $idadmin=$xcadmin['user_id'];
                $user_nama=$xcadmin['user_nama'];
                $this->session->set_userdata('idadmin',$idadmin);
                $this->session->set_userdata('nama',$user_nama);
            } //Front Office
         
            if($xcadmin['user_level']=='3' && $xcadmin['user_status']=='1'){
                $this->session->set_userdata('akses','3');
                $idadmin=$xcadmin['user_id'];
                $user_nama=$xcadmin['user_nama'];
                $this->session->set_userdata('idadmin',$idadmin);
                $this->session->set_userdata('nama',$user_nama);
            } 
        
            if($xcadmin['user_level']=='4' && $xcadmin['user_status']=='1'){
                $this->session->set_userdata('akses','4');
                $idadmin=$xcadmin['user_id'];
                $user_nama=$xcadmin['user_nama'];
                $this->session->set_userdata('idadmin',$idadmin);
                $this->session->set_userdata('nama',$user_nama);
            }
        }
        
        if($this->session->userdata('masuk')==true){
            if($po_captcha == $a) {
                redirect('administrator/berhasillogin');
            } else {
                redirect('administrator/gagallogin');
            }
        } else {
            redirect('administrator/gagallogin');
        }
    }


        

        function berhasillogin(){
            redirect('welcome');
        }
      
        function gagallogin(){
            $url=base_url('administrator');
            echo $pesan = '<div class="alert alert-warning"><strong><i>Pastikan semua field terisi dengan benar !</i></strong></div>';
            $this->session->set_flashdata('msg', $pesan);
               redirect($url);
        }
        function logout(){
            $this->session->sess_destroy();
            $url=base_url('administrator');
            redirect($url);
        }
}