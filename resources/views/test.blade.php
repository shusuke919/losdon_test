<!-- resources/views/books.blade.php -->
@extends('layouts.app')
 @section('content')

 <!-- Laravelではセキュリティの観点からPOST通信する際に、CSRFトークンを付与してリクエストを送信する必要がある -->
 <meta name="csrf-token" content="{{ csrf_token() }}">
 <!-- mixメソッドを用いることで、resourcesフォルダとpublicフォルダの２つのcss/app.cssをよしなにまとめて読み込んでいる -->
 <link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css">

 <div id="app"></div>

      
   

 <!-- app.jsを読み込んでいる -->
 <script src="{{ mix('js/app.js') }}"></script>
 
 @endsection