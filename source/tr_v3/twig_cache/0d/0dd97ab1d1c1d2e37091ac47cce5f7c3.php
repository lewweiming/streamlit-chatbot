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

/* tr-trip-bookings/views/booking_details.html */
class __TwigTemplate_cf99772ba3439b9ab0bbef8ba11ee1c1 extends Template
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
        $this->parent = $this->loadTemplate("_layout_fomantic.html", "tr-trip-bookings/views/booking_details.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<div class=\"\">
    <h2 class=\"ui header\">Your Booking Details</h2>
    <div class=\"ui segment\">
        <h3 class=\"ui dividing header\">Booking Information</h3>
        <p><strong>Trip:</strong> Trip to Paris</p>
        <p><strong>Destination:</strong> Paris, France</p>
        <p><strong>Start Date:</strong> 2024-10-01</p>
        <p><strong>End Date:</strong> 2024-10-10</p>
        <p><strong>Total Amount:</strong> \$1200.00</p>
        <p><strong>Status:</strong> Booked</p>
    </div>
    <button class=\"ui button negative\" onclick=\"cancelBooking()\">Cancel Booking</button>
</div>
";
    }

    // line 19
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 20
        echo "<script>
    function cancelBooking() {
        if (confirm(\"Are you sure you want to cancel this booking?\")) {
            alert(\"Booking has been cancelled.\");
            // Logic to update booking status would go here
        }
    }
</script>
";
    }

    public function getTemplateName()
    {
        return "tr-trip-bookings/views/booking_details.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  72 => 20,  68 => 19,  51 => 4,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "tr-trip-bookings/views/booking_details.html", "/mnt/BLOCKSTORAGE/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/modules/tr-trip-bookings/views/booking_details.html");
    }
}
