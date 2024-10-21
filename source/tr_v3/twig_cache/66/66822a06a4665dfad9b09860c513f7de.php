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

/* tr-shop/views/user/orders_dashboard.html */
class __TwigTemplate_73df137cf8125ac8ccf5e16897013931 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'content' => [$this, 'block_content'],
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
        $this->parent = $this->loadTemplate("_layout_fomantic.html", "tr-shop/views/user/orders_dashboard.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<div class=\"ui container\">
    <!-- Page Header -->
    <div class=\"ui secondary menu\">
        <h2 class=\"ui header\">Customer Orders Dashboard</h2>
    </div>

    <!-- Orders Tab -->
    <div>
        <h3 class=\"ui dividing header\">Shop Orders</h3>
        <table class=\"ui celled table\">
            <thead>
                <tr>
                    <th>Order Ref</th>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Order Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                ";
        // line 26
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["orders"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["order"]) {
            // line 27
            echo "                <tr>
                    <td>";
            // line 28
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["order"], "order_ref", [], "any", false, false, false, 28), "html", null, true);
            echo "</td>
                    <td>";
            // line 29
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["order"], "product_name", [], "any", false, false, false, 29), "html", null, true);
            echo "</td>
                    <td>";
            // line 30
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["order"], "quantity", [], "any", false, false, false, 30), "html", null, true);
            echo "</td>
                    <td>";
            // line 31
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["order"], "total_price", [], "any", false, false, false, 31), "html", null, true);
            echo "</td>
                    <td>";
            // line 32
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["order"], "order_date", [], "any", false, false, false, 32), "Y-m-d"), "html", null, true);
            echo "</td>
                    <td>
                        ";
            // line 34
            if ((twig_get_attribute($this->env, $this->source, $context["order"], "status", [], "any", false, false, false, 34) == "confirmed")) {
                // line 35
                echo "                            <div class=\"ui green label\">Confirmed</div>
                        ";
            } elseif ((twig_get_attribute($this->env, $this->source,             // line 36
$context["order"], "status", [], "any", false, false, false, 36) == "shipped")) {
                // line 37
                echo "                            <div class=\"ui blue label\">Shipped</div>
                        ";
            } elseif ((twig_get_attribute($this->env, $this->source,             // line 38
$context["order"], "status", [], "any", false, false, false, 38) == "delivered")) {
                // line 39
                echo "                            <div class=\"ui teal label\">Delivered</div>
                        ";
            } else {
                // line 41
                echo "                            <div class=\"ui yellow label\">";
                echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->source, $context["order"], "status", [], "any", false, false, false, 41)), "html", null, true);
                echo "</div>
                        ";
            }
            // line 43
            echo "                    </td>
                    <td>
                        <a href=\"/shop/orders/";
            // line 45
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["order"], "order_ref", [], "any", false, false, false, 45), "html", null, true);
            echo "/view\" class=\"ui button\">View</a>
                        <a href=\"/shop/orders/";
            // line 46
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["order"], "order_ref", [], "any", false, false, false, 46), "html", null, true);
            echo "/track\" class=\"ui button\">Track</a>
                        <a href=\"/shop/orders/";
            // line 47
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["order"], "order_ref", [], "any", false, false, false, 47), "html", null, true);
            echo "/return\" class=\"ui button\">Return</a>
                    </td>
                </tr>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['order'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 51
        echo "                <!-- Add more rows as needed -->
                ";
        // line 52
        if ((twig_get_attribute($this->env, $this->source, ($context["rows"] ?? null), "length", [], "any", false, false, false, 52) == 0)) {
            // line 53
            echo "                <tr>
                   <td colspan=\"7\">No orders found</td>
                </tr>
                ";
        }
        // line 57
        echo "            </tbody>
        </table>
    </div>

</div>
";
    }

    public function getTemplateName()
    {
        return "tr-shop/views/user/orders_dashboard.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  157 => 57,  151 => 53,  149 => 52,  146 => 51,  136 => 47,  132 => 46,  128 => 45,  124 => 43,  118 => 41,  114 => 39,  112 => 38,  109 => 37,  107 => 36,  104 => 35,  102 => 34,  97 => 32,  93 => 31,  89 => 30,  85 => 29,  81 => 28,  78 => 27,  74 => 26,  50 => 4,  46 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "tr-shop/views/user/orders_dashboard.html", "/mnt/BLOCKSTORAGE/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/modules/tr-shop/views/user/orders_dashboard.html");
    }
}
