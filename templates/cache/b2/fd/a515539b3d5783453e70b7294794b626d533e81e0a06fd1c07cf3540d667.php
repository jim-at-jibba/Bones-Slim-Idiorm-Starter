<?php

/* todo.html */
class __TwigTemplate_b2fda515539b3d5783453e70b7294794b626d533e81e0a06fd1c07cf3540d667 extends Twig_Template
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
        echo "<div class=\"row\">
    <h1>Tasks</h1>
</div>
";
        // line 7
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["results"]) ? $context["results"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["result"]) {
            // line 8
            echo "<div class=\"row\">

    <div class=\"small-4 large-2 columns\">
        <h3><a href=\"/todo/";
            // line 11
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["result"]) ? $context["result"] : null), "id"), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["result"]) ? $context["result"] : null), "title"), "html", null, true);
            echo "</a></h3>
    </div>
    <div class=\"small-4 large-2 columns\">
        <h3>";
            // line 14
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["result"]) ? $context["result"] : null), "body"), "html", null, true);
            echo "</h3>
    </div>
    <div class=\"small-4 large-2 columns\">
        <h3>";
            // line 17
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["result"]) ? $context["result"] : null), "first_name"), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["result"]) ? $context["result"] : null), "last_name"), "html", null, true);
            echo "</h3>
    </div>
</div>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['result'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 21
        echo "
";
    }

    public function getTemplateName()
    {
        return "todo.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  71 => 21,  59 => 17,  53 => 14,  45 => 11,  40 => 8,  36 => 7,  31 => 4,  28 => 3,);
    }
}
