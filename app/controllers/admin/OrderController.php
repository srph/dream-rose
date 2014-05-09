<?php

class OrderController extends BaseController {

	/**
	 *
	 * @var Order
	 */
	protected $order;

	/**
	 *
	 *
	 * @param 	Order 	$order
	 */
	public function __construct(Order $order)
	{
		$this->order = $order;
		$this->beforeFilter('gm');
		$this->beforeFilter('csrf', array('on' => array('put', 'post', 'delete')));
	}

	/**
	 * Show a listing of the resource
	 *
	 * @return 	Response
	 */
	public function getIndex()
	{
		$orders = $this->orders
			->processed()
			->orderBy('id', 'desc')
			->paginate(10);

		return View::make('pages/orders.index')
			->With('orders', $orders);
	}

	/**
	 * Transact the order
	 *
	 * @param 	integer 	$id
	 * @return 	Response
	 */
	public function postTransact($id)
	{
		// Fetch the order
		$order = $this->order->findOrFail($id);

		try {
			// Set the order as processed
			$order->delete();
		} catch(ModelNotFoundException $e) {
			// If the model was not found, simply redirect
			return Redirect::to('/');
		}

		// Return with a success session
		return Redirect::back()
			->with('order-transaction-success', '');
	}

}