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

/* amadeus/views/admin/hotels_main.html */
class __TwigTemplate_10a3b49cb38a78d18e12e0270a660996 extends Template
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
        return "_layout_admin_fomantic.html";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("_layout_admin_fomantic.html", "amadeus/views/admin/hotels_main.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "
<main>

    <div class=\"ui breadcrumb\">
        <a href=\"/framework/admin\" class=\"section\">Admin</a>
        <i class=\"right angle icon divider\"></i>
        <a href=\"/framework/admin/amadeus/main\" class=\"section\">Amadeus Module</a>
        <i class=\"right angle icon divider\"></i>
        <div class=\"active section\">Hotel Api</div>
    </div>

    <h2 class=\"ui header\">Amadeus Hotel Api</h2>

    <div class=\"ui message\">\"Fetch Data\" will update the local DB with the latest information.</div>

    <!-- TABLE -->
    <table class=\"ui table\">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Last Updated</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <!-- ROW -->
        <tr>
            <td>Hotel List</td>
            <td>The Hotel List REST JSON API helps you find the list of hotels inside a city or an area.</td>
            <td>-</td>
            <td>
                <a href=\"/framework/admin/amadeus/hotels/hotel-list\" class=\"ui button\">View Data</a>
            </td>
        </tr>
        <tr>
            <td>Hotel Search</td>
            <td>The Hotel Search API finds the best deals at over 150,000 hotels worldwide.</td>
            <td>-</td>
            <td>
                <a href=\"/framework/admin/amadeus/hotels/hotel-search\" class=\"ui button\">View Data</a>
            </td>
        </tr>
        <!-- <tr>
            <td>Airport Routes</td>
            <td>Shows airport routes by IATA code.</td>
            <td>-</td>
            <td>
                <a href=\"/framework/admin/amadeus/flights/airport-routes\" class=\"ui button\">View Data</a>
            </td>
        </tr>
        <tr>
            <td>Flight Offers</td>
            <td>This API answers the question: \"What are the cheapest flights from Madrid to Paris on June 1st?\"</td>
            <td>-</td>
            <td>
                <a href=\"/framework/admin/amadeus/flights/flight-offers\" class=\"ui button\">View Data</a>
            </td>
        </tr> -->
        </tbody>
    </table>
</main>
";
    }

    // line 68
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 69
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
        return "amadeus/views/admin/hotels_main.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  121 => 69,  117 => 68,  51 => 4,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "amadeus/views/admin/hotels_main.html", "/mnt/BLOCKSTORAGE/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/modules/amadeus/views/admin/hotels_main.html");
    }
}
