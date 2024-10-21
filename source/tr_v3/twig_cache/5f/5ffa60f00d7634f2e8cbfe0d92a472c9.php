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

/* tr-hotel-bookings/views/booking_details.html */
class __TwigTemplate_b5965b03a9f69de3718e1a7f324f3f0c extends Template
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
        $this->parent = $this->loadTemplate("_layout_fomantic.html", "tr-hotel-bookings/views/booking_details.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<div class=\"ui container\">
    <h2 class=\"ui header\">Your Booking Details</h2>
    <div class=\"ui segment\">
        <p><strong>Booking ID:</strong> 12345</p>
        <p><strong>Hotel Name:</strong> Grand Hotel</p>
        <p><strong>Room Type:</strong> Deluxe Room</p>
        <p><strong>Check-in Date:</strong> 2024-10-01</p>
        <p><strong>Check-out Date:</strong> 2024-10-05</p>
        <p><strong>Total Amount:</strong> \$600</p>
        <p><strong>Status:</strong> Confirmed</p>
    </div>
    <div class=\"ui buttons\">
        <button class=\"ui orange button\" onclick=\"modifyBooking()\">Modify</button>
        <button class=\"ui red button\" onclick=\"cancelBooking()\">Cancel</button>
    </div>
</div>
";
    }

    // line 22
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 23
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
        return "tr-hotel-bookings/views/booking_details.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  75 => 23,  71 => 22,  51 => 4,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "tr-hotel-bookings/views/booking_details.html", "/mnt/BLOCKSTORAGE/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/modules/tr-hotel-bookings/views/booking_details.html");
    }
}
