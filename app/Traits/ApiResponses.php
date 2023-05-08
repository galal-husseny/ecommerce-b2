<?php
namespace App\Traits;

trait ApiResponses {
    /**
     * success
     *
     * @param  string $message
     * @param  int $statusCode
     * @return void
     */
    public function success(string $message='', int $statusCode=200){
        return response()->json([
            'success'=> true,
            'message' => $message,
            'data' => (object) [],
            'errors' => (object) []
        ], $statusCode);
    }

    /**
     * error
     *
     * @param  array $errors
     * @param  string $message
     * @param  int $statusCode
     * @return void
     */
    public function error(array $errors, string $message='', int $statusCode=422){
        return response()->json([
            'success'=> false,
            'message' => $message,
            'data' => (object) [],
            'errors' => $errors
        ], $statusCode);
    }

    /**
     * data
     *
     * @param  array $data
     * @param  string $message
     * @param  int $statusCode
     * @return void
     */
    public function data(array $data, string $message='', int $statusCode=200){
        return response()->json([
            'success'=> true,
            'message' => $message,
            'data' => $data,
            'errors' => (object) []
        ], $statusCode);
    }
}
