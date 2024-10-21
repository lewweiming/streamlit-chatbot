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

/* admin/main.html */
class __TwigTemplate_6f60b358adfb77e8becd525ae03a9778 extends Template
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
        $this->parent = $this->loadTemplate("_layout_admin_fomantic.html", "admin/main.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<div class=\"ui container\">
    <h1>Admin Dashboard</h1>

    <h2>Remaining Work</h2>

    <!-- CARDS -->
    <div class=\"ui four cards\">
        <div class=\"card\">
            <div class=\"center aligned content\">
                <img class=\"ui tiny image\" src=\"/assets/icons/security-scan.png\" />
                <div class=\"ui hidden divider\"></div>
                <div class=\"header\">Authentication</div>
                <p>Make sure SR Auth works!</p>
            </div>
            <div class=\"extra content\">
                <a href=\"#\" class=\"ui right floated primary button\">Check it out</a>
            </div>
        </div>

        <div class=\"card\">
            <div class=\"center aligned content\">
                <img class=\"ui tiny image\" src=\"/assets/icons/booking-online.png\" />
                <div class=\"ui hidden divider\"></div>
                <div class=\"header\">Dive Bookings</div>
                <p>Makes sure the flow is smooth and works with SR Agent Dashboard!</p>
            </div>
            <div class=\"extra content\">
                <a href=\"/p/dive_booking_documentation\" class=\"ui right floated primary button\">Check it out</a>
            </div>
        </div>

        <div class=\"card\">
            <div class=\"center aligned content\">
                <img class=\"ui tiny image\" src=\"/assets/icons/cyber-security.png\" />
                <div class=\"ui hidden divider\"></div>
                <div class=\"header\">Production Readiness</div>
                <p>Makes sure the server / apps / api are secured with the right protocols!</p>
            </div>
            <div class=\"extra content\">
                <a href=\"#\" class=\"ui right floated primary button\">Check it out</a>
            </div>
        </div>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "admin/main.html";
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
        return new Source("", "admin/main.html", "/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/views/admin/main.html");
    }
}
