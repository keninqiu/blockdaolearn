<?php
namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    
    public function __construct()
    {
        //$this->middleware('auth:api', ['except' => ['login']]);
    }
    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $credentials = request(['email', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    public function all() 
    {
        $items = UserRepository::getAll();    
        return response()->json([
            'code' => 0,
            'data' => $items,
            'message' => 'Get users successfully'
        ]);
    }

    public function getById(Request $request) 
    {
        $id = $request->id;
        $item = UserRepository::getById($id);    
        return response()->json([
            'code' => 0,
            'data' => $item,
            'message' => 'Get user successfully'
        ]);   
    }

    public function update(Request $request) 
    {
        $id = $request->id;
        $code = $request->code;
        $name = $request->name;
        $email = $request->name;
        $item = UserRepository::update($id, $name, $code, $email);
        return response()->json([
            'code' => 0,
            'data' => $item,
            'message' => 'Update user successfully'
        ]);
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'code' => 0,
            'message' => 'login successfully',
            'data' => [
                'access_token' => $token,
                'token_type' => 'bearer',
                'expires_in' => auth()->factory()->getTTL() * 60
            ]
        ]);
    }
}