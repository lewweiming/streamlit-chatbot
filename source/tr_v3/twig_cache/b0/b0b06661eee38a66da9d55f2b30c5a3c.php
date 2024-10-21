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

/* pages/payment.html */
class __TwigTemplate_be910e91b6c35078f2729487c74dfe73 extends Template
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
        $this->parent = $this->loadTemplate("_layout_fomantic.html", "pages/payment.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<div class=\"ui container\">
    <h2 class=\"ui dividing header\">Car Rental Payment</h2>
    
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
            
            <!-- Customer Information -->
            <div class=\"ui segment\">
                <h3 class=\"ui header\">Customer Information</h3>
                <form class=\"ui form\">
                    <div class=\"field\">
                        <label>Name</label>
                        <input type=\"text\" name=\"name\" placeholder=\"John Doe\">
                    </div>
                    <div class=\"field\">
                        <label>Email</label>
                        <input type=\"email\" name=\"email\" placeholder=\"john.doe@example.com\">
                    </div>
                    <div class=\"field\">
                        <label>Phone Number</label>
                        <input type=\"text\" name=\"phone\" placeholder=\"123-456-7890\">
                    </div>
                </form>
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
                </form>
            </div>
        </div>
    </div>
    
    <!-- Confirmation Button -->
    <div class=\"ui center aligned segment\">
        <button class=\"ui primary button\">Confirm Payment</button>
    </div>
</div>
";
    }

    // line 113
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 114
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
        return "pages/payment.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  166 => 114,  162 => 113,  51 => 4,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "pages/payment.html", "/mnt/BLOCKSTORAGE/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/views/pages/payment.html");
    }
}
