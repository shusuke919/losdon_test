<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Validator;
use Auth;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Storage;  //画像ファイル削除機能のため追加
use Image; // intervention/imageライブラリの読み込み。予めintervention/imageを読み込む必要あり $ composer require intervention/image
use Carbon\Carbon;  //日付を扱うCarbonライブラリ

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::all();
        return view('items', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $storeData = $request->validate([
            'JANcode' => 'required|max:255',
            'ItemName' => 'required|max:255',
            'ItemImage' => 'required|file|image|max:204800', //追加
            'ItemImage_path' => 'nullable',
            'ItemWeight' => 'required|max:255',
            'ItemSize' => 'required|max:255',
            'BoxSize' => 'required|max:255',
            'TempRange' => 'required|max:255',
            'NumofItems' => 'required|max:255',
            'RetailPrice' => 'required|max:255',
            'Inventory' => 'required|integer',
            'BestBefore' => 'required|date',
            'StorageLocation' => 'required|max:255',
            'InventoryDeadline' => 'required|date',
            'DeliveryDate' => 'required|max:255',
            'Packing' => 'required|max:255',
        ]);

        // dd($storeData);

        // 画像ファイル取得
        $file = $request->ItemImage;

        if ( !empty($file) ){
            //リサイズ
            $img = Image::make($file);
            $img->orientate();         // スマホアップ画像に対応
            $img->resize(
                2048,  //LINEアルバムの設定に合わせて横2048pixlに設定
                null,
                function ($constraint) {
                    // 縦横比を保持したままにする
                    $constraint->aspectRatio();
                    // 小さい画像は大きくしない
                    $constraint->upsize();
                }
            );
            $ext = $file->guessExtension(); // ファイルの拡張子取得
            $fileName = Str::random(32).'.'.$ext; //ファイル名を生成
            $pathFileName = "app/public/ItemImage/" . $fileName; //保存先のパス名
            $save_path = storage_path($pathFileName); //保存先
            $img->save($save_path); //保存

        }

        $ItemImage_path =["ItemImage_path" => $fileName];
        $storeData_img = $storeData + $ItemImage_path;

        // dd($storeData2);

        $items = Item::create($storeData_img);


        return redirect('/items');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        return view('itemsedit',compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        $updateData = $request->validate([
            'JANcode' => 'required|max:255',
            'ItemName' => 'required|max:255',
            'ItemImage' => 'required|file|image|max:204800', //追加
            'ItemImage_path' => 'nullable',
            'ItemWeight' => 'required|max:255',
            'ItemSize' => 'required|max:255',
            'BoxSize' => 'required|max:255',
            'TempRange' => 'required|max:255',
            'NumofItems' => 'required|max:255',
            'RetailPrice' => 'required|max:255',
            'Inventory' => 'required|integer',
            'BestBefore' => 'required|date',
            'StorageLocation' => 'required|max:255',
            'InventoryDeadline' => 'required|date',
            'DeliveryDate' => 'required|max:255',
            'Packing' => 'required|max:255',
        ]);

        $file = $request->ItemImage;

        if ( !empty($file) ){
            //リサイズ
            $img = Image::make($file);
            $img->orientate();         // スマホアップ画像に対応
            $img->resize(
                2048,  //LINEアルバムの設定に合わせて横2048pixlに設定
                null,
                function ($constraint) {
                    // 縦横比を保持したままにする
                    $constraint->aspectRatio();
                    // 小さい画像は大きくしない
                    $constraint->upsize();
                }
            );
            $ext = $file->guessExtension(); // ファイルの拡張子取得
            $fileName = Str::random(32).'.'.$ext; //ファイル名を生成
            $pathFileName = "app/public/ItemImage/" . $fileName; //保存先のパス名
            $save_path = storage_path($pathFileName); //保存先
            $img->save($save_path); //保存

        }

        $ItemImage_path =["ItemImage_path" => $fileName];
        $updateData_img = $updateData + $ItemImage_path;



        $item->update($updateData_img);
        return redirect('/items');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        $ItemImage_path = $item->ItemImage_path;
        // ファイルが登録されていれば削除
        if ($ItemImage_path !== '') {
            Storage::disk('public')->delete('ItemImage/' . $ItemImage_path);
            }
        $item->delete();
        return redirect('/items');
    }
}
