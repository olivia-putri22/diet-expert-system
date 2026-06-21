<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diet Expert - Neubrutalism</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style>
        /* Gaya Khas Neubrutalism */
        .neubrutalism-shadow {
            box-shadow: 6px 6px 0px 0px #000000;
        }
        .neubrutalism-shadow-sm {
            box-shadow: 4px 4px 0px 0px #000000;
        }
        .neubrutalism-btn:active {
            transform: translate(3px, 3px);
            box-shadow: 2px 2px 0px 0px #000000;
        }
    </style>
</head>
<body class="bg-[#FFFCE1] font-sans text-black p-6 md:p-12">

    <div class="max-w-2xl mx-auto">
        <header class="bg-[#A3E635] border-4 border-black p-6 mb-8 neubrutalism-shadow transform -rotate-1">
            <h1 class="text-3xl md:text-4xl font-black uppercase tracking-wider">FITPLAN: SISTEM PAKAR DIET</h1>
            <p class="text-sm font-bold mt-2 border-t-2 border-black pt-2">Dapatkan rekomendasi menu harian berdasarkan kondisi real tubuhmu.</p>
        </header>

        @if ($errors->any())
            <div class="bg-[#F87171] border-4 border-black p-4 mb-6 neubrutalism-shadow-sm font-bold">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('diet.process') }}" method="POST" class="bg-white border-4 border-black p-6 md:p-8 neubrutalism-shadow space-y-6">
            @csrf

            <div>
                <label class="block text-lg font-black uppercase mb-1">Nama Lengkap</label>
                <input type="text" name="name" required class="w-full border-4 border-black p-3 font-bold text-lg bg-[#E0F2FE] focus:outline-none placeholder-gray-500 neubrutalism-shadow-sm" placeholder="Contoh: Budi Santoso">
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-lg font-black uppercase mb-1">Berat Badan (Kg)</label>
                    <input type="number" name="weight" required class="w-full border-4 border-black p-3 font-bold text-lg bg-[#FFEDD5] focus:outline-none neubrutalism-shadow-sm" placeholder="65">
                </div>
                <div>
                    <label class="block text-lg font-black uppercase mb-1">Tinggi Badan (Cm)</label>
                    <input type="number" name="height" required class="w-full border-4 border-black p-3 font-bold text-lg bg-[#FFEDD5] focus:outline-none neubrutalism-shadow-sm" placeholder="170">
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-lg font-black uppercase mb-1">Usia (Tahun)</label>
                    <input type="number" name="age" required class="w-full border-4 border-black p-3 font-bold text-lg bg-[#F3E8FF] focus:outline-none neubrutalism-shadow-sm" placeholder="21">
                </div>
                <div>
                    <label class="block text-lg font-black uppercase mb-1">Jenis Kelamin</label>
                    <select name="gender" required class="w-full border-4 border-black p-3 font-bold text-lg bg-[#F3E8FF] focus:outline-none neubrutalism-shadow-sm">
                        <option value="male">Laki-Laki</option>
                        <option value="female">Perempuan</option>
                    </select>
                </div>
            </div>

            <div>
                <label class="block text-lg font-black uppercase mb-1">Tingkat Aktivitas</label>
                <select name="activity" required class="w-full border-4 border-black p-3 font-bold text-lg bg-[#CCFBF1] focus:outline-none neubrutalism-shadow-sm">
                    <option value="sedentary">Sedentary (Jarang Olahraga)</option>
                    <option value="light">Light Active (Olahraga Ringan 1-3x/minggu)</option>
                    <option value="moderate">Moderate Active (Olahraga 3-5x/minggu)</option>
                    <option value="active">Very Active (Olahraga Berat 6-7x/minggu)</option>
                </select>
            </div>

            <div>
                <label class="block text-lg font-black uppercase mb-1">Tujuan Diet (Goal)</label>
                <select name="goal" required class="w-full border-4 border-black p-3 font-bold text-lg bg-[#FCE7F3] focus:outline-none neubrutalism-shadow-sm">
                    <option value="cutting">Cutting (Turun Berat Badan)</option>
                    <option value="maintenance">Maintenance (Pertahankan Berat Badan)</option>
                    <option value="bulking">Bulking (Naik Massa Otot/Berat Badan)</option>
                </select>
            </div>

            <button type="submit" class="neubrutalism-btn w-full bg-[#FACC15] border-4 border-black p-4 font-black text-xl uppercase tracking-wider cursor-pointer neubrutalism-shadow transition-all duration-100 mt-4 block text-center">
                Analisis & Rekomendasikan!
            </button>
        </form>
    </div>

</body>
</html>