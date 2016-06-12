<?php 

namespace App\Http\Controllers\Api\Backend;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

use App\Http\Requests;
use App\Models\AboutModel;
use App\Http\Controllers\Controller;

class AboutController extends Controller 
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

	/**
	 * Create new category
	 * 
	 * @author Thanh Tuan <thanhtuancr2011@gmail.com>
	 * 
	 * @param  Request $request Request
	 * 
	 * @return Response
	 */
	public function store(Request $request)
	{
		$status = 0;

		$data = $request->all();

		$aboutModel = new AboutModel;

		$about = $aboutModel->createAbout($data);

		if ($about) {
			$status = 1;
		}

		return new JsonResponse(['status' => $status, 'about' => $about]);
	}

	/**
     * Create new image for category
     *
     * @author Thanh Tuan <thanhtuancr2011@gmail.com>
     * 
     * @param  Request $request Request
     * 
     * @return Int              Status true or false
     */
    public function createImageCategory($id, Request $request) 
    {
    }

	/**
	 * Edit category
	 *
	 * @author Thanh Tuan <thanhtuancr2011@gmail.com>
	 * 
	 * @param  Int                 $id      Category id
	 * @param  CategoryFormRequest $request Form request
	 * 
	 * @return Response                       
	 */
	public function update($id, CategoryFormRequest $request)
	{
	}

	/**
     * Remove the category from storage.
     *
     * @author Thanh Tuan <thanhtuancr2011@gmail.com>
     *
     * @param  int  $id
     * 
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
}
