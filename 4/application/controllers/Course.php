<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Course extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Course_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'course/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'course/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'course/index.html';
            $config['first_url'] = base_url() . 'course/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Course_model->total_rows($q);
        $course = $this->Course_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'course_data' => $course,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('course/course_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Course_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'name' => $row->name,
		'thumbnail' => $row->thumbnail,
		'id_author' => $row->id_author,
		'duration' => $row->duration,
		'description' => $row->description,
	    );
            $this->load->view('course/course_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('course'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('course/create_action'),
	    'id' => set_value('id'),
	    'name' => set_value('name'),
	    'thumbnail' => set_value('thumbnail'),
	    'id_author' => set_value('id_author'),
	    'duration' => set_value('duration'),
	    'description' => set_value('description'),
	);
        $this->load->view('course/course_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'name' => $this->input->post('name',TRUE),
		'thumbnail' => $this->input->post('thumbnail',TRUE),
		'id_author' => $this->input->post('id_author',TRUE),
		'duration' => $this->input->post('duration',TRUE),
		'description' => $this->input->post('description',TRUE),
	    );

            $this->Course_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('course'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Course_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('course/update_action'),
		'id' => set_value('id', $row->id),
		'name' => set_value('name', $row->name),
		'thumbnail' => set_value('thumbnail', $row->thumbnail),
		'id_author' => set_value('id_author', $row->id_author),
		'duration' => set_value('duration', $row->duration),
		'description' => set_value('description', $row->description),
	    );
            $this->load->view('course/course_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('course'));
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
		'thumbnail' => $this->input->post('thumbnail',TRUE),
		'id_author' => $this->input->post('id_author',TRUE),
		'duration' => $this->input->post('duration',TRUE),
		'description' => $this->input->post('description',TRUE),
	    );

            $this->Course_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('course'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Course_model->get_by_id($id);

        if ($row) {
            $this->Course_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('course'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('course'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('name', 'name', 'trim|required');
	$this->form_validation->set_rules('thumbnail', 'thumbnail', 'trim|required');
	$this->form_validation->set_rules('id_author', 'id author', 'trim|required');
	$this->form_validation->set_rules('duration', 'duration', 'trim|required');
	$this->form_validation->set_rules('description', 'description', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Course.php */
/* Location: ./application/controllers/Course.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-10-10 10:10:11 */
/* http://harviacode.com */