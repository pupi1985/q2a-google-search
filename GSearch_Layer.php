<?php

class qa_html_theme_layer extends qa_html_theme_base
{
    function search()
    {
        $code = qa_opt('gsearch_plugin_code');

        if ($code === '') {
            parent::search();
        } else {
            echo '<div class="gsearch-box">' . $code . '</div>';
        }
    }

    function head_custom()
    {
        parent::head_custom();

        $css = qa_opt('gsearch_plugin_css');

        if ($css !== '') {
            echo '<style>' . $css . '</style>';
        }
    }
}
