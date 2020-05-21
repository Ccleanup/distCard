<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Card;

class HomeController extends Controller
{
    public function index () {

        return view('home');
    }

    public function distributecard (Request $req) {

        // default validator
        // $validator = $req->validate([
        //     'noPlayer' => 'required|integer|min:1',
        // ]);

        $messages = [
            'noPlayer.required' => 'The number of players is compulsory',
            'noPlayer.integer' => 'The number of players must be an integer',
            'noPlayer.min' => 'The number of players must be at least :min',
        ];

        $validator = Validator::make($req->all(),
            [
                'noPlayer' => 'required|integer|min:1',
            ],
            $messages);

        if ($validator->fails()) {
            return redirect('/')
                        ->withErrors($validator)
                        ->withInput();
        }
        
        $noPlayer = $req->noPlayer;

        if ($noPlayer > 26)
            $noCard = 1;
        else
            $noCard = 52 / $noPlayer;

        $cards = Card::all();
        $shuffled = $cards->shuffle();
        $shuffled->all();

        $chunks = $shuffled;
        $chunks = $chunks->chunk($noCard);

        return view('result', [
        //return view('home', [
            'noPlayer' => $noPlayer,
            'noCard' => $noCard,
            'shuffled' => $shuffled,
            'chunks' => $chunks
        ]);
    }
}
