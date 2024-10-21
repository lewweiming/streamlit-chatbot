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

/* tr-car-rentals/views/booking_modification.html */
class __TwigTemplate_81f120f6479e63d10a6fdf40b999fe3e extends Template
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
        return "_layout_fomantic.html";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("_layout_fomantic.html", "tr-car-rentals/views/booking_modification.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<div class=\"\">
    <h2 class=\"ui dividing header\">Modify Your Booking</h2>
    <form class=\"ui form\" id=\"modify-booking-form\">
        <div class=\"field\">
            <label>Booking ID</label>
            <input type=\"text\" name=\"bookingId\" placeholder=\"Enter Booking ID\" required>
        </div>
        <div class=\"field\">
            <label>New Start Date</label>
            <input type=\"date\" name=\"newStartDate\" required>
        </div>
        <div class=\"field\">
            <label>New End Date</label>
            <input type=\"date\" name=\"newEndDate\" required>
        </div>
        <button class=\"ui orange button\" type=\"submit\">Modify Booking</button>
    </form>
</div>
";
    }

    // line 24
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 25
        echo "<script>
    \$('#modify-booking-form').submit(function(e) {
        e.preventDefault();
        alert('Booking Modified!');
        // Add AJAX call to update booking in the database here
    });
</script>
";
    }

    public function getTemplateName()
    {
        return "tr-car-rentals/views/booking_modification.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  77 => 25,  73 => 24,  51 => 4,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "tr-car-rentals/views/booking_modification.html", "/mnt/BLOCKSTORAGE/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/modules/tr-car-rentals/views/booking_modification.html");
    }
}
