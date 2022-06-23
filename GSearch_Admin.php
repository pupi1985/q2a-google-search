<?php

class GSearch_Admin
{
    function allow_template($template)
    {
        return $template !== 'admin';
    }

    function option_default($option)
    {
        switch ($option) {
            case 'gsearch_plugin_css':
                return '.gsearch-box {min-height:80px;}';
            case 'gsearch_plugin_code':
                return '';
            default:
        }

        return null;
    }

    function admin_form(&$qa_content)
    {
        $ok = null;
        if (qa_clicked('gsearch_save_button')) {
            qa_opt('gsearch_plugin_code', qa_post_text('gsearch_plugin_code'));
            qa_opt('gsearch_plugin_css', qa_post_text('gsearch_plugin_css'));

            $ok = qa_lang('admin/options_saved');
        } else if (qa_clicked('gsearch_reset_button')) {
            qa_opt('gsearch_plugin_code', $this->option_default('gsearch_plugin_code'));
            qa_opt('gsearch_plugin_css', $this->option_default('gsearch_plugin_css'));

            $ok = qa_lang('admin/options_reset');
        }

        return array(
            'ok' => $ok,

            'fields' => array(
                array(
                    'label' => 'Google Search Code (From https://programmablesearchengine.google.com)',
                    'tags' => 'name="gsearch_plugin_code"',
                    'value' => qa_opt('gsearch_plugin_code'),
                    'type' => 'textarea',
                    'rows' => 5,
                ),
                array(
                    'label' => 'Google Search Box CSS',
                    'tags' => 'name="gsearch_plugin_css"',
                    'value' => qa_opt('gsearch_plugin_css'),
                    'type' => 'textarea',
                    'rows' => 5,
                ),
            ),

            'buttons' => array(
                array(
                    'label' => qa_lang_html('main/save_button'),
                    'tags' => 'name="gsearch_save_button"',
                ),
                array(
                    'label' => qa_lang_html('admin/reset_options_button'),
                    'tags' => 'name="gsearch_reset_button"',
                ),
            ),
        );
    }
}
