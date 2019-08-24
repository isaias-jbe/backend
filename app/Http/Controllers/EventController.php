<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\API\ApiMessage;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * @var Event
     */
    private $event;

    /**
     * EventController constructor.
     * @param Event $event
     */
    public function __construct(Event $event)
    {
        $this->event = $event;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json($this->event->paginate(5), 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = $this->event->find($id);

        if (!$event) {
            return response()->json(
                ApiMessage::messageNotFound('Event'), 404
            );
        }

        return response()->json(['data' => $event], 200);
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

            $this->event->create($request->all());

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

            $event = $this->event->find($id);
            $event->update($request->all());

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
    public function delete(Event $id)
    {
        try {

            $id->delete();

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
