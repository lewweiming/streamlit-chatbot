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

/* tr-car-rentals/views/paypal_checkout.html */
class __TwigTemplate_e87ce446649a96e47cb1ca9e5a9147cf extends Template
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
        $this->parent = $this->loadTemplate("_layout_fomantic.html", "tr-car-rentals/views/paypal_checkout.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<section x-data=\"main\" x-cloak>

    <div class=\"title\">Paypal Test Page</div>

    <p>Test and maje sure the paypal button works properly, on success a toast message will pop up.</p>

    <div class=\"title is-5\">Payment (";
        // line 10
        echo twig_escape_filter($this->env, ($context["mode"] ?? null), "html", null, true);
        echo ")</div>

    <!-- PAYPAL -->
    <div id=\"paypal-button-container\"></div>
</section>
";
    }

    // line 18
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 19
        echo "<script src=\"https://www.paypal.com/sdk/js?client-id=";
        echo twig_escape_filter($this->env, ($context["paypal_client_id"] ?? null), "html", null, true);
        echo "&currency=USD\"></script>
<script>

    const API_PAYPAL_CREATE = '/api/paypal/create_sandbox_digital_checkout.php'
    const API_PAYPAL_CAPTURE = '/api/paypal/capture_sandbox_digital_checkout.php'

    document.addEventListener('alpine:init', () => {

        Alpine.data('main', () => ({
            isConnecting: false,
            init() {
                this.\$nextTick(() => {
                    this.mountPaypal();
                });
            },
            /*
            - To pass to Paypal on payment
            */
            getFormDataPaypalCreate() {

                let data = this.formInput
                // let total = this.getAmountTotal()
                let total = 1;

                let formData = new FormData()
                formData.append('amount', total)
                formData.append('form', JSON.stringify(data))

                return formData
            },
            getFormDataPaypalCapture() {

                let data = this.formInput

                let formData = new FormData()
                formData.append('cart', JSON.stringify(cart.itemsCheckout))
                formData.append('form', JSON.stringify(data))

                return formData
            },
            mountPaypal() {
                paypal.Buttons({

                    // Order is created on the server and the order id is returned
                    createOrder: async() => {

                        \$.toast({ message: 'Creating an order on paypal..' })

                        /* Validate Amount or Paypal will throw cryptic errors */
                        // if (this.cartTotal == 0) {
                        //     bulmaToast.toast({ message: 'Cart cannot be empty!' })
                        //     return
                        // }

                        // if (this.getAmountTotal() == 0) {
                        //     bulmaToast.toast({ message: 'Total amount cannot be 0!' })
                        //     return
                        // }

                        /* Validate Address or Paypal will throw cryptic errors */
                        // if (this.formInput.use_new_shipping_address == false && this.formInput.selected_shipping_address == null) {
                        //     bulmaToast.toast({ message: 'Please select a shipping address first!' })
                        //     return
                        // }

                        // if (this.formInput.use_new_shipping_address == true && validateShippingAddressForm(this.formInput.shipping_address, true) == true) {
                        //     return
                        // }

                        const r = await fetch(API_PAYPAL_CREATE, {
                            method: \"POST\",
                            body: this.getFormDataPaypalCreate()
                        });

                        const order = await r.json();

                        return order.id;
                    },
                    // Finalize the transaction after payer approval
                    onApprove: (data, actions) => {

                        this.isConnecting = true

                        return fetch(API_PAYPAL_CAPTURE + `?orderId=\${data.orderID}`, {
                            method: \"post\",
                            // body: this.getFormDataPaypalCapture()
                        })
                            .then((response) => response.json())
                            .then((data) => {

                                this.isConnecting = false

                                // console.log(data) // The Paypal Order Object

                                if (typeof data === 'string') {
                                    alert(data)
                                    return
                                }

                                if (data.error) {
                                    \$.toast({ message: data.message })
                                    return
                                }

                                // Successful capture! For dev/demo purposes:
                                // console.log('Capture result', data, JSON.stringify(data, null, 2));
                                const transaction = data.purchase_units[0].payments.captures[0];
                                console.log(transaction)

                                \$.toast({ message: `Checkout (Paypal) complete` })
                                // this.currentStep = 'complete'
                                // this.completedOrderHash = data.orderHash
                                // this.clearCart()
                            });
                    },
                    onError(err) {
                        console.log(err);
                        // For example, redirect to a specific error page
                        // window.location.href = \"/your-error-page-here\";
                    },
                }).render('#paypal-button-container');
            }
        }))
    })
</script>
";
    }

    public function getTemplateName()
    {
        return "tr-car-rentals/views/paypal_checkout.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  73 => 19,  69 => 18,  59 => 10,  51 => 4,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "tr-car-rentals/views/paypal_checkout.html", "/mnt/BLOCKSTORAGE/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/modules/tr-car-rentals/views/paypal_checkout.html");
    }
}
