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

/* tr-car-rentals/views/stepper_payment.html */
class __TwigTemplate_5e4c8d42691f8baf77c9b5bc3f26910e extends Template
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
        $this->parent = $this->loadTemplate("_layout_fomantic.html", "tr-car-rentals/views/stepper_payment.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "
<!-- STEPPER -->
<div class=\"ui ordered fluid steps\">

    <div class=\"completed step\">
        <div class=\"content\">
            <div class=\"title\">Personal Details</div>
            <div class=\"description\">Enter your details</div>
        </div>
    </div>

    <div class=\"active step\">
        <div class=\"content\">
            <div class=\"title\">Review & Payment</div>
            <div class=\"description\">Review booking and complete your payment</div>
        </div>
    </div>
</div>

<div class=\"ui grid\">
    <div class=\"ten wide column\">
        <!-- Rental Details -->
        <div class=\"ui segment\">
            <h3 class=\"ui header\">Rental Details</h3>
            <div class=\"ui relaxed divided list\">
                <div class=\"item\">
                    <i class=\"car icon\"></i>
                    <div class=\"content\">
                        <div class=\"header\">Car Model</div>
                        <div class=\"description\">Toyota Corolla 2024</div>
                    </div>
                </div>
                <div class=\"item\">
                    <i class=\"calendar alternate outline icon\"></i>
                    <div class=\"content\">
                        <div class=\"header\">Rental Period</div>
                        <div class=\"description\">Oct 2, 2024 - Oct 5, 2024 (3 days)</div>
                    </div>
                </div>
                <div class=\"item\">
                    <i class=\"dollar sign icon\"></i>
                    <div class=\"content\">
                        <div class=\"header\">Total Price</div>
                        <div class=\"description\">\$150.00</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class=\"six wide column\">
        <!-- Payment Method -->
        <div class=\"ui segment\">
            <h3 class=\"ui header\">Payment Method</h3>
            <form class=\"ui form\">
                <div class=\"grouped fields\">
                    <label>Select a Payment Method</label>
                    <div class=\"field\">
                        <div class=\"ui radio checkbox\">
                            <input type=\"radio\" name=\"paymentMethod\" checked=\"checked\" tabindex=\"0\" class=\"hidden\">
                            <label>Credit Card</label>
                        </div>
                    </div>
                    <div class=\"field\">
                        <div class=\"ui radio checkbox\">
                            <input type=\"radio\" name=\"paymentMethod\" tabindex=\"0\" class=\"hidden\">
                            <label>PayPal</label>
                        </div>
                    </div>
                    <div class=\"field\">
                        <div class=\"ui radio checkbox\">
                            <input type=\"radio\" name=\"paymentMethod\" tabindex=\"0\" class=\"hidden\">
                            <label>Bank Transfer</label>
                        </div>
                    </div>
                </div>

                <!-- Credit Card Information -->
                <div class=\"ui segment\">
                    <div class=\"field\">
                        <label>Card Number</label>
                        <input type=\"text\" name=\"cardNumber\" placeholder=\"XXXX-XXXX-XXXX-XXXX\">
                    </div>
                    <div class=\"fields\">
                        <div class=\"eight wide field\">
                            <label>Expiration Date</label>
                            <input type=\"text\" name=\"expiryDate\" placeholder=\"MM/YY\">
                        </div>
                        <div class=\"eight wide field\">
                            <label>CVV</label>
                            <input type=\"text\" name=\"cvv\" placeholder=\"CVV\">
                        </div>
                    </div>
                </div>

                <!-- Confirmation Button -->
                <div class=\"ui center aligned segment\">
                    <button class=\"ui primary button\">Confirm Payment</button>
                </div>
            </form>
        </div>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "tr-car-rentals/views/stepper_payment.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  50 => 4,  46 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "tr-car-rentals/views/stepper_payment.html", "/mnt/BLOCKSTORAGE/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/modules/tr-car-rentals/views/stepper_payment.html");
    }
}
