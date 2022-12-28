<?php

namespace App\Http\Controllers;

use App\Enums\UserRoles;
use App\Models\ProductsAudit;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class ProductAuditController extends Controller
{
    /**
     * Find audit data in given period
     *
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $user = User::where('email', $request->input('email'))
                        ->where('role',UserRoles::ADMIN_ROLE)
                        ->first();

        // Check password matching
        if (!$user || !Hash::check($request->input('password'), $user->getAuthPassword())) {
            return $this->error(null,'Unauthorized',Response::HTTP_UNAUTHORIZED);
        }

        // Search data
       $data = ProductsAudit::whereBetween('created_at',[$request->input('date1'),$request->input('date2')])->get();
        if($data && count($data) > 0){
          return $this->success($data,'Data in this period');
       }

       return $this->error(null,'No data found');
    }
}
