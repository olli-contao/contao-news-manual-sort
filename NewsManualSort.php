<?php 


namespace NewsManualSort;

use Contao;
use Contao\Model\Collection;
use Patchwork\Utf8;

class ModuleNewsList 
{
    function fetchItems($newsArchives, $blnFeatured, $limit, $offset, $moduleThis)
    {

	// Determine sorting
	$t = Contao\NewsModel::getTable();
	$order = '';

	if ($moduleThis->news_featured == 'featured_first')
	{
	    $order .= "$t.featured DESC, ";
	}

	switch ($moduleThis->news_order)
	{
	    case 'order_headline_asc':
		$order .= "$t.headline";
		break;

	    case 'order_headline_desc':
		$order .= "$t.headline DESC";
		break;

	    case 'order_random':
		$order .= "RAND()";
		break;

	    case 'order_date_asc':
		$order .= "$t.date";
		break;

	    case 'order_manual_asc': 
		$order .= "$t.sorting";
		break;

	    case 'order_manual_desc': 
		$order .= "$t.sorting DESC";
		break;

	    default:
		$order .= "$t.date";
	}

	return Contao\NewsModel::findPublishedByPids($newsArchives, $blnFeatured, $limit, $offset, array('order'=>$order));
    }

}