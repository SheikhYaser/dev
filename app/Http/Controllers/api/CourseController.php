<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{


    /**
     * @OA\Get(
     *     path="/api/course",
     *     tags={"User API"},
     *     summary="Register user",
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
     *                      "username": "Abdullajon",
     *                      "password": "$2y$10$sZZUV7ykVyAXT7/eDzGyReThtdkaLUK9jknrDEDNaeK71uKeQkfiO",
     *                      "token": "ms7ST2opzINdvWCxLanr8zg21kOKFS",
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


    public function course()
    {
        $course = Course::get();

        return response()->json($course, 200);
    }

      /**
     * @OA\Post(
     *     path="/api/add/course",
     *     tags={"User API"},
     *     summary="Register user",
     *  @OA\RequestBody(
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(property="name", type="string", example="BackEnd"),
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
     *                      "username": "Abdullajon",
     *                      "password": "$2y$10$sZZUV7ykVyAXT7/eDzGyReThtdkaLUK9jknrDEDNaeK71uKeQkfiO",
     *                      "token": "ms7ST2opzINdvWCxLanr8zg21kOKFS",
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
    public function addCourse(Request $request)
    {
        $course = Course::create([
            "name" => $request->name,
        ]);

        return response()->json($course, 200);
    }

    /**
     * @OA\Post(
     *     path="/api/update/course/{id}",
     *     tags={"User API"},
     *     summary="Register user",
     *  @OA\RequestBody(
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(property="name", type="string", example="BackEnd"),
     *          ),
     *     ),
     * @OA\Parameter(
     *          name="id",
     *          in="path",
     *          description="Paste task id",
     *          required=true,
     *       ),
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
     *                      "username": "Abdullajon",
     *                      "password": "$2y$10$sZZUV7ykVyAXT7/eDzGyReThtdkaLUK9jknrDEDNaeK71uKeQkfiO",
     *                      "token": "ms7ST2opzINdvWCxLanr8zg21kOKFS",
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
    public function updateCourse(Request $request, $id)
    {
        $course = Course::find($id);

        $course->update([
            "name" => $request->name,
        ]);

        return response()->json(null, 200);
    }

    /**
     * @OA\Delete(
     *     path="/api/delete/course/{id}",
     *     tags={"User API"},
     *     summary="Register user",
     *  @OA\RequestBody(
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(property="name", type="string", example="BackEnd"),
     *          ),
     *     ),
     * @OA\Parameter(
     *          name="id",
     *          in="path",
     *          description="Paste task id",
     *          required=true,
     *       ),
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
     *                      "username": "Abdullajon",
     *                      "password": "$2y$10$sZZUV7ykVyAXT7/eDzGyReThtdkaLUK9jknrDEDNaeK71uKeQkfiO",
     *                      "token": "ms7ST2opzINdvWCxLanr8zg21kOKFS",
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
    public function deleteCourse($id)
    {
        $course = Course::find($id);

        $course->delete();

        return response()->json(null, 200);
    }
}
