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

/* tr-car-rentals/views/admin/cars_dashboard.html */
class __TwigTemplate_0d4142f0c8916d1d9fa594eb45653fe3 extends Template
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
        $this->parent = $this->loadTemplate("_layout_fomantic.html", "tr-car-rentals/views/admin/cars_dashboard.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<div class=\"ui container\">
    <h2 class=\"ui dividing header\">Car Rentals - Cars Dashboard</h2>

    <table class=\"ui celled table\">
        <thead>
            <tr>
                <th>Car ID</th>
                <th>Car Name</th>
                <th>Model</th>
                <th>Type</th>
                <th>Daily Rent (\$)</th>
                <th>Availability Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- Example row, loop through your data and replace accordingly -->
            <tr>
                <td>1</td>
                <td>Toyota Corolla</td>
                <td>2019</td>
                <td>Sedan</td>
                <td>45.00</td>
                <td><span class=\"ui green label\">Available</span></td>
                <td>
                    <div class=\"ui buttons\">
                        <button class=\"ui blue button\">Edit</button>
                        <button class=\"ui red button\">Delete</button>
                    </div>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>Ford Mustang</td>
                <td>2021</td>
                <td>Coupe</td>
                <td>150.00</td>
                <td><span class=\"ui red label\">Rented</span></td>
                <td>
                    <div class=\"ui buttons\">
                        <button class=\"ui blue button\">Edit</button>
                        <button class=\"ui red button\">Delete</button>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
    
    <button class=\"ui primary button\">Add New Car</button>
</div>
";
    }

    // line 56
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 57
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
        return "tr-car-rentals/views/admin/cars_dashboard.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  109 => 57,  105 => 56,  51 => 4,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "tr-car-rentals/views/admin/cars_dashboard.html", "/mnt/BLOCKSTORAGE/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/modules/tr-car-rentals/views/admin/cars_dashboard.html");
    }
}
