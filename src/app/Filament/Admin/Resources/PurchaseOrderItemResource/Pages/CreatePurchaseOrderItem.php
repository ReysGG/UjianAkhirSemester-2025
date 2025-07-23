<?php

namespace App\Filament\Admin\Resources\PurchaseOrderItemResource\Pages;

use App\Filament\Admin\Resources\PurchaseOrderItemResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePurchaseOrderItem extends CreateRecord
{
    protected static string $resource = PurchaseOrderItemResource::class;
}
