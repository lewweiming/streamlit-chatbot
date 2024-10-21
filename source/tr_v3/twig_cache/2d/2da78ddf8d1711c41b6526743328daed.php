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

/* tr-shop/views/stepper_delivery_details.html */
class __TwigTemplate_f34ff6dd94d34d1b72ad20e282cd7c4f extends Template
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
        $this->parent = $this->loadTemplate("_layout_fomantic.html", "tr-shop/views/stepper_delivery_details.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<main x-data=\"main()\">

  <!-- BREADCRUMBS -->
  <div class=\"ui breadcrumb\">
    <a href=\"/\" class=\"section\">Home</a>
    <i class=\"right angle icon divider\"></i>
    <a href=\"/modules/shop\" class=\"section\">Shop</a>
    <i class=\"right angle icon divider\"></i>
    <div class=\"active section\">Checkout: Delivery Details</div>
  </div>

  
  <!-- STEPPER -->
  <div class=\"ui ordered fluid steps\">

    <a href=\"/modules/shop/checkout/personal-details\" class=\"completed step\">
      <div class=\"content\">
        <div class=\"title\">Personal Details</div>
        <div class=\"description\">Enter your details</div>
      </div>
    </a>

    <div class=\"active step\">
      <div class=\"content\">
        <div class=\"title\">Delivery Details</div>
        <div class=\"description\">Enter delivery details</div>
      </div>
    </div>

    <div class=\"disabled step\">
      <div class=\"content\">
        <div class=\"title\">Review & Payment</div>
        <div class=\"description\">Review booking and complete your payment</div>
      </div>
    </div>

  </div>

  <!-- Customer Details -->
  <div class=\"ui segment\">
    <form method=\"post\" action=\"/modules/shop/checkout/delivery-details\" class=\"ui form\">

      <!-- Delivery Information -->
      <h4 class=\"ui dividing header\">Delivery Information</h4>
      <div class=\"required field\">
        <label>Address</label>
        <input x-model=\"input.address\" type=\"text\" name=\"address\" placeholder=\"Street Address\">
      </div>
      <div class=\"required field\">
        <label>City</label>
        <input x-model=\"input.city\" type=\"text\" name=\"city\" placeholder=\"City\">
      </div>
      <div class=\"field\">
        <label>State/Province</label>
        <input x-model=\"input.state\" type=\"text\" name=\"state\" placeholder=\"State/Province\">
      </div>
      <div class=\"required field\">
        <label>Postal Code</label>
        <input x-model=\"input.postalCode\" type=\"text\" name=\"postalCode\" placeholder=\"Postal Code\">
      </div>

      <button class=\"ui primary button\" type=\"submit\">Continue</button>
    </form>
  </div>
</main>
";
    }

    // line 71
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 72
        echo "<script>
  \$('.ui.form').form({
    fields: {
      address: 'empty',
      city: 'empty',
      state: 'empty',
      postalCode: 'empty'
    }
  });
</script>

<script defer>
  document.addEventListener('alpine:init', () => {
    Alpine.data('main', () => ({
      input: {
        address: '123 Main St',
        city: 'Los Angeles',
        state: 'CA',
        postalCode: '90001',
      }
    }))
  })
</script>
";
    }

    public function getTemplateName()
    {
        return "tr-shop/views/stepper_delivery_details.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  124 => 72,  120 => 71,  51 => 4,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "tr-shop/views/stepper_delivery_details.html", "/mnt/BLOCKSTORAGE/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/modules/tr-shop/views/stepper_delivery_details.html");
    }
}
