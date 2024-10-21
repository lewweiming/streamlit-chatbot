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

/* tr-hotel-bookings/views/admin/hotels_dashboard.html */
class __TwigTemplate_a9e94becb26f378262d6202fa5ad3847 extends Template
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
        $this->parent = $this->loadTemplate("_layout_fomantic.html", "tr-hotel-bookings/views/admin/hotels_dashboard.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<div class=\"\">
    <h2 class=\"ui dividing header\">Hotel Bookings - Hotels Dashboard</h2>

    <table class=\"ui celled table\">
        <thead>
            <tr>
                <th>Hotel ID</th>
                <th>Hotel Name</th>
                <th>Address</th>
                <th>City</th>
                <th>State</th>
                <th>Country</th>
                <th>Zip Code</th>
                <th>Phone Number</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- Example row, loop through your data and replace accordingly -->
            <tr>
                <td>1</td>
                <td>Sunset Resort</td>
                <td>123 Beach Avenue</td>
                <td>Miami</td>
                <td>Florida</td>
                <td>USA</td>
                <td>33101</td>
                <td>(305) 123-4567</td>
                <td>info@sunsetresort.com</td>
                <td>
                    <div class=\"ui buttons\">
                        <button class=\"ui blue button\">Edit</button>
                        <button class=\"ui red button\">Delete</button>
                    </div>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>Mountain Lodge</td>
                <td>456 Alpine Way</td>
                <td>Denver</td>
                <td>Colorado</td>
                <td>USA</td>
                <td>80202</td>
                <td>(720) 789-1234</td>
                <td>contact@mountainlodge.com</td>
                <td>
                    <div class=\"ui buttons\">
                        <button class=\"ui blue button\">Edit</button>
                        <button class=\"ui red button\">Delete</button>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
    
    <button class=\"ui primary button\">Add New Hotel</button>
</div>
";
    }

    // line 65
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 66
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
        return "tr-hotel-bookings/views/admin/hotels_dashboard.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  118 => 66,  114 => 65,  51 => 4,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "tr-hotel-bookings/views/admin/hotels_dashboard.html", "/mnt/BLOCKSTORAGE/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/modules/tr-hotel-bookings/views/admin/hotels_dashboard.html");
    }
}
