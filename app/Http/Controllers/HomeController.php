<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;


class HomeController extends Controller
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

    private function getData($url)
    {
        try {
            $client = new Client;
            $response = $client->get($url)->getBody()->getContents();
            
            return json_decode($response, true);
        } catch (Exception $e) {
            return $e;
        }
    }

    public function index()
    {
        $page_title = 'Home';
        $url = 'https://private-4639ce-ecommerce56.apiary-mock.com/home';
        $data = $this->getData($url);
        $products = collect($data[0]['data']['productPromo']);
        $categories = collect($data[0]['data']['category']);
        session(['products' => $products]);
        return view('home.index', compact('page_title', 'products', 'categories'));
    }

    public function detail($id)
    {
        try {
            $product = session('products')->where('id', $id)->first();
            $page_title = $product ? $product['title'] : 'Product not found';

            return view('home.detail', compact('page_title', 'product'));
        } catch (Exception $e) {
            return $e;
        }
    }
    
}
