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

/* cashier/views/admin/edit.html */
class __TwigTemplate_ac21ad411e9ac351a1e1ca29fd06bdec extends Template
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
        return "_layout_admin_fomantic.html";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("_layout_admin_fomantic.html", "cashier/views/admin/edit.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<main x-data=\"main()\" data-receipt=\"";
        echo twig_escape_filter($this->env, json_encode(($context["receipt"] ?? null)));
        echo "\">
<div class=\"ui breadcrumb\">
  <a href=\"/framework/admin\" class=\"section\">Admin Home</a>
  <i class=\"right angle icon divider\"></i>
  <a href=\"/framework/admin/cashier\" class=\"section\">Cashier</a>
  <i class=\"right angle icon divider\"></i>
  <div class=\"active section\">Edit (Id: ";
        // line 10
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["receipt"] ?? null), "id", [], "any", false, false, false, 10), "html", null, true);
        echo ")</div>
</div>

<h2 class=\"ui header\">Edit Cashier Receipt (Id: ";
        // line 13
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["receipt"] ?? null), "id", [], "any", false, false, false, 13), "html", null, true);
        echo ")</h2>

<form method=\"post\" action=\"/framework/admin/cashier/edit/";
        // line 15
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["receipt"] ?? null), "id", [], "any", false, false, false, 15), "html", null, true);
        echo "\" class=\"ui form\">

  <p>Edit the cashier receipt details</p>

  <div class=\"required field\">
    <label for=\"email\">Payee Email Address</label>
    <input value=\"";
        // line 21
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["receipt"] ?? null), "email", [], "any", false, false, false, 21), "html", null, true);
        echo "\" type=\"text\" id=\"email\" name=\"email\">
  </div>

  <div class=\"required field\">
    <label for=\"description\">Description</label>
    <textarea name=\"description\" placeholder=\"Description of the transaction\">";
        // line 26
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["receipt"] ?? null), "description", [], "any", false, false, false, 26), "html", null, true);
        echo "</textarea>
  </div>

  <div class=\"required field\">
    <label for=\"payment_mode\">Payment Mode</label>
    <input value=\"";
        // line 31
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["receipt"] ?? null), "payment_mode", [], "any", false, false, false, 31), "html", null, true);
        echo "\" type=\"text\" id=\"payment_mode\" name=\"payment_mode\">
  </div>

  <div class=\"required field\">
    <label for=\"payment_type\">Payment Type</label>
    <input value=\"";
        // line 36
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["receipt"] ?? null), "payment_type", [], "any", false, false, false, 36), "html", null, true);
        echo "\" type=\"text\" id=\"payment_type\" name=\"payment_type\">
  </div>

  <div class=\"required field\">
    <label for=\"payment_status\">Payment Status</label>    
    <input x-model=\"input.payment_status\" value=\"";
        // line 41
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["receipt"] ?? null), "payment_status", [], "any", false, false, false, 41), "html", null, true);
        echo "\" type=\"text\" id=\"payment_status\" name=\"payment_status\">
    <h4 class=\"ui tiny horizontal left aligned divider header\">
      <i class=\"caret square down outline icon\"></i>
      Select an option
    </h4>
    <div class=\"ui stackable small buttons\">
      <button @click=\"input.payment_status = 'pending'\" type=\"button\" :class=\"input.payment_status == 'pending'?'positive':'basic'\" class=\"ui button\">Pending</button>
      <button @click=\"input.payment_status = 'completed'\" type=\"button\" :class=\"input.payment_status == 'completed'?'positive':'basic'\"  class=\"ui button\">Completed</button>
      <button @click=\"input.payment_status = 'refunded'\" type=\"button\" :class=\"input.payment_status == 'refunded'?'positive':'basic'\"  class=\"ui button\">Refunded</button>
      <button @click=\"input.payment_status = 'cancelled'\" type=\"button\" :class=\"input.payment_status == 'cancelled'?'positive':'basic'\"  class=\"ui button\">Cancelled</button>
    </div>
  </div>

  <div class=\"required field\">
    <label for=\"currency\">Currency</label>
    <input value=\"";
        // line 56
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["receipt"] ?? null), "currency", [], "any", false, false, false, 56), "html", null, true);
        echo "\" type=\"text\" id=\"currency\" name=\"currency\">
  </div>

  <div class=\"required field\">
    <label for=\"amount\">Amount</label>
    <input value=\"";
        // line 61
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["receipt"] ?? null), "amount", [], "any", false, false, false, 61), "html", null, true);
        echo "\" type=\"text\" id=\"amount\" name=\"amount\">
  </div>

  <div class=\"required field\">
    <label for=\"stripe_fee\">Stripe Fee</label>
    <input value=\"";
        // line 66
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["receipt"] ?? null), "stripe_fee", [], "any", false, false, false, 66), "html", null, true);
        echo "\" type=\"text\" id=\"stripe_fee\" name=\"stripe_fee\">
  </div>

  <div class=\"required field\">
    <label for=\"paypal_fee\">PayPal Fee</label>
    <input value=\"";
        // line 71
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["receipt"] ?? null), "paypal_fee", [], "any", false, false, false, 71), "html", null, true);
        echo "\" type=\"text\" id=\"paypal_fee\" name=\"paypal_fee\">
  </div>

  <div class=\"required field\">
    <label for=\"net_amount\">Net Amount</label>
    <input value=\"";
        // line 76
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["receipt"] ?? null), "net_amount", [], "any", false, false, false, 76), "html", null, true);
        echo "\" type=\"text\" id=\"net_amount\" name=\"net_amount\">
  </div>

  <div class=\"field\">
    <label for=\"stripe_payment_identifier\">Stripe Payment Identifier</label>
    <input value=\"";
        // line 81
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["receipt"] ?? null), "stripe_payment_identifier", [], "any", false, false, false, 81), "html", null, true);
        echo "\" type=\"text\" id=\"stripe_payment_identifier\" name=\"stripe_payment_identifier\">
  </div>

  <div class=\"field\">
    <label for=\"paypal_invoice_id\">PayPal Invoice ID</label>
    <input value=\"";
        // line 86
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["receipt"] ?? null), "paypal_invoice_id", [], "any", false, false, false, 86), "html", null, true);
        echo "\" type=\"text\" id=\"paypal_invoice_id\" name=\"paypal_invoice_id\">
  </div>

  <div class=\"field\">
    <label for=\"digital_receipt_url\">Digital Receipt URL</label>
    <textarea name=\"digital_receipt_url\" placeholder=\"URL for the digital receipt\">";
        // line 91
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["receipt"] ?? null), "digital_receipt_url", [], "any", false, false, false, 91), "html", null, true);
        echo "</textarea>
  </div>

  <button type=\"submit\" class=\"ui button\">Submit</button>
</form>

</main>
";
    }

    // line 100
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 101
        echo "<script>
  /* VALIDATION */
  \$(document).ready(function () {
    \$('.ui.form').form({
      fields: {
        email: {
          identifier: 'email',
          rules: [
            {
              type: 'empty',
              prompt: 'Please enter a contact email address'
            },
            {
              type: 'email',
              prompt: 'Please enter a valid email address'
            }
          ]
        },
        description: {
          identifier: 'description',
          rules: [
            {
              type: 'empty',
              prompt: 'Please enter a description'
            }
          ]
        },
        payment_mode: {
          identifier: 'payment_mode',
          rules: [
            {
              type: 'empty',
              prompt: 'Please enter the payment mode'
            }
          ]
        },
        payment_type: {
          identifier: 'payment_type',
          rules: [
            {
              type: 'empty',
              prompt: 'Please enter the payment type'
            }
          ]
        },
        payment_status: {
          identifier: 'payment_status',
          rules: [
            {
              type: 'empty',
              prompt: 'Please enter the payment status'
            }
          ]
        },
        currency: {
          identifier: 'currency',
          rules: [
            {
              type: 'empty',
              prompt: 'Please enter the currency'
            }
          ]
        },
        amount: {
          identifier: 'amount',
          rules: [
            {
              type: 'empty',
              prompt: 'Please enter the amount'
            },
            {
              type: 'number',
              prompt: 'Please enter a valid amount'
            }
          ]
        },
        net_amount: {
          identifier: 'net_amount',
          rules: [
            {
              type: 'empty',
              prompt: 'Please enter the net amount'
            }
          ]
        }
      }
    });
  });
</script>
<script defer>
  document.addEventListener('alpine:init', () => {

  Alpine.data('main', () => ({
    input: {},
    init() {
    this.loadReceipt();
    },
    loadReceipt() {
        let r = document.querySelector('[data-receipt]');
        this.input = JSON.parse(r.dataset.receipt)
    },
  }))
})
</script>
";
    }

    public function getTemplateName()
    {
        return "cashier/views/admin/edit.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  203 => 101,  199 => 100,  187 => 91,  179 => 86,  171 => 81,  163 => 76,  155 => 71,  147 => 66,  139 => 61,  131 => 56,  113 => 41,  105 => 36,  97 => 31,  89 => 26,  81 => 21,  72 => 15,  67 => 13,  61 => 10,  51 => 4,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "cashier/views/admin/edit.html", "/mnt/BLOCKSTORAGE/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/modules/cashier/views/admin/edit.html");
    }
}
