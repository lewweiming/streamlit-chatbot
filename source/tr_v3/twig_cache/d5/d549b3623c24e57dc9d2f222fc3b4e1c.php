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

/* amadeus/views/admin/flights/airport_routes.html */
class __TwigTemplate_636e1584962038d1019db837fe384a76 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'head' => [$this, 'block_head'],
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
        $this->parent = $this->loadTemplate("_layout_admin_fomantic.html", "amadeus/views/admin/flights/airport_routes.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_head($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<script src=\"https://cdn.jsdelivr.net/npm/clipboard@2.0.11/dist/clipboard.min.js\"></script>
";
    }

    // line 7
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 8
        echo "
<main x-data=\"main()\">

    <div class=\"ui breadcrumb\">
        <a href=\"/framework/admin\" class=\"section\">Admin</a>
        <i class=\"right angle icon divider\"></i>
        <a href=\"/framework/admin/amadeus/main\" class=\"section\">Amadeus Module</a>
        <i class=\"right angle icon divider\"></i>
        <a href=\"/framework/admin/amadeus/flights/main\" class=\"section\">Flight Api</a>
        <i class=\"right angle icon divider\"></i>
        <div class=\"active section\">Airport Routes</div>
    </div>

    <h2 class=\"ui header\">Airport Routes</h2>

    <div class=\"ui message\">\"Fetch Data\" will update the local DB with the latest information.</div>

    <!-- TABLE -->
    <table class=\"ui table\">
        <thead>
            <tr>
                <th colspan=\"5\">
                    <button id=\"export\" @click=\"exportAsJson()\" class=\"ui button\">Export as JSON</button>
                </th>
            </tr>
            <tr>
                <th>Type</th>
                <th>SubType</th>
                <th>Name</th>
                <th>IATA Code</th>
                <th>Country</th>
            </tr>
        </thead>
        <tbody>
        <!-- ROW -->
         <template x-for=\"i in rows\">
        <tr>
            <td x-text=\"i.type\"></td>
            <td x-text=\"i.subtype\"></td>
            <td x-text=\"i.name\"></td>
            <td x-text=\"i.iataCode\"></td>
            <td x-text=\"i.address.countryName\"></td>
        </tr>
        </template>
        </tbody>
    </table>
</main>
";
    }

    // line 57
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 58
        echo "<script>
    const API_FETCH_AMADEUS_AIRPORT_ROUTES = '/modules/amadeus/api/flights/airport_routes.php'

    document.addEventListener('alpine:init', () => {

        Alpine.data('main', () => ({
            rows: [],
            init() {
                this.list();
            },
            async list() {

                \$.toast({ message: 'Fetching list..' });

                let r = await axios.get(API_FETCH_AMADEUS_AIRPORT_ROUTES)

                if (r.data.message == 'success') {
                    this.rows = r.data.results.data
                    \$.toast({ class: 'success', message: `\${r.data.results.data.length} row(s) found` });
                }
            },
            exportAsJson() {

                let clipboard = new ClipboardJS('#export', {

                    text: (trigger) => {
                        return JSON.stringify(this.rows)
                    }
                });

                clipboard.on('success', (e) => {

                    \$.toast({ class: 'success', message: 'Copied to clipboard!' }); 
                });
            }
        }))
    })

</script>
";
    }

    public function getTemplateName()
    {
        return "amadeus/views/admin/flights/airport_routes.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  116 => 58,  112 => 57,  61 => 8,  57 => 7,  52 => 4,  48 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "amadeus/views/admin/flights/airport_routes.html", "/mnt/BLOCKSTORAGE/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/modules/amadeus/views/admin/flights/airport_routes.html");
    }
}
