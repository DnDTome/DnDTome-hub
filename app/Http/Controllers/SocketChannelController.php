<?php

namespace App\Http\Controllers;

use App\Events\NewSocketConnRequested;
use App\SocketChannel;
use Illuminate\Http\Request;

class SocketChannelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Task $task
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request) {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request) {
        $socketChannel = SocketChannel::create([
            'auth_key' => Str::random(8),
            'channel_name' => Str::random(8),
            'active' => TRUE
        ]);
        event(new NewSocketConnRequested($socketChannel));

        $response = [
            'status' => 'success',
            'data' => [
                'socketChannel' => $socketChannel,
            ]
        ];

        return response()->json($response);
    }


    /**
     * Update the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id) {
        $input = $request->all();
        $channel = SocketChannel::findOrFail($id);
        $channel->update($input);
        return response()->json([
            'status' => 'success',
            'data' => [
                'socketChannel' => $channel->find($channel->id)
            ]
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id) {
        $channel = SocketChannel::findOrFail($id);
        $channel->active = FALSE;
        $channel->save();
        return response()->json([
            'status' => 'success'
        ]);
    }
}
