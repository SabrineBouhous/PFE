<?php
/**
 * This file is part of FPDI
 *
 * @package   setasign\Fpdi
 * @copyright Copyright (c) 2020 Setasign GmbH & Co. KG (https://www.setasign.com)
 * @license   http://opensource.org/licenses/mit-license The MIT License
 */


//houda C:\xampp\htdocs\projet\admin\FPDI-2.3.2\src\FpdfTplTrait.php


namespace setasign\Fpdi;
require_once('FpdfTplTrait.php'); 


/**
 * Class FpdfTpl
 *
 * This class adds a templating feature to FPDF.
 *
 * @package setasign\Fpdi
 */
class FpdfTpl extends \FPDF
{
    use FpdfTplTrait;
}
