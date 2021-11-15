<?php
defined('BASEPATH') or exit('No direct script acces allowed');
class Buku extends CI_Controller
{
    public function __construct()
    {
        parent ::__construct();
    }

    public function index()
    {
        $data['judul'] = 'Data Buku';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['buku'] = $this->ModelBuku->getbuku()->result_array();
        $data['kategori'] = $this->ModelBuku->getKategori()->result_array();
        $this->form_validation->set_rules('judul_buku','Judul Buku','required|min_lenght[3}',[
            'required'=>'Judul Buku harus diisi',
            'min_lenght'=>'Judul Buku terlalu pendek'
        ]);
        
        $this->form_validation->set_rules('id_kategori','Kategori','required',[
            'required'=>'Kategori harus diisi'
        ]);
        
        $this->form_validation->set_rules('pengarang','Nama Pengarang','required',
            'required|min_length(3)',[
                'required'=>'Nama Pengarang harus diisi',
                'min_length'=>'Nama Pengarang terlalu pendek'
            ]);
        
        $this->form_validation->set_rules('penerbit','Nama Penerbit',
            'required|min_length(3)',[
                'required'=>'Nama Penerbit harus diisi',
                'min_length'=>'Nama Pnerbit telalu pendek'
            ]);

        $this->form_validation->set_rules('tahun','Tahun Terbit',
            'required|min_length(3)|max_length(4)|numeric',[
                'required'=>'Tahun Terbit harus diisi',
                'max_length'=>'Tahun Terbit terlalu panjang',
                'min_length'=>'Tahun Terbit terlalu pendek',
                'numeric'=>'Hanya boleh diisi dengan angka'
            ]);

        $this->form_validation->set_rules('isbn','Nomor ISBN',
            'required|min_length(3)|numeric',[
                'required'=>'Nama ISBN harus diisi',
                'min_length'=> 'Nama ISBN terlalu pendek',
                'numeric'=>'Hanya boleh diisi dengan angka'
            ]);

        $this->form_validation->set_rules('stok','Stok',
            'required|numeric',[
                'required'=>'Stok harus diisi',
                'numeric'=>'Hanya boleh diisi dengan angka'
            ]);
            
            //konfigurasi gambar
            $config['upload_path']='./assets/img/upload/';
            $config['allowed_types']='jpg|png|jpeg';
            $config['max_size']='3000';
            $config['max_width']='1024';
            $config['max_height']='1000';
            $config['file_name']='img'. time();
        $this->load->library('upload',$config);
        if ($this->form_validation->run() == false){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('buku/index', $data);
            $this->load->view('templates/footer', $data);
        }else{
            if ($this->upload->do_upload('image')) {
                $image =$this->upload->date();
                $gambar =$image['file_name'];
            }else{
                $gambar = '';
            }
            $data =[
                'judul_buku'=> $this->input->post('judul_buku', true),
                'id_kategori'=> $this->input->post('id_kategori', true),
                'pengarang'=> $this->input->post('pengarang', true),
                'penerbit' => $this->input->post('penerbit', true),
                'tahun_terbit'=> $this->input->post('tahun', true),
                'isnb'=> $this->input->post('isbn', true),
                'stok'=> $this->input->post('stok', true),
                'dipinjam' =>0,
                'dibooking' =>0,
                'image' =>$gambar
            ];
        }
        $this->ModelBuku->simpanbuku($data);
        redirect('buku');
        }
    
    public function kategori(){
        $data['judul'] = 'Kategori Buku';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['kategori'] = $this->ModelBuku->getKategori()->result_array();
    $this->form_validation->set_rules('kategori', 'Kategori',
'required', [
    'required' => 'Judul Buku harus diisi'
]);
    if ($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('buku/kategori', $data);
        $this->load->view('templates/footer');
    } else {
        $data = [
            'kategori' => $this->input->post('kategori')
        ];

        $this->ModelBuku->simpanKategori($data);
            redirect('buku/kategori');
        }
    }
    public function hapusKategori()
    {
        $where = ['id' => $this->uri->segment(3)];

        $this->ModelBuku->hapusKategori($where);
            redirect('buku/kategori');
    }
}