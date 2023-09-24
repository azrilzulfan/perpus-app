<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Peminjaman') }}
        </h2>
    </x-slot>
    <div class="container w-3/4 mx-auto mt-5">
        <button type="button" data-modal-target="modal-tambah" data-modal-toggle="modal-tambah" class="text-white focus:ring-4 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-green-800">Tambah</button>
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-400">
        <thead class="text-xs uppercase bg-gray-700 text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    ID Peminjaman
                </th>
                <th scope="col" class="px-6 py-3">
                    Nama Petugas
                </th>
                <th scope="col" class="px-6 py-3">
                    Nama Anggota
                </th>
                <th scope="col" class="px-6 py-3">
                    Judul Buku
                </th>
                <th scope="col" class="px-6 py-3">
                    Opsi
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pinjam as $index=>$p)
            <tr class="border-b bg-gray-800 border-gray-700 hover:bg-gray-600">
                <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap text-white">
                    {{$p->id_pinjam}}
                </th>
                <td class="px-6 py-4">
                    {{$p->petugas->nama_petugas}}
                </td>
                <td class="px-6 py-4">
                    {{$p->anggota->nama_anggota}}
                </td>
                <td class="px-6 py-4">
                    {{$p->buku->judul}}
                </td>
                <td class="px-6 py-4">
                    <button type="button" data-modal-target="modal-edit" data-modal-toggle="modal-edit{{$p->id_pinjam}}" class="text-white focus:ring-4 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-blue-800">Edit</button><button type="button" data-modal-target="modal-hapus" data-modal-toggle="modal-hapus" class="text-white focus:ring-4 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-red-800">Hapus</button>
                </td>
            </tr>
            <!-- Modal Edit -->
            <div id="modal-edit{{$p->id_pinjam}}" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative w-full max-w-2xl max-h-full">
                    <!-- Modal content -->
                    <div class="relative rounded-lg shadow bg-gray-700">
                        <!-- Modal header -->
                        <div class="flex items-start justify-between p-4 border-b rounded-t border-gray-600">
                            <h3 class="text-xl font-semibold text-white">
                                Edit Data Peminjaman
                            </h3>
                            <button type="button" class="bg-transparent rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center hover:bg-gray-600 hover:text-white" data-modal-hide="modal-edit">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-6 space-y-6 bg-gray-900">
                        <form name="formpinjamedit" id="formpinjamedit" action="/pinjam/edit/{{$p->id_pinjam}}" method="post" enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PUT') }}
                            <div class="grid md:grid-cols-2 md:gap-6">
                            <div class="relative z-0 w-full mb-6 group">
                                <select type="text" name="id_petugas" id="id_petugas" class="block py-2.5 px-0 w-full text-sm bg-transparent border-0 border-b-2 appearance-none text-blue-600 border-gray-600 focus:border-blue-500 focus:outline-none focus:ring-0 peer" required>
                                    @foreach ($petugas as $pt)
                                        @if ($pt->id_petugas == $p->id_petugas)
                                            <option value="{{ $pt->id_petugas }}" selected>{{ $pt->nama_petugas }}</option>
                                        @else
                                            <option value="{{ $pt->id_petugas }}">{{ $pt->nama_petugas }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <label for="petugas" class="peer-focus:font-medium absolute text-sm text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nama Petugas</label>
                            </div>
                            <div class="relative z-0 w-full mb-6 group">
                                <select type="text" name="id_anggota" id="id_anggota" class="block py-2.5 px-0 w-full text-sm bg-transparent border-0 border-b-2 appearance-none text-blue-600 border-gray-600 focus:border-blue-500 focus:outline-none focus:ring-0 peer" required>
                                    @foreach ($anggota as $a)
                                        @if ($a->id_anggota == $p->id_anggota)
                                             <option value="{{ $a->id_anggota }}" selected>{{ $a->nama_anggota }}</option>
                                        @else
                                            <option value="{{ $a->id_anggota }}">{{ $a->nama_anggota }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <label for="anggota" class="peer-focus:font-medium absolute text-sm text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nama Anggota</label>
                            </div>
                            <div class="relative z-0 w-full mb-6 group">
                                <select type="text" name="id_buku" id="id_buku" class="block py-2.5 px-0 w-full text-sm bg-transparent border-0 border-b-2 appearance-none text-blue-600 border-gray-600 focus:border-blue-500 focus:outline-none focus:ring-0 peer" required>
                                    @foreach ($buku as $bk)
                                        @if ($bk->id_buku == $p->id_buku)
                                            <option value="{{ $bk->id_buku }}" selected>{{ $bk->judul }}</option>
                                        @else
                                            <option value="{{ $bk->id_buku }}">{{ $bk->judul }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <label for="judul" class="peer-focus:font-medium absolute text-sm text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Judul Buku</label>
                            </div>
                            </div>
                            <button type="submit" name="petugasedit" class="focus:ring-4 focus:outline-none text-white bg-blue-700 hover:bg-blue-600 focus:ring-blue-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                Edit
                            </button>
                            <button data-modal-hide="modal-edit" type="button" class="focus:ring-4 focus:outline-none rounded-lg border text-sm font-medium px-5 py-2.5 focus:z-10 bg-gray-700 text-white border-gray-500 hover:bg-gray-600 focus:ring-gray-600">Batal</button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </tbody>
    </table>
</div>

  <!-- Modal Tambah -->
  <div id="modal-tambah" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
      <div class="relative w-full max-w-2xl max-h-full">
          <!-- Modal content -->
          <div class="relative rounded-lg shadow bg-gray-700">
              <!-- Modal header -->
              <div class="flex items-start justify-between p-4 border-b rounded-t border-gray-600">
                  <h3 class="text-xl font-semibold text-white">
                      Tambah Data Peminjaman
                  </h3>
                  <button type="button" class="bg-transparent rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center hover:bg-gray-600 hover:text-white" data-modal-hide="modal-tambah">
                      <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                      </svg>
                      <span class="sr-only">Close modal</span>
                  </button>
              </div>
              <!-- Modal body -->
              <div class="p-6 space-y-6 bg-gray-900">
                <form name="formpinjamtambah" id="formpinjamtambah" action="/pinjam/tambah" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-0 w-full mb-6 group">
                        <select type="text" name="id_petugas" id="id_petugas" class="block py-2.5 px-0 w-full text-sm bg-transparent border-0 border-b-2 appearance-none text-blue-600 border-gray-600 focus:border-blue-500 focus:outline-none focus:ring-0 peer" placeholder="" required >
                            <option></option>
                                @foreach($petugas as $pt)
                                    <option value="{{ $pt->id_petugas }}">{{ $pt->nama_petugas }}</option>
                                @endforeach
                        </select>
                        <label for="id_petugas" class="peer-focus:font-medium absolute text-sm text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nama Petugas</label>
                    </div>
                    <div class="relative z-0 w-full mb-6 group">
                        <select type="text" name="id_anggota" id="id_anggota" class="block py-2.5 px-0 w-full text-sm bg-transparent border-0 border-b-2 appearance-none text-blue-600 border-gray-600 focus:border-blue-500 focus:outline-none focus:ring-0 peer" placeholder="" required >
                            <option></option>
                                @foreach($anggota as $a)
                                    <option value="{{ $a->id_anggota }}">{{ $a->nama_anggota }}</option>
                                @endforeach
                        </select>
                        <label for="id_anggota" class="peer-focus:font-medium absolute text-sm text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nama Anggota</label>
                    </div>
                    <div class="relative z-0 w-full mb-6 group">
                        <select type="text" name="id_buku" id="id_buku" class="block py-2.5 px-0 w-full text-sm bg-transparent border-0 border-b-2 appearance-none text-blue-600 border-gray-600 focus:border-blue-500 focus:outline-none focus:ring-0 peer" placeholder="" required >
                            <option></option>
                                @foreach($buku as $bk)
                                    <option value="{{ $bk->id_buku }}">{{ $bk->judul }}</option>
                                @endforeach
                        </select>
                        <label for="id_buku" class="peer-focus:font-medium absolute text-sm text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Judul Buku</label>
                    </div>
                    </div>
                    <button type="submit" name="pinjamtambah" class="focus:ring-4 focus:outline-none text-white bg-green-700 hover:bg-green-600 focus:ring-green-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                        Tambah
                    </button>
                    <button data-modal-hide="modal-tambah" type="button" class="focus:ring-4 focus:outline-none rounded-lg border text-sm font-medium px-5 py-2.5 focus:z-10 bg-gray-700 text-white border-gray-500 hover:bg-gray-600 focus:ring-gray-600">Batal</button>
                </form>
              </div>
          </div>
      </div>
  </div>
    {{-- Modal Hapus --}}
  <div id="modal-hapus" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
      <div class="relative w-full max-w-md max-h-full">
          <div class="relative rounded-lg shadow bg-gray-700">
              <button type="button" class="absolute top-3 right-2.5 bg-transparent rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center hover:bg-gray-600 hover:text-white" data-modal-hide="modal-hapus">
                  <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                  </svg>
              </button>
              <div class="p-6 text-center">
                  <svg class="mx-auto mb-4 w-12 h-12 text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                  </svg>
                  <h3 class="mb-5 text-lg text-white font-normal dark">Apakah Anda yakin ingin menghapus data ini?</h3>
                  <a href="pinjam/hapus/{{$p->id_pinjam}}" class="focus:ring-4 focus:outline-none text-white bg-red-700 hover:bg-red-600 focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                      Hapus
                  </a>
                  <button data-modal-hide="modal-hapus" type="button" class="focus:ring-4 focus:outline-none rounded-lg border text-sm font-medium px-5 py-2.5 focus:z-10 bg-gray-700 text-white border-gray-500 hover:bg-gray-600 focus:ring-gray-600">Batal</button>
              </div>
          </div>
      </div>
  </div>
    </div>
</x-app-layout>
