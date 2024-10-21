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

/* tr-trip-bookings/views/admin/trips-data/index.html */
class __TwigTemplate_b062df891e7968b2196fcbff9bc0b176 extends Template
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
        $this->parent = $this->loadTemplate("_layout_admin_fomantic.html", "tr-trip-bookings/views/admin/trips-data/index.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<main x-data=\"main()\">

<h2 class=\"ui header\">Trips Data</h2>

<!-- TOOLBAR -->
<div>
    <a href=\"/framework/admin/trips-data/add\" class=\"ui primary button\">Add New Trip</a>
</div>

<table class=\"ui celled table\">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Price</th>
            <th>Banner Image</th>
            <th>Region</th>
            <th>Country</th>
            <th>Location</th>
            <th>Category</th>
            <th>Days</th>
            <th>Action(s)</th>
        </tr>
    </thead>
    <tbody>
        <template x-for=\"row in rows\" :key=\"row.id\">
            <tr>
                <td x-text=\"row.id\"></td>
                <td x-text=\"row.title\"></td>
                <td x-text=\"(parseFloat(row.price).toFixed(2))\"></td>
                <td>
                    <template x-if=\"row.banner_image_url\">
                        <img :src=\"row.banner_image_url\" alt=\"Banner Image\" class=\"ui small image\">
                    </template>
                    <template x-if=\"!row.banner_image_url\">
                        <span>No Image</span>
                    </template>
                </td>
                <td x-text=\"row.region\"></td>
                <td x-text=\"row.country\"></td>
                <td x-text=\"row.location\"></td>
                <td x-text=\"row.category\"></td>
                <td x-text=\"row.days\"></td>
                <td>
                    <a :href=\"`/framework/admin/trips-data/trip/\${row.id}/edit`\" class=\"ui button\">Edit</a>
                    <a :href=\"`/framework/admin/trips-data/trip/\${row.id}/delete`\" class=\"ui button\">Delete</a>
                </td>
            </tr>
        </template>
        <template x-if=\"!rows.length\">
            <tr>
                <td colspan=\"10\" class=\"center aligned\">No data available</td>
            </tr>
        </template>
    </tbody>
    <tfoot>
        <tr>
          <th colspan=\"10\">
            <div class=\"ui right floated pagination menu\">
              <a @click=\"getPrevious()\" class=\"icon item\" :class=\"{ disabled: currentPage === 1 }\">
                <i class=\"left chevron icon\"></i>
              </a>
              <template x-for=\"page in pagesToShow()\">
                <a @click=\"currentPage = page, listPaginated(currentPage)\"
                  :class=\"{ 'active': page === currentPage, 'item': true, 'disabled': page === '...' }\"
                  x-text=\"page\"></a>
              </template>
              <a @click=\"getNext()\" class=\"icon item\" :class=\"{ disabled: currentPage === maxPage }\">
                <i class=\"right chevron icon\"></i>
              </a>
            </div>
          </th>
        </tr>
      </tfoot>
</table>

</main>
";
    }

    // line 83
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 84
        echo "<script defer>

    const ITEMS_PER_PAGE = 12 // DEFAULT 12
    const API_LIST_PAGINATED = '/modules/tr-trip-bookings/api/admin/list_paginated.php'
  
    document.addEventListener('alpine:init', () => {
  
      Alpine.data('main', () => ({
        rows: [],
        selected: null,
        init() {
          this.listPaginated(this.currentPage)
        },
        convertDate(mysqlTimestamp) {
          // Assuming your MySQL timestamp is in the format 'YYYY-MM-DD HH:MM:SS'
          const date = new Date(mysqlTimestamp);
          const options = { day: 'numeric', month: 'short', year: '2-digit' };
          const formattedDate = date.toLocaleDateString('en-GB', options);
          return formattedDate;
        },
        /* FILTER SUPPORT */
        filterInput: {
            name: ''
        },
        /* PAGINATION SUPPORT */
        currentPage: 1,
        maxPage: null,
        performSearch() {
            \$.toast({ message: 'Performig filter search..' });
            this.resetCurrentPage()
            this.listPaginated(this.currentPage)
        },
        setMaxPage(count) {
            count = parseInt(count)
            this.maxPage = Math.ceil(count / ITEMS_PER_PAGE)
        },
        async listPaginated(page) {
  
            \$.toast({ message: 'Fetching list..' });
  
            let r = await axios.get(API_LIST_PAGINATED, {
                params: {
                    page: page,
                    filters: JSON.stringify(this.filterInput)
                }
            })
  
            if (r.data.message == 'success') {
              this.rows = r.data.rows
              \$.toast({ class: 'success', message: `\${r.data.rows.length} row(s) found` });
              this.setMaxPage(r.data.count)
            }
        },
        getNext() {
            if (this.currentPage < this.maxPage) {
                this.currentPage++
                this.listPaginated(this.currentPage)
            }
        },
        getPrevious() {
            if (this.currentPage > 1) {
                this.currentPage--
                this.listPaginated(this.currentPage)
            }
        },
        resetCurrentPage() {
            this.currentPage = 1
        },
        pagesToShow() {
          let pages = [];
          let startPage = Math.max(this.currentPage - 2, 1);
          let endPage = Math.min(this.currentPage + 2, this.maxPage);
  
          if (startPage > 1) {
            pages.push(1);
            if (startPage > 2) {
              pages.push('...');
            }
          }
  
          for (let i = startPage; i <= endPage; i++) {
            pages.push(i);
          }
  
          if (endPage < this.maxPage) {
            if (endPage < this.maxPage - 1) {
              pages.push('...');
            }
            pages.push(this.maxPage);
          }
  
          return pages;
        }
      }))
    })
  </script>
";
    }

    public function getTemplateName()
    {
        return "tr-trip-bookings/views/admin/trips-data/index.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  136 => 84,  132 => 83,  51 => 4,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "tr-trip-bookings/views/admin/trips-data/index.html", "/mnt/BLOCKSTORAGE/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/modules/tr-trip-bookings/views/admin/trips-data/index.html");
    }
}
