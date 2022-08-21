<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $fillable = ['JANcode','ItemName','ItemImage_path','ItemWeight','ItemSize','BoxSize','TempRange','NumofItems','RetailPrice','Inventory','BestBefore','StorageLocation','InventoryDeadline','DeliveryDate','Packing']; //これを追加！
}
