<?php

namespace App\Http\Controllers\Api;

use App\API\ApiMessage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\repositories\Contracts\UserRepositoryInterface;

class UserController extends Controller
{
    /**
     * @var User
     */
    private $repository;

    /**
     * UserController constructor.
     * @param User $repository
     */
    public function __construct(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json($this->repository->paginate(5), 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $repository = $this->repository->findById($id);

        if (! $repository) {
            return response()->json(
                ApiMessage::messageNotFound('Usuário'), 404
            );
        }

        return response()->json(['data' => $repository], 200);
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

            $request['password'] = bcrypt($request->input('password'));
            $this->repository->store($request->all());

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

            $repository = $this->repository->findById($id);

            if (!$repository) {
                return response()->json(
                    ApiMessage::messageNotFound('Usuário'), 404
                );
            }

            $repository->update($request->all());

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
    public function destroy($id)
    {
        try {

            $repository = $this->repository->findById($id);

            if (!$repository) {
                return response()->json(
                    ApiMessage::messageNotFound('Usuário'), 404
                );
            }

            $repository->destroy();

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
