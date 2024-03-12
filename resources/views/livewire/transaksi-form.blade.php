<div>
    <form>
        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
            <div class="">
                @if (!$updatingStatusOnly)
                    <input type="hidden" wire:model="user_id">
                    <div class="mb-4">
                        @foreach ($keranjangItems as $keranjangItem)
                            <div class="grid grid-cols-2 gap-4 mb-2 w-full">
                                <div class="col-span-2">
                                    <label for="nama_barang" class="form-label">Nama Barang</label>
                                    <input type="text" id="nama_barang" name="nama_barang"
                                        value="{{ $keranjangItem->barang->nama_barang }}"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        readonly>
                                </div>
                                <div class="col-span-1">
                                    <label for="jumlah" class="form-label">Jumlah</label>
                                    <input type="number" id="jumlah" name="jumlah"
                                        value="{{ $keranjangItem->jumlah }}"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        readonly>
                                </div>
                                <div class="col-span-1">
                                    <label for="ukuran" class="form-label">Ukuran</label>
                                    @if ($ukuranStandar[$keranjangItem->id])
                                        <input type="text" id="ukuran" name="ukuran"
                                            value="{{ $keranjangItem->ukuran->panjang }} cm x {{ $keranjangItem->ukuran->lebar }} cm x {{ $keranjangItem->ukuran->tinggi }} cm"
                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                            readonly>
                                    @else
                                        <input type="text" id="ukuran" name="ukuran"
                                            value="{{ $keranjangItem->ukuran_custom->panjang }} cm x {{ $keranjangItem->ukuran_custom->lebar }} cm x {{ $keranjangItem->ukuran_custom->tinggi }} cm"
                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                            readonly>
                                    @endif
                                </div>
                                <div class="col-span-1">
                                    <label for="harga" class="form-label">Harga Satuan</label>
                                    @if ($hargaStandar[$keranjangItem->id])
                                        <input type="text" id="ukuran" name="ukuran"
                                            value="{{ $keranjangItem->ukuran->harga }}"
                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                            readonly>
                                    @else
                                        <input type="text" id="ukuran" name="ukuran"
                                            value="{{ $keranjangItem->ukuran_custom->harga }}"
                                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                            readonly>
                                    @endif
                                </div>
                                <div class="col-span-1">
                                    <label for="total_harga" class="form-label">Total Harga</label>
                                    <input type="text" id="total_harga" name="total_harga"
                                        value="{{ $totalHargaItems[$keranjangItem->id] }}"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        readonly>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="mb-4">
                        <label for="grand_total" class="form-label font-bold">Grand Total</label>
                        <input type="text" id="grand_total" name="grand_total" wire:model='total_harga'
                            value="{{ $total_harga }}"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            readonly>
                    </div>

                    <div class="mb-4">
                        <label for="status" class="form-label">Status</label>
                        <input wire:model.defer="status" type="text" id="status" name="status"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            readonly>
                        @error('status')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                @endif
                @if ($updatingStatusOnly)
                    <div class="mb-4">
                        <label for="status" class="block text-gray-700 text-sm font-bold mb-2">Status</label>
                        <select wire:model.defer="status"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="status">
                            <option value="">Pilih Status</option>
                            <option value="Dalam Proses">Dalam Proses</option>
                            <option value="Dikerjakan">Dikerjakan</option>
                            <option value="Selesai">Selesai</option>
                        </select>
                        @error('status')
                            <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                @endif
            </div>
        </div>
        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
            <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                <button wire:click.prevent="store()" type="button"
                    class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-red-600 text-base leading-6 font-bold text-white shadow-sm hover:bg-red-700 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                    Submit
                </button>
            </span>
            <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                <button wire:click="closeModal()" type="button"
                    class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-bold text-gray-700 shadow-sm hover:text-gray-700 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                    Close
                </button>
            </span>
        </div>
    </form>
</div>
