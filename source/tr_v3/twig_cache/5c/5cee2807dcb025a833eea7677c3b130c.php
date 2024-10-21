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

/* tr-trip-bookings/views/admin/trips_dashboard.html */
class __TwigTemplate_b09acfd7a8e82452758525b200413fe8 extends Template
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
        $this->parent = $this->loadTemplate("_layout_fomantic.html", "tr-trip-bookings/views/admin/trips_dashboard.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<div class=\"ui container\">
    <h2 class=\"ui dividing header\">Trip Bookings - Trips Dashboard</h2>

    <table class=\"ui celled table\">
        <thead>
            <tr>
                <th>Trip ID</th>
                <th>Trip Name</th>
                <th>Destination</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Price (\$)</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- Example row, loop through your data and replace accordingly -->
            <tr>
                <td>1</td>
                <td>Grand Canyon Adventure</td>
                <td>Grand Canyon, Arizona</td>
                <td>2024-11-01</td>
                <td>2024-11-05</td>
                <td>799.99</td>
                <td>2024-09-24 10:15:00</td>
                <td>
                    <div class=\"ui buttons\">
                        <button class=\"ui blue button\">Edit</button>
                        <button class=\"ui red button\">Delete</button>
                    </div>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>Hawaii Beach Holiday</td>
                <td>Honolulu, Hawaii</td>
                <td>2024-12-15</td>
                <td>2024-12-22</td>
                <td>1599.99</td>
                <td>2024-09-24 11:00:00</td>
                <td>
                    <div class=\"ui buttons\">
                        <button class=\"ui blue button\">Edit</button>
                        <button class=\"ui red button\">Delete</button>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
    
    <button class=\"ui primary button\">Add New Trip</button>
</div>
";
    }

    // line 59
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 60
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
        return "tr-trip-bookings/views/admin/trips_dashboard.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  112 => 60,  108 => 59,  51 => 4,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "tr-trip-bookings/views/admin/trips_dashboard.html", "/mnt/BLOCKSTORAGE/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/modules/tr-trip-bookings/views/admin/trips_dashboard.html");
    }
}
