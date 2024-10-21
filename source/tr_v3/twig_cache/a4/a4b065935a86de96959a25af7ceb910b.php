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

/* amadeus/views/admin/transfers_main.html */
class __TwigTemplate_510f856a9eb0fcfc87da7cf0f51ac6ae extends Template
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
        $this->parent = $this->loadTemplate("_layout_admin_fomantic.html", "amadeus/views/admin/transfers_main.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<div x-data=\"main()\">

    <h2 class=\"ui header\">Car Transfers</h2>

    <div>
        <button @click=\"loadTestDataset()\" class=\"ui button\">Load Test Dataset</button>
    </div>


    <div class=\"ui form\">

        <div class=\"field\">
            <label>Pickup Location (IATA code or City)</label>
            <input type=\"text\" class=\"ui input\" x-model=\"pickupLocation\" placeholder=\"Pickup Location\">
        </div>

        <div class=\"field\">
            <label>Dropoff Location (IATA code or City)</label>
            <input type=\"text\" class=\"ui input\" x-model=\"dropoffLocation\" placeholder=\"Dropoff Location\">
        </div>

        <div class=\"field\">
            <label>Pickup Date (YYYY-MM-DD)</label>
            <input type=\"date\" class=\"ui input\" x-model=\"pickupDate\">
        </div>

        <button class=\"ui primary button\" @click=\"searchTransfers\">Search Transfers</button>
    </div>

    <div class=\"content\" x-show=\"loading\">
        <div class=\"ui active centered inline loader\"></div>
    </div>

    <div class=\"content\" x-show=\"transfers.length > 0\">
        <h3 class=\"ui header\">Transfer Options:</h3>

        <table class=\"ui table\">

            <thead>
                <tr>
                    <th>Id</th>
                    <th>Start</th>
                    <th>End</th>
                    <th>Transfer Type</th>
                    <th>Vehicle Description</th>
                    <th>Service Provider</th>
                    <th>Quotation</th>
                    <th>Currency</th>
                </tr>
            </thead>
            <tbody>
            <template x-for=\"transfer in transfers\" :key=\"transfer.id\">
                <tr>
                    <td x-text=\"transfer.id\"></td>
                    <td>
                        <div x-text=\"transfer.start.dateTime\"></div>
                        <div x-text=\"transfer.start.locationCode\"></div>
                    </td>
                    <td>
                        <div x-text=\"transfer.end.dateTime\"></div>
                        <div x-text=\"transfer.end.address.line\"></div>
                        <div x-text=\"transfer.end.address.cityName\"></div>
                    </td>
                    <td x-text=\"transfer.transferType\"></td>
                    <td x-text=\"transfer.vehicle.description\"></td>
                    <td x-text=\"transfer.serviceProvider.name\"></td>
                    <td x-text=\"transfer.quotation.monetaryAmount\"></td>
                    <td x-text=\"transfer.quotation.currencyCode\"></td>
                    
                    
                        <!-- Uncomment and modify these lines if you need more details about each transfer -->
                    
                        <!-- <div>";
        // line 76
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["transfer"] ?? null), "vehicle", [], "any", false, false, false, 76), "name", [], "any", false, false, false, 76), "html", null, true);
        echo "</div>
                        <div class=\"text-caption\">Price: ";
        // line 77
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["transfer"] ?? null), "price", [], "any", false, false, false, 77), "total", [], "any", false, false, false, 77), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["transfer"] ?? null), "price", [], "any", false, false, false, 77), "currency", [], "any", false, false, false, 77), "html", null, true);
        echo "</div>
                        <div class=\"text-caption\">Provider: ";
        // line 78
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["transfer"] ?? null), "provider", [], "any", false, false, false, 78), "name", [], "any", false, false, false, 78), "html", null, true);
        echo "</div> -->

                </tr>
            </template>
            </tbody>
        </table>
    </div>

    <div class=\"content\" x-show=\"error\">
        <div class=\"ui negative message\">
            <div class=\"header\" x-text=\"error\"></div>
        </div>
    </div>

</div>
";
    }

    // line 95
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 96
        echo "
<script>

    const API_FETCH_AMADEUS_TRANSFER_SEARCH = '/modules/amadeus/api/cars-transfers/transfer_search.php'
    const API_FETCH_AMADEUS_TRANSFER_TEST_DATASET = '/modules/amadeus/datasets/TRANSFERS_SEARCH.json'
    
    document.addEventListener('alpine:init', () => {

        Alpine.data('main', () => ({
            pickupLocation: '',
            dropoffLocation: '',
            pickupDate: '',
            transfers: [],
            loading: false,
            error: null,
            async loadTestDataset() {

                let r = await axios.get(API_FETCH_AMADEUS_TRANSFER_TEST_DATASET);

                if(r.status == 200) {

                    this.transfers = r.data

                    \$.toast({ class: 'success', message: 'Dataset fetched!' });
                }
            },
            async searchTransfers() {
                this.loading = true;
                this.transfers = [];
                this.error = null;

                let r = await axios.get(API_FETCH_AMADEUS_TRANSFER_SEARCH);

                this.loading = false;

                if (r.data.message === 'success') {

                    this.transfers = r.data.results.data;
                } else {
                    this.error = 'Error fetching transfer data. Please try again.';
                }
            }
        }))
    });
</script>
";
    }

    public function getTemplateName()
    {
        return "amadeus/views/admin/transfers_main.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  159 => 96,  155 => 95,  135 => 78,  129 => 77,  125 => 76,  51 => 4,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "amadeus/views/admin/transfers_main.html", "/mnt/BLOCKSTORAGE/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/modules/amadeus/views/admin/transfers_main.html");
    }
}
