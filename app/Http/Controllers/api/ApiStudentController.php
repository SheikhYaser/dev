<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ApiStudentController extends Controller
{
     /**
     * @OA\Post(
     *     path="/api/register",
     *     tags={"User API"},
     *     summary="Register user",
     * @OA\RequestBody(
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(property="fullname", type="string", example="Sarvarbek"),
     *              @OA\Property(property="phone", type="string", example="1525152162"),
     *              @OA\Property(property="password", type="string", example="123456"),
     *          ),
     *     ),
     *     @OA\Response(
     *     response="200",
     *     description="Registration user and to login.",
     *     @OA\JsonContent(
     *              type="object",
     *              @OA\Property(
     *                  format="boolean",
     *                  default="true",
     *                  description="success",
     *                  property="success"
     *              ),
     *              @OA\Property(
     *                  format="object",
     *                  description="data",
     *                  property="data",
     *                  example={
     *                      "fullname": "Abdullajon",
     *                      "password": "$2y$10$sZZUV7ykVyAXT7/eDzGyReThtdkaLUK9jknrDEDNaeK71uKeQkfiO",
     *                      "token": "ms7ST2opzINdvWCxLanr8zg21kOKFS",
     *                      "phone": "166632623",
     *                      "updated_at": "2023-08-28T11:58:12.000000Z",
     *                      "created_at": "2023-08-28T11:58:12.000000Z",
     *                      "id": 1
     *                  }
     *              ),
     *              @OA\Property(
     *                  format="string",
     *                  default="Login!",
     *                  description="message",
     *                  property="message"
     *              ),
     *              @OA\Property(
     *                  format="integer",
     *                  default="0",
     *                  description="error_code",
     *                  property="error_code"
     *              ),
     *          ),
     *     ),
     * )
     */
    public function register(Request $request)
    {
        if (strlen($request->password) < 6) {
          return  $this->sendResponse(null, false, "Password lenth onder 6 !");
        }
        Student::create([
            "fullname" => $request->fullname,
            "phone" => $request->phone,
            "password" => Hash::make($request->password),
        ]);

     return  $this->sendResponse(null, true, "Added +");

    }

     /**
     * @OA\Post(
     *     path="/api/login",
     *     tags={"User API"},
     *     summary="Register user",
     * @OA\RequestBody(
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(property="phone", type="string", example="1525152162"),
     *              @OA\Property(property="password", type="string", example="123456"),
     *          ),
     *     ),
     *     @OA\Response(
     *     response="200",
     *     description="Registration user and to login.",
     *     @OA\JsonContent(
     *              type="object",
     *              @OA\Property(
     *                  format="boolean",
     *                  default="true",
     *                  description="success",
     *                  property="success"
     *              ),
     *              @OA\Property(
     *                  format="object",
     *                  description="data",
     *                  property="data",
     *                  example={
     *                      "fullname": "Abdullajon",
     *                      "password": "$2y$10$sZZUV7ykVyAXT7/eDzGyReThtdkaLUK9jknrDEDNaeK71uKeQkfiO",
     *                      "updated_at": "2023-08-28T11:58:12.000000Z",
     *                      "created_at": "2023-08-28T11:58:12.000000Z",
     *                      "id": 1
     *                  }
     *              ),
     *              @OA\Property(
     *                  format="string",
     *                  default="Login!",
     *                  description="message",
     *                  property="message"
     *              ),
     *              @OA\Property(
     *                  format="integer",
     *                  default="0",
     *                  description="error_code",
     *                  property="error_code"
     *              ),
     *          ),
     *     ),
     * )
     */

    public function login(Request $request)
    {
        if (strlen($request->password) < 6) {
          return  $this->sendResponse(null, false, "Password lenth onder 6 !");
        }

        $check_student = Student::where('phone', $request->phone)->first();
        if ($check_student == null) {
            return  $this->sendResponse(null, false, "Student not Fined");
          }

          if (!Hash::check($request->password, $check_student->password)) {
            return  $this->sendResponse(null, false, "Password Error !");
          }

          $token = Str::random(30);
          $check_student->update([
            "token" => $token
          ]);

        $check_student = Student::where('phone', $request->phone)->first();

     return  $this->sendResponse($check_student, true, "Welcome !");

    }

     /**
     * @OA\Get(
     *     path="/api/get",
     *     tags={"User API"},
     *     summary="Register user",
     * @OA\Parameter(
     *          name="Token",
     *          in="header",
     *          description="User token",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *     @OA\Response(
     *     response="200",
     *     description="Registration user and to login.",
     *     @OA\JsonContent(
     *              type="object",
     *              @OA\Property(
     *                  format="boolean",
     *                  default="true",
     *                  description="success",
     *                  property="success"
     *              ),
     *              @OA\Property(
     *                  format="object",
     *                  description="data",
     *                  property="data",
     *                  example={
    *                 "id": 9,
    *                 "fullname": "Sarvarbek",
    *                 "avatar": null,
    *                 "age": null,
    *                 "address": null,
    *                 "token": "F0B0Jj9a5ZOrd5kAu2Dsgr6xx6S1XK",
    *                 "password": "$2y$12$2ShDf.Ev8XavVZI7.PDcYOpkfj9DjfL3SQGrqVIdm.P9QIa0pZCPW",
    *                 "phone": "994630613",
    *                 "group_id": null,
    *                 "course_id": null,
    *                 "created_at": "2024-01-13T09:05:53.000000Z",
     *                  }
     *              ),
     *              @OA\Property(
     *                  format="string",
     *                  default="Login!",
     *                  description="message",
     *                  property="message"
     *              ),
     *              @OA\Property(
     *                  format="integer",
     *                  default="0",
     *                  description="error_code",
     *                  property="error_code"
     *              ),
     *          ),
     *     ),
     * )
     */

    public function getStudent(Request $request)
    {

        $check_student = $request->check_student;
        return  $this->sendResponse($check_student, "");


    }
}
