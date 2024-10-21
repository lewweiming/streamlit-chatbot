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

/* tr-shop/views/cart.html */
class __TwigTemplate_f3da60e8cc5be91ad4bb4afb2e72e83c extends Template
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
        $this->parent = $this->loadTemplate("_layout_fomantic.html", "tr-shop/views/cart.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<div class=\"ui container\">
    <h2 class=\"ui header\">Shopping Cart</h2>

    <table class=\"ui celled table\">
        <thead>
            <tr>
                <th>Item</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            ";
        // line 18
        if ( !twig_test_empty(($context["rows"] ?? null))) {
            // line 19
            echo "                ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["rows"] ?? null));
            foreach ($context['_seq'] as $context["key"] => $context["row"]) {
                // line 20
                echo "                <tr>
                    <td>";
                // line 21
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "name", [], "any", false, false, false, 21), "html", null, true);
                echo "</td>
                    <td>";
                // line 22
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "quantity", [], "any", false, false, false, 22), "html", null, true);
                echo "</td>
                    <td>";
                // line 23
                echo twig_escape_filter($this->env, twig_number_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "price", [], "any", false, false, false, 23), 2, ".", ","), "html", null, true);
                echo "</td>
                    <td>";
                // line 24
                echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (twig_get_attribute($this->env, $this->source, $context["row"], "price", [], "any", false, false, false, 24) * twig_get_attribute($this->env, $this->source, $context["row"], "quantity", [], "any", false, false, false, 24)), 2, ".", ","), "html", null, true);
                echo "</td>
                    <td>
                        <a href=\"/modules/shop/remove-from-cart?id=";
                // line 26
                echo twig_escape_filter($this->env, $context["key"], "html", null, true);
                echo "\" class=\"ui button\">Remove</a>
                    </td>
                </tr>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['row'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 30
            echo "            ";
        } else {
            // line 31
            echo "                <tr>
                    <td colspan=\"5\" class=\"center aligned\">Your cart is empty.</td>
                </tr>
            ";
        }
        // line 35
        echo "        </tbody>
        <tfoot class=\"full-width\">
            <tr>
                <th colspan=\"3\" class=\"right aligned\"><h3>Total</h3></th>
                <th colspan=2>
                    <h3>";
        // line 40
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, ($context["total"] ?? null), 2, ".", ","), "html", null, true);
        echo "</h3>
                </th>
            </tr>
        </tfoot>
    </table>

    <div class=\"ui right aligned container\">
        <a href=\"/modules/shop\" class=\"ui button\">Back to shop</a>
        <a href=\"/modules/shop/checkout/personal-details\" class=\"ui positive button\">Checkout</a>
    </div>
</div>

";
    }

    // line 54
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 55
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
        return "tr-shop/views/cart.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  141 => 55,  137 => 54,  120 => 40,  113 => 35,  107 => 31,  104 => 30,  94 => 26,  89 => 24,  85 => 23,  81 => 22,  77 => 21,  74 => 20,  69 => 19,  67 => 18,  51 => 4,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "tr-shop/views/cart.html", "/mnt/BLOCKSTORAGE/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/modules/tr-shop/views/cart.html");
    }
}
