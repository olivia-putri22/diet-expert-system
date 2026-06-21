<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DietRecommendation;

class DietRecommendationController extends Controller
{
    public function index()
    {
        return view('diet.index');
    }

    public function process(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'weight' => 'required|numeric|min:30',
            'height' => 'required|numeric|min:100',
            'age' => 'required|numeric|min:10',
            'gender' => 'required|in:male,female',
            'activity' => 'required|in:sedentary,light,moderate,active',
            'goal' => 'required|in:cutting,bulking,maintenance',
        ]);

        // 1. Hitung BMR Menggunakan Rumus Mifflin-St Jeor
        if ($request->gender == 'male') {
            $bmr = (10 * $request->weight) + (6.25 * $request->height) - (5 * $request->age) + 5;
        } else {
            $bmr = (10 * $request->weight) + (6.25 * $request->height) - (5 * $request->age) - 161;
        }

        // 2. Faktor Pengali Aktivitas Harian (TDEE)
        $activityMultiplier = [
            'sedentary' => 1.2,   // Jarang gerak
            'light' => 1.375,     // Olahraga ringan 1-3 hari/minggu
            'moderate' => 1.55,   // Olahraga sedang 3-5 hari/minggu
            'active' => 1.725,    // Olahraga berat 6-7 hari/minggu
        ];

        $tdee = $bmr * $activityMultiplier[$request->activity];

        // 3. Modifikasi Kalori Berdasarkan Tujuan (Goal)
        if ($request->goal == 'cutting') {
            $finalCalories = $tdee - 500; // Defisit Kalori
        } elseif ($request->goal == 'bulking') {
            $finalCalories = $tdee + 500; // Surplus Kalori
        } else {
            $finalCalories = $tdee;       // Maintenance
        }

        $finalCalories = round($finalCalories);

        // 4. Logika Sistem Pakar (Rule-Based Menu Recommendation)
        $menu = $this->getExpertMenuRules($request->goal, $finalCalories);

        // 5. Simpan Hasil Rekomendasi ke Database
        $data = DietRecommendation::create([
            'name' => $request->name,
            'weight' => $request->weight,
            'height' => $request->height,
            'age' => $request->age,
            'gender' => $request->gender,
            'activity' => $request->activity,
            'goal' => $request->goal,
            'calories_result' => $finalCalories,
            'breakfast_menu' => $menu['breakfast'],
            'lunch_menu' => $menu['lunch'],
            'dinner_menu' => $menu['dinner'],
        ]);

        return view('diet.result', compact('data'));
    }

    // Knowledge Base (Basis Pengetahuan Sistem Pakar)
    private function getExpertMenuRules($goal, $calories)
    {
        if ($goal == 'cutting') {
            return [
                'breakfast' => 'Oatmeal 40g, 3 butir Putih Telur rebus, dan 1 buah Apel segar.',
                'lunch' => 'Dada Ayam Panggang (150g), Nasi Merah (100g), Brokoli kukus, dan Air Putih.',
                'dinner' => 'Ikan Salmon atau Tuna Panggang (120g), Selada hijau dengan perasan Lemon.'
            ];
        } elseif ($goal == 'bulking') {
            return [
                'breakfast' => '4 butir Telur dadar, 3 lembar Roti Gandum, Berries, dan 1 Gelas Susu Sapi.',
                'lunch' => 'Daging Sapi Lemak Rendah (200g), Nasi Putih (200g), Tempe goreng, dan Alpukat.',
                'dinner' => 'Dada Ayam Fillet (200g), Kentang Tumbuk (Mashed Potato), dan Tumis Buncis.'
            ];
        } else {
            return [
                'breakfast' => '2 butir Telur setengah matang, 2 potong Roti Gandum, dan Pisang.',
                'lunch' => 'Ikan Bakar, Nasi Putih (150g), Tahu Goreng, dan Sayur Sop Bening.',
                'dinner' => 'Tumis Dada Ayam dengan Paprika, Nasi Merah (100g), dan Tumis Kangkung.'
            ];
        }
    }
}
