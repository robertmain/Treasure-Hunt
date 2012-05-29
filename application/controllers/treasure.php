<?php

class Treasure extends MY_Controller {

    public function __construct() {
        parent::__construct();
        if(isAdmin()){
            redirect('admin/home');
        }
        $this->load->helper(array('treasure_helper'));
        $this->load->model(array('mytreasure_model'));
    }

    public function index() {
        if (!isLoggedIn() | isAdmin()) {
            show_404(current_url(), FALSE);
        }
        $this->data['found']->title = $this->config_model->get_by('key', 'completetitle')->value;
        $this->data['found']->message = $this->config_model->get_by('key', 'completemessage')->value;
        $this->data['treasure'] = $this->treasure_model->get_all();
        $this->template->write_view('content', 'views/treasure/index', $this->data);
        $this->template->render();
    }

    public function find() {
        if (!$this->uri->segment(3)) {
            show_404(current_url(), FALSE);
        }
        else {
            if ($this->data['Treasure'] = $this->treasure_model->get_by('md5', $this->uri->segment(3))) {
                if (isFound($this->data['Treasure']->id, $this->session->userdata('id'))) {
                    $found = TRUE;
                }
                else {
                    $found = FALSE;
                    if (isLoggedIn()) {
                        if (!isBanned($this->session->userdata('id'))) {
                            $this->mytreasure_model->insert(array(
                                'pirate' => $this->session->userdata('id'),
                                'treasure' => $this->data['Treasure']->id,
                                'time' => time()
                            ));
                        }
                    }
                }
                $this->data['found'] = $found;
                $this->template->write_view('content', 'views/treasure/find', $this->data);
                $this->template->render();
            }
            else {
                show_404(current_url(), FALSE);
            }
        }
    }

}