<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kriteria extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Kriteria_model');
        $this->load->library('Form_validation');
        $this->load->library('M_db');
        $this->load->library('Ion_auth');
        ceklogin();
    }

    public function index()
    {
        
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'kriteria/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'kriteria/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'kriteria/index.html';
            $config['first_url'] = base_url() . 'kriteria/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Kriteria_model->total_rows($q);
        $kriteria = $this->Kriteria_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'kriteria_data' => $kriteria,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->template->load('template/backend/dashboard', 'kriteria/kriteria_list', $data);
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('kriteria/create_action'),
    	    'id_kriteria' => set_value('id_kriteria'),
    	    'nama_kriteria' => set_value('nama_kriteria'),
	);
        $this->template->load('template/backend/dashboard', 'kriteria/kriteria_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_kriteria' => $this->input->post('nama_kriteria',TRUE),
	    );

            $this->Kriteria_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('kriteria'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Kriteria_model->get_by_id($id);

        if ($row) {
            $data = array(
                        'button' => 'Update',
                        'action' => site_url('Kriteria/update_action'),
                		'id_kriteria' => set_value('id_kriteria', $row->id_kriteria),
                		'nama_kriteria' => set_value('nama_kriteria', $row->nama_kriteria),
	                   );
            $this->template->load('template/backend/dashboard', 'kriteria/kriteria_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('Kriteria'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_kriteria', TRUE));
        } else {
            $data = array(
		'nama_kriteria' => $this->input->post('nama_kriteria',TRUE),
	    );

            $this->Kriteria_model->update($this->input->post('id_kriteria', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('kriteria'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Kriteria_model->get_by_id($id);

        if ($row) {
            $this->Kriteria_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('kriteria'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('kriteria'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_kriteria', 'nama kriteria', 'trim|required');

	$this->form_validation->set_rules('id_kriteria', 'id_kriteria', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Kriteria.php */
/* Location: ./application/controllers/Kriteria.php */
