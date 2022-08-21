<!-- resources/views/books.blade.php -->
@extends('layouts.app')
 @section('content')

     <!-- Bootstrapの定形コード… -->
     <div class="card-body">
         <div class="card-title">
             寄付商品の編集
         </div>

         <!-- バリデーションエラーの表示に使用ここから-->
         <!-- resources/views/common/errors.blade.php -->
         @if (count($errors) > 0)
             <!-- Form Error List -->
             <div class="alert alert-danger">
                 <div><strong>入力した文字を修正してください。</strong></div> 
                 <div>
                     <ul>
                     @foreach ($errors->all() as $error)
                         <li>{{ $error }}</li>
                     @endforeach
                     </ul>
                 </div>
             </div>
         @endif
         <!-- バリデーションエラーの表示に使用ここまで-->

         <!-- 登録フォーム -->
         <form action="{{ url('items/'.$item->id) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
         @method('PATCH')
            
             <!-- JANコード/ITFコード -->
             <div class="form-group">
                 <label for="JAN">JANコード/ITFコード</label>
                 <div class="col-sm-6">
                     <input type="text" name="JANcode" class="form-control" value="{{$item->JANcode}}">
                 </div>
             </div>

             <!-- 商品名 -->
             <div class="form-group">
                 <label for="ItemName">商品名</label>
                 <div class="col-sm-6">
                     <input type="text" name="ItemName" class="form-control" value="{{$item->ItemName}}">
                 </div>
             </div>

            <!-- 商品画像 -->
            <div class="form-group">
                 <label for="ItemImage">商品画像</label>
                 <div class="col-sm-6">
                     <input id="fileUploader" type="file" name="ItemImage" accept='image/' enctype="multipart/form-data" class="form-control" required autofocus>
                 </div>
             </div>

            <!-- 商品重量 -->
            <div class="form-group">
                 <label for="ItemWeight">商品重量</label>
                 <div class="col-sm-6">
                     <input type="text" name="ItemWeight" class="form-control" value="{{$item->ItemWeight}}">
                 </div>
             </div>

             <!-- 商品寸法 -->
            <div class="form-group">
                 <label for="ItemSize">商品寸法</label>
                 <div class="col-sm-6">
                     <input type="text" name="ItemSize" class="form-control" value="{{$item->ItemSize}}">
                 </div>
             </div>
             
             <!-- 箱寸法（外寸） -->
            <div class="form-group">
                 <label for="BoxSize">箱寸法（外寸）</label>
                 <div class="col-sm-6">
                     <input type="text" name="BoxSize" class="form-control" value="{{$item->BoxSize}}">
                 </div>
             </div>
             
             <!-- 商品重量 -->
            <div class="form-group">
                 <label for="TempRange">温度帯（常温／冷蔵／冷凍）</label>
                 <div class="col-sm-6">
                     <input type="text" name="TempRange" class="form-control" value="{{$item->TempRange}}">
                 </div>
             </div>
             
             <!-- 入数 -->
            <div class="form-group">
                 <label for="NumofItems">入数</label>
                 <div class="col-sm-6">
                     <input type="text" name="NumofItems" class="form-control" value="{{$item->NumofItems}}">
                 </div>
             </div>
             
             <!-- 小売希望価格 -->
            <div class="form-group">
                 <label for="RetailPrice">小売希望価格</label>
                 <div class="col-sm-6">
                     <input type="text" name="RetailPrice" class="form-control" value="{{$item->RetailPrice}}">
                 </div>
             </div>
             
             <!-- 在庫数量 -->
            <div class="form-group">
                 <label for="Inventory">在庫数量</label>
                 <div class="col-sm-6">
                     <input type="text" name="Inventory" class="form-control" value="{{$item->Inventory}}">
                 </div>
             </div>
             
             <!-- 賞味期限 -->
            <div class="form-group">
                 <label for="BestBefore">賞味期限</label>
                 <div class="col-sm-6">
                     <input type="date" name="BestBefore" class="form-control" value="{{$item->BestBefore}}">
                 </div>
             </div>
             
              <!-- 在庫地 -->
            <div class="form-group">
                 <label for="StorageLocation">在庫地</label>
                 <div class="col-sm-6">
                     <input type="text" name="StorageLocation" class="form-control" value="{{$item->StorageLocation}}">
                 </div>
             </div>
             
              <!-- 在庫期限 -->
            <div class="form-group">
                 <label for="InventoryDeadline">在庫期限</label>
                 <div class="col-sm-6">
                     <input type="date" name="InventoryDeadline" class="form-control" value="{{$item->InventoryDeadline}}">
                 </div>
             </div>
             
              <!-- 納期（出荷依頼してX日） -->
            <div class="form-group">
                 <label for="DeliveryDate">納期（出荷依頼してX日）</label>
                 <div class="col-sm-6">
                     <input type="text" name="DeliveryDate" class="form-control" value="{{$item->DeliveryDate}}">
                 </div>
             </div>
             
              <!-- 荷姿（パレット/バラ積み） -->
            <div class="form-group">
                 <label for="Packing">荷姿（パレット/バラ積み）dddddddd</label>
                 <div class="col-sm-6">
                     <input type="text" name="Packing" class="form-control" value="{{$item->Packing}}">
                 </div>
             </div>

            <!-- Save ボタン/Back ボタン -->
            <div class="well well-sm">
                <button type="submit" class="btn btn-primary">Save</button>
                <a class="btn btn-link pull-right" href="{{ url('/') }}"> Back</a>
            </div>
            <!--/ Save ボタン/Back ボタン -->
            <!-- id 値を送信 -->
            <input type="hidden" name="id" value="{{$item->id}}" /> <!--/ id 値を送信 -->
            <!-- CSRF -->
            {{ csrf_field() }}
            <!--/ CSRF -->

         </form>

     </div>

  

