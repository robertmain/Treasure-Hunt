<?php

use App\Core\Admin_Controller;
use Exceptions\Http\Client\NotFoundException;

// phpcs:disable PSR1.Classes.ClassDeclaration.MissingNamespace
// phpcs:disable Squiz.Classes.ValidClassName.NotCamelCaps
class Admin_pirates extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(['Mytreasure', 'Pirate', 'Config']);
    }

    /* =======NON-AJAX ACTIONS======= */

    public function index()
    {
        $this->data['registeredUsers'] = $this->Pirate->get_all();
        $this->data['mytreasures'] = $this->Mytreasure->getTreasurePerUser();
        $this->render('partials::admin/pirates/index', $this->data);
    }

    public function manage($user_id)
    {
        $this->data['authorisationEnabled'] = $this->Config->get_by(['key' => 'authorisation']);
        $this->data['Pirate'] = $this->Pirate->get($user_id);
        $this->render('partials::admin/pirates/manage', $this->data);
    }

    public function update($user_id = null)
    {
        $user = $this->Pirate->get($user_id);
        if (!$user) {
            throw new NotFoundException('Unable to find user: ' . $user_id);
        } else {
            $allowedFields = [
                'authorised',
                'phone',
                'password',
                'nickname',
            ];

            $postData = json_decode($this->input->raw_input_stream, true);
            $updatedPirate = array_filter($postData, function ($key) use ($allowedFields) {
                return in_array($key, $allowedFields);
            }, ARRAY_FILTER_USE_KEY);

            $this->Pirate->save($updatedPirate, $user_id);

            $updatedData = $this->Pirate->get($user_id);
            unset($updatedData->password);

            $this->output->set_content_type('application/json')
                ->set_output(json_encode($updatedData));
        }
    }

    /* =======END NON-AJAX ACTIONS======= */



    /* =======AJAX ACTIONS======= */

    public function get($user_id)
    {
        if ($this->input->is_ajax_request()) {
            if ($user_id) {
                $pirate = $this->Pirate->get($user_id);
                unset(
                    $pirate->admin,
                    $pirate->authorised,
                    $pirate->email,
                    $pirate->forename,
                    $pirate->password,
                    $pirate->phone,
                    $pirate->surname,
                    $pirate->banned
                );

                $this->output->set_content_type('application/json')->set_output(json_encode($pirate));
            } else {
                show_error(400, false);
            }
        } else {
            show_404(current_url(), false);
        }
    }

    public function ban($user_id)
    {
        if ($this->input->is_ajax_request()) {
            if ($user_id) {
                $this->Pirate->save(['banned' => true], $user_id);
            } else {
                show_error(400, false);
            }
        } else {
            show_404(current_url(), false);
        }
    }

    public function unban($user_id)
    {
        if ($this->input->is_ajax_request()) {
            if ($user_id) {
                $this->Pirate->save([
                    'banned' => false,
                ], $user_id);
            } else {
                show_error(400, false);
            }
        } else {
            show_404(current_url(), false);
        }
    }

    //phpcs:disable PSR1.Methods.CamelCapsMethodName.NotCamelCaps
    public function strip_treasure($user_id)
    {
        if ($this->input->is_ajax_request()) {
            if ($user_id) {
                $this->Mytreasure->stripTreasure($user_id);
                $pirate = $this->Pirate->get($user_id);
                $this->output->set_content_type('application/json')->set_output(json_encode($pirate));
            } else {
                show_error(400, false);
            }
        } else {
            show_404(current_url(), false);
        }
    }

    /* =======END AJAX ACTIONS======= */
}
