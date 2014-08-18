<?php

/* players.html */
class __TwigTemplate_70f252b500a91e899e690a95a83315de0308f74bd0c1893f2736a6b915479f25 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("base.twig");

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "
  ";
        // line 5
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["users"]) ? $context["users"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
            // line 6
            echo "  <div class=\"row\">             
      <div class=\"small-4 large-2 columns\">
        <img src=\"http://s3.amazonaws.com/37assets/svn/765-default-avatar.png\" width=\"60\"/>
      </div>
      <div class=\"small-4 large-6 columns\">
        <h2>";
            // line 11
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "name"));
            echo "</h2>          
      </div>
      <div class=\"small-4 large-2 columns\">
        <h3>";
            // line 14
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "score"), "html", null, true);
            echo "</h3>
      </div>
  </div>
  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['user'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 18
        echo "
";
    }

    public function getTemplateName()
    {
        return "players.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  61 => 18,  51 => 14,  45 => 11,  38 => 6,  34 => 5,  31 => 4,  28 => 3,);
    }
}
