<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // GET: admin/product
    function index()
    {
        return view('admin.product.index');
    }

}
