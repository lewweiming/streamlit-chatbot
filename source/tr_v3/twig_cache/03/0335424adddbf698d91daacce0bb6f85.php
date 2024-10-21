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

/* tr-shop/views/stepper_review_payment.html */
class __TwigTemplate_987ed4f4a8fbd22018c640e70f7357c0 extends Template
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
        $this->parent = $this->loadTemplate("_layout_fomantic.html", "tr-shop/views/stepper_review_payment.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<main x-data=\"main\" x-cloak data-paypal-mode=\"";
        echo twig_escape_filter($this->env, ($context["mode"] ?? null));
        echo "\">

<!-- BREADCRUMBS -->
<div class=\"ui breadcrumb\">
    <a href=\"/\" class=\"section\">Home</a>
    <i class=\"right angle icon divider\"></i>
    <a href=\"/modules/shop\" class=\"section\">Shop</a>
    <i class=\"right angle icon divider\"></i>
    <div class=\"active section\">Checkout: Review & Payment</div>
</div>

<!-- MODAL COMPLETE -->
<div class=\"ui modal\">
    <i class=\"close icon\"></i>
    <div class=\"header\">
      Your booking is under review
    </div>
    <div class=\"image content\">
      <div class=\"ui small image\">
        <img src=\"/assets/icons/documents.png\">
      </div>
      <div class=\"description\">
        <div class=\"ui header\">What to do next?</div>
        <p>Once your booking is confirmed, you will be notified via email.</p>
        <p>This will take within 1 - 3 working days.</p>
        <p>You can also view the status of your dashboard.</p>
      </div>
    </div>
    <div class=\"actions\">
      <button class=\"ui positive right labeled icon button\">
        Okay
        <i class=\"checkmark icon\"></i>
      </button>
    </div>
  </div>

<!-- STEPPER -->
<div class=\"ui ordered fluid steps\">

    <a href=\"/modules/shop/checkout/personal-details\" class=\"completed step\">
        <div class=\"content\">
            <div class=\"title\">Personal Details</div>
            <div class=\"description\">Enter your details</div>
        </div>
    </a>

    <a href=\"/modules/shop/checkout/delivery-details\" class=\"completed step\">
        <div class=\"content\">
          <div class=\"title\">Delivery Details</div>
          <div class=\"description\">Enter delivery details</div>
        </div>
    </a>

    <div class=\"active step\">
        <div class=\"content\">
            <div class=\"title\">Review & Payment</div>
            <div class=\"description\">Review booking and complete your payment</div>
        </div>
    </div>
</div>

<!-- ALERT -->
<div class=\"ui message\">
    <p>All currency in USD unless otherwise stated.</p>
</div>

<div class=\"ui grid\">
    <div class=\"ten wide column\">

        <div class=\"ui black padded segment\">
            <h1 class=\"ui header\">Shop Checkout</h1>

        <!-- Cart Details -->
        <div class=\"ui inverted segment\" id=\"summary\">
            <h2 class=\"ui header\">Cart Details</h2>
            <table class=\"ui celled table\">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Subtotal</th>
                  </tr>
                </thead>
                <tbody>
                  ";
        // line 89
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["cartData"] ?? null));
        foreach ($context['_seq'] as $context["key"] => $context["row"]) {
            // line 90
            echo "                  <tr>
                      <td>";
            // line 91
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "name", [], "any", false, false, false, 91), "html", null, true);
            echo "</td>
                      <td>";
            // line 92
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "quantity", [], "any", false, false, false, 92), "html", null, true);
            echo "</td>
                      <td>";
            // line 93
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["row"], "price", [], "any", false, false, false, 93), 2, ".", ","), "html", null, true);
            echo "</td>
                      <td>";
            // line 94
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (twig_get_attribute($this->env, $this->source, $context["row"], "price", [], "any", false, false, false, 94) * twig_get_attribute($this->env, $this->source, $context["row"], "quantity", [], "any", false, false, false, 94)), 2, ".", ","), "html", null, true);
            echo "</td>
                  </tr>
                  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['row'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 97
        echo "                  <tr>
                    <td class=\"right aligned\"><strong>Cart Total</strong></td>
                    <td colspan=3 class=\"left aligned\">\$<span>";
        // line 99
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, ($context["cartTotal"] ?? null), 2, ".", ","), "html", null, true);
        echo "</span></td>
                  </tr>
                </tbody>
              </table>
              
        </div>

        
        <div class=\"ui inverted segment\">
            <h3 class=\"ui header\">Personal Details</h3>
            <table class=\"ui celled table\">
                <tr>
                    <td width=\"100\"><strong>Name</strong></td>
                    <td>";
        // line 112
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["orderData"] ?? null), "name", [], "any", false, false, false, 112), "html", null, true);
        echo "</td>
                </tr>
                <tr>
                    <td><strong>Email</strong></td>
                    <td>";
        // line 116
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["orderData"] ?? null), "email", [], "any", false, false, false, 116), "html", null, true);
        echo "</td>
                </tr>
                <tr>
                    <td><strong>Phone</strong></td>
                    <td>";
        // line 120
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["orderData"] ?? null), "phone", [], "any", false, false, false, 120), "html", null, true);
        echo "</td>
                </tr>
            </table>

        </div>

        <div class=\"ui inverted segment\">
            <h3 class=\"ui header\">Delivery Details</h3>
            <table class=\"ui celled table\">
                <tr>
                    <td width=\"100\"><strong>Address</strong></td>
                    <td>";
        // line 131
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["orderData"] ?? null), "address", [], "any", false, false, false, 131), "html", null, true);
        echo "</td>
                </tr>
                <tr>
                    <td><strong>City</strong></td>
                    <td>";
        // line 135
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["orderData"] ?? null), "city", [], "any", false, false, false, 135), "html", null, true);
        echo "</td>
                </tr>
                <tr>
                    <td><strong>State/Province</strong></td>
                    <td>";
        // line 139
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["orderData"] ?? null), "state", [], "any", false, false, false, 139), "html", null, true);
        echo "</td>
                </tr>
                <tr>
                    <td><strong>Postal Code</strong></td>
                    <td>";
        // line 143
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["orderData"] ?? null), "postalCode", [], "any", false, false, false, 143), "html", null, true);
        echo "</td>
                </tr>
            </table>

        </div>

        </div>

    </div>
    <div class=\"six wide column\">
        <!-- Payment Method -->
        <div class=\"ui black padded segment\">

            <h3 class=\"ui header\">Order Summary</h3>
            <div class=\"ui relaxed divided list\">
                <div class=\"item\">
                    <i class=\"dollar sign icon\"></i>
                    <div class=\"content\">
                        <div class=\"header\">Cart Total</div>
                        <div class=\"description\">";
        // line 162
        echo twig_escape_filter($this->env, $this->extensions['Twig\Extra\Intl\IntlExtension']->formatCurrency(($context["cartTotal"] ?? null), "SGD"), "html", null, true);
        echo "</div>
                    </div>
                </div>
            </div>

            <div class=\"ui divider\"></div>

            <!-- SHOW IF PAYMENT COMPLETE -->
            <section x-show=\"isComplete\">
             <div class=\"ui vertical fluid spaced buttons\">
            <button data-tooltip=\"Your payment is currently under review\" class=\"ui fluid positive button\">Payment Completed</button>
            <a href=\"/\" class=\"ui fluid button\">Return Home</a>
            </div>
            </section>

            <!-- SHOW IF PAYMENT NOT COMPLETE -->
            <section x-show=\"!isComplete\">
            <h3 class=\"ui header\">Payment Method</h3>
            <form class=\"ui form\">
                <div class=\"grouped fields\">
                    <label>Select a Payment Method</label>
                    <!-- <div class=\"field\">
                        <div class=\"ui radio checkbox\">
                            <input type=\"radio\" name=\"paymentMethod\" checked=\"checked\" tabindex=\"0\" class=\"hidden\">
                            <label>Credit Card</label>
                        </div>
                    </div> -->
                    <div class=\"field\">
                        <div class=\"ui radio checkbox\">
                            <input checked type=\"radio\" name=\"paymentMethod\" tabindex=\"0\" class=\"hidden\">
                            <label>PayPal (";
        // line 192
        echo twig_escape_filter($this->env, ($context["mode"] ?? null), "html", null, true);
        echo ")</label>
                        </div>
                    </div>
                    <!-- <div class=\"field\">
                        <div class=\"ui radio checkbox\">
                            <input type=\"radio\" name=\"paymentMethod\" tabindex=\"0\" class=\"hidden\">
                            <label>Bank Transfer</label>
                        </div>
                    </div> -->
                </div>

                <!-- Credit Card Information -->
                <!-- <div class=\"ui segment\">
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
                </div> -->

                <section>

                    <!-- PAYPAL -->
                    <div id=\"paypal-button-container\"></div>
                </section>

            </form>
            </section>
        </div>
    </div>
</div>

</main>
";
    }

    // line 237
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 238
        echo "<script src=\"https://www.paypal.com/sdk/js?client-id=";
        echo twig_escape_filter($this->env, ($context["paypal_client_id"] ?? null), "html", null, true);
        echo "&currency=USD\"></script>
<script>

    let r = document.querySelector('[data-paypal-mode]');
    const paypalMode = r.dataset.paypalMode; // sandbox / live

    const API_PAYPAL_SANDBOX_CREATE = '/modules/tr-shop/api/paypal/create_sandbox_digital_checkout.php'
    const API_PAYPAL_SANDBOX_CAPTURE = '/modules/tr-shop/api/paypal/capture_sandbox_digital_checkout.php'
    const API_PAYPAL_LIVE_CREATE = '/modules/tr-shop/api/paypal/create_live_digital_checkout.php'
    const API_PAYPAL_LIVE_CAPTURE = '/modules/tr-shop/api/paypal/capture_live_digital_checkout.php'

    var API_PAYPAL_CREATE, API_PAYPAL_CAPTURE
    API_PAYPAL_CREATE = paypalMode == 'live' ? API_PAYPAL_LIVE_CREATE : API_PAYPAL_SANDBOX_CREATE;
    API_PAYPAL_CAPTURE = paypalMode == 'live' ? API_PAYPAL_LIVE_CAPTURE : API_PAYPAL_SANDBOX_CAPTURE;

    document.addEventListener('alpine:init', () => {

        Alpine.data('main', () => ({
            isConnecting: false,
            isComplete: false,
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
                    createOrder: async () => {

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

                                // Show Dialog
                                \$('.ui.modal').modal('show');
                                this.isComplete = true;
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
        return "tr-shop/views/stepper_review_payment.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  343 => 238,  339 => 237,  292 => 192,  259 => 162,  237 => 143,  230 => 139,  223 => 135,  216 => 131,  202 => 120,  195 => 116,  188 => 112,  172 => 99,  168 => 97,  159 => 94,  155 => 93,  151 => 92,  147 => 91,  144 => 90,  140 => 89,  51 => 4,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "tr-shop/views/stepper_review_payment.html", "/mnt/BLOCKSTORAGE/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/modules/tr-shop/views/stepper_review_payment.html");
    }
}
