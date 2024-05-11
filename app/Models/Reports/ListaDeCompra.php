<?php

namespace App\Models\Reports;

use App\Traits\IsReport;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListaDeCompra extends Model
{
    use HasFactory;
    use HasUuids;
    use IsReport;

    protected $table = 'reports_lista-de-compra';

    const SINGULAR_LABEL = 'Lista de compra';

    const PLURAL_LABEL = 'Listas de compras';

    protected $fillable = [
        'items',
    ];

    protected $casts = [
        'items' => 'array',
    ];
}
