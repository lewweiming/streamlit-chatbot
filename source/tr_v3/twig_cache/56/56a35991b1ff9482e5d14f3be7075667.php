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

/* tr-car-rentals/views/admin/cars-data/index.html */
class __TwigTemplate_ac7660cb4070c7b2c00c0c9a29d9090e extends Template
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
        $this->parent = $this->loadTemplate("_layout_fomantic.html", "tr-car-rentals/views/admin/cars-data/index.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<h2 class=\"ui header\">Cars Data</h2>

<!-- TOOLBAR -->
<div>
    <a href=\"/framework/admin/car-rentals/cars-data/add\" class=\"ui primary button\">Add New Car</a>
</div>

<table class=\"ui celled table\">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Thumbnail</th>
            <th>Brand</th>
            <th>Model</th>
            <th>Country</th>
            <th>Rental Pricing</th>
            <th>Size</th>
            <th>Action(s)</th>
        </tr>
    </thead>
    <tbody>
        ";
        // line 27
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["rows"] ?? null));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
            // line 28
            echo "            <tr>
                <td>";
            // line 29
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "id", [], "any", false, false, false, 29), "html", null, true);
            echo "</td>
                <td>";
            // line 30
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "name", [], "any", false, false, false, 30), "html", null, true);
            echo "</td>
                <td>";
            // line 31
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "price", [], "any", false, false, false, 31), 2), "html", null, true);
            echo "</td>
                <td>
                    ";
            // line 33
            if (twig_get_attribute($this->env, $this->source, $context["row"], "thumb_url_link", [], "any", false, false, false, 33)) {
                // line 34
                echo "                        <img src=\"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "thumb_url_link", [], "any", false, false, false, 34), "html", null, true);
                echo "\" alt=\"Thumbnail\" class=\"ui small image\">
                    ";
            } else {
                // line 36
                echo "                        No Image
                    ";
            }
            // line 38
            echo "                </td>
                <td>";
            // line 39
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "brand", [], "any", false, false, false, 39), "html", null, true);
            echo "</td>
                <td>";
            // line 40
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "model", [], "any", false, false, false, 40), "html", null, true);
            echo "</td>
                <td>";
            // line 41
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "country", [], "any", false, false, false, 41), "html", null, true);
            echo "</td>
                <td>";
            // line 42
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "rental_pricing", [], "any", false, false, false, 42), "html", null, true);
            echo "</td>
                <td>";
            // line 43
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "size", [], "any", false, false, false, 43), "html", null, true);
            echo "</td>
                <td>
                    <a href=\"/framework/admin/car-rentals/cars-data/car/";
            // line 45
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "id", [], "any", false, false, false, 45), "html", null, true);
            echo "/edit\" class=\"ui button\">Edit</a>
                    <a href=\"/framework/admin/car-rentals/cars-data/car/";
            // line 46
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "id", [], "any", false, false, false, 46), "html", null, true);
            echo "/delete\" class=\"ui button\">Delete</a>
                </td>
            </tr>
        ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 50
            echo "            <tr>
                <td colspan=\"10\" class=\"center aligned\">No data available</td>
            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['row'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 54
        echo "    </tbody>
</table>

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
        return "tr-car-rentals/views/admin/cars-data/index.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  166 => 60,  162 => 59,  155 => 54,  146 => 50,  137 => 46,  133 => 45,  128 => 43,  124 => 42,  120 => 41,  116 => 40,  112 => 39,  109 => 38,  105 => 36,  99 => 34,  97 => 33,  92 => 31,  88 => 30,  84 => 29,  81 => 28,  76 => 27,  51 => 4,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "tr-car-rentals/views/admin/cars-data/index.html", "/mnt/BLOCKSTORAGE/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/modules/tr-car-rentals/views/admin/cars-data/index.html");
    }
}
