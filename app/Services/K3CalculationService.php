<?php
namespace App\Services;

class K3CalculationService
{
    /**
     * Penilaian generik. `ratio`: aktual dibanding standar minimum.
     * `boolean`: aktual 1 dianggap tersedia/terpenuhi.
     * `frequency`: aktual dibanding frekuensi minimum.
     * Konfigurasi standar harus diverifikasi oleh personel K3 berwenang.
     */
    public function evaluate(float $actual, float $standard, string $method = 'ratio'): array
    {
        if ($method === 'boolean') {
            $percentage = $actual >= 1 ? 100.0 : 0.0;
            $gap = $actual >= 1 ? 0.0 : 1.0;
        } else {
            $percentage = $standard > 0 ? min(1000, ($actual / $standard) * 100) : 0.0;
            $gap = max(0, $standard - $actual);
        }

        $status = $actual <= 0
            ? 'Tidak Memenuhi Standar'
            : ($percentage < 100 ? 'Kurang dari Standar' : 'Memenuhi Standar');

        return [
            'percentage' => round($percentage, 2),
            'gap' => round($gap, 2),
            'status' => $status,
        ];
    }

    public function personnelRequirement(int $workers, int $peoplePerGroup = 25, int $staffPerGroup = 2): int
    {
        if ($workers <= 0) return 0;
        return (int) ceil($workers / $peoplePerGroup) * $staffPerGroup;
    }
}
