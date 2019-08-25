<?php

namespace App\Http\Controllers\Api;

use App\API\ApiMessage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\repositories\Contracts\EventRepositoryInterface;

class EventController extends Controller
{
    /**
     * @var Event
     */
    private $repository;

    /**
     * EventController constructor.
     * @param Event $repository
     */
    public function __construct(EventRepositoryInterface $repository)
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
                ApiMessage::messageNotFound('Evento'), 404
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

            $this->repository->store($request->all());

            return response()->json(
                ApiMessage::messageInser('Evento'), 200
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {

            if (! $this->repository->update($id, $request->all())) {
                return response()->json(
                    ApiMessage::messageNotFound('Evento'), 404
                );
            }

            return response()->json(
                ApiMessage::messageUpdate('Evento'), 200
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

            if (! $this->repository->destroy($id)) {
                return response()->json(
                    ApiMessage::messageNotFound('Evento'), 404
                );
            }

            return response()->json(
                ApiMessage::messageDelete('Evento'), 200
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
