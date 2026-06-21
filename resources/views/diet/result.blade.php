<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Rekomendasi Diet</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style>
        .neubrutalism-shadow {
            box-shadow: 6px 6px 0px 0px #000000;
        }
        .neubrutalism-shadow-sm {
            box-shadow: 4px 4px 0px 0px #000000;
        }
    </style>
</head>
<body class="bg-[#FFFCE1] font-sans text-black p-6 md:p-12">

    <div class="max-w-2xl mx-auto">
        <header class="bg-[#38BDF8] border-4 border-black p-6 mb-8 neubrutalism-shadow transform rotate-1">
            <h1 class="text-2xl md:text-3xl font-black uppercase tracking-wider">HASIL DIAGNOSA SISTEM PAKAR</h1>
            <p class="text-sm font-bold mt-1">Halo, {{ $data->name }}! Berikut rancangan nutrisi untuk tubuhmu.</p>
        </header>

        <div class="bg-[#FB923C] border-4 border-black p-6 mb-6 neubrutalism-shadow text-center">
            <h2 class="text-xl font-black uppercase">Target Energi Harian Anda</h2>
            <div class="text-5xl font-black my-2 tracking-tight">{{ $data->calories_result }} <span class="text-xl font-bold">Kcal</span></div>
            <p class="font-bold border-t-2 border-black pt-2 uppercase">Status Program: {{ $data->goal }}</p>
        </div>

        <div class="bg-white border-4 border-black p-4 mb-6 neubrutalism-shadow-sm grid grid-cols-3 gap-2 text-center font-bold text-sm">
            <div class="border-2 border-black p-2 bg-[#E0F2FE]">BB: {{ $data->weight }} Kg</div>
            <div class="border-2 border-black p-2 bg-[#FFEDD5]">TB: {{ $data->height }} Cm</div>
            <div class="border-2 border-black p-2 bg-[#F3E8FF]">Usia: {{ $data->age }} Thn</div>
        </div>

        <div class="space-y-4">
            <h3 class="text-2xl font-black uppercase tracking-wide">Rencana Menu Makan Harian</h3>

            <div class="bg-white border-4 border-black p-5 neubrutalism-shadow-sm">
                <span class="bg-[#FACC15] border-2 border-black px-3 py-1 font-black uppercase text-xs tracking-wider">Makan Pagi / Breakfast</span>
                <p class="mt-3 font-bold text-lg text-gray-800">{{ $data->breakfast_menu }}</p>
            </div>

            <div class="bg-white border-4 border-black p-5 neubrutalism-shadow-sm">
                <span class="bg-[#4ADE80] border-2 border-black px-3 py-1 font-black uppercase text-xs tracking-wider">Makan Siang / Lunch</span>
                <p class="mt-3 font-bold text-lg text-gray-800">{{ $data->lunch_menu }}</p>
            </div>

            <div class="bg-white border-4 border-black p-5 neubrutalism-shadow-sm">
                <span class="bg-[#F472B6] border-2 border-black px-3 py-1 font-black uppercase text-xs tracking-wider">Makan Malam / Dinner</span>
                <p class="mt-3 font-bold text-lg text-gray-800">{{ $data->dinner_menu }}</p>
            </div>
        </div>

        <div class="mt-8">
            <a href="{{ route('diet.index') }}" class="inline-block text-center bg-black text-white font-black uppercase p-4 border-4 border-black neubrutalism-shadow-sm hover:bg-gray-800 transition-colors w-full tracking-wider">
                ← Hitung Ulang Data Baru
            </a>
        </div>
    </div>

</body>
</html>