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

/* tr-car-rentals/views/admin/cars-data/edit_car.html */
class __TwigTemplate_add6c972845f396ebc145de8ee524908 extends Template
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
        $this->parent = $this->loadTemplate("_layout_fomantic.html", "tr-car-rentals/views/admin/cars-data/edit_car.html", 1);
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
  <div class=\"active section\">Edit</div>
</div>

<h2 class=\"ui header\">Edit Car Rental Listing</h2>

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
<form method=\"post\" action=\"/car-rentals/";
        // line 29
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["car"] ?? null), "id", [], "any", false, false, false, 29), "html", null, true);
        echo "/edit\" class=\"ui form\">
  <p>Edit your car details</p>

  <div class=\"required field\">
    <label for=\"name\">Car Name</label>
    <input value=\"";
        // line 34
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["car"] ?? null), "name", [], "any", false, false, false, 34), "html", null, true);
        echo "\" type=\"text\" id=\"name\" name=\"name\">
  </div>

  <div class=\"required field\">
    <label for=\"price\">Price</label>
    <input value=\"";
        // line 39
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["car"] ?? null), "price", [], "any", false, false, false, 39), "html", null, true);
        echo "\" type=\"text\" id=\"price\" name=\"price\">
  </div>

  <div class=\"required field\">
    <label for=\"summary\">Summary</label>
    <textarea name=\"summary\" placeholder=\"Short summary about the car\">";
        // line 44
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["car"] ?? null), "summary", [], "any", false, false, false, 44), "html", null, true);
        echo "</textarea>
  </div>

  <div class=\"required field\">
    <label for=\"thumb_url_link\">Thumbnail URL</label>
    <input value=\"";
        // line 49
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["car"] ?? null), "thumb_url_link", [], "any", false, false, false, 49), "html", null, true);
        echo "\" type=\"text\" id=\"thumb_url_link\" name=\"thumb_url_link\">
  </div>

  <div class=\"required field\">
    <label for=\"brand\">Brand</label>
    <input value=\"";
        // line 54
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["car"] ?? null), "brand", [], "any", false, false, false, 54), "html", null, true);
        echo "\" type=\"text\" id=\"brand\" name=\"brand\">
  </div>

  <div class=\"required field\">
    <label for=\"model\">Model</label>
    <input value=\"";
        // line 59
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["car"] ?? null), "model", [], "any", false, false, false, 59), "html", null, true);
        echo "\" type=\"text\" id=\"model\" name=\"model\">
  </div>

  <div class=\"required field\">
    <label for=\"country\">Country</label>
    <input value=\"";
        // line 64
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["car"] ?? null), "country", [], "any", false, false, false, 64), "html", null, true);
        echo "\" type=\"text\" id=\"country\" name=\"country\">
  </div>

  <div class=\"required field\">
    <label for=\"description\">Description</label>
    <textarea name=\"description\" placeholder=\"Detailed description\">";
        // line 69
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["car"] ?? null), "description", [], "any", false, false, false, 69), "html", null, true);
        echo "</textarea>
  </div>

  <div class=\"field\">
    <label for=\"terms\">Terms</label>
    <textarea name=\"terms\" placeholder=\"Rental terms\">";
        // line 74
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["car"] ?? null), "terms", [], "any", false, false, false, 74), "html", null, true);
        echo "</textarea>
  </div>

  <div class=\"field\">
    <label for=\"insurance\">Insurance Details</label>
    <textarea name=\"insurance\" placeholder=\"Insurance information\">";
        // line 79
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["car"] ?? null), "insurance", [], "any", false, false, false, 79), "html", null, true);
        echo "</textarea>
  </div>

  <div class=\"required field\">
    <label for=\"rental_pricing\">Rental Pricing</label>
    <textarea name=\"rental_pricing\" placeholder=\"Details about rental pricing\">";
        // line 84
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["car"] ?? null), "rental_pricing", [], "any", false, false, false, 84), "html", null, true);
        echo "</textarea>
  </div>

  <div class=\"required field\">
    <label for=\"size\">Size</label>
    <input value=\"";
        // line 89
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["car"] ?? null), "size", [], "any", false, false, false, 89), "html", null, true);
        echo "\" type=\"text\" id=\"size\" name=\"size\">
  </div>

  <button type=\"submit\" class=\"ui button\">Update</button>
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
              prompt: 'Please enter a valid decimal price'
            }
          ]
        },
        summary: {
          identifier: 'summary',
          rules: [
            {
              type: 'empty',
              prompt: 'Please enter a short summary'
            }
          ]
        },
        thumb_url_link: {
          identifier: 'thumb_url_link',
          rules: [
            {
              type: 'url',
              prompt: 'Please enter a valid thumbnail URL'
            }
          ]
        },
        brand: {
          identifier: 'brand',
          rules: [
            {
              type: 'empty',
              prompt: 'Please enter the car brand'
            }
          ]
        },
        model: {
          identifier: 'model',
          rules: [
            {
              type: 'empty',
              prompt: 'Please enter the car model'
            }
          ]
        },
        country: {
          identifier: 'country',
          rules: [
            {
              type: 'empty',
              prompt: 'Please enter the country of origin'
            }
          ]
        },
        description: {
          identifier: 'description',
          rules: [
            {
              type: 'empty',
              prompt: 'Please enter a detailed description'
            }
          ]
        },
        rental_pricing: {
          identifier: 'rental_pricing',
          rules: [
            {
              type: 'empty',
              prompt: 'Please enter the rental pricing details'
            }
          ]
        },
        size: {
          identifier: 'size',
          rules: [
            {
              type: 'empty',
              prompt: 'Please enter the size of the car'
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
        return "tr-car-rentals/views/admin/cars-data/edit_car.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  206 => 98,  202 => 97,  191 => 89,  183 => 84,  175 => 79,  167 => 74,  159 => 69,  151 => 64,  143 => 59,  135 => 54,  127 => 49,  119 => 44,  111 => 39,  103 => 34,  95 => 29,  92 => 28,  87 => 25,  78 => 23,  74 => 22,  66 => 16,  64 => 15,  51 => 4,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "tr-car-rentals/views/admin/cars-data/edit_car.html", "/mnt/BLOCKSTORAGE/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/modules/tr-car-rentals/views/admin/cars-data/edit_car.html");
    }
}
