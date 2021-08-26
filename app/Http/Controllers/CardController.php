<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cards = Card::get();

        return view('cards', ['cards' => $cards]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $response = Http::get('https://api.magicthegathering.io/v1/cards', [
            // 'name' => '"' . $request->name . '"'
            'name' => $request->name
        ]);
        // the response body always includes the cards array, empty or not
        // including it here makes it possible to filter it out moving forward
        // $data = $response->json()['cards'];
        $data = $response->object()->cards;

        // if empty, there was an empty search result
        // if not empty, there will be at least one nested array returned 
        // we could just simply stop here and pass this array into the view,
        // however, the array sometimes is missing values like an image, for instance
        // so it may be best to handle that here, in the controller, and then pass
        // a complete array into the view instead

        $cards = array();
        $cardInfo = [
            'name' => '',
            'manaCost' => '',
            'cmc' => 0.0,
            'colors' => [],
            'type' => '',
            'types' => [],
            'subtypes' => [],
            'rarity' => '',
            'set' => '',
            'setName' => '',
            'text' => '',
            'flavor' => '',
            'artist' => '',
            'number' => '',
            'power' => '',
            'toughness' => '',
            'layout' => '',
            'multiverseid' => '',
            'imageUrl' => '',
            'printings' => []
        ];

        foreach ($data as $card) {
            $cardInfo['name'] = $card->name;
            $cardInfo['cmc'] = $card->cmc;
            $cardInfo['type'] = $card->type;
            $cardInfo['types'] = $card->types;
            $cardInfo['rarity'] = $card->rarity;
            $cardInfo['set'] = $card->set;
            $cardInfo['setName'] = $card->setName;
            $cardInfo['number'] = $card->number;
            $cardInfo['layout'] = $card->layout;
            $cardInfo['printings'] = $card->printings;

            // These attributes do not always exist in our response
            if (!isset($card->text)) {
                $cardInfo['text'] = '';
            } else {
                $cardInfo['text'] = $card->text;
            }


            if (!isset($card->artist)) {
                $cardInfo['artist'] = '';
            } else {
                $cardInfo['artist'] = $card->artist;
            }

            if (!isset($card->power)) {
                $cardInfo['power'] = '';
            } else {
                $cardInfo['power'] = $card->power;
            }

            if (!isset($card->toughness)) {
                $cardInfo['toughness'] = '';
            } else {
                $cardInfo['toughness'] = $card->toughness;
            }

            if (!isset($card->manaCost)) {
                $cardInfo['manaCost'] = '';
            } else {
                $cardInfo['manaCost'] = $card->manaCost;
            }

            if (!isset($card->subtypes)) {
                $cardInfo['subtypes'] = '';
            } else {
                $cardInfo['subtypes'] = $card->subtypes;
            }

            if (!isset($card->colors)) {
                $cardInfo['colors'] = '';
            } else {
                $cardInfo['colors'] = $card->colors;
            }

            if (!isset($card->flavor)) {
                $cardInfo['flavor'] = '';
            } else {
                $cardInfo['flavor'] = $card->flavor;
            }

            if (!isset($card->imageUrl)) {
                $cardInfo['imageUrl'] = '';
            } else {
                $cardInfo['imageUrl'] = $card->imageUrl;
            }

            if (!isset($card->multiverseid)) {
                $cardInfo['multiverseid'] = '';
            } else {
                $cardInfo['multiverseid'] = $card->multiverseid;
            }

            array_push($cards, $cardInfo);
        }

        return view('lookup_result', ['cards' => $cards]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $card = new Card([
            'name' => $request->name,
            'mana_cost' => $request->mana_cost,
            'mana_cost_converted' => $request->mana_cost_converted,
            'type' => $request->type,
            'types' => $request->types,
            'subtypes' => $request->subtypes,
            'rarity' => $request->rarity,
            'set' => $request->set,
            'set_name' => $request->set_name,
            'text' => $request->text,
            'artist' => $request->artist,
            'number' => $request->number,
            'power' => $request->power,
            'toughness' => $request->toughness,
            'layout' => $request->layout,
            'colors' => $request->colors,
            'flavor' => $request->flavor,
            'multiverseid' => $request->multiverseid,
            'gatherer_image_url' => $request->imageUrl,
            
        ]);
        // dd($card);
        $card->save();

        return redirect('/cards')->with('success', 'Card added to library!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    // public function show(Card $card)
    public function show(Request $request, $id)
    {
        $card = Card::find($id);

        return view('details', ['card' => $card]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function edit(Card $card)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Card $card)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Card  $card
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Card $id)
    {
        // $card = Card::find($request->id);
        // $card->delete();

        // or

        Card::destroy($request->id);

        return redirect('/cards')->with('success', 'Card removed from library!');

    }
}
