<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;

class IPController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __invoke(Request $request)
    {
        dump(Request::host());
        $response = [
            'ip' => Request::ip(),
            'hostname' => gethostbyaddr(Request::ip())
            ];

        return response($response);
    }
}
