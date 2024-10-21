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

/* tr-flight-bookings/views/stepper_personal_details.html */
class __TwigTemplate_dfcaeac7cfbab3987cb61cc6929dcd4a extends Template
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
        $this->parent = $this->loadTemplate("_layout_fomantic.html", "tr-flight-bookings/views/stepper_personal_details.html", 1);
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
    <a href=\"/modules/flight-bookings\" class=\"section\">Flight Bookings</a>
    <i class=\"right angle icon divider\"></i>
    <div class=\"active section\">Checkout: Personal Details</div>
  </div>

  <!-- STEPPER -->
  <div class=\"ui ordered fluid steps\">

    <div class=\"active step\">
      <div class=\"content\">
        <div class=\"title\">Personal Details</div>
        <div class=\"description\">Enter your details</div>
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

    <form method=\"post\" action=\"/modules/flight-bookings/checkout/personal-details\" class=\"ui form\">

      <h4 class=\"ui dividing header\">Customer Information</h4>
      <div class=\"field\">
        <label>Full Name</label>
        <input x-model=\"input.fullName\" type=\"text\" name=\"name\" placeholder=\"Full Name\">
      </div>
      <div class=\"field\">
        <label>Email</label>
        <input x-model=\"input.email\" type=\"email\" name=\"email\" placeholder=\"Email\">
      </div>
      <div class=\"field\">
        <label>Phone Number</label>
        <input x-model=\"input.phone\" type=\"tel\" name=\"phone\" placeholder=\"Phone Number\">
      </div>

      <button class=\"ui primary button\" type=\"submit\">Continue</button>
    </form>
  </div>
</main>
";
    }

    // line 60
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 61
        echo "<script>
  \$('.ui.form').form({
    fields: {
      name: 'empty',
      email: 'email',
      phone: 'empty'
    }
  });
</script>

<script defer>
  document.addEventListener('alpine:init', () => {

    Alpine.data('main', () => ({
      input: {
        fullName: 'John Smith',
        email: 'socrates3142@gmail.com',
        phone: '2343423'
      }
    }))
  })
</script>
";
    }

    public function getTemplateName()
    {
        return "tr-flight-bookings/views/stepper_personal_details.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  112 => 61,  108 => 60,  51 => 4,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "tr-flight-bookings/views/stepper_personal_details.html", "/mnt/BLOCKSTORAGE/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/modules/tr-flight-bookings/views/stepper_personal_details.html");
    }
}
