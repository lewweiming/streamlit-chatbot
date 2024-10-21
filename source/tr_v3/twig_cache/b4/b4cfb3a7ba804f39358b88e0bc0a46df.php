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

/* tr-car-rentals/views/admin/reports.html */
class __TwigTemplate_393067eb45b889f6a491800cec80ee2e extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'head' => [$this, 'block_head'],
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
        $this->parent = $this->loadTemplate("_layout_fomantic.html", "tr-car-rentals/views/admin/reports.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_head($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<script src=\"https://cdn.jsdelivr.net/npm/chart.js\"></script>
";
    }

    // line 7
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 8
        echo "<div class=\"ui container\">
    <h2 class=\"ui dividing header\">Car Rental Reports Dashboard</h2>
    <div class=\"ui form\">
        <div class=\"fields\">
            <div class=\"field\">
                <label>Date Range</label>
                <input type=\"date\" placeholder=\"Start Date\">
            </div>
            <div class=\"field\">
                <label>To</label>
                <input type=\"date\" placeholder=\"End Date\">
            </div>
            <div class=\"field\">
                <label>Filter by Agency</label>
                <select class=\"ui dropdown\">
                    <option value=\"\">Select Agency</option>
                    <option value=\"1\">Agency 1</option>
                    <option value=\"2\">Agency 2</option>
                </select>
            </div>
            <div class=\"field\">
                <label>Filter by Location</label>
                <select class=\"ui dropdown\">
                    <option value=\"\">Select Location</option>
                    <option value=\"1\">Location 1</option>
                    <option value=\"2\">Location 2</option>
                </select>
            </div>
        </div>
    </div>
    
    <!-- Key Metrics Overview -->
    <div class=\"ui four statistics\">
        <div class=\"statistic\">
            <div class=\"value\">120</div>
            <div class=\"label\">Total Bookings</div>
        </div>
        <div class=\"statistic\">
            <div class=\"value\">\$25,000</div>
            <div class=\"label\">Total Revenue</div>
        </div>
        <div class=\"statistic\">
            <div class=\"value\">80</div>
            <div class=\"label\">Cars Rented</div>
        </div>
        <div class=\"statistic\">
            <div class=\"value\">5.2 Days</div>
            <div class=\"label\">Average Rental Duration</div>
        </div>
    </div>

    <!-- Charts & Graphs Section -->
    <h3 class=\"ui dividing header\">Reports Overview</h3>
    <div class=\"ui grid\">
        <div class=\"eight wide column\">
            <div class=\"ui segment\">
                <canvas id=\"rentalTrendsChart\"></canvas>
            </div>
        </div>
        <div class=\"eight wide column\">
            <div class=\"ui segment\">
                <canvas id=\"revenueBreakdownChart\"></canvas>
            </div>
        </div>
    </div>
    
    <div class=\"ui grid\">
        <div class=\"eight wide column\">
            <div class=\"ui segment\">
                <canvas id=\"popularCarsChart\"></canvas>
            </div>
        </div>
        <div class=\"eight wide column\">
            <div class=\"ui segment\">
                <canvas id=\"customerDemographicsChart\"></canvas>
            </div>
        </div>
    </div>

    <!-- Detailed Reports Table -->
    <h3 class=\"ui dividing header\">Detailed Reports</h3>
    <table class=\"ui celled table\">
        <thead>
            <tr>
                <th>Booking ID</th>
                <th>Customer Name</th>
                <th>Car Model</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Duration</th>
                <th>Total Cost</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>101</td>
                <td>John Doe</td>
                <td>Toyota Camry</td>
                <td>2024-09-15</td>
                <td>2024-09-20</td>
                <td>5 Days</td>
                <td>\$500</td>
                <td>Completed</td>
            </tr>
            <!-- Add more rows as needed -->
        </tbody>
    </table>

    <!-- Export & Download Section -->
    <button class=\"ui primary button\">Export to CSV</button>
    <button class=\"ui button\">Export to PDF</button>
    <button class=\"ui button\">Print</button>
</div>
";
    }

    // line 124
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 125
        echo "<script>
    // Example data for the charts
    const rentalTrendsCtx = document.getElementById('rentalTrendsChart').getContext('2d');
    new Chart(rentalTrendsCtx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [{
                label: 'Rental Trends',
                data: [30, 45, 60, 50, 80, 95],
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 2,
                fill: false
            }]
        }
    });

    const revenueBreakdownCtx = document.getElementById('revenueBreakdownChart').getContext('2d');
    new Chart(revenueBreakdownCtx, {
        type: 'bar',
        data: {
            labels: ['SUV', 'Sedan', 'Truck', 'Van'],
            datasets: [{
                label: 'Revenue Breakdown',
                data: [12000, 8000, 5000, 3000],
                backgroundColor: ['rgba(54, 162, 235, 0.6)', 'rgba(255, 99, 132, 0.6)', 'rgba(255, 206, 86, 0.6)', 'rgba(75, 192, 192, 0.6)']
            }]
        }
    });

    const popularCarsCtx = document.getElementById('popularCarsChart').getContext('2d');
    new Chart(popularCarsCtx, {
        type: 'pie',
        data: {
            labels: ['Toyota Camry', 'Honda Civic', 'Ford Focus'],
            datasets: [{
                data: [30, 40, 30],
                backgroundColor: ['rgba(255, 99, 132, 0.6)', 'rgba(54, 162, 235, 0.6)', 'rgba(255, 206, 86, 0.6)']
            }]
        }
    });

    const customerDemographicsCtx = document.getElementById('customerDemographicsChart').getContext('2d');
    new Chart(customerDemographicsCtx, {
        type: 'bar',
        data: {
            labels: ['18-25', '26-35', '36-45', '46-60', '60+'],
            datasets: [{
                label: 'Customer Age Groups',
                data: [20, 35, 25, 15, 5],
                backgroundColor: 'rgba(153, 102, 255, 0.6)'
            }]
        }
    });
</script>
";
    }

    public function getTemplateName()
    {
        return "tr-car-rentals/views/admin/reports.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  183 => 125,  179 => 124,  61 => 8,  57 => 7,  52 => 4,  48 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "tr-car-rentals/views/admin/reports.html", "/mnt/BLOCKSTORAGE/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/modules/tr-car-rentals/views/admin/reports.html");
    }
}
