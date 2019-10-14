<?php

namespace App\Core;

use League\Plates\Engine;
use Exceptions\Http\HttpException;

/**
 * Abstract Base Controller
 *
 * Abstract controller that all application controllers should inherit from in order to benefit from utilities such
 * as pre-configured templating etc.
 */
abstract class Controller extends \CI_Controller
{
    public $data = [];

    public function __construct()
    {
        parent::__construct();

        $this->load->model(['Pirate', 'Config']);
        $this->data['cookielaw'] = $this->Config->get_by([
            'key' => 'cookielaw'
        ])->value;
        if (isLoggedIn()) {
            $this->data['me'] = $this->Pirate->get($this->session->userdata('id'));
        }

        set_exception_handler([self::class, 'handle_http_exception']);

        $this->templates = new Engine(VIEWPATH);

        $this->templates->addData([
            'CI' => get_instance(),
        ]);
        $this->templates->addData($this->data);
        $this->templates->addData([
            'title' => '',
            'subtitle' => '',
        ], 'layouts/default');
        $this->templates->addFolder('layouts', VIEWPATH . 'layouts');
        $this->templates->addFolder('partials', VIEWPATH . 'partials');
    }

    /**
     * Wraps the `render()` method from plates. It can output the partial(default), or it can return it for usage
     * elsewhere (for example in sending an email)
     *
     * @param String  $partial       Path to the partial to display
     * @param Array   $template_vars A hash of values to pass through to the underlying template
     * @param Boolean $output        Turns the output of the template on or off. If set to true,
     *                               the template will be output by the method directly. Otherwise, the parsed template
     *                               will be returned as a string (this can be useful when sending HTML email)
     *
     * @see http://platesphp.com/v3/simple-example
    */
    protected function render($partial, array $template_vars = [], $output = true)
    {
        if ($output) {
            echo $this->templates->render($partial, $template_vars);
        } else {
            return $this->templates->render($partial, $template_vars);
        }
    }

    /**
     * Exception handler to allow the extension of CodeIgniter's exception handling.
     *
     * Other exceptions that do not extend {@link HTTPException} will simply be
     * allowed to bubble to the default CodeIgniter
     * exception handler
     *
     * @internal
     */
    // phpcs:disable PSR1.Methods.CamelCapsMethodName.NotCamelCaps
    public static function handle_http_exception($exception)
    {
        if (is_subclass_of($exception, HttpException::class)) {
            show_error($exception->getMessage(), $exception->getCode());
        } else {
            _exception_handler($exception);
        }
    }
}
