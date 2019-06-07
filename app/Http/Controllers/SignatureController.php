<?php namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Class SignatureController
 * @package App\Http\Controllers
 */
class SignatureController extends Controller
{
    /**
     * Display the GuestBook homepage.
     *
     * @return Factory|View
     */
    public function index()
    {
        return view('signatures.index');
    }

    /**
     * Display the GuestBook form page.
     *
     * @return Factory|View
     */
    public function create()
    {
        return view('signatures.sign');
    }
}
