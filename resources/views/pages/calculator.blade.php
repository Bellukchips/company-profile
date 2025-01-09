@extends('templates.index')
@push('css')
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
@endpush
@section('content')
    <main class="main">
        <div class="page-title dark-background" style="background-image: url(assets/img/page-title-bg.jpg);">
            <div class="container position-relative">
                <h1>Calculator</h1>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="/" style="color: rgb(185, 122, 6)">Home</a></li>
                        <li class="current">Calculator</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="container mx-auto px-4 py-6">
            <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
                <div class="flex border-b mb-4">
                    <button class="px-4 py-2 text-gray-500 w-full border-b-2 border-blue-500  sm:w-auto">Harga
                        Rumah</button>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-gray-700">Lokasi Rumah <span class="text-red-500">*</span></label>
                        <select id="lokasi" class="w-full mt-1 p-2 border rounded">
                            <option>- Silakan Pilih -</option>
                            <option value="500000">Perkotaan</option>
                            <option value="10000000">Dekat Pantai</option>
                            <option value="1200000">Persawahan</option>
                            <option value="1500000">Pegunungan</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-gray-700">Lebar Tanah <span class="text-red-500">*</span></label>
                        <div class="flex">
                            <input type="number" id="lebartanah" class="w-full p-2 border rounded-l" value="0.00">
                            <span class="inline-flex items-center px-3 bg-gray-300 border border-l-0 rounded-r">m</span>
                        </div>
                    </div>
                    <div>
                        <label class="block text-gray-700">Panjang Tanah</label>
                        <div class="flex">
                            <span class="inline-flex items-center px-3 bg-gray-300 border border-r-0 rounded-l">m</span>
                            <input type="number" id="panjangtanah" class="w-full p-2 border rounded-r" value="0">
                        </div>
                    </div>

                    <div>
                        <label class="block text-gray-700">Model Rumah <span class="text-red-500">*</span></label>
                        <select id="modelrumah" class="w-full mt-1 p-2 border rounded">
                            <option>- Silakan Pilih -</option>
                            <option value="500000">American Style</option>
                            <option value="200000">Classic</option>
                            <option value="300000">Modern</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-gray-700">Estimasi waktu yang diinginkan <span
                                class="text-red-500">*</span></label>
                        <div class="flex">
                            <input type="number" id="jangkaWaktu" class="w-full p-2 border rounded-l" value="0">
                            <span class="inline-flex items-center px-3 bg-gray-300 border border-l-0 rounded-r">bulan</span>
                        </div>
                    </div>
                    <div>
                        <label class="block text-gray-700">Kelas Bahan yang diinginkan <span
                                class="text-red-500">*</span></label>
                        <select id="bahan" class="w-full mt-1 p-2 border rounded">
                            <option>- Silakan Pilih -</option>
                            <option value="150000">Grade A</option>
                            <option value="100000">Grade B</option>
                            <option value="50000">Grade C</option>
                        </select>
                    </div>

                    <div class="flex justify-center mt-6 gap-2">
                        <button class="px-4 py-2 bg-gray-200 text-gray-700 rounded w-full sm:w-auto">RESET</button>
                        <button class="px-4 py-2 bg-blue-500 text-white rounded w-full sm:w-auto"
                            onclick="calculate()">HITUNG</button>
                    </div>

                    <div class="mt-8">
                        <h2 class="text-center text-blue-500 mb-4">DETAIL</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <p>Estimasi Total Biaya *: <span
                                        class="inline-flex items-center px-3 bg-gray-300 border border-l-0 rounded-r">RP</span><span
                                        id="estimasiTotalBiaya">0</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>
@endsection
@push('js')
    <script>
        function calculate() {
            const lokasi = parseFloat(document.getElementById('lokasi').value);
            const panjangtanah = parseFloat(document.getElementById('panjangtanah').value);
            const lebartanah = parseFloat(document.getElementById('lebartanah').value);
            const jangkaWaktu = parseFloat(document.getElementById('jangkaWaktu').value);
            const modelrumah = parseFloat(document.getElementById('modelrumah').value);
            const bahan = parseFloat(document.getElementById('bahan').value);

            // Simple calculation for demonstration purposes

            const estimasiTotalBiaya = (lokasi + modelrumah + bahan) * panjangtanah * lebartanah * jangkaWaktu;



            document.getElementById('estimasiTotalBiaya').innerText = estimasiTotalBiaya.toFixed(2);
        }
    </script>
@endpush
