<?php

class Datacust extends CI_Controller
{

    public function index()
    {
        $data['customer'] = $this->Rental_model->get_data('customer')->result();
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('templates_admin/topbar');
        $this->load->view('admin/customer', $data);
        $this->load->view('templates_admin/footer');
    }
}
