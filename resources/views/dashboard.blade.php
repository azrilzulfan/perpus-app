<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="w-full border rounded-lg shadow bg-gray-800 border-gray-700">
                    <ul class="flex flex-wrap text-sm font-medium text-center border-b rounded-t-lg border-gray-700 text-gray-400 bg-gray-800" id="defaultTab" data-tabs-toggle="#defaultTabContent" role="tablist">
                        <li class="mr-2">
                            <button id="data-buku-tab" data-tabs-target="#data-buku" type="button" role="tab" aria-controls="data-buku" aria-selected="true" class="inline-block p-4 rounded-tl-lg bg-gray-800 hover:bg-gray-700 text-blue-500">Data Buku</button>
                        </li>
                        <li class="mr-2">
                            <button id="data-anggota-tab" data-tabs-target="#data-anggota" type="button" role="tab" aria-controls="data-anggota" aria-selected="false" class="inline-block p-4 hover:bg-gray-700 hover:text-gray-300">Data Anggota</button>
                        </li>
                        <li class="mr-2">
                            <button id="data-petugas-tab" data-tabs-target="#data-petugas" type="button" role="tab" aria-controls="data-petugas" aria-selected="false" class="inline-block p-4 hover:bg-gray-700 hover:text-gray-300">Data Petugas</button>
                        </li>
                        <li class="mr-2">
                            <button id="data-peminjaman-tab" data-tabs-target="#data-peminjaman" type="button" role="tab" aria-controls="data-peminjaman" aria-selected="false" class="inline-block p-4 hover:bg-gray-700 hover:text-gray-300">Data Peminjaman</button>
                        </li>
                    </ul>
                    <div id="defaultTabContent">
                        <div class="hidden p-4 rounded-lg md:p-8 bg-gray-800" id="data-buku" role="tabpanel" aria-labelledby="data-buku-tab">
                            <h2 class="mb-3 text-3xl font-extrabold tracking-tight text-white">Data Buku</h2>
                            <a href="/buku" class="text-white w-[20%] focus:ring-4 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-blue-800">
                                Jumlah Data : {{ $jumlahBuku }}<br />
                            </a>
                        </div>
                        <div class="hidden p-4 rounded-lg md:p-8 bg-gray-800" id="data-anggota" role="tabpanel" aria-labelledby="data-anggota-tab">
                            <h2 class="mb-3 text-3xl font-extrabold tracking-tight text-white">Data Anggota</h2>
                            <a href="/anggota" class="text-white w-[20%] focus:ring-4 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-blue-800">
                                Jumlah Data : {{ $jumlahAnggota }}<br />
                            </a>
                        </div>
                        <div class="hidden p-4 rounded-lg md:p-8 bg-gray-800" id="data-petugas" role="tabpanel" aria-labelledby="data-petugas-tab">
                            <h2 class="mb-3 text-3xl font-extrabold tracking-tight text-white">Data Petugas</h2>
                            <a href="/petugas" class="text-white w-[20%] focus:ring-4 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-blue-800">
                                Jumlah Data : {{ $jumlahPetugas }}<br />
                            </a>
                        </div>
                        <div class="hidden p-4 rounded-lg md:p-8 bg-gray-800" id="data-peminjaman" role="tabpanel" aria-labelledby="data-peminjaman-tab">
                            <h2 class="mb-3 text-3xl font-extrabold tracking-tight text-white">Data Peminjaman</h2>
                            <a href="/pinjam" class="text-white w-[20%] focus:ring-4 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-blue-800">
                                Jumlah Data : {{ $jumlahPinjam }}<br />
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
