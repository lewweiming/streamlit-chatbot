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

/* tr-car-rentals/views/stepper_review.html */
class __TwigTemplate_ad7ccb9a07b65cf34f90178b949e3402 extends Template
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
        $this->parent = $this->loadTemplate("_layout_fomantic.html", "tr-car-rentals/views/stepper_review.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "
<!-- STEPPER -->
<div class=\"ui ordered steps\">

    <div class=\"completed step\">
        <div class=\"content\">
            <div class=\"title\">Personal Details</div>
            <div class=\"description\">Enter your details</div>
        </div>
    </div>

    <div class=\"active step\">
        <div class=\"content\">
            <div class=\"title\">Review</div>
            <div class=\"description\">Review your booking</div>
        </div>
    </div>

    <div class=\"disabled step\">
        <div class=\"content\">
            <div class=\"title\">Payment</div>
            <div class=\"description\">Complete your payment</div>
        </div>
    </div>
</div>

<!-- Rental Details -->
<div class=\"ui segment\">
    <h3 class=\"ui header\">Rental Details</h3>
    <div class=\"ui relaxed divided list\">
        <div class=\"item\">
            <i class=\"car icon\"></i>
            <div class=\"content\">
                <div class=\"header\">Car Model</div>
                <div class=\"description\">Toyota Corolla 2024</div>
            </div>
        </div>
        <div class=\"item\">
            <i class=\"calendar alternate outline icon\"></i>
            <div class=\"content\">
                <div class=\"header\">Rental Period</div>
                <div class=\"description\">Oct 2, 2024 - Oct 5, 2024 (3 days)</div>
            </div>
        </div>
        <div class=\"item\">
            <i class=\"dollar sign icon\"></i>
            <div class=\"content\">
                <div class=\"header\">Total Price</div>
                <div class=\"description\">\$150.00</div>
            </div>
        </div>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "tr-car-rentals/views/stepper_review.html";
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
        return new Source("", "tr-car-rentals/views/stepper_review.html", "/mnt/BLOCKSTORAGE/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/modules/tr-car-rentals/views/stepper_review.html");
    }
}
