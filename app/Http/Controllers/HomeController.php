<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Session;

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

    public function index(Request $request)
    {
        $client = new Client;
        $url = 'https://private-4639ce-ecommerce56.apiary-mock.com/home';
        $response = $client->get($url)->getBody()->getContents();

        if ($request->ajax()) {
            $search = Client::where('title', 'like', '%' . $request->search . '%')->orderBy
                ('id', 'desc')->paginate(4);
            $view = (String) view('home.index')->with('search',
            $search)->render();
        } 

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
        $page_title = 'Detail Product';
        try {
            $product = session('products')->where('id', $id)->first();
            return view('home.detail', compact('page_title', 'product'));
        } catch (Exception $e) {
            return $e;
        }
    }

    public function buy($id)
    {
        try {
            $product = session('products')->where('id', $id)->first();

            if ($product) {
                session()->push('history', $product);
            }
            
            Session::flash('notice', 'Successfully Purchased Product');
            return redirect()->route('product.history');
        } catch (Exception $e) {
            return $e;
        }
    }
    
    public function history()
    {
        $page_title = 'History';
        $history = [];

        if (session('history')) {
            $history = collect(session('history'));
        }

        return view('home.history', compact('page_title', 'history'));
    }

    public function search()
    {
        $client = new Client;
        $response = $client->get('https://private-4639ce-ecommerce56.apiary-mock.com/home')->getBody()->getContents();
        return json_decode($response, true);

        if ($product) {
            session()->push('item', $item);
        }
    }
}
