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

/* pages/customer_request_dashboard_manager.html */
class __TwigTemplate_896714694ee48e30249acfd1e55e25f0 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'content' => [$this, 'block_content'],
            'script' => [$this, 'block_script'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "_layout_admin_fomantic.html";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("_layout_admin_fomantic.html", "pages/customer_request_dashboard_manager.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<div class=\"ui container\">
    
    <h2 class=\"ui header\">Customer Requests Dashboard</h2>
    
    <div class=\"ui top attached tabular menu\">
      <a class=\"item active\" data-tab=\"enquiries\">Enquiries</a>
      <a class=\"item\" data-tab=\"modifications\">Modifications</a>
      <a class=\"item\" data-tab=\"cancellations\">Cancellations</a>
    </div>
  
    <!-- Enquiries Tab -->
    <div class=\"ui bottom attached tab segment active\" data-tab=\"enquiries\">
      <table class=\"ui celled table\">
        <thead>
          <tr>
            <th>Request ID</th>
            <th>Customer Name</th>
            <th>Booking Type</th>
            <th>Date of Enquiry</th>
            <th>Details</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>#001</td>
            <td>John Doe</td>
            <td>Hotel</td>
            <td>2024-10-01</td>
            <td>Inquiry about booking cancellation</td>
            <td><div class=\"ui label\">Pending</div></td>
            <td><button class=\"ui button\">View</button></td>
          </tr>
          <!-- Additional rows here -->
        </tbody>
      </table>
    </div>
  
    <!-- Modifications Tab -->
    <div class=\"ui bottom attached tab segment\" data-tab=\"modifications\">
      <table class=\"ui celled table\">
        <thead>
          <tr>
            <th>Modification ID</th>
            <th>Customer Name</th>
            <th>Booking Type</th>
            <th>Requested Changes</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>#M001</td>
            <td>Jane Smith</td>
            <td>Car Rental</td>
            <td>Change pick-up time</td>
            <td><div class=\"ui label\">In Progress</div></td>
            <td><button class=\"ui button\">Approve</button> <button class=\"ui button\">Decline</button></td>
          </tr>
          <!-- Additional rows here -->
        </tbody>
      </table>
    </div>
  
    <!-- Cancellations Tab -->
    <div class=\"ui bottom attached tab segment\" data-tab=\"cancellations\">
      <table class=\"ui celled table\">
        <thead>
          <tr>
            <th>Cancellation ID</th>
            <th>Customer Name</th>
            <th>Booking Type</th>
            <th>Reason</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>#C001</td>
            <td>Mark Davis</td>
            <td>Flight</td>
            <td>Personal reasons</td>
            <td><div class=\"ui label\">Pending</div></td>
            <td><button class=\"ui button\">Process</button></td>
          </tr>
          <!-- Additional rows here -->
        </tbody>
      </table>
    </div>
  </div>
";
    }

    // line 99
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 100
        echo "<script>
\$('.menu .item').tab();
</script>
";
    }

    public function getTemplateName()
    {
        return "pages/customer_request_dashboard_manager.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  152 => 100,  148 => 99,  51 => 4,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "pages/customer_request_dashboard_manager.html", "/mnt/BLOCKSTORAGE/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/views/pages/customer_request_dashboard_manager.html");
    }
}
