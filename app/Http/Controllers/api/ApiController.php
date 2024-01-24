<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ApiController extends Controller
{


    /**
     * @OA\Get(
     *     path="/api/dev",
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

     public function dev()
     {

       $data = Student::get();

       return response()->json($data, 200);
     }


     /**
     * @OA\Post(
     *     path="/api/add/student",
     *     tags={"User API"},
     *     summary="Register user",
     *  @OA\RequestBody(
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(property="fullname", type="string", example="Sarvarbek"),
     *              @OA\Property(property="avatar", type="string", example="upload/avatar/file/kFSwDf0msLoCMWpyPAL4.jpg"),
     *              @OA\Property(property="age", type="integer", example="13"),
     *              @OA\Property(property="address", type="string", example="Andijon"),
     *              @OA\Property(property="group_id", type="integer", example="1"),
     *              @OA\Property(property="course_id", type="integer", example="2"),
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

     public function addStudent(Request $request)
     {
        $list = [];
        foreach ($request->ids as $id) {
            $list[] = $id;
        }
        return response()->json($list, 200);
     }

       /**
     * @OA\Post(
     *     path="/api/update/student/{id}",
     *     tags={"User API"},
     *     summary="Register user",
     *  @OA\RequestBody(
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(property="fullname", type="string", example="Sarvarbek 2"),
     *              @OA\Property(property="avatar", type="string", example="upload/avatar/file/kFSwDf0msLoCMWpyPAL4.jpg"),
     *              @OA\Property(property="age", type="integer", example="13"),
     *              @OA\Property(property="address", type="string", example="Andijon"),
     *              @OA\Property(property="group_id", type="integer", example="1"),
     *              @OA\Property(property="course_id", type="integer", example="2"),
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
     public function updateStudent(Request $request, $id)
     {
        $list = [];
        foreach ($request->ids as $id) {
            $list[] = $id;
        }
        return response()->json($list, 200);

        if($request->fullname == null){
           return $this->sendResponse(null, false, "nom yozilsin !");
        }

        // $student = Student::find($id);

        // $avatar = $student->avatar;

        // $file = $request->file("avatar");

        // if($file){

        //     $file_name = Str::random(20);
        // $ext = strtolower($file->getClientOriginalExtension()); // You can use also getClientOriginalName()
        // $file_full_name = $file_name . '.' . $ext;
        // $upload_path = 'upload/avatar/file/';    //Creating Sub directory in Public folder to put file
        // $save_url_file = $upload_path . $file_full_name;
        // $success = $file->move($upload_path, $file_full_name);
        // if($avatar != null){
        //     unlink($avatar);
        // }
        // $avatar = $save_url_file;

        // }

        // $student->update([
        //     "fullname" => $request->fullname,
        //     "age" => $request->age,
        //     "address" => $request->address,
        //     "group_id" => $request->group_id,
        //     "course_id" => $request->course_id,
        //     "avatar" => $avatar
        // ]);

        // return response()->json(null, 200);
     }

       /**
     * @OA\Delete(
     *     path="/api/delete/student/{id}",
     *     tags={"User API"},
     *     summary="Register user",
     *  @OA\RequestBody(
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(property="fullname", type="string", example="Sarvarbek"),
     *              @OA\Property(property="avatar", type="string", example="upload/avatar/file/kFSwDf0msLoCMWpyPAL4.jpg"),
     *              @OA\Property(property="age", type="integer", example="13"),
     *              @OA\Property(property="address", type="string", example="Andijon"),
     *              @OA\Property(property="group_id", type="integer", example="1"),
     *              @OA\Property(property="course_id", type="integer", example="2"),
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
     public function deleteStudent($id)
     {
        $student = Student::find($id);
        $student->delete();

        return response()->json(null, 200);
     }
}
