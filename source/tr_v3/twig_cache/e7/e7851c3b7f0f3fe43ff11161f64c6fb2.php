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

/* tr-hotel-bookings/views/available_rooms.html */
class __TwigTemplate_7cdd6fb6a5eeb2bf806da976868623f1 extends Template
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
        $this->parent = $this->loadTemplate("_layout_fomantic.html", "tr-hotel-bookings/views/available_rooms.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<div class=\"ui container\">
    <h2 class=\"ui header\">Search for Available Rooms</h2>
    <form class=\"ui form\" id=\"searchForm\">
        <div class=\"field\">
            <label>Check-in Date</label>
            <input type=\"date\" name=\"check_in_date\" required>
        </div>
        <div class=\"field\">
            <label>Check-out Date</label>
            <input type=\"date\" name=\"check_out_date\" required>
        </div>
        <div class=\"field\">
            <label>City</label>
            <input type=\"text\" name=\"city\" placeholder=\"Enter city\" required>
        </div>
        <button class=\"ui blue button\" type=\"submit\">Search</button>
    </form>
    <div class=\"ui divider\"></div>
    <div id=\"searchResults\" class=\"ui cards\"></div>
</div>
";
    }

    // line 26
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 27
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
        return "tr-hotel-bookings/views/available_rooms.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  79 => 27,  75 => 26,  51 => 4,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "tr-hotel-bookings/views/available_rooms.html", "/mnt/BLOCKSTORAGE/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/modules/tr-hotel-bookings/views/available_rooms.html");
    }
}
