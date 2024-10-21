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

/* discussion-board/views/admin/manage_discussions.html */
class __TwigTemplate_08e2d6f7d7d7401a35f009b78e98c9ce extends Template
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
        $this->parent = $this->loadTemplate("_layout_admin_fomantic.html", "discussion-board/views/admin/manage_discussions.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<main x-data=\"main\">
  <div class=\"ui container\">
    <h1>Discussion Board</h1>
    <p>This page application is based on CRUD Paginated.</p>

    <div class=\"ui message\">
    <div class=\"header\">
        Discussion Posts
    </div>
        <p>All posts related to the discussion will also be removed.</p>
    </div>

    <!-- TOOLBAR -->
    <div class=\"ui secondary menu\">
      <div class=\"item\">
        <div class=\"ui toggle checkbox\">
          <input @click=\"deleteMode = !deleteMode\" type=\"checkbox\">
          <label>Toggle delete mode</label>
        </div>
      </div>

      <div class=\"item\">
        <a @click=\"list()\" class=\"ui small button\">
          <i class=\"refresh icon\"></i> Refresh
        </a>
      </div>
    </div>

    <!-- FORM ADD -->
    <div class=\"ui blue segment\">
      <div class=\"ui large header\">Add New Discussion</div>
      <form class=\"ui form\">
        <div class=\"field\">
          <label>Category</label>
          <input x-model=\"input.category\" type=\"text\" name=\"category\" placeholder=\"Category Name\">
        </div>
        <div class=\"field\">
          <label>Subject</label>
          <input x-model=\"input.subject\" type=\"text\" name=\"subject\" placeholder=\"Subject\">
        </div>
        <div class=\"field\">
          <label>Message</label>
          <textarea x-model=\"input.message\" name=\"message\" placeholder=\"Your message...\"></textarea>
        </div>
        <button @click=\"submitAdd()\" type=\"button\" class=\"ui button\">Submit</button>
      </form>
    </div>

    <!-- FORM EDIT -->
    <template x-if=\"selected\">
      <div class=\"ui blue segment\">
        <div class=\"ui large header\">Edit Discussion</div>
        <form class=\"ui form\">
          <div class=\"field\">
            <label>Category</label>
            <input x-model=\"selected.category\" type=\"text\" name=\"category\" placeholder=\"Category Name\">
          </div>
          <div class=\"field\">
            <label>Subject</label>
            <input x-model=\"selected.subject\" type=\"text\" name=\"subject\" placeholder=\"Subject\">
          </div>
          <div class=\"field\">
            <label>Message</label>
            <textarea x-model=\"selected.message\" name=\"message\" placeholder=\"Your message...\"></textarea>
          </div>
          <button @click=\"submitEdit()\" type=\"button\" class=\"ui button\">Update</button>
        </form>
      </div>
    </template>

    <!-- TABLE -->
    <table class=\"ui celled table\">
      <thead>
        <tr>
          <th>Category</th>
          <th>Subject</th>
          <th>Message</th>
          <th>Action(s)</th>
        </tr>
      </thead>
      <tbody>
        <template x-for=\"i in rows\" :key=\"i.id\">
          <tr>
            <td data-label=\"Category\" x-text=\"i.category\"></td>
            <td data-label=\"Subject\" x-text=\"i.subject\"></td>
            <td data-label=\"Message\" x-text=\"i.message\"></td>
            <td data-label=\"Actions\">
              <a @click=\"selected = {...i}\" class=\"ui small button\">
                <i class=\"edit icon\"></i> Edit
              </a>
              <a x-show=\"deleteMode\" @click=\"submitDelete(i.id)\" class=\"ui small button\">
                <i class=\"delete icon\"></i> Delete
              </a>
            </td>
          </tr>
        </template>
      </tbody>
    </table>
  </div>
</main>
";
    }

    // line 106
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 107
        echo "<script defer>
  const API_LIST = '/modules/discussion-board/api/admin/discussions.php';
  const API_CREATE = '/modules/discussion-board/api/admin/discussions.php';
  const API_UPDATE = '/modules/discussion-board/api/admin/discussions.php';
  const API_DELETE = '/modules/discussion-board/api/admin/discussions.php';

  document.addEventListener('alpine:init', () => {
    Alpine.data('main', () => ({
      rows: [],
      deleteMode: false,
      input: {
        category: '',
        subject: '',
        message: ''
      },
      selected: null,
      init() {
        this.list();
      },
      async list() {
        \$.toast({ message: 'Fetching list...' });
        let r = await axios.get(API_LIST);
        if (r.data.message === 'success') {
          this.rows = r.data.rows;
          \$.toast({ class: 'success', message: `\${r.data.rows.length} row(s) found` });
        }
      },
      clearInput() {
        this.input.category = '';
        this.input.subject = '';
        this.input.message = '';
      },
      async submitAdd() {
        let fd = new FormData();
        fd.append('category', this.input.category);
        fd.append('subject', this.input.subject);
        fd.append('message', this.input.message);
        let r = await axios.post(API_CREATE, fd);
        if (r.data.error) {
          \$.toast({ class: 'error', message: r.data.message });
          return;
        }
        if (r.data.message === 'success') {
          \$.toast({ class: 'success', message: 'New discussion added successfully' });
          this.rows.push({
            id: r.data.lastId,
            category: this.input.category,
            subject: this.input.subject,
            message: this.input.message
          });
          this.clearInput();
        }
      },
      async submitEdit() {
        let jsonData = {
          id: this.selected.id,
          category: this.selected.category,
          subject: this.selected.subject,
          message: this.selected.message
        };
        let r = await axios.put(API_UPDATE, jsonData);
        if (r.data.error) {
          \$.toast({ class: 'error', message: r.data.message });
          return;
        }
        if (r.data.message === 'success') {
          \$.toast({ class: 'success', message: 'Discussion updated successfully' });
          this.rows.splice(this.rows.findIndex((i) => i.id === this.selected.id), 1, this.selected);
          this.selected = null;
        }
      },
      async submitDelete(id) {
        let r = await axios.delete(API_DELETE, { params: { id: id } });
        if (r.data.message === 'success') {
          this.rows.splice(this.rows.findIndex((i) => i.id === id), 1);
          \$.toast({ class: 'success', message: 'Discussion removed!' });
        }
      }
    }));
  });
</script>
";
    }

    public function getTemplateName()
    {
        return "discussion-board/views/admin/manage_discussions.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  159 => 107,  155 => 106,  51 => 4,  47 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "discussion-board/views/admin/manage_discussions.html", "/mnt/BLOCKSTORAGE/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/modules/discussion-board/views/admin/manage_discussions.html");
    }
}
