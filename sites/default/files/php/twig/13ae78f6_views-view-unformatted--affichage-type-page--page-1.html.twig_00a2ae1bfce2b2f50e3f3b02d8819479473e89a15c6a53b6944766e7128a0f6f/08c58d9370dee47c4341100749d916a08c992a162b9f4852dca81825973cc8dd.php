<?php

/* themes/contrib/bootstrap/templates/views/views-view-unformatted--affichage-type-page--page-1.html.twig */
class __TwigTemplate_6e4a4d2c11fb4d6aaa8c4bc25eea2587948c4b05bb3561a537902c2ce32cfc97 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $tags = array("if" => 20, "for" => 23, "set" => 25);
        $filters = array();
        $functions = array();

        try {
            $this->env->getExtension('sandbox')->checkSecurity(
                array('if', 'for', 'set'),
                array(),
                array()
            );
        } catch (Twig_Sandbox_SecurityError $e) {
            $e->setTemplateFile($this->getTemplateName());

            if ($e instanceof Twig_Sandbox_SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof Twig_Sandbox_SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof Twig_Sandbox_SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

        // line 20
        if ((isset($context["title"]) ? $context["title"] : null)) {
            // line 21
            echo "  <h3>";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["title"]) ? $context["title"] : null), "html", null, true));
            echo "</h3>
";
        }
        // line 23
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["rows"]) ? $context["rows"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
            // line 24
            echo "  ";
            // line 25
            $context["row_classes"] = array(0 => ((            // line 26
(isset($context["default_row_class"]) ? $context["default_row_class"] : null)) ? ("col-xs-12\tcol-sm-6\tcol-md-4\tcol-lg-3") : ("")));
            // line 29
            echo "  <div";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($this->getAttribute($context["row"], "attributes", array()), "addClass", array(0 => (isset($context["row_classes"]) ? $context["row_classes"] : null)), "method"), "html", null, true));
            echo ">
    ";
            // line 30
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["row"], "content", array()), "html", null, true));
            echo "
  </div>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['row'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "themes/contrib/bootstrap/templates/views/views-view-unformatted--affichage-type-page--page-1.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  65 => 30,  60 => 29,  58 => 26,  57 => 25,  55 => 24,  51 => 23,  45 => 21,  43 => 20,);
    }
}
/* {#*/
/* /***/
/*  * @file*/
/*  * Default theme implementation to display a view of unformatted rows.*/
/*  **/
/*  * Available variables:*/
/*  * - title: The title of this group of rows. May be empty.*/
/*  * - rows: A list of the view's row items.*/
/*  *   - attributes: The row's HTML attributes.*/
/*  *   - content: The row's content.*/
/*  * - view: The view object.*/
/*  * - default_row_class: A flag indicating whether default classes should be*/
/*  *   used on rows.*/
/*  **/
/*  * @see template_preprocess_views_view_unformatted()*/
/*  **/
/*  * @ingroup themeable*/
/*  *//* */
/* #}*/
/* {% if title %}*/
/*   <h3>{{ title }}</h3>*/
/* {% endif %}*/
/* {% for row in rows %}*/
/*   {%*/
/*     set row_classes = [*/
/*       default_row_class ? 'col-xs-12	col-sm-6	col-md-4	col-lg-3',*/
/*     ]*/
/*   %}*/
/*   <div{{ row.attributes.addClass(row_classes) }}>*/
/*     {{ row.content }}*/
/*   </div>*/
/* {% endfor %}*/
/* */
