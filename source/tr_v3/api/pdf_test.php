<?php

/**
 * Streams a PDF as downloadable using DOMPDF
 */

# Load Namespace
use Dompdf\Dompdf;

# Definitions
define("PDF_TEMPLATE", "car_rentals_receipt");
define("PDF_OUTPUT_FILENAME", "car_rentals_receipt");

# Load packages
require_once $_SERVER['DOCUMENT_ROOT'] . '../private_html/vendor/autoload.php';

# Load core
require_once $_SERVER['DOCUMENT_ROOT'] . 'classes/Core.php';

# Turn on errors
error_reporting(E_ALL);
ini_set('display_errors', 'on');

# Get HTML
$template = PDF_TEMPLATE;
$output = PDF_OUTPUT_FILENAME;
$html = Twig::getTemplate("tr-car-rentals/views/pdf/$template.html");

## Download HTML as PDF
$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->render();
$dompdf->stream("$output.pdf");

?>