<?php 

use App\Models\CategoryModel;

/**
 * Get all categories and image of categories
 *
 * @author Thanh Tuan <thanhtuancr2011@gmail.com>
 * 
 * @return Array Categories
 */
function getCategories()
{
	// Get categories
    $categories = CategoryModel::where('sort_order', '!=', 0)
    						   ->select('id', 'name')
    						   ->orderBy('sort_order', 'asc')
    						   ->get();

    return $categories;
}