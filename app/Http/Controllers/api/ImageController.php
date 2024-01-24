<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ImageController extends Controller
{


    /**
     * @OA\Get(
     *     path="/api/image",
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


    public function image()
    {
        $image = Image::get();

        return response()->json($image, 200);
    }

     /**
     * @OA\Post(
     *     path="/api/add/image",
     *     tags={"User API"},
     *     summary="Register user",
     *  @OA\RequestBody(
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(property="image", type="string", example="upload/image/file/rHt7PfnEqNS8cpXBOkOn.png"),
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
    public function addImage(Request $request, $id)
    {
        $list=[];
        foreach ($request->file("images") as $file) {

                $file_name = Str::random(20);
                $ext = strtolower($file->getClientOriginalExtension()); // You can use also getClientOriginalName()
                $file_full_name = $file_name . '.' . $ext;
                $upload_path = 'upload/image/file/'; //Creating Sub directory in Public folder to put file
                $save_url_file = $upload_path . $file_full_name;
                $success = $file->move($upload_path, $file_full_name);
                image::insert([
                    "image" => $save_url_file
                ]);
        }

        return response()->json($list, 200);

        }
}
