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

/* tr-car-rentals/views/booking_cancellation.html */
class __TwigTemplate_e587e7606794a2c3d2a2b06bc6de31c4 extends Template
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
        $this->parent = $this->loadTemplate("_layout_fomantic.html", "tr-car-rentals/views/booking_cancellation.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<div class=\"\">
    <h2 class=\"ui dividing header\">Cancel Your Booking</h2>
    <form class=\"ui form\" id=\"cancel-booking-form\">
        <div class=\"field\">
            <label>Booking ID</label>
            <input type=\"text\" name=\"bookingId\" placeholder=\"Enter Booking ID\" required>
        </div>
        <div class=\"field\">
            <label>Reason for Cancellation</label>
            <textarea name=\"cancellationReason\" placeholder=\"Reason for cancellation\" rows=\"3\"></textarea>
        </div>
        <button class=\"ui red button\" type=\"submit\">Cancel Booking</button>
    </form>
</div>
";
    }

    // line 20
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 21
        echo "<script>
    \$('#cancel-booking-form').submit(function(e) {
        e.preventDefault();
        alert('Booking Cancelled!');
        // Add AJAX call to cancel booking in the database here
    });
</script>
";
    }

    public function getTemplateName()
    {
        return "tr-car-rentals/views/booking_cancellation.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  73 => 21,  69 => 20,  51 => 4,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "tr-car-rentals/views/booking_cancellation.html", "/mnt/BLOCKSTORAGE/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/modules/tr-car-rentals/views/booking_cancellation.html");
    }
}
