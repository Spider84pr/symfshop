<?php

/* cart/cart.html.twig */
class __TwigTemplate_9fbaef398090c6ce259d4962e15670cf683673fb2f3fe45f4efc3452a1b5e4e8 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "cart/cart.html.twig", 1);
        $this->blocks = array(
            'body' => array($this, 'block_body'),
            'flash_messages' => array($this, 'block_flash_messages'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_body($context, array $blocks = array())
    {
        // line 3
        echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"/css/style.css\">
<div class=\"container\">
    <div class=\"row\">
        <div class=\"col-md-10 col-md-offset-1\">
";
        // line 7
        $this->displayBlock('flash_messages', $context, $blocks);
        // line 16
        echo "            <div class=\"panel panel-success\">
\t\t\t<h1>МегаСтолярка</h1>
\t\t\t<h2>Корзина</h2>
\t\t\t<a  href=\"/\">На главную</a>
            </div>
\t\t\t<table>
\t\t\t\t<tbody>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<th>Наименование</th>
\t\t\t\t\t\t<th>Цена</th>
\t\t\t\t\t</tr>
\t\t\t\t\t";
        // line 27
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["prod"]) ? $context["prod"] : null));
        foreach ($context['_seq'] as $context["key"] => $context["item"]) {
            // line 28
            echo "\t\t\t\t\t<tr>
\t\t\t\t\t\t<td>";
            // line 29
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "name", array()), "html", null, true);
            echo "</td>
\t\t\t\t\t\t<td>";
            // line 30
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "price", array()), "html", null, true);
            echo "</td>
\t\t\t\t\t\t<td>";
            // line 31
            echo             $this->env->getRuntime('Symfony\Bridge\Twig\Form\TwigRenderer')->renderBlock($this->getAttribute($context["item"], "form", array()), 'form_start');
            echo "
\t\t\t\t\t\t\t";
            // line 32
            echo $this->env->getRuntime('Symfony\Bridge\Twig\Form\TwigRenderer')->searchAndRenderBlock($this->getAttribute($context["item"], "form", array()), 'widget');
            echo "
\t\t\t\t\t\t\t";
            // line 33
            echo             $this->env->getRuntime('Symfony\Bridge\Twig\Form\TwigRenderer')->renderBlock($this->getAttribute($context["item"], "form", array()), 'form_end');
            echo "</td>
\t\t\t\t\t\t<td><a href=\"/removefromcart/";
            // line 34
            echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "id", array()), "html", null, true);
            echo "\" class=\"btn btn-info\">Удалить из корзины</a></td>
\t\t\t\t\t</tr>
\t\t\t\t\t ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 37
        echo "\t\t\t\t</tbody>
\t\t\t</table>
            ";
        // line 39
        if (($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()) == null)) {
            // line 40
            echo "              <a href=\"/login\" class=\"btn btn-info\"> Войти  >></a>
            ";
        }
        // line 42
        echo "            ";
        if (($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()) != null)) {
            // line 43
            echo "            ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user", array()), "username", array()), "html", null, true);
            echo "
              <p>В вашей корзине ";
            // line 44
            echo twig_escape_filter($this->env, (isset($context["cartamount"]) ? $context["cartamount"] : null), "html", null, true);
            echo " товаров на сумму ";
            echo twig_escape_filter($this->env, (isset($context["cartsum"]) ? $context["cartsum"] : null), "html", null, true);
            echo " рублей</p>
              <a href=\"/cleancart\" class=\"btn btn-info\">Очистить корзину</a>
              <a href=\"/logout\" class=\"btn btn-info\">Выйти из системы  >></a>
            ";
        }
        // line 48
        echo "        </div>
    </div>
</div>
";
    }

    // line 7
    public function block_flash_messages($context, array $blocks = array())
    {
        // line 8
        echo "    ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session", array()), "flashbag", array()), "all", array(), "method"));
        foreach ($context['_seq'] as $context["type"] => $context["messages"]) {
            // line 9
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["messages"]);
            foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
                // line 10
                echo "            <div class=\"alert alert-";
                echo twig_escape_filter($this->env, $context["type"], "html", null, true);
                echo " alert-dismissible\" role=\"alert\">
                ";
                // line 11
                echo $context["message"];
                echo "
            </div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 14
            echo "    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['type'], $context['messages'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "cart/cart.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  150 => 14,  141 => 11,  136 => 10,  131 => 9,  126 => 8,  123 => 7,  116 => 48,  107 => 44,  102 => 43,  99 => 42,  95 => 40,  93 => 39,  89 => 37,  80 => 34,  76 => 33,  72 => 32,  68 => 31,  64 => 30,  60 => 29,  57 => 28,  53 => 27,  40 => 16,  38 => 7,  32 => 3,  29 => 2,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "cart/cart.html.twig", "/home/i/ivcheng7/compoinfo.ru/public_html/nn/app/Resources/views/cart/cart.html.twig");
    }
}
