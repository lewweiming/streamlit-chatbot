<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* tr-car-rentals/views/pdf/car_rentals_receipt.html */
class __TwigTemplate_eef2abf0eded2ee29abaf04128e9c71e extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        ob_start();
        try {
            // line 1
            echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />

<style>
    body {
        font-family: 'Helvetica', Arial, sans-serif;
        line-height: 1.5em;
        font-size: 12px;
        color: #333;
        margin: 0;
        padding: 0;
    }

    h4 {
        color: #444;
        margin-bottom: 15px;
        font-size: 18px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px auto;
        background-color: #fff;
    }

    td,
    th {
        padding: 12px;
        border: 1px solid #ccc;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
        font-weight: bold;
    }

    .header-section,
    .footer-section {
        background-color: #fff;
        padding: 15px;
        margin-bottom: 20px;
        vertical-align: top;
    }

    .header-section h5,
    .footer-section h5 {
        margin: 0;
        font-size: 16px;
        padding-bottom: 5px;
        margin-bottom: 20px;
        border-bottom: 1px solid #ccc;
    }

    .header-section p,
    .footer-section p {
        margin: 5px 0;
    }

    .table-summary {
        margin: 20px 0;
    }

    .total {
        font-weight: bold;
        background-color: #f9f9f9;
    }

    .footer-section {
        text-align: right;
    }
</style>

<h4>Car Rental Receipt</h4>
<p>Thank you for renting with us!</p>
<!-- Customer and Rental Information -->
<table>
    <tr>
        <td class=\"header-section\">
            <h5>Customer Information</h5>
            <p><strong>Name:</strong> ";
            // line 81
            echo twig_escape_filter($this->env, ($context["customer_name"] ?? null), "html", null, true);
            echo "</p>
            <p><strong>Email:</strong> johndoe@example.com</p>
            <p><strong>Phone:</strong> +123 456 7890</p>
        </td>
        <td class=\"header-section\">
            <h5>Rental Details</h5>
            <p><strong>Car Model:</strong> Tesla Model 3</p>
            <p><strong>Pickup Date:</strong> 2024-10-01</p>
            <p><strong>Return Date:</strong> 2024-10-04</p>
            <p><strong>Pickup Location:</strong> XYZ Car Rentals, Main Street</p>
            <p><strong>Return Location:</strong> XYZ Car Rentals, Main Street</p>
        </td>
    </tr>
</table>

<!-- Payment Summary -->
<h4>Payment Summary</h4>
<table class=\"table-summary\">
    <thead>
        <tr>
            <th>Description</th>
            <th>Quantity</th>
            <th>Unit Price</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Rental Fee (3 days)</td>
            <td>3</td>
            <td>\$100</td>
            <td>\$300</td>
        </tr>
        <tr>
            <td>Insurance</td>
            <td>1</td>
            <td>\$50</td>
            <td>\$50</td>
        </tr>
        <tr>
            <td>GPS Rental</td>
            <td>1</td>
            <td>\$15</td>
            <td>\$15</td>
        </tr>
    </tbody>
    <tfoot>
        <tr>
            <td colspan=\"3\" class=\"total\">Subtotal</td>
            <td>\$365</td>
        </tr>
        <tr>
            <td colspan=\"3\" class=\"total\">Tax (10%)</td>
            <td>\$36.50</td>
        </tr>
        <tr>
            <td colspan=\"3\" class=\"total\">Total</td>
            <td>\$401.50</td>
        </tr>
    </tfoot>
</table>

<!-- Payment Method -->
<div class=\"footer-section\">
    <h5>Payment Method</h5>
    <p>Paid via Credit Card (Visa ****1234)</p>
</div>";
        } catch (Exception $e) {
            ob_end_clean();
            throw $e;
        }

        $extension = $this->env->getExtension('FilhoCodes\TwigStackExtension\TwigStackExtension');
        $manager = $extension->getManager();
        echo $manager->replaceBodyWithStacks(ob_get_clean());

    }

    public function getTemplateName()
    {
        return "tr-car-rentals/views/pdf/car_rentals_receipt.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  121 => 81,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "tr-car-rentals/views/pdf/car_rentals_receipt.html", "/mnt/BLOCKSTORAGE/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/modules/tr-car-rentals/views/pdf/car_rentals_receipt.html");
    }
}
