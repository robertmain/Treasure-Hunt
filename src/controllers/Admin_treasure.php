<?php

use App\Core\Admin_Controller;

// phpcs:disable PSR1.Classes.ClassDeclaration.MissingNamespace
// phpcs:disable Squiz.Classes.ValidClassName.NotCamelCaps
class Admin_treasure extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Treasure'));
    }

    public function index()
    {
        $this->data['allTreasure'] = $this->Treasure->get_all_and_last();
        $this->render('partials::admin/treasure/index', $this->data);
    }

    public function add()
    {
        $this->render('partials::admin/treasure/add');
    }

    public function create()
    {
        $this->form_validation->set_rules('title', 'Treasure Title', 'trim|required');
        $this->form_validation->set_rules('location', 'Treasure Location', 'trim|required');
        $this->form_validation->set_rules('text', 'Treasure Text', 'trim');
        $this->form_validation->set_rules('clue', 'Treasure Clue', 'trim');
        $this->form_validation->set_error_delimiters('<div class="alert alert-error">', '</div>');
        if ($this->form_validation->run() == false) {
            $this->render('partials::admin/treasure/index');
        } else {
            $newTreasureID = $this->Treasure->save([
                'title' => $this->input->post('title'),
                'location' => $this->input->post('location'),
                'text' => $this->input->post('text'),
                'clue' => $this->input->post('clue')
            ]);
            $this->Treasure->save([
                'md5' => md5($newTreasureID),
            ], $newTreasureID);
            redirect('admin/treasure');
        }
    }

    public function delete($treasureId)
    {
        $this->data['Treasure'] = $this->Treasure->get($treasureId);
        $this->render('partials::admin/treasure/delete', $this->data);
    }

    public function remove($treasureId)
    {
        $this->Treasure->delete($treasureId);
        redirect('admin/treasure');
    }

    public function edit($treasureId)
    {
        $this->data['Treasure'] = $this->Treasure->get($treasureId);
        $this->render('partials::admin/treasure/edit', $this->data);
    }

    public function update()
    {
        $this->Treasure->save([
            'title'=>$this->input->post('title'),
            'location'=>$this->input->post('location'),
            'clue'=>$this->input->post('clue'),
            'text'=>$this->input->post('text')
        ], $this->input->post('id'));
        redirect('admin/treasure');
    }

    public function view()
    {
        $this->data['Treasure'] = $this->Treasure->get($this->uri->segment(4));
        $this->render('partials::admin/treasure/view', $this->data);
    }
}
