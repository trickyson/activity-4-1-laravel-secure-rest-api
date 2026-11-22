<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
class UserController extends Controller {
 public function index(): JsonResponse {
  return response()->json(['message'=>'Users retrieved successfully.','data'=>User::query()->select('id','name','email','created_at')->orderBy('id')->get()]);
 }
 public function store(StoreUserRequest $request): JsonResponse {
  $user=User::create($request->validated());
  return response()->json(['message'=>'User created successfully.','data'=>$user->only(['id','name','email','created_at'])],201);
 }
}