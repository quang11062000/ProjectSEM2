<?php
class Category_Controller extends Base_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	// show all posts
	public function index()
	{ }

	// show category
	public function show_product()
	{
		$id = getParameter('id');
		$pageno = getParameter('pageno');

		if (getParameter('pageno')) {
			$pageno = getParameter('pageno');
		} else {
			$pageno = 1;
		}

		$no_of_records_per_page = 12;
		$offset = ($pageno - 1) * $no_of_records_per_page;

		$category = $this->model->category->find_by_id($id);
		$total_pages = $this->model->product->count($no_of_records_per_page);
		$products = $this->model->product->pagination($category['id'], $offset, $no_of_records_per_page);
		// var_dump($products);
		$this->view->load("category/show_product", [
			'category' => $category,
			'products' => $products,
			'total_pages' => $total_pages,
			'pageno' => $pageno
		]);
	}
}
