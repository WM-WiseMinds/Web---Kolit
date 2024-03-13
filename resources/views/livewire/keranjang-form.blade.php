<div>
    <form>
        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
            <div class="">
                <div class="mb-4">
                    <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Users</label>
                    <input type="hidden"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="exampleFormControlInput1" placeholder="Enter ID User" wire:model="user_id">
                    <input type="text"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="exampleFormControlInput1" placeholder="Enter Username" wire:model="user_name" disabled
                        readonly>
                    @error('user_id')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="exampleFormControlInput1"
                        class="block text-gray-700 text-sm font-bold mb-2">Barang</label>
                    <input type="hidden"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="exampleFormControlInput1" placeholder="Enter ID Barang" wire:model="barang_id">
                    <input type="text"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="exampleFormControlInput1" placeholder="Enter Barang" wire:model="barang_name" disabled
                        readonly>
                    @error('barang_id')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="exampleFormControlInput1"
                        class="block text-gray-700 text-sm font-bold mb-2">Jumlah</label>
                    <input type="number"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="exampleFormControlInput1" placeholder="Enter Jumlah" wire:model="jumlah">
                    @error('jumlah')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div x-data="{ tipeUkuran: '{{ $tipe_ukuran }}' }" class="mb-4">
                    <div class="form-group">
                        <label for="tipe_ukuran" class="block text-gray-700 text-sm font-bold mb-2">Tipe Ukuran</label>
                        <select wire:model="tipe_ukuran"
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            x-on:change="tipeUkuran = event.target.value">
                            <option value="" readonly selected>Pilih Tipe Ukuran</option>
                            <option value="standar">Standar</option>
                            <option value="custom">Custom</option>
                        </select>
                    </div>

                    <div id="form-ukuran-standar" wire:key="ukuran-standar" x-show="tipeUkuran === 'standar'">
                        <div class="form-group mt-4">
                            <label for="ukuran_id" class="block text-gray-700 text-sm font-bold mb-2">Ukuran</label>
                            <select wire:model="ukuran_id"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                wire:change='getHarga'>
                                <option value="">Pilih Ukuran</option>
                                @foreach ($ukuran as $item)
                                    <option value="{{ $item->id }}">{{ $item->ukuran }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mt-4">
                            <label for="exampleFormControlInput1"
                                class="block text-gray-700 text-sm font-bold mb-2">Harga</label>
                            <input type="text"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="exampleFormControlInput1" placeholder="Enter Harga" wire:model="harga" disabled
                                readonly>
                        </div>
                    </div>

                    <div id="form-ukuran-custom" wire:key="ukuran-custom" x-show="tipeUkuran === 'custom'">
                        <div class="form-group mt-4">
                            <label for="panjang" class="block text-gray-700 text-sm font-bold mb-2">Panjang</label>
                            <input wire:model="panjang" wire:change='hitungHargaCustom' type="number"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div class="form-group mt-4">
                            <label for="lebar" class="block text-gray-700 text-sm font-bold mb-2">Lebar</label>
                            <input wire:model="lebar" wire:change='hitungHargaCustom' type="number"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div class="form-group mt-4">
                            <label for="tinggi" class="block text-gray-700 text-sm font-bold mb-2">Tinggi</label>
                            <input wire:model="tinggi" wire:change='hitungHargaCustom' type="number"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div class="form-group mt-4">
                            <label for="exampleFormControlInput1"
                                class="block text-gray-700 text-sm font-bold mb-2">Harga</label>
                            <input type="text"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="exampleFormControlInput1" placeholder="Enter Harga" wire:model="hargaCustom"
                                disabled readonly>
                        </div>
                    </div>
                </div>

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

    @script
        <script>
            function changeTipeUkuran() {
                this.tipeUkuran = event.target.value;
            }
        </script>
    @endscript
</div>
