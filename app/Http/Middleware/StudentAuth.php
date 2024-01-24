<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StudentAuth extends Controller
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $check_student = Student::where('token', $this->getToken())->first();

        if ($check_student == null) {
            return  $this->sendResponse(null, false, "Student not Fined");
          }
          $request->check_student = $check_student;

        return $next($request);
    }
}
