<?php namespace Dream\Pagination\Item;

class OrderPresenter extends \Illuminate\Pagination\Presenter {

	/**
	 * Get HTML wrapper for a page link.
	 *
	 * @param  string  $url
	 * @param  int  $page
	 * @return string
	 */
	public function getPageLinkWrapper($url, $page)
	{
		$t 		= \Input::get('t');
		$query	= \Input::get('query');
		return "<li><a href=\"{$url}?t={$t}&query={$query}\">{$page}</a></li>";
	}

	/**
	 * Get HTML wrapper for disabled text.
	 *
	 * @param  string  $text
	 * @return string
	 */
	public function getDisabledTextWrapper($text)
	{
		return '<li class="disabled"><span>'.$text.'</span></li>';
	}

	/**
	 * Get HTML wrapper for active text.
	 *
	 * @param  string  $text
	 * @return string
	 */
	public function getActivePageWrapper($text)
	{
		return '<li class="active"><span>'.$text.'</span></li>';
	}

}
