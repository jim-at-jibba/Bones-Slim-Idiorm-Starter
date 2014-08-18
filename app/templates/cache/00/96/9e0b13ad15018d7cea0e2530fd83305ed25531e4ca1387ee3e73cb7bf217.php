<?php

/* base.twig */
class __TwigTemplate_00969e0b13ad15018d7cea0e2530fd83305ed25531e4ca1387ee3e73cb7bf217 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "
<!DOCTYPE html>
<!--[if IE 8]> \t\t\t\t <html class=\"no-js lt-ie9\" lang=\"en\" > <![endif]-->
<!--[if gt IE 8]><!--> <html class=\"no-js\" lang=\"en\" > <!--<![endif]-->

<head>
\t<meta charset=\"utf-8\" />
  <meta name=\"viewport\" content=\"width=device-width\" />
  <title>Foundation 5</title>

  <link rel=\"stylesheet\" href=\"//cdnjs.cloudflare.com/ajax/libs/normalize/3.0.1/normalize.min.css\" />
  
  <link rel=\"stylesheet\" href=\"//cdnjs.cloudflare.com/ajax/libs/foundation/5.2.2/css/foundation.min.css\"/>

  
  <!--CDN for dev only. Use custom build for production - http://modernizr.com/download/-->
  <script src=\"//cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.min.js\"></script>

</head>
<body>
   <!-- Nav Bar --> 
  <div class=\"row\">
    <div class=\"large-12 columns\">
      <div class=\"nav-bar right\">
       <ul class=\"button-group\">
         <li><a href=\"/todo\" class=\"button\">Todo</a></li>
         <li><a href=\"/\" class=\"button\">Users</a></li>
        </ul>
      </div>
    </div>
  </div>
  <!-- End Nav -->
  
  ";
        // line 34
        $this->displayBlock('content', $context, $blocks);
        // line 35
        echo "
   <script src=\"//code.jquery.com/jquery-1.11.0.min.js\"></script>
   <script src=\"//cdnjs.cloudflare.com/ajax/libs/foundation/5.3.0/css/foundation.min.css\"></script>

\t
  
  <script>
    \$(document).foundation();
  </script>
</body>
</html>
";
    }

    // line 34
    public function block_content($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "base.twig";
    }

    public function getDebugInfo()
    {
        return array (  72 => 34,  57 => 35,  55 => 34,  20 => 1,);
    }
}
