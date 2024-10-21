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

/* tr-flight-bookings/views/admin/flights_dashboard.html */
class __TwigTemplate_a6dee5d7d9777963b13d93ea33392773 extends Template
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
        $this->parent = $this->loadTemplate("_layout_fomantic.html", "tr-flight-bookings/views/admin/flights_dashboard.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<div class=\"ui container\">
    <h2 class=\"ui dividing header\">Flight Bookings - Flights Dashboard</h2>

    <table class=\"ui celled table\">
        <thead>
            <tr>
                <th>Flight ID</th>
                <th>Flight Number</th>
                <th>Airline</th>
                <th>Origin</th>
                <th>Destination</th>
                <th>Departure Time</th>
                <th>Arrival Time</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- Example row, loop through your data and replace accordingly -->
            <tr>
                <td>1</td>
                <td>AA123</td>
                <td>American Airlines</td>
                <td>New York</td>
                <td>Los Angeles</td>
                <td>2024-10-01 08:00</td>
                <td>2024-10-01 11:00</td>
                <td><span class=\"ui blue label\">Scheduled</span></td>
                <td>
                    <div class=\"ui buttons\">
                        <button class=\"ui blue button\">Edit</button>
                        <button class=\"ui red button\">Delete</button>
                    </div>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>DL456</td>
                <td>Delta Airlines</td>
                <td>Atlanta</td>
                <td>Miami</td>
                <td>2024-10-02 14:30</td>
                <td>2024-10-02 16:00</td>
                <td><span class=\"ui green label\">Departed</span></td>
                <td>
                    <div class=\"ui buttons\">
                        <button class=\"ui blue button\">Edit</button>
                        <button class=\"ui red button\">Delete</button>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
    
    <button class=\"ui primary button\">Add New Flight</button>
</div>
";
    }

    // line 62
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 63
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
        return "tr-flight-bookings/views/admin/flights_dashboard.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  115 => 63,  111 => 62,  51 => 4,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "tr-flight-bookings/views/admin/flights_dashboard.html", "/mnt/BLOCKSTORAGE/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/modules/tr-flight-bookings/views/admin/flights_dashboard.html");
    }
}
