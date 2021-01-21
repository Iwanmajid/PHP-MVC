<?php

class About extends Controller {
    //method
    public function index($nama = 'Iwan', $pekerjaan = 'Programmer', $umur = 23)
    {
        // echo "Halo, nama saya $nama, saya adalah seorang $pekerjaan. Saya berumur $umur tahun." ;
        $data['nama'] = $nama;
        $data['pekerjaan'] = $pekerjaan;
        $data['umur'] = $umur;
        $data['judul'] = 'About Me';

        $this->view('templates/header', $data);
        $this->view('about/index', $data);
        $this->view('templates/footer');
    }

    public function page()
    {
        // echo 'about/page';
        $data['judul'] = 'Pages';

        $this->view('templates/header', $data);
        $this->view('about/page');
        $this->view('templates/footer');
    }
}