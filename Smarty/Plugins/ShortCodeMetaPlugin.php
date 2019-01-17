<?php


namespace ShortCodeMeta\Smarty\Plugins;


use ShortCodeMeta\ShortCodeMeta;
use TheliaSmarty\Template\AbstractSmartyPlugin;
use TheliaSmarty\Template\SmartyPluginDescriptor;

class ShortCodeMetaPlugin extends AbstractSmartyPlugin
{
    public function getPluginDescriptors()
    {
        return [
            new SmartyPluginDescriptor('function', 'set_empty_page_meta', $this, 'setEmptyPageMeta'),
            new SmartyPluginDescriptor('function', 'set_prev_page_meta_link', $this, 'setPrevPageMetaLink'),
            new SmartyPluginDescriptor('function', 'set_next_page_meta_link', $this, 'setNextPageMetaLink')
        ];
    }

    /**
     * @param array $params
     * @param \Smarty_Internal_Template $smarty
     */
    public function setPrevPageMetaLink($params, $smarty)
    {
        if (isset($params['url'])) {
            ShortCodeMeta::$PREV_PAGE_URL = $params['url'];
        }
    }

    /**
     * @param array $params
     * @param \Smarty_Internal_Template $smarty
     */
    public function setNextPageMetaLink($params, $smarty)
    {
        if (isset($params['url'])) {
            ShortCodeMeta::$NEXT_PAGE_URL = $params['url'];
        }
    }

    public function setEmptyPageMeta()
    {
        ShortCodeMeta::$IS_EMPTY_PAGE = true;
    }
}