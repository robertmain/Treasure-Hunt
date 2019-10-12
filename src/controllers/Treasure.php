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
        $this->load->helper(['treasure_helper']);
        $this->load->model(['Mytreasure', 'Treasure']);
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

    public function find($hash) {
        $treasure = $this->Treasure->get_by(['md5' => $hash]);
        if ($treasure) {
            if (isFound($treasure->id, $this->data['me']->id)) {
                $found = true;
            } else {
                $found = false;
                if (!isBanned($this->data['me']->id) && !isAdmin()) {
                    $this->Mytreasure->save([
                        'pirate' => $this->data['me']->id,
                        'treasure' => $treasure->id,
                        'time' => time()
                    ]);
                }
            }
            $this->data['found'] = $found;
            $this->data['treasure'] = $treasure;
            $this->render('partials::treasure/find', $this->data);
        } else {
            show_404();
        }
    }

}
