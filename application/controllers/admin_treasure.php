<?php

class Admin_treasure extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model(array('treasure_model'));
    }

    public function index() {
        $this->data['allTreasure'] = $this->treasure_model->get_all();
        $this->template->write_view('content', 'views/admin/treasure/index', $this->data);
        $this->template->render();
    }

    public function add() {
        $this->template->write_view('content', 'views/admin/treasure/add', $this->data);
        $this->template->render();
    }

    public function create() {
        $this->form_validation->set_rules('title', 'Treasure Title', 'trim|required');
        $this->form_validation->set_rules('location', 'Treasure Location', 'trim|required');
        $this->form_validation->set_rules('text', 'Treasure Text', 'trim');
        $this->form_validation->set_rules('clue', 'Treasure Clue', 'trim');
        $this->form_validation->set_error_delimiters('<div class="alert alert-error">', '</div>');
        if ($this->form_validation->run() == FALSE) {
            $this->template->write_view('content', 'views/admin/treasure/add');
            $this->template->render();
        }
        else {
            $newTreasure = array(
                'title' => $this->input->post('title'),
                'location' => $this->input->post('location'),
                'text' => $this->input->post('text'),
                'clue' => $this->input->post('clue')
            );
            $newlyAddedTreasure = $this->treasure_model->insert($newTreasure);
            $this->treasure_model->update_by('id', $newlyAddedTreasure, array('md5' => md5('FDSAfdsa34' . $newlyAddedTreasure)));
            redirect('admin/treasure');
        }
    }

    public function delete() {
        $this->data['Treasure'] = $this->treasure_model->get($this->uri->segment(4));
        $this->template->write_view('content', 'views/admin/treasure/delete', $this->data);
        $this->template->render();
    }

    public function remove() {
        $this->treasure_model->delete($this->uri->segment(4));
        redirect('admin/treasure');
    }

    public function edit() {
        $this->data['Treasure'] = $this->treasure_model->get($this->uri->segment(4));
        $this->template->write_view('content', 'views/admin/treasure/edit', $this->data);
        $this->template->render();
    }

    public function update() {
        $updatedTreasure = array(
            'title'=>$this->input->post('title'),
            'location'=>$this->input->post('location'),
            'clue'=>$this->input->post('clue'),
            'text'=>$this->input->post('text')
        );
        $this->treasure_model->update_by('id', $this->input->post('id'), $updatedTreasure);
        redirect('admin/treasure');
    }
    
    public function view(){
        $this->data['Treasure'] = $this->treasure_model->get($this->uri->segment(4));
        $this->template->write_view('content', 'views/admin/treasure/view', $this->data);
        $this->template->render();
    }

}