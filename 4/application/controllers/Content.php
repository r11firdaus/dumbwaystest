<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Content extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Content_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'content/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'content/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'content/index.html';
            $config['first_url'] = base_url() . 'content/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Content_model->total_rows($q);
        $content = $this->Content_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'content_data' => $content,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('content/content_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Content_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'name' => $row->name,
		'video_link' => $row->video_link,
		'type' => $row->type,
		'id_course' => $row->id_course,
	    );
            $this->load->view('content/content_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('content'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('content/create_action'),
	    'id' => set_value('id'),
	    'name' => set_value('name'),
	    'video_link' => set_value('video_link'),
	    'type' => set_value('type'),
	    'id_course' => set_value('id_course'),
	);
        $this->load->view('content/content_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'name' => $this->input->post('name',TRUE),
		'video_link' => $this->input->post('video_link',TRUE),
		'type' => $this->input->post('type',TRUE),
		'id_course' => $this->input->post('id_course',TRUE),
	    );

            $this->Content_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('content'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Content_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('content/update_action'),
		'id' => set_value('id', $row->id),
		'name' => set_value('name', $row->name),
		'video_link' => set_value('video_link', $row->video_link),
		'type' => set_value('type', $row->type),
		'id_course' => set_value('id_course', $row->id_course),
	    );
            $this->load->view('content/content_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('content'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'name' => $this->input->post('name',TRUE),
		'video_link' => $this->input->post('video_link',TRUE),
		'type' => $this->input->post('type',TRUE),
		'id_course' => $this->input->post('id_course',TRUE),
	    );

            $this->Content_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('content'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Content_model->get_by_id($id);

        if ($row) {
            $this->Content_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('content'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('content'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('name', 'name', 'trim|required');
	$this->form_validation->set_rules('video_link', 'video link', 'trim|required');
	$this->form_validation->set_rules('type', 'type', 'trim|required');
	$this->form_validation->set_rules('id_course', 'id course', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Content.php */
/* Location: ./application/controllers/Content.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-10-10 10:10:04 */
/* http://harviacode.com */