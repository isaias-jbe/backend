<?php

namespace App\Http\Controllers;

use App\API\ApiMessage;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * @var User
     */
    private $user;

    /**
     * UserController constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json($this->user->paginate(5), 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = $this->user->find($id);

        if (!$user) {
            return response()->json(
                ApiMessage::messageNotFound('Usuário'), 404
            );
        }

        return response()->json(['data' => $user], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

            $this->user->create($request->all());

            return response()->json(
                ApiMessage::messageInser('Usuário'), 200
            );

        } catch (\Exception $exception) {

            if (config('app.debug')) {
                return response()->json(
                    ApiMessage::messageErrorDbug($exception->getMessage()), 500
                );
            }

            return response()->json(
                ApiMessage::messageErrorServer(), 400
            );
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {

            $user = $this->user->find($id);
            $user->update($user);

            return response()->json(
                ApiMessage::messageUpdate('Usuário'), 200
            );

        }catch (\Exception $exception) {

            if (config('app.debug')) {
                return response()->json(
                    ApiMessage::messageErrorDebug($exception->getMessage()), 500
                );
            }

            return response()->json(
                ApiMessage::messageErrorServer(), 400
            );
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(User $id)
    {
        try {

            $id->delete();

            return response()->json(
                ApiMessage::messageDelete('Usuário'), 200
            );

        }catch (\Exception $exception) {

            if (config('app.debug')) {
                return response()->json(
                    ApiMessage::messageErrorDebug($exception->getMessage()), 500
                );
            }

            return response()->json(
                ApiMessage::messageErrorServer(), 400
            );
        }
    }
}
