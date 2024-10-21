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

/* amadeus/views/admin/main.html */
class __TwigTemplate_c10f639b12880ddd212bea83186691a1 extends Template
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
        $this->parent = $this->loadTemplate("_layout_admin_fomantic.html", "amadeus/views/admin/main.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<div class=\"ui container\">

    <h1>Amadeus Module</h1>

    <div class=\"ui message\">
        <div class=\"header\">
          Export as JSON
        </div>
        <p>Refer to Airport Routes</p>
      </div>

    <!-- CARDS -->
    <div class=\"ui four cards\">
        <div class=\"card\">
            <div class=\"center aligned content\">
                <img class=\"ui tiny image\" src=\"/modules/amadeus/assets/icons/Amadeus_Logo.png\" />
                <div class=\"ui hidden divider\"></div>
                <div class=\"header\">Flights</div>
                <p>Flight related api</p>
            </div>
            <div class=\"extra content\">
                <a href=\"/framework/admin/amadeus/flights/main\" class=\"ui right floated primary button\">View</a>
            </div>
        </div>

        <div class=\"card\">
            <div class=\"center aligned content\">
                <img class=\"ui tiny image\" src=\"/modules/amadeus/assets/icons/Amadeus_Logo.png\" />
                <div class=\"ui hidden divider\"></div>
                <div class=\"header\">Flight Booking App</div>
                <p>Creating flight bookings with Amadeus</p>
            </div>
            <div class=\"extra content\">
                <a href=\"/amadeus-flight-app\" class=\"ui right floated primary button\">View</a>
            </div>
        </div>

        <div class=\"card\">
            <div class=\"center aligned content\">
                <img class=\"ui tiny image\" src=\"/modules/amadeus/assets/icons/Amadeus_Logo.png\" />
                <div class=\"ui hidden divider\"></div>
                <div class=\"header\">Hotels</div>
                <p>Hotel related api</p>
            </div>
            <div class=\"extra content\">
                <a href=\"/framework/admin/amadeus/hotels/main\" class=\"ui right floated primary button\">View</a>
            </div>
        </div>

        <div class=\"card\">
            <div class=\"center aligned content\">
                <img class=\"ui tiny image\" src=\"/modules/amadeus/assets/icons/Amadeus_Logo.png\" />
                <div class=\"ui hidden divider\"></div>
                <div class=\"header\">Hotel Booking App</div>
                <p>Creating hotel bookings with Amadeus</p>
            </div>
            <div class=\"extra content\">
                <a href=\"/amadeus-hotel-app\" class=\"ui right floated primary button\">View</a>
            </div>
        </div>

        <div class=\"card\">
            <div class=\"center aligned content\">
                <img class=\"ui tiny image\" src=\"/modules/amadeus/assets/icons/Amadeus_Logo.png\" />
                <div class=\"ui hidden divider\"></div>
                <div class=\"header\">Trips</div>
                <p>Trip related api</p>
            </div>
            <div class=\"extra content\">
                <a href=\"/framework/admin/amadeus/trips/main\" class=\"ui right floated primary button\">View</a>
            </div>
        </div>

        <div class=\"card\">
            <div class=\"center aligned content\">
                <img class=\"ui tiny image\" src=\"/modules/amadeus/assets/icons/Amadeus_Logo.png\" />
                <div class=\"ui hidden divider\"></div>
                <div class=\"header\">Transfers</div>
                <p>Car transfers related api</p>
            </div>
            <div class=\"extra content\">
                <a href=\"/framework/admin/amadeus/transfers/main\" class=\"ui right floated primary button\">View</a>
            </div>
        </div>

    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "amadeus/views/admin/main.html";
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
        return new Source("", "amadeus/views/admin/main.html", "/mnt/BLOCKSTORAGE/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/modules/amadeus/views/admin/main.html");
    }
}
