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

/* pages/work_orders.html */
class __TwigTemplate_844a671e5d929085444a27651bf87728 extends Template
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
        $this->parent = $this->loadTemplate("_layout_fomantic.html", "pages/work_orders.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<div class=\"\">
    <h2 class=\"ui header\">Work Order Requests</h2>
    <table class=\"ui celled table\">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Requestor</th>
                <th>Department</th>
                <th>Description</th>
                <th>Priority</th>
                <th>Status</th>
                <th>Date Submitted</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>001</td>
                <td>Kevin</td>
                <td>IT</td>
                <td>Complete the ModuleHotelBookingController.php</td>
                <td>High</td>
                <td>Pending</td>
                <td>2024-09-18</td>
                <td>
                    <div class=\"ui buttons\">
                        <button class=\"ui positive button\">Approve</button>
                        <button class=\"ui negative button\">Reject</button>
                    </div>
                </td>
            </tr>
            <tr>
                <td>002</td>
                <td>Jane Smith</td>
                <td>HR</td>
                <td>Another description</td>
                <td>Medium</td>
                <td>In Progress</td>
                <td>2024-09-17</td>
                <td>
                    <div class=\"ui buttons\">
                        <button class=\"ui positive button\">Approve</button>
                        <button class=\"ui negative button\">Reject</button>
                    </div>
                </td>
            </tr>
            <!-- Additional rows can be added here -->
        </tbody>
    </table>
</div>
";
    }

    public function getTemplateName()
    {
        return "pages/work_orders.html";
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
        return new Source("", "pages/work_orders.html", "/mnt/BLOCKSTORAGE/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/views/pages/work_orders.html");
    }
}
