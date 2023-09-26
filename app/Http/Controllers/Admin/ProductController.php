<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    private $LIMIT = 10;
    private $brands;

    function __construct()
    {
        $this->brands = DB::table('brands')->get();
    }

    // GET: admin/product
    function index()
    {
        // Bước 1: Lấy ra sản phẩm từ database
        $products = DB::table('products')
            ->join('brands', 'products.brand_id', '=', 'brands.id')
            ->select('products.*', 'brands.brand_name')->paginate($this->LIMIT);
        return view('admin.product.index', ['products' => $products, 'brands' => $this->brands]);
    }

    function search(Request $request)
    {
        $keyword = $request->input('keyword');
        if (empty($keyword)) {
            $products = DB::table('products')
                ->join('brands', 'products.brand_id', '=', 'brands.id')
                ->select('products.*', 'brands.brand_name')->paginate($this->LIMIT);
        } else {
            $products = DB::table('products')
                ->join('brands', 'products.brand_id', '=', 'brands.id')
                ->select('products.*', 'brands.brand_name')
                ->where('products.name', 'like', "%$keyword%")
                ->orWhere('products.code', 'like', "%$keyword%")
                ->paginate($this->LIMIT);
        }
        return view('admin.product.index', ['products' => $products, 'keyword' => $keyword, 'brands' => $this->brands]);

    }

    // GET: admin/product/id
    function showProductById($id)
    {

    }

    // POST: admin/product
    function createProduct(Request $request)
    {
        // Bước 1: Lấy dữ liệu từ request
        $productCode = $request->input('productCode');
        $productName = $request->input('productName');
        $productPrice = $request->input('productPrice');

        $productImage = $request->input('productImage');
        $productDescription = $request->input('productDescription');
        $productQuantity = $request->input('productQuantity');

        $productBrandId = $request->input('productBrandId');

        // Bước 2: Thêm vào cơ sở dữ liệu
        $result = DB::table('products')->insert([
            'code' => $productCode,
            'name' => $productName,
            'price' => $productPrice,
            'image' => $productImage,
            'description' => $productDescription,
            'quantity' => $productQuantity,
            'brand_id' => $productBrandId
        ]);
        if ($result) {
            // Thong bao them thanh cong
            flash()->addSuccess('Thêm thành công!');
            return redirect()->route('admin-product');
        } else {
            // Thong bao them that bai
            flash()->addError('Thêm thất bại!');
            return redirect()->route('admin-product');
        }

    }

    // POST: admin/product/delete/id
    function deleteProductById(Request $request)
    {
        $id = $request->input('productId');

        // Thực hiện xoá
        $result = DB::table('products')->where('id', '=', $id)->delete();
        // Thông báo
        if ($result) {
            // Thong bao them thanh cong
            flash()->addSuccess('Xoá thành công!');
            return redirect()->route('admin-product');
        } else {
            // Thong bao them that bai
            flash()->addError('Xoá thất bại!');
            return redirect()->route('admin-product');
        }
    }

    // POST: admin/product/update/id
    function updateProductById($id)
    {

    }

}
