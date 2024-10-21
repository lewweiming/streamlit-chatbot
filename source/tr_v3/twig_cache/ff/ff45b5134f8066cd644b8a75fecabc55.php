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

/* tr-car-rentals/views/booking_confirmation.html */
class __TwigTemplate_4ebd4bde61f7dcf90762fe79de53d0b4 extends Template
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
        $this->parent = $this->loadTemplate("_layout_fomantic.html", "tr-car-rentals/views/booking_confirmation.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<div class=\"ui container\">
    <h2 class=\"ui dividing header\">Confirm Your Booking</h2>
    <form class=\"ui form\" id=\"booking-form\">
        <div class=\"field\">
            <label>Car Name</label>
            <input type=\"text\" name=\"carName\" value=\"Toyota Camry\" readonly>
        </div>
        <div class=\"field\">
            <label>Model</label>
            <input type=\"text\" name=\"carModel\" value=\"2022\" readonly>
        </div>
        <div class=\"field\">
            <label>Daily Rent</label>
            <input type=\"text\" name=\"dailyRent\" value=\"\$60\" readonly>
        </div>
        <div class=\"field\">
            <label>Rental Start Date</label>
            <input type=\"date\" name=\"startDate\" required>
        </div>
        <div class=\"field\">
            <label>Rental End Date</label>
            <input type=\"date\" name=\"endDate\" required>
        </div>
        <button class=\"ui primary button\" type=\"submit\">Confirm Booking</button>
    </form>
</div>
";
    }

    // line 32
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 33
        echo "<script>
    \$('#booking-form').submit(function(e) {
        e.preventDefault();
        alert('Booking Confirmed!');
        // Add AJAX call to save booking to database here
    });
</script>
";
    }

    public function getTemplateName()
    {
        return "tr-car-rentals/views/booking_confirmation.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  85 => 33,  81 => 32,  51 => 4,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "tr-car-rentals/views/booking_confirmation.html", "/mnt/BLOCKSTORAGE/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/modules/tr-car-rentals/views/booking_confirmation.html");
    }
}
