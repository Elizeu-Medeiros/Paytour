<?php
defined('BASEPATH') or exit('No direct script access allowed');

//Include Hybridauth autoloader
require APPPATH . '/third_party/hybridauth/autoload.php';

//Import Hybridauth's namespace
use Hybridauth\Hybridauth;


class Social extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        //Load URL helper
        $this->load->helper('url');

        $this->load->model("Usuarios_model", "usuarios");
    }

    //Displays social login links
    function index()
    {
        //Instantiate Hybridauth's classes
        $hybrid = new Hybridauth($this->getHybridConfig());

        //Get enabled providers array
        $providers = $hybrid->getProviders();

        $CI = &get_instance();
        //List a link to login
        foreach ($providers as $provider) {
            $href = sprintf(base_url('%s/auth/%s/'), strtolower($CI->router->class), $provider);
            printf('<p><a href="%s">Login with %s</p>', $href, $provider);
        }
    }

    //Processes social login
    function auth($provider = NULL)
    {
        $service = NULL;

        try {
            //Instantiate Hybridauth's classes
            $hybrid = new Hybridauth($this->getHybridConfig());

            //Check if given provider is enabled
            if ((isset($provider)) && in_array($provider, $hybrid->getProviders())) {
                $this->session->set_userdata('provider', $provider);
            }

            //Update variable with the valid provider
            $provider = $this->session->userdata('provider');

            if ($provider) {
                $service = $hybrid->authenticate($provider);
                               
                if ($service->isConnected()) {
                    //Get user profile
                    $profile = $service->getUserProfile();
                   
                    //Get user contacts
                    //$contacts = $service->getUserContacts();

                    /*
                    Disconnect the service else HA would reuse stored session data
                    rather making a fresh request in case the user has denied permissions
                    in the previous authorization request
                    */
                    $service->disconnect();

                    $this->session->unset_userdata('provider');

                    $id_usuario = "";
                    $usuario = $this->usuarios->is_duplicated("identifier", $profile->identifier);

                    //Display the profile data
                    if ($usuario) {
                    
                        $this->session->set_userdata('usuario', $usuario);

                        redirect(base_url("restrito"));
                    } else {
                        if ($id_usuario = $this->usuarios->insertUsuarioSocial($profile)) {
                            if ($usuario = $this->usuarios->get_data($id_usuario)) {
                                
                                $this->session->set_userdata('usuario', $usuario);
                                redirect(base_url("restrito"));
                            }
                        } else {
                            redirect(base_url("signup"));
                        }
                    }

                    //print_r(json_encode($profile));
                } else {
                    $this->session->set_flashdata('showmsg', array('msg' => 'Desculpe! Não foi possível autenticar sua identidade.'));
                }
            }
        } catch (Exception $e) {
            if (isset($service) && $service->isConnected())
                $service->disconnect();

            $error = 'Sorry! We couldn\'t authenticate you.';
            $this->session->set_flashdata('showmsg', array('msg' => $error));
            $error .= '\nError Code: ' . $e->getCode();
            $error .= '\nError Message: ' . $e->getMessage();

            log_message('error', $error);
        }

        //redirect();
    }

    //Hybridauth configuration
    private function getHybridConfig()
    {
        $config = array(

            'callback' => site_url('social/auth/'),

            'providers' => array(
                'Google' => array(
                    'enabled' => true,
                    'keys' => array(
                        'id' => '442982032381-udpcjs47iuhr144va1euvnfuvi9vje3o.apps.googleusercontent.com',
                        'secret' => 'guI7188EB_2NtqmrMXZNQM2M'
                    ),
                    'scope' => 'https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/userinfo.profile'
                ),

                'Facebook' => array(
                    'enabled' => true,
                    'keys' => array(
                        'id' => (ENVIRONMENT == 'development') ? '320108295714696' : 'PRODUCTION_APP_ID',
                        'secret' => (ENVIRONMENT == 'development') ? '18c6cd08753126a181e553d401b62310' : 'PRODUCTION_APP_SECRET'
                    ),
                    'scope' => 'email, public_profile'
                )/*,

                'Twitter' => array(
                    'enabled' => true,
                    'keys' => array(
                        'key' => 'APP_KEY',
                        'secret' => 'APP_SECRET'
                    )
                )*/
            ),

            'hybrid_debug' => array(
                'debug_mode' => 'info', /* none, debug, info, error */
                'debug_file' => APPPATH . '/logs/log-' . date('Y-m-d') . '.php'
            )
        );

        return $config;
    }
}
