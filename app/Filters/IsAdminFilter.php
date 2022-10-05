<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class IsAdminFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // If the user isn't an admin, redirect them to the login page.
        if (!auth->user()->inGroup('superadmin, admin')) 
        {
            return redirect()->to(site_url('login'));
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    { // Unused
    }
}