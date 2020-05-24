<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


require_once dirname(__FILE__) . '/tcpdf/tcpdf.php';
require_once dirname(__FILE__) . '/fpdi/src/autoload.php';
use setasign\Fpdi\Tcpdf\Fpdi;


class Pdf extends Fpdi
{
    function __construct()
    {
        parent::__construct();
    }
}
?>
