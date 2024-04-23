<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CookieController extends Controller
{
    public function createCookie(Request $request): Response{
        return response('Hello Cookie')
            ->cookie('user-id', 'falentino-djoka', 1000, '/')
            ->cookie('is-member', 'true', 1000, '/');
    }
    public function getCookie(Request $request): JsonResponse{
        $userId     =   $request->cookie('user-id', 'guest');
        $isMember   =   $request->cookie('is-member', 'false');

        #Manipulasi
        $userId =   strtoupper($userId);

        return response()->json([
            'user-id'   =>  $userId,
            'is-member' =>  $isMember
        ]);
    }
    public function clearCookie(Request $request): Response{
        return response('Clear Cookie')
            ->withoutCookie('user-id')
            ->withCookie('is-member');
    }
}
