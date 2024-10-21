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

/* tr-hotel-bookings/views/book_room.html */
class __TwigTemplate_6767b7006a1ab4cbde280fb550834af3 extends Template
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
        $this->parent = $this->loadTemplate("_layout_fomantic.html", "tr-hotel-bookings/views/book_room.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<div class=\"ui container\">
    <h2 class=\"ui header\">Room Details</h2>
    <div class=\"ui card\">
        <div class=\"content\">
            <div class=\"header\">Deluxe Room</div>
            <div class=\"meta\">Price: \$150 per night</div>
            <div class=\"description\">
                <p>Room Type: Deluxe</p>
                <p>Amenities: WiFi, Breakfast, Air Conditioning</p>
            </div>
        </div>
    </div>
    <h3 class=\"ui dividing header\">Book This Room</h3>
    <form class=\"ui form\" id=\"bookingForm\">
        <div class=\"field\">
            <label>First Name</label>
            <input type=\"text\" name=\"first_name\" required>
        </div>
        <div class=\"field\">
            <label>Last Name</label>
            <input type=\"text\" name=\"last_name\" required>
        </div>
        <div class=\"field\">
            <label>Email</label>
            <input type=\"email\" name=\"email\" required>
        </div>
        <div class=\"field\">
            <label>Phone Number</label>
            <input type=\"tel\" name=\"phone_number\" required>
        </div>
        <button class=\"ui green button\" type=\"submit\">Confirm Booking</button>
    </form>
</div>
";
    }

    // line 39
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 40
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
        return "tr-hotel-bookings/views/book_room.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  92 => 40,  88 => 39,  51 => 4,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "tr-hotel-bookings/views/book_room.html", "/mnt/BLOCKSTORAGE/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/modules/tr-hotel-bookings/views/book_room.html");
    }
}
