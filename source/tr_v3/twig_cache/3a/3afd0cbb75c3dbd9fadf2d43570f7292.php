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

/* tr-car-rentals/views/stepper_review_payment.html */
class __TwigTemplate_d62785e72c80f8246bc789710cf563d5 extends Template
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
        $this->parent = $this->loadTemplate("_layout_fomantic.html", "tr-car-rentals/views/stepper_review_payment.html", 1);
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
    <a href=\"/modules/car-rentals\" class=\"section\">Car Rental</a>
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

    <a href=\"/modules/car-rentals/checkout/personal-details\" class=\"completed step\">
        <div class=\"content\">
            <div class=\"title\">Personal Details</div>
            <div class=\"description\">Enter your details</div>
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
            <h1 class=\"ui header\">Car Rental Application</h1>

        <!-- Rental Details -->
        <div class=\"ui inverted segment\" id=\"summary\">
            <h2 class=\"ui header\">Rental Details</h2>
            <table class=\"ui celled table\">
                <thead>
                  <tr>
                    <th>Detail</th>
                    <th>Summary</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><strong>Selected Car</strong></td>
                    <td><span id=\"summaryCarType\">";
        // line 82
        echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["bookingData"] ?? null), "carType", [], "any", false, false, false, 82)), "html", null, true);
        echo "</span></td>
                  </tr>
                  <tr>
                    <td><strong>Pick-up Date</strong></td>
                    <td><span id=\"summaryPickupDate\">";
        // line 86
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["bookingData"] ?? null), "pickupDate", [], "any", false, false, false, 86), "html", null, true);
        echo "</span></td>
                  </tr>
                  <tr>
                    <td><strong>Return Date</strong></td>
                    <td><span id=\"summaryReturnDate\">";
        // line 90
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["bookingData"] ?? null), "returnDate", [], "any", false, false, false, 90), "html", null, true);
        echo "</span></td>
                  </tr>
                  <tr>
                    <td><strong>Insurance</strong></td>
                    <td><span id=\"summaryInsurance\">";
        // line 94
        echo (((twig_get_attribute($this->env, $this->source, ($context["bookingData"] ?? null), "insurance", [], "any", false, false, false, 94) == "true")) ? ("Yes") : ("No"));
        echo "</span></td>
                  </tr>
                  <tr>
                    <td><strong>GPS</strong></td>
                    <td><span id=\"summaryGPS\">";
        // line 98
        echo (((twig_get_attribute($this->env, $this->source, ($context["bookingData"] ?? null), "gps", [], "any", false, false, false, 98) == "true")) ? ("Yes") : ("No"));
        echo "</span></td>
                  </tr>
                  <tr>
                    <td><strong>Total Price</strong></td>
                    <td>\$<span id=\"summaryPrice\">";
        // line 102
        echo twig_escape_filter($this->env, ($context["totalCost"] ?? null), "html", null, true);
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
        // line 115
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["bookingData"] ?? null), "name", [], "any", false, false, false, 115), "html", null, true);
        echo "</td>
                </tr>
                <tr>
                    <td><strong>Email</strong></td>
                    <td>";
        // line 119
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["bookingData"] ?? null), "email", [], "any", false, false, false, 119), "html", null, true);
        echo "</td>
                </tr>
                <tr>
                    <td><strong>Phone</strong></td>
                    <td>";
        // line 123
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["bookingData"] ?? null), "phone", [], "any", false, false, false, 123), "html", null, true);
        echo "</td>
                </tr>
            </table>

        </div>

        </div>

    </div>
    <div class=\"six wide column\">
        <!-- Payment Method -->
        <div class=\"ui black padded segment\">

            <h3 class=\"ui header\">Rental Summary</h3>
            <div class=\"ui relaxed divided list\">
                <div class=\"item\">
                    <i class=\"car icon\"></i>
                    <div class=\"content\">
                        <div class=\"header\">Car Model</div>
                        <!-- <div class=\"description\">Toyota Corolla 2024</div> -->
                        <div class=\"description\">";
        // line 143
        echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["bookingData"] ?? null), "carType", [], "any", false, false, false, 143)), "html", null, true);
        echo "</div>
                    </div>
                </div>
                <div class=\"item\">
                    <i class=\"calendar alternate outline icon\"></i>
                    <div class=\"content\">
                        <div class=\"header\">Rental Period</div>
                        <div class=\"description\">
                            ";
        // line 151
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["bookingData"] ?? null), "pickUpDate", [], "any", false, false, false, 151), "M j, Y"), "html", null, true);
        echo " - ";
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["bookingData"] ?? null), "returnDate", [], "any", false, false, false, 151), "M j, Y"), "html", null, true);
        echo " ( ";
        echo twig_escape_filter($this->env, ($context["duration"] ?? null), "html", null, true);
        echo " day(s) )
                        </div>
                    </div>
                </div>
                <div class=\"item\">
                    <i class=\"dollar sign icon\"></i>
                    <div class=\"content\">
                        <div class=\"header\">Total Price</div>
                        <div class=\"description\">";
        // line 159
        echo twig_escape_filter($this->env, $this->extensions['Twig\Extra\Intl\IntlExtension']->formatCurrency(($context["totalCost"] ?? null), "SGD"), "html", null, true);
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
        // line 189
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

    // line 234
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 235
        echo "<script src=\"https://www.paypal.com/sdk/js?client-id=";
        echo twig_escape_filter($this->env, ($context["paypal_client_id"] ?? null), "html", null, true);
        echo "&currency=USD\"></script>
<script>

    let r = document.querySelector('[data-paypal-mode]');
    const paypalMode = r.dataset.paypalMode; // sandbox / live

    const API_PAYPAL_SANDBOX_CREATE = '/modules/tr-car-rentals/api/paypal/create_sandbox_digital_checkout.php'
    const API_PAYPAL_SANDBOX_CAPTURE = '/modules/tr-car-rentals/api/paypal/capture_sandbox_digital_checkout.php'
    const API_PAYPAL_LIVE_CREATE = '/modules/tr-car-rentals/api/paypal/create_live_digital_checkout.php'
    const API_PAYPAL_LIVE_CAPTURE = '/modules/tr-car-rentals/api/paypal/capture_live_digital_checkout.php'

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
        return "tr-car-rentals/views/stepper_review_payment.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  331 => 235,  327 => 234,  280 => 189,  247 => 159,  232 => 151,  221 => 143,  198 => 123,  191 => 119,  184 => 115,  168 => 102,  161 => 98,  154 => 94,  147 => 90,  140 => 86,  133 => 82,  51 => 4,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "tr-car-rentals/views/stepper_review_payment.html", "/mnt/BLOCKSTORAGE/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/modules/tr-car-rentals/views/stepper_review_payment.html");
    }
}
