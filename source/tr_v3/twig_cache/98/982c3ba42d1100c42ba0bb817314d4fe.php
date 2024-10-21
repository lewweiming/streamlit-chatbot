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

/* tr-flight-bookings/views/booking_confirmation.html */
class __TwigTemplate_99bc08b70b1eb50ce9c3bcdf90e68dd9 extends Template
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
        $this->parent = $this->loadTemplate("_layout_fomantic.html", "tr-flight-bookings/views/booking_confirmation.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<div class=\"ui container\">
    <h2 class=\"ui header\">Booking Confirmation</h2>
    
    <!-- Customer Information -->
    <form class=\"ui form\">
        <h4 class=\"ui dividing header\">Passenger Details</h4>
        <div class=\"field\">
            <label>Full Name</label>
            <input type=\"text\" name=\"full_name\" placeholder=\"Full Name\">
        </div>
        <div class=\"field\">
            <label>Email</label>
            <input type=\"email\" name=\"email\" placeholder=\"Email\">
        </div>
        <div class=\"field\">
            <label>Phone Number</label>
            <input type=\"tel\" name=\"phone\" placeholder=\"Phone Number\">
        </div>
        
        <!-- Payment Details -->
        <h4 class=\"ui dividing header\">Payment Details</h4>
        <div class=\"field\">
            <label>Card Number</label>
            <input type=\"text\" name=\"card_number\" placeholder=\"Card Number\">
        </div>
        <div class=\"fields\">
            <div class=\"eight wide field\">
                <label>Expiry Date</label>
                <input type=\"text\" name=\"expiry_date\" placeholder=\"MM/YY\">
            </div>
            <div class=\"eight wide field\">
                <label>CVV</label>
                <input type=\"password\" name=\"cvv\" placeholder=\"CVV\">
            </div>
        </div>
        <div class=\"field\">
            <button class=\"ui primary button\" type=\"submit\">Confirm Booking</button>
        </div>
    </form>
</div>
";
    }

    // line 46
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 47
        echo "<script>
    const API_LIST = '/api/list.php'

    document.addEventListener('alpine:init', () => {

        Alpine.data('main', () => ({
            async list() {
                \$.toast({ message: 'Fetching list..' });

                let r = await axios.get(API_LIST)

                if (r.data.message == 'success') {
                    this.rows = r.data.rows
                    \$.toast({ class: 'success', message: `\${r.data.rows.length} row(s) found` });
                }
            },
        }))
    })

</script>
";
    }

    public function getTemplateName()
    {
        return "tr-flight-bookings/views/booking_confirmation.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  99 => 47,  95 => 46,  51 => 4,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "tr-flight-bookings/views/booking_confirmation.html", "/mnt/BLOCKSTORAGE/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/modules/tr-flight-bookings/views/booking_confirmation.html");
    }
}
