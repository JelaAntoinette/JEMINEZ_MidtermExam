<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class RoleAuth implements FilterInterface
{
    /**
     * Do whatever processing this filter needs to do.
     * By default it should not return anything during
     * normal execution. However, when an abnormal state
     * is found, it should return an instance of
     * CodeIgniter\HTTP\Response. If it does, script
     * execution will end and that Response will be
     * sent back to the client, allowing for error pages,
     * redirects, etc.
     *
     * @param RequestInterface $request
     * @param array|null       $arguments
     *
     * @return RequestInterface|ResponseInterface|string|void
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = \Config\Services::session();
        
        // Check if user is logged in
        if (!$session->get('isLoggedIn')) {
            return redirect()->to(base_url('login'));
        }
        
        $userRole = $session->get('role');
        $uri = $request->getUri();
        $path = $uri->getPath();
        
        // Remove project folder from path if present (for XAMPP)
        $path = str_replace('/ITE311-JEMINEZ', '', $path);
        
        // Normalize path - ensure it starts with /
        if ($path === '' || $path === 'ITE311-JEMINEZ') {
            $path = '/';
        }
        
        // Admin can access any route starting with /admin
        if ($userRole === 'admin') {
            if (strpos($path, '/admin') === 0) {
                return; // Allow access
            }
        }
        
        // Teacher can access routes starting with /teacher
        if ($userRole === 'teacher') {
            if (strpos($path, '/teacher') === 0) {
                return; // Allow access
            }
        }
        
        // Student can access routes starting with /student and /announcements
        if ($userRole === 'student') {
            if (strpos($path, '/student') === 0 || $path === '/announcements') {
                return; // Allow access
            }
        }
        
        // If user tries to access a route not permitted for their role
        $session->setFlashdata('error', 'Access Denied: Insufficient Permissions. Role: ' . $userRole . ', Path: ' . $path);
        return redirect()->to(base_url('announcements'));
    }

    /**
     * Allows After filters to inspect and modify the response
     * object as needed. This method does not allow any way
     * to stop execution of other after filters, short of
     * throwing an Exception or Error.
     *
     * @param RequestInterface  $request
     * @param ResponseInterface $response
     * @param array|null        $arguments
     *
     * @return ResponseInterface|void
     */
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        //
    }
}
