
$GLOBALS['TL_DCA']['tl_module']['fields']['news_order'] = array
(
    'exclude'                 => true,
    'inputType'               => 'select',
    'options_callback'        => array('tl_module_news_manual_sort', 'getSortingOptions'),
    'reference'               => &$GLOBALS['TL_LANG']['tl_module'],
    'eval'                    => array('tl_class'=>'w50'),
    'sql'                     => "varchar(32) NOT NULL default 'order_date_desc'"
);


class tl_module_news_manual_sort extends Contao\Backend {
    /**
     * Return the sorting options
     *
     * @param Contao\DataContainer $dc
     *
     * @return array
     */
    public function getSortingOptions(Contao\DataContainer $dc)
    {
	if ($dc->activeRecord && $dc->activeRecord->type == 'newsmenu')
	{
	    return array('order_date_asc', 'order_date_desc');
	}

	return array('order_date_asc', 'order_date_desc', 'order_headline_asc', 'order_headline_desc', 'order_random', 'order_manual_asc', 'order_manual_desc');
    }

}
