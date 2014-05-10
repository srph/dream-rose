<?php

class MallController extends BaseController {

	/**
	 *
	 * @var Item
	 */
	protected $item;

	/**
	 *
	 * @var ItemCategory
	 */
	protected $category;

	/**
	 *
	 * @var Order
	 */
	protected $order;

	/**
	 *
	 * @param 	Item 	$item
	 * @param 	ItemCategory 	$category
	 * @return 	void
	 */
	public function __construct(Item $item, ItemCategory $category, Order $order)
	{
		$this->item = $item;
		$this->category = $category;
		$this->order = $order;

		// Filters
		$this->beforeFilter('csrf', array('on' => array('put, post')));
		$this->beforeFilter('auth');
	}

	public function getIndex()
	{
		$categories = $this->category->all();
		$categories->load('items');

		return View::make('pages/item/mall.index')
			->with('categories', $categories);
	}

	/**
	 *
	 *
	 * @param 	integer 	$id
	 * @param 	string 		$payment
	 */
	public function getTransaction($id, $payment)
	{
		$item = $this->item->find($id);

		$status = ( $item->transactionPossible($payment) )
			? true
			: false;

		return View::make('pages/item/mall.transaction')
			->with('payment', $payment)
			->with('item', $item)
			->with('status', $status);
	}

	/**
	 *
	 *
	 * @param 	integer 	$id
	 * @param 	string 		$payment
	 */
	public function postTransaction($id, $payment)
	{
		$item = $this->item->find($id);
		$user = Auth::user();

		try {
			if ( $item->transactionPossible($payment) ) {
				if ( $item->transact($payment, $user) ) {

					$order 			= $this->order;
					$order->item_id = $item->id;

					if( $user->orders()->save($order) ) {
						return Redirect::to('panel/mall')
							->with('item-transaction-success', $item->name);
					}
					
				}
			}
		} catch(Dream\Exceptions\PointsInsufficientException $e) {
			$error = 'You have insufficient points.';
		} catch(Dream\Exceptions\PaymentGatewayInvalidException $e) {
			$error = 'Payment gateway is invalid.';
		}

		$error = ( is_null($error) )
			? ''
			: $error;

		return Redirect::to('panel/mall')
			->with('item-transaction-error', $error);
	}

}