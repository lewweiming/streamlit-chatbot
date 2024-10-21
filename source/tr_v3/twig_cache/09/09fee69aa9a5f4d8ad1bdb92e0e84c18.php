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

/* tr-car-rentals/views/receipt.html */
class __TwigTemplate_cf1cb59eab90f1d861a557ecb859fa1b extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "_layout_fomantic.html";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("_layout_fomantic.html", "tr-car-rentals/views/receipt.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "
<div class=\"ui container segment\">
    <div class=\"ui centered grid\">
      <div class=\"sixteen wide column\">
        <div class=\"ui two column grid\">
          <div class=\"column\">
            <h2 class=\"ui header\">Car Rental Receipt</h2>
            <p>Thank you for renting with us!</p>
          </div>
          <div class=\"column right aligned\">
            <div class=\"ui label\">Receipt #12345</div>
            <div class=\"ui label\">Date: 2024-10-04</div>
          </div>
        </div>

        <div class=\"ui divider\"></div>

        <!-- Customer Information -->
        <div class=\"ui grid\">
          <div class=\"eight wide column\">
            <h4 class=\"ui dividing header\">Customer Information</h4>
            <p><strong>Name:</strong> John Doe</p>
            <p><strong>Email:</strong> johndoe@example.com</p>
            <p><strong>Phone:</strong> +123 456 7890</p>
          </div>
          <div class=\"eight wide column\">
            <h4 class=\"ui dividing header\">Rental Details</h4>
            <p><strong>Car Model:</strong> Tesla Model 3</p>
            <p><strong>Pickup Date:</strong> 2024-10-01</p>
            <p><strong>Return Date:</strong> 2024-10-04</p>
            <p><strong>Pickup Location:</strong> XYZ Car Rentals, Main Street</p>
            <p><strong>Return Location:</strong> XYZ Car Rentals, Main Street</p>
          </div>
        </div>

        <div class=\"ui divider\"></div>

        <!-- Payment Summary -->
        <h4 class=\"ui dividing header\">Payment Summary</h4>
        <table class=\"ui celled table\">
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
              <th colspan=\"3\">Subtotal</th>
              <th>\$365</th>
            </tr>
            <tr>
              <th colspan=\"3\">Tax (10%)</th>
              <th>\$36.50</th>
            </tr>
            <tr>
              <th colspan=\"3\">Total</th>
              <th>\$401.50</th>
            </tr>
          </tfoot>
        </table>

        <div class=\"ui divider\"></div>

        <!-- Footer -->
        <div class=\"ui two column grid\">
          <div class=\"column\">
            <h4 class=\"ui header\">Payment Method</h4>
            <p>Paid via Credit Card (Visa ****1234)</p>
          </div>
          <div class=\"column right aligned\">
            <button class=\"ui primary button\" onclick=\"window.print()\">Print Receipt</button>
            <button class=\"ui button\">Download PDF</button>
          </div>
        </div>
      </div>
    </div>
  </div>
";
    }

    public function getTemplateName()
    {
        return "tr-car-rentals/views/receipt.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  50 => 4,  46 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "tr-car-rentals/views/receipt.html", "/mnt/BLOCKSTORAGE/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/modules/tr-car-rentals/views/receipt.html");
    }
}
