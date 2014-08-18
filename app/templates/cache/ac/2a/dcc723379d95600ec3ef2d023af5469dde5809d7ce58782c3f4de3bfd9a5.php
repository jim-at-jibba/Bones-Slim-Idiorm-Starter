<?php

/* single-todo.html */
class __TwigTemplate_ac2adcc723379d95600ec3ef2d023af5469dde5809d7ce58782c3f4de3bfd9a5 extends Twig_Template
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
    <h1>";
        // line 5
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["todo"]) ? $context["todo"] : null), "title"), "html", null, true);
        echo "</h1>
</div>
<div class=\"row\">
    <div class=\"small-4 large-2 columns\">
        <h3>";
        // line 9
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["todo"]) ? $context["todo"] : null), "body"), "html", null, true);
        echo "</h3>
    </div>
    <div class=\"small-4 large-2 columns\">
        <h3>";
        // line 12
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["todo"]) ? $context["todo"] : null), "completed"), "html", null, true);
        echo "</h3>
    </div>

</div>

";
    }

    public function getTemplateName()
    {
        return "single-todo.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  47 => 12,  41 => 9,  34 => 5,  31 => 4,  28 => 3,);
    }
}
