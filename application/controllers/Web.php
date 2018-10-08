<?php defined('BASEPATH') OR exit('NO REDIRECT SCRIPT ALLOWED');

/**
* 
*/
class Web extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url','date'));
        $this->load->library('pagination');
        $this->load->library('encryption');
	}
	function index(){
		redirect('berita');
	}
    function coba(){
        $data=$this->encryption->encrypt('123');
        $data=$this->encryption->decrypt($data);
        echo $data;
    }
	function login(){
		$this->load->view('index/header')
		->view('index/navigation')
		->view('index/login')
		->view('index/footer');
	}
	
	function cek_login(){
		$input_post=$this->input->post(array('username','password'),true);
		if(is_numeric($input_post['username'])){
			$where='nim';
			$table='alumni';
		}else{
			$where='username';
			$table='admin';
		}

		$username=$_POST['username'];
		$data=$this->Model->login($where,$table,$input_post);
		$this->session->set_flashdata('username',$input_post['username']);
		$this->session->set_flashdata('password',$input_post['password']);
		if(!$data){			
			$this->session->set_flashdata('status_log',' username atau password salah');
			redirect('web/login');
		}
		else{
			$data=$data[0];
            $pas_input=$input_post['password'];
            $pas_db=$this->encryption->decrypt($data['password']);
			if($pas_input==$pas_db){
				$data_session=array(			
					'user'=>$input_post['username'],
					'status'=>$table,
					'nama'=>$data['nama'],
					'where'=>$where,
					'foto'=>$data['foto'],
					'email'=>$data['email']
				);
				$this->session->set_userdata($data_session);
				redirect('dashboard');
			}else{
				$this->session->set_flashdata('status_log','password salah');
				redirect('web/login');
			}
		}
	}
	function logout(){
		$this->session->sess_destroy();
		redirect('web/login');
	}
	function reset_password(){
		$nim=$this->input->post('nim',true);
		$data=$this->Model->get_email($nim);
		if($data){
			$status['status']="email ditemukan.";
			$status['email']=$data[0]['email'];
			$status['nama']=$data[0]['nama'];
		}
		else{		
			$status['status']="email tidak terdaftar.";
			$status['email']=0;
		}
		echo json_encode($status);
	}
	function lupa_kata_sandi(){
	$this->load->view('index/header')
		->view('index/navigation')
		->view('index/lupa_sandi')
		->view('index/footer');
	}
	function kirim_email(){
 $informasi=$this->Model->getTable('informasi');
 $informasi=$informasi[0];
 $logo=base_url().'upload/foto/'.$informasi['logo'];
	$data=$this->input->post(array('nama','email'),true);
	$this->session->set_flashdata('email',$data['email']);
	if(empty($data))
		redirect(base_url());
    $email=$data['email'];
         $config = Array(  
    'protocol' => 'smtp',  
    'smtp_host' => 'ssl://smtp.googlemail.com',  
    'smtp_port' => 465,  
    'smtp_user' => 'alumnistebialmuhsin@gmail.com',
    'smtp_pass' => 'stebi2018',  
    'mailtype' => 'html',  
    'charset' => 'iso-8859-1'  
   );  
   $this->load->library('email', $config);  
   $this->email->set_newline("\r\n");  
   $this->email->from('alumnistebialmuhsin@gmail.com', 'Admin Sistem Informasi Alumni STEBI Al-Muhsin');  
   $this->email->to($email);  
   $this->email->subject('Permintaan Kata Sandi Baru');
   $nama=$data['nama'];
   $new_password=substr(md5(mt_rand(100000,999999)),0,6);
   $where_['email']=$email;
   $password['password']=$this->encryption->encrypt($new_password);
   $this->Model->update_data($where_,$password,'alumni');
   $htmlBody=<<<END
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns:v="urn:schemas-microsoft-com:vml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;" />
    <meta name="viewport" content="width=600,initial-scale = 2.3,user-scalable=no">
    <!--[if !mso]><!-- -->
    <link href='https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700' rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Quicksand:300,400,700' rel="stylesheet">
    <!-- <![endif]-->
    <title>Permintaan Kata Sandi Baru</title>
    <style type="text/css">
        body {
            width: 100%;
            background-color: #ffffff;
            margin: 0;
            padding: 0;
            -webkit-font-smoothing: antialiased;
            mso-margin-top-alt: 0px;
            mso-margin-bottom-alt: 0px;
            mso-padding-alt: 0px 0px 0px 0px;
        }

        p,
        h1,
        h2,
        h3,
        h4 {
            margin-top: 0;
            margin-bottom: 0;
            padding-top: 0;
            padding-bottom: 0;
        }

        span.preheader {
            display: none;
            font-size: 1px;
        }

        html {
            width: 100%;
        }

        table {
            font-size: 14px;
            border: 0;
        }
        /* ----------- responsivity ----------- */

        @media only screen and (max-width: 640px) {
            /*------ top header ------ */
            .main-header {
                font-size: 20px !important;
            }
            .main-section-header {
                font-size: 28px !important;
            }
            .show {
                display: block !important;
            }
            .hide {
                display: none !important;
            }
            .align-center {
                text-align: center !important;
            }
            .no-bg {
                background: none !important;
            }
            /*----- main image -------*/
            .main-image img {
                width: 440px !important;
                height: auto !important;
            }
            /* ====== divider ====== */
            .divider img {
                width: 440px !important;
            }
            /*-------- container --------*/
            .container590 {
                width: 440px !important;
            }
            .container580 {
                width: 400px !important;
            }
            .main-button {
                width: 220px !important;
            }
            /*-------- secions ----------*/
            .section-img img {
                width: 320px !important;
                height: auto !important;
            }
            .team-img img {
                width: 100% !important;
                height: auto !important;
            }
        }

        @media only screen and (max-width: 479px) {
            /*------ top header ------ */
            .main-header {
                font-size: 18px !important;
            }
            .main-section-header {
                font-size: 26px !important;
            }
            /* ====== divider ====== */
            .divider img {
                width: 280px !important;
            }
            /*-------- container --------*/
            .container590 {
                width: 280px !important;
            }
            .container590 {
                width: 280px !important;
            }
            .container580 {
                width: 260px !important;
            }
            /*-------- secions ----------*/
            .section-img img {
                width: 280px !important;
                height: auto !important;
            }
        }
    </style>
    <!-- [if gte mso 9]><style type=”text/css”>
        body {
        font-family: arial, sans-serif!important;
        }
        </style>
    <![endif]-->
</head>
<body class="respond" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
    <!-- header -->
    <table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="030E66">
        <tr>
            <td align="center">
                <table border="0" align="center" width="590" cellpadding="0" cellspacing="0" class="container590">
                    <tr>
                        <td height="25" style="font-size: 25px; line-height: 25px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td align="center">

                            <table border="0" align="center" width="590" cellpadding="0" cellspacing="0" bgcolor="030E66" class="container590">

                                <tr>
                                    <td align="center" height="70" style="height:70px;">
                                        <a href="
END;
$htmlBody.=base_url();
$htmlBody.=<<<END
                                        " style="display: block; border-style: none !important; border: 0 !important;"><img width="100" border="0" style="display: block; width: 200px;" src="
END;
$htmlBody.=$logo;
$htmlBody.=<<<END
                                        " alt="" /></a>
                                    </td>
                                </tr>

                                <tr>
                                    <td align="center">
                                        &nbsp;
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <!-- end header -->
    <!-- big image section -->
    <table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="ffffff" class="bg_color">
        <tr>
            <td align="center">
                <table border="0" align="center" width="590" cellpadding="0" cellspacing="0" class="container590">
                    <tr>

                        <td align="center" class="section-img">
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td height="20" style="font-size: 20px; line-height: 20px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td height="10" style="font-size: 10px; line-height: 10px;">&nbsp;</td>
                    </tr>

                    <tr>
                        <td align="center">
                            <table border="0" width="40" align="center" cellpadding="0" cellspacing="0" bgcolor="eeeeee">
                                <tr>
                                    <td height="2" style="font-size: 2px; line-height: 2px;">&nbsp;</td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td height="20" align="left" style="color: #888888; font-size: 20px; font-family: 'Work Sans', Calibri, sans-serif; line-height: 20px;">
						<div style="line-height: 24px">
										<p>Hallo, 
END;
$htmlBody.=$nama;
$htmlBody.=<<<END
											</p>
                                        </div>
						</td>
                    </tr>

                    <tr>
                        <td align="center">
                            <table border="0" width="400" align="center" cellpadding="0" cellspacing="0" class="container590">
                                <tr>
                                    <td align="center" style="color: #888888; font-size: 16px; font-family: 'Work Sans', Calibri, sans-serif; line-height: 24px;">


                                        <div style="line-height: 24px">
										<p>Kata sandi baru anda : 
END;
$htmlBody.=$new_password;
$htmlBody.=<<<END
										</p>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td height="25" style="font-size: 25px; line-height: 25px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td align="center">
                            <table border="0" align="center" width="160" cellpadding="0" cellspacing="0" bgcolor="5caad2" style="">

                                <tr>
                                    <td height="10" style="font-size: 10px; line-height: 10px;">&nbsp;</td>
                                </tr>

                                <tr>
                                    <td align="center" style="color: #ffffff; font-size: 14px; font-family: 'Work Sans', Calibri, sans-serif; line-height: 26px;">


                                        <div style="line-height: 26px;">
                                            <a href="" style="color: #ffffff; text-decoration: none;">LOGIN</a>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td height="10" style="font-size: 10px; line-height: 10px;">&nbsp;</td>
                                </tr>

                            </table>
                        </td>
                    </tr>
                </table>

            </td>
        </tr>
        <tr class="hide">
            <td height="25" style="font-size: 25px; line-height: 25px;">&nbsp;</td>
        </tr>
        <tr>
            <td height="40" style="font-size: 40px; line-height: 40px;">&nbsp;</td>
        </tr>
    </table>
    <!-- end section -->
    <!-- contact section -->
    <table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="ffffff" class="bg_color">
        <tr>
            <td height="60" style="border-top: 1px solid #e0e0e0;font-size: 60px; line-height: 60px;">&nbsp;</td>
        </tr>
        <tr>
            <td align="center">
                <table border="0" align="center" width="590" cellpadding="0" cellspacing="0" class="container590 bg_color">

                    <tr>
                        <td>
                            <table border="0" width="300" align="left" cellpadding="0" cellspacing="0" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;"
                                class="container590">
                                <tr>
                                    <td align="left" style="color: #888888; font-size: 14px; font-family: 'Work Sans', Calibri, sans-serif; line-height: 23px;"
                                        class="text_color">
                                        <div style="color: #333333; font-size: 14px; font-family: 'Work Sans', Calibri, sans-serif; font-weight: 600; mso-line-height-rule: exactly; line-height: 23px;">

                                            Hubungi kami: <br/> <a href="mailto:" style="color: #888888; font-size: 14px; font-family: 'Hind Siliguri', Calibri, Sans-serif; font-weight: 400;">alumnistebialmuhsin@gmail.com</a>

                                        </div>
                                    </td>
                                </tr>

                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td height="60" style="font-size: 10px;line-height: 10px;">&nbsp;</td>
        </tr>
    </table>
    <!-- end section -->

    <!-- footer ====== -->
    <table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="201E1C" style="color:#F4F4F4;">
        <tr>
            <td height="25" style="font-size: 25px; line-height: 25px;">&nbsp;</td>
        </tr>
        <tr>
            <td align="center">
                <table border="0" align="center" width="590" cellpadding="0" cellspacing="0" class="container590">
                    <tr>
                        <td>
                            <table border="0" align="left" cellpadding="0" cellspacing="0" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;"
                                class="container590">
                                <tr>
                                    <td align="left" style="color: #F4F4F4; font-size: 14px; font-family: 'Work Sans', Calibri, sans-serif; line-height: 24px;">
                                        <div style="line-height: 24px;">

                                            <span style="color: #F4F4F4;">Sistem Informasi ALumni STEBI Al-Muhsin</span>

                                        </div>
                                    </td>
                                </tr>
                            </table>

                            <table border="0" align="left" width="5" cellpadding="0" cellspacing="0" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;"
                                class="container590">
                                <tr>
                                    <td height="20" width="5" style="font-size: 20px; line-height: 20px;">&nbsp;</td>
                                </tr>
                            </table>

                            <table border="0" align="right" cellpadding="0" cellspacing="0" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;"
                                class="container590">

                                <tr>
                                    <td align="center">
                                        <table align="center" border="0" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td align="center">
                                                    <a style="font-size: 14px; font-family: 'Work Sans', Calibri, sans-serif; line-height: 24px;color: #5caad2; text-decoration: none;font-weight:bold;"
                                                        href="
END;
$htmlBody.=base_url();
$htmlBody.=<<<END
                                                  ">Kunjungi Website Kami</a>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td height="25" style="font-size: 25px; line-height: 25px;">&nbsp;</td>
        </tr>
    </table>
    <!-- end footer ====== -->
</body>
</html>
END;
   $this->email->message($htmlBody);  
   if (!$this->email->send()) {  
    $status['status']=$this->email->print_debugger();
   }else{  
    $status['status']='Success, send email to '.$email;  
   }
   redirect(base_url());	
}
function hapus_gambar(){
    $file_name=$this->input->post('file_name');
    unlink('upload/berita/'.$file_name);
}
function hapus_foto(){
    $file_name=$this->input->post('file_name');
    unlink('upload/foto/'.$file_name);
}
function hapus_galeri(){
    $file_name=$this->input->post('file_name');
    unlink('upload/galeri/'.$file_name);
    $where['url']=$file_name; 
    $this->Model->delete($where,'galeri');
}
function ajax_upload(){
    //upload file
    $data=array();
        $config['upload_path'] = 'upload/berita/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_filename'] = '100';
        $config['encrypt_name'] = TRUE;
        $config['max_size'] = '500'; //1 MB
        $config['max_width'] = '1000';
        $config['max_height'] = '700';
        if (isset($_FILES['thumbnail_']['name'])) {
            if (0 < $_FILES['thumbnail_']['error']) {
                $data['status_']='Error during file upload' . $_FILES['thumbnail_']['error'];
            } else {
                if (file_exists('upload/berita/' . $_FILES['thumbnail_']['name'])) {
                $data['status']='File already exists : upload/berita/' . $_FILES['thumbnail_']['name'];
                } else {
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('thumbnail_')) {
                        $data['status_']=$this->upload->display_errors();
                    } else {
                        $file=$this->upload->data('file_name');
                        $data['status_']='<img src="'.base_url().'upload/berita/' . $file.'"><br><button class="btn btn-danger" onclick="hapus_gambar(\''.$file.'\')" >Hapus</button>';
                        $data['file_name']=$file;
                    }
                }
            }
        } else {
            echo 'Please choose a file';
        }
        echo json_encode($data);
}

function upload_foto(){
    $data=array();
        $config['upload_path'] = 'upload/foto/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_filename'] = '100';
        $config['encrypt_name'] = TRUE;
        $config['max_size'] = '500'; //1 MB
        $config['max_width'] = '1000';
        $config['max_height'] = '700';
        if (isset($_FILES['foto_']['name'])) {
            if (0 < $_FILES['foto_']['error']) {
                $data['status_']='Error during file upload' . $_FILES['foto_']['error'];
            } else {
                if (file_exists('upload/foto/' . $_FILES['foto_']['name'])) {
                $data['status_']='File already exists : upload/foto/' . $_FILES['foto_']['name'];
                } else {
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('foto_')) {
                        $data['status_']=$this->upload->display_errors();
                    } else {
                        $file=$this->upload->data('file_name');
                        $data['status_']='<img src="'.base_url().'upload/foto/' . $file.'"><br><button class="btn btn-danger" onclick="hapus_foto(\''.$file.'\')" >Hapus</button>';
                        $data['file_name']=$file;
                    }
                }
            }
        } else {
            echo 'Please choose a file';
        }
        echo json_encode($data);
}
function upload_galeri(){
    $data=array();
        $config['upload_path'] = 'upload/galeri/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_filename'] = '100';
        $config['encrypt_name'] = TRUE;
        $config['max_size'] = '500'; //1 MB
        $config['max_width'] = '1000';
        $config['max_height'] = '700';
        if (isset($_FILES['thumbnail_']['name'])) {
            if (0 < $_FILES['thumbnail_']['error']) {
                $data['status_']='Error during file upload' . $_FILES['thumbnail_']['error'];
            } else {
                if (file_exists('upload/galeri/' . $_FILES['thumbnail_']['name'])) {
                $data['status']='File already exists : upload/galeri/' . $_FILES['thumbnail_']['name'];
                } else {
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('thumbnail_')) {
                        $data['status_']=$this->upload->display_errors();
                    } else {
                        $file=$this->upload->data('file_name');
                        $data['status_']='<img src="'.base_url().'upload/galeri/' . $file.'"><br><button class="btn btn-danger" onclick="hapus_galeri(\''.$file.'\')" >Hapus</button>';
                        $data['file_name']=$file;
                    }
                }
            }
        } else {
            echo 'Please choose a file';
        }
        echo json_encode($data);
}
    function tambah_galeri(){
        $item=$this->input->post(array('url','keterangan'),true);
        $this->Model->insert_data('galeri',$item);
        echo "sukses";
    }
}

