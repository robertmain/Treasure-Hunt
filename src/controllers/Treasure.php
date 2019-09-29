<?php

use App\Core\Controller;

class Treasure extends Controller {

    public function __construct() {
        parent::__construct();
        if(!isLoggedIn()){
            redirect('');
        }
        if (isAdmin()) {
            redirect('admin/home');
        }
        $this->load->helper(array('treasure_helper'));
        $this->load->model(array('Mytreasure'));
    }

    public function index() {
        if (!isLoggedIn() | isAdmin()) {
            show_404(current_url(), FALSE);
        }
        $this->data['foundAllTitle'] = $this->Config->get_by(['key' => 'completetitle'])->value;
        $find = array('%NCODES', '%TEAMNAME');
        $replace = array(sizeof($this->Treasure->get_all()), TEAMNAME);
        $this->data['foundAllMessage'] = str_replace($find, $replace, $this->Config->get_by(['key' => 'completemessage'])->value);
        $this->data['treasure'] = $this->Treasure->get_all();
        $this->render('partials::treasure/index', $this->data);
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
                            if (!isAdmin()) {
                                $this->mytreasure_model->insert(array(
                                    'pirate' => $this->session->userdata('id'),
                                    'treasure' => $this->data['Treasure']->id,
                                    'time' => time()
                                ));
                            }
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
