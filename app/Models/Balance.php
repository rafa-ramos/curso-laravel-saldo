<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\Array_;
use Illuminate\Support\Facades\DB;

class Balance extends Model
{
    // private $table = 'balance';
    public $timestamps = false;

    public function deposit(float $value) : Array {

        // valida se o balance && historic foram inseridos com sucesso ok, caso contrário é revertido no BD
        DB::beginTransaction();
        $totalBefore = $this->amount ? $this->amount : 0;
        $this->amount += number_format($value, 2, '.', '');

        $deposit = $this->save();

        $histotic = auth()->user()->historics()->create([
            'type'          => 'I',
            'amount'        => $value,
            'total_before'  => $totalBefore,
            'total_after'   => $this->amount,
            'date'          => date('Ymd'),
        ]);

        if ($deposit && $histotic) {

            DB::commit();

            $success = true;
            $msg = 'Sucesso ao recarregar';
        } else {
            // não está funcionando
            DB::rollBack();

            $success = false;
            $msg = "Não foi possível recarregar";
        }

        return [
                'success' => $success,
                'message' => $msg
        ];
    }
}
