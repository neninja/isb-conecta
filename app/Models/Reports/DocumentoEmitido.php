<?php

namespace App\Models\Reports;

use App\Traits\IsReport;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentoEmitido extends Model
{
    use HasFactory;
    use HasUuids;
    use IsReport;

    protected $table = 'reports_documento-emitido';

    const SINGULAR_LABEL = 'Documento emitido';

    const PLURAL_LABEL = 'Documentos emitidos';

    protected $fillable = [
        'subject',
        'description',
    ];
}
