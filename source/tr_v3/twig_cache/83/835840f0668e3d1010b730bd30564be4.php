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

/* chatbot/views/main.html */
class __TwigTemplate_aefdeda4eca8e52dc595a00a0da01b83 extends Template
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
        $this->parent = $this->loadTemplate("_layout_fomantic.html", "chatbot/views/main.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_head($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "<script src=\"https://cdn.jsdelivr.net/npm/marked/marked.min.js\"></script>
<link rel=\"stylesheet\" href=\"/css/markdown/github-markdown-light.css\" />
<style>
  #textarea {
    background: #f4f4f4;
    border: 1px solid #f8f8f8;
  }
</style>
";
    }

    // line 14
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 15
        echo "<main x-data=\"main()\">
  <h1 class=\"ui center aligned huge header\">
    Hi! How can I help you?
  </h1>
  <div class=\"ui centered purple segment\" style=\"border: 2px solid #a333c8; border-radius: 5px;\">
    <!-- REPLIES -->

    <div class=\"ui comments\">
      <!-- COMMENT TEMPLATE -->
      <template x-for=\"i in messages\">
        <div class=\"comment\">
          <a class=\"avatar\">
            <img :src=\"i.from == 'user'?avatars.user:avatars.bot\" />
          </a>
          <div class=\"content\">
            <a class=\"author\" x-text=\"i.from == 'user'?'Me':'Gemini'\"></a>
            <div class=\"text markdown markdown-body\" x-text=\"i.message\"></div>
            <div class=\"actions\">
              <a class=\"reply\">Reply</a>
              <a class=\"save\">Save</a>
              <a class=\"hide\">Hide</a>
              <a>
                <i class=\"expand icon\"></i>
                Full-screen
              </a>
            </div>
          </div>
        </div>
      </template>

      <!-- LOADER -->
      <div x-show=\"isFetching\" class=\"comment\">
        <a class=\"avatar\">
          <div class=\"ui active purple inline loader\"></div>
        </a>
        <div class=\"content\">
          <a class=\"author\">Getting reply</a>
          <div class=\"text\">
            <div class=\"ui placeholder\">
              <div class=\"header\">
                <div class=\"line\"></div>
                <div class=\"line\"></div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

    <!-- FORM -->
    <div class=\"ui form\">
      <div class=\"field\">
        <div class=\"ui input\">
          <textarea autofocus id=\"textarea\" :disabled=\"isFetching?true:false\" name=\"reply\" rows=\"4\" x-model=\"input\"
            placeholder=\"Ask anything. Type your message here...\"></textarea>
        </div>
      </div>
      <div class=\"ui basic buttons\">
        <button class=\"ui icon button\">
          <i class=\"attach icon\"></i>
        </button>
        <button class=\"ui icon button\">
          <i class=\"image icon\"></i>
        </button>
        <button class=\"ui icon button\">
          <i class=\"microphone icon\"></i>
        </button>
      </div>
      <button @click=\"send()\" class=\"ui right floated large purple button\" type=\"submit\">
        <i class=\"send icon\"></i>
        Send
      </button>
    </div>
  </div>

  <div class=\"ui centered basic segment\">
    <div class=\"ui vertical spaced basic fluid buttons\">
      <button @click=\"debugSubmitGeminiPlain()\" class=\"ui button\">
        <i class=\"bug black icon\"></i>
        (Debug) Submit Gemini Plain
      </button>
      <button @click=\"debugPushSend()\" class=\"ui button\">
        <i class=\"bug black icon\"></i>
        (Debug) Publish a user response
      </button>
      <button @click=\"debugPushReply()\" class=\"ui button\">
        <i class=\"bug black icon\"></i>
        (Debug) Publish a bot response
      </button>
      <button class=\"ui button\">
        <i class=\"image red icon\"></i>
        Create an image
      </button>
      <button @click=\"top5TravelDestinations()\" class=\"ui button\">
        <i class=\"shuttle van blue icon\"></i>
        Top 5 travel destinations</button>
      <button class=\"ui button\">
        <i class=\"image yellow icon\"></i>
        Build a travel itinerary</button>
    </div>
  </div>
</main>
";
    }

    // line 120
    public function block_script($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 121
        echo "<script>
  function initValidation() {
    /* VALIDATION */
    \$('.ui.form').form({
      fields: {
        \"reply\": 'empty',
      }
    });
  }

</script>
<script>
  // Markdown support
  function parseMarkdown() {
    let collection = document.getElementsByClassName('markdown')
    let nodes = Array.from(collection)
    nodes.forEach(el => {
      el.innerHTML = marked.parse(el.innerHTML.replace(/&gt;+/g, '>'))
    })
  }
</script>
<script>
  const avatars = {
    bot: '/modules/chatbot/assets/icons/chat.png',
    user: '/modules/chatbot/assets/icons/jenny.jpg'
  }

  const API_GEMINI_SUBMIT_PLAIN = '/modules/chatbot/api/submit_plain.php'
</script>
<script defer>

  document.addEventListener('alpine:init', () => {

    Alpine.data('main', () => ({
      init() {
        this.\$nextTick(() => {
          initValidation();
        })
      },
      avatars,
      isFetching: false,
      input: '',
      messages: [
        {
          from: 'bot', // user
          message: 'This will be great for business reports. I will definitely download this.'
        }

      ],
      clearInput() {
        this.input = ''
      },
      debugPushReply() {
        this.messages.push({
          from: 'bot',
          message: 'This will be great for business reports. I will definitely download this.'
        })
      },
      debugPushSend() {
        this.messages.push({
          from: 'user',
          message: 'My sentence.'
        })
      },
      async debugSubmitGeminiPlain() {

        this.isFetching = true

        let fd = new FormData();
        fd.append('input_text', 'Hello Gemini');

        let r = await axios.post(API_GEMINI_SUBMIT_PLAIN, fd);

        this.isFetching = false
        this.pushBotReply(r.data.generated_text)
      },
      pushBotReply(message = 'Hello') {
        this.messages.push({
          from: 'bot',
          message: message
        })
      },
      // Auto clear input on success
      async send() {

        // Validate textarea
        this.\$nextTick(() => {
          if (\$('.ui.form').form('is valid', 'reply') == false) {
            \$.toast({
              class: 'purple',
              showIcon: false,
              position: 'bottom center',
              message: 'Oops. Did you mean to say something?'
            })
            return;
          }
        })

        // Continue
        this.messages.push({
          from: 'user',
          message: this.input
        })

        this.isFetching = true

        let fd = new FormData();
        fd.append('input_text', this.input);

        let r = await axios.post(API_GEMINI_SUBMIT_PLAIN, fd);

        this.isFetching = false
        this.clearInput();
        this.pushBotReply(r.data.generated_text)

        // Optionally parse entire conversation to markdown
        this.\$nextTick(() => {
          parseMarkdown();
        })
      },
      // Add more functions as necessary
      top5TravelDestinations() {
        this.input = 'What are the top 5 travel destinations? Give your answer in markdown with a short description of each destination.'
        this.send();
      }
    }))
  })
</script>
";
    }

    public function getTemplateName()
    {
        return "chatbot/views/main.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  179 => 121,  175 => 120,  68 => 15,  64 => 14,  52 => 4,  48 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "chatbot/views/main.html", "/mnt/BLOCKSTORAGE/home/359206.cloudwaysapps.com/srxrwayjxu/public_html/modules/chatbot/views/main.html");
    }
}
