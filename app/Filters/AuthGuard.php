<?php 
namespace App\Filters;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthGuard implements FilterInterface
{   
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        if (!session()->get('isLoggedIn')){
            return redirect()->to('/signin');
        }
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        
    }
}