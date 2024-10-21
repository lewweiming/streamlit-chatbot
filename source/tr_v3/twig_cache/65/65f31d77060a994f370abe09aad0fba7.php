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

/* tr-car-rentals/views/admin/booking_details.html */
class __TwigTemplate_95ad0d4ee2ca21fdf0e650f7b97f66b6 extends Template
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
        return "_layout_admin_fomantic.html";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("_layout_admin_fomantic.html", "tr-car-rentals/views/admin/booking_details.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<div class=\"ui segment\">
    <h3 class=\"ui header\">Booking Details</h3>
    <div class=\"ui form\">
        <div class=\"field\">
            <label>Booking ID</label>
            <input type=\"text\" placeholder=\"BK-101\" disabled>
        </div>
        <div class=\"field\">
            <label>Customer Name</label>
            <input type=\"text\" placeholder=\"John Doe\">
        </div>
        <div class=\"field\">
            <label>Car</label>
            <input type=\"text\" placeholder=\"Toyota Camry\">
        </div>
        <div class=\"two fields\">
            <div class=\"field\">
                <label>Pickup Date</label>
                <input type=\"date\">
            </div>
            <div class=\"field\">
                <label>Return Date</label>
                <input type=\"date\">
            </div>
        </div>
        <div class=\"field\">
            <label>Status</label>
            <select class=\"ui dropdown\">
                <option value=\"\">Select Status</option>
                <option value=\"confirmed\">Confirmed</option>
                <option value=\"pending\">Pending</option>
                <option value=\"cancelled\">Cancelled</option>
            </select>
        </div>
        <button class=\"ui button primary\">Update Booking</button>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "tr-car-rentals/views/admin/booking_details.html";
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
        return new Source("", "tr-car-rentals/views/admin/booking_details.html", "/mnt/BLOCKSTORAGE/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/modules/tr-car-rentals/views/admin/booking_details.html");
    }
}
