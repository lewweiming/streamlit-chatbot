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

/* tr-car-rentals/views/admin/cars-data/add_car.html */
class __TwigTemplate_892cc01f9a80846a5c61cc3fc5aa2ee7 extends Template
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
        $this->parent = $this->loadTemplate("_layout_fomantic.html", "tr-car-rentals/views/admin/cars-data/add_car.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<div class=\"ui breadcrumb\">
  <a href=\"/framework/admin\" class=\"section\">Admin</a>
  <i class=\"right angle icon divider\"></i>
  <a href=\"/framework/admin/car-rentals/cars-data/main\" class=\"section\">Car Data</a>
  <i class=\"right angle icon divider\"></i>
  <div class=\"active section\">Add New Car</div>
</div>

<h2 class=\"ui header\">Add New Car Rental</h2>

<!-- VALIDATION ERRORS -->
";
        // line 15
        if (($context["errors"] ?? null)) {
            // line 16
            echo "<div class=\"ui warning message\">
  <i class=\"close icon\"></i>
  <div class=\"header\">
    Validation Errors
  </div>
  <ul>
    ";
            // line 22
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["errors"] ?? null));
            foreach ($context['_seq'] as $context["key"] => $context["val"]) {
                // line 23
                echo "    <li>";
                echo twig_escape_filter($this->env, (($__internal_compile_0 = $context["val"]) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0[0] ?? null) : null), "html", null, true);
                echo "</li>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['val'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 25
            echo "  </ul>
</div>
";
        }
        // line 28
        echo "
<form method=\"post\" action=\"/car-rentals/add\" class=\"ui form\">
  <p>Enter car rental details</p>

  <div class=\"required field\">
    <label for=\"name\">Car Name</label>
    <input type=\"text\" id=\"name\" name=\"name\">
  </div>

  <div class=\"required field\">
    <label for=\"price\">Price</label>
    <input type=\"text\" id=\"price\" name=\"price\" placeholder=\"e.g., 50.00\">
  </div>

  <div class=\"field\">
    <label for=\"summary\">Summary</label>
    <input type=\"text\" id=\"summary\" name=\"summary\" placeholder=\"Brief summary of the car\">
  </div>

  <div class=\"field\">
    <label for=\"thumb_url_link\">Thumbnail URL</label>
    <input type=\"text\" id=\"thumb_url_link\" name=\"thumb_url_link\" placeholder=\"Link to car thumbnail image\">
  </div>

  <div class=\"required field\">
    <label for=\"brand\">Brand</label>
    <input type=\"text\" id=\"brand\" name=\"brand\">
  </div>

  <div class=\"required field\">
    <label for=\"model\">Model</label>
    <input type=\"text\" id=\"model\" name=\"model\">
  </div>

  <div class=\"required field\">
    <label for=\"country\">Country</label>
    <input type=\"text\" id=\"country\" name=\"country\">
  </div>

  <div class=\"field\">
    <label for=\"description\">Description</label>
    <textarea id=\"description\" name=\"description\" placeholder=\"Detailed description of the car\"></textarea>
  </div>

  <div class=\"field\">
    <label for=\"terms\">Terms</label>
    <textarea id=\"terms\" name=\"terms\" placeholder=\"Rental terms and conditions\"></textarea>
  </div>

  <div class=\"field\">
    <label for=\"insurance\">Insurance Details</label>
    <textarea id=\"insurance\" name=\"insurance\" placeholder=\"Insurance information\"></textarea>
  </div>

  <div class=\"field\">
    <label for=\"rental_pricing\">Rental Pricing Details</label>
    <textarea id=\"rental_pricing\" name=\"rental_pricing\" placeholder=\"Detailed rental pricing\"></textarea>
  </div>

  <div class=\"required field\">
    <label for=\"size\">Size</label>
    <input type=\"text\" id=\"size\" name=\"size\" placeholder=\"e.g., Compact, Sedan, SUV\">
  </div>

  <button type=\"submit\" class=\"ui button\">Submit</button>
</form>

";
    }

    // line 97
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 98
        echo "<script>
/* VALIDATION */
\$(document).ready(function () {
    \$('.ui.form').form({
        fields: {
            name: {
                identifier: 'name',
                rules: [
                    {
                        type: 'empty',
                        prompt: 'Please enter the car name'
                    }
                ]
            },
            price: {
                identifier: 'price',
                rules: [
                    {
                        type: 'empty',
                        prompt: 'Please enter the price'
                    },
                    {
                        type: 'decimal',
                        prompt: 'Please enter a valid decimal value for price'
                    }
                ]
            },
            brand: {
                identifier: 'brand',
                rules: [
                    {
                        type: 'empty',
                        prompt: 'Please enter the brand'
                    }
                ]
            },
            model: {
                identifier: 'model',
                rules: [
                    {
                        type: 'empty',
                        prompt: 'Please enter the model'
                    }
                ]
            },
            country: {
                identifier: 'country',
                rules: [
                    {
                        type: 'empty',
                        prompt: 'Please enter the country'
                    }
                ]
            },
            size: {
                identifier: 'size',
                rules: [
                    {
                        type: 'empty',
                        prompt: 'Please specify the car size'
                    }
                ]
            }
        }
    });
});
</script>
";
    }

    public function getTemplateName()
    {
        return "tr-car-rentals/views/admin/cars-data/add_car.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  167 => 98,  163 => 97,  92 => 28,  87 => 25,  78 => 23,  74 => 22,  66 => 16,  64 => 15,  51 => 4,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "tr-car-rentals/views/admin/cars-data/add_car.html", "/mnt/BLOCKSTORAGE/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/modules/tr-car-rentals/views/admin/cars-data/add_car.html");
    }
}
