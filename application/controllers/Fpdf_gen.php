<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fpdf_gen extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        // $this->load->library('form_validation');
        require_once APPPATH.'third_party/fpdf/';
        $pdf= new FPDF();
        $pdf->AddPage();
        $CI= get_instance();
        $CI->fpdf=$pdf;
    }

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
}
