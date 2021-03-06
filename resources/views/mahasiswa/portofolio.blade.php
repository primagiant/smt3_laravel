<x-app-layout>
    <x-slot name="header">
        {{__('Portofolio')}}
    </x-slot>
    <div>
        <div class="mb-3">
            <a href="{{ route('add-portofolio') }}"
                class="bg-sidebar hover:bg-gray-600 text-white py-2 px-4 rounded-lg text-md">
                <i class="fas fa-plus mr-2"></i>
                <span>Tambah</span>
            </a>
        </div>
        <div class="bg-white overflow-auto">
            <table class="text-left w-full border-collapse">
                <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
                <thead>
                    <tr class="bg-sidebar text-white">
                        <th
                            class="text-center py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                            Jenis Kegiatan</th>
                        <th
                            class="text-center py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                            Nama Kegiatan</th>
                        <th
                            class="text-center py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                            Penyelenggara</th>
                        <th
                            class="text-center py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                            Tahun</th>
                        <th
                            class="text-center py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                            Ref Point</th>
                        <th
                            class="text-center py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                            Valid Point</th>
                        <th
                            class="text-center py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light w-20">
                            Bukti</th>
                        <th
                            class="text-center py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light w-52">
                            Status</th>
                        <th
                            class="text-center py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                            Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($portofolio as $item)
                    <tr class="hover:bg-grey-lighter">
                        <td class="text-center py-4 px-6 border-b border-grey-light">{{ $item->jenis_kegiatan->nama }}
                        </td>
                        <td class="text-center py-4 px-6 border-b border-grey-light">{{ $item->nama_kegiatan }}</td>
                        <td class="text-center py-4 px-6 border-b border-grey-light">{{ $item->penyelenggara }}</td>
                        <td class="text-center py-4 px-6 border-b border-grey-light">{{ $item->tahun }}</td>
                        <td class="text-center py-4 px-6 border-b border-grey-light">{{ $item->jenis_kegiatan->ref_point
                            }}</td>
                        <td class="text-center py-4 px-6 border-b border-grey-light">{{ $item->valid_point }}</td>
                        <td class="text-center py-4 px-6 border-b border-grey-light">
                            <p class="hidden invisible">{{ $item->bukti }}</p>
                            <button
                                class="openBukti bg-sidebar hover:bg-gray-600 text-white py-2 px-4 rounded-lg text-sm">
                                <i class="fas fa-eye"></i>
                                Lihat
                            </button>
                        </td>
                        <td class="text-center py-4 px-6 border-b border-grey-light">
                            @if ($item->status == 0)
                            <span class="bg-red-500 p-1.5 text-white rounded-lg text-sm">
                                <i class="fas fa-times-circle"></i>
                                Belum Diverifikasi
                            </span>
                            @else
                            <span class="bg-green-500 p-1.5 text-white rounded-lg text-sm">
                                <i class="fas fa-check-circle"></i>
                                Verified
                            </span>
                            @endif
                        </td>
                        <td class="text-center py-4 px-6 border-b border-grey-light">
                            <div class=" flex items-center justify-center">
                                <a href="{{ route('edit-portofolio', ['id'=>$item->id]) }}"
                                    class="py-2 px-4 bg-yellow-600 hover:bg-yellow-700 rounded-lg">
                                    <i class="fas fa-pen text-white text-xs"></i>
                                </a>
                            </div>
                            <form action="{{ route('delete-portofolio', ['id'=>$item->id]) }}" method="POST"
                                onsubmit="return confirm('Apakah Anda yakin menghapus data ini ?')" class="mt-2">
                                @csrf
                                @method('delete')
                                <button type="submit" class="py-2 px-4 bg-red-600 hover:bg-red-700 rounded-lg">
                                    <i class="fas fa-trash text-white text-xs"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-3">
            {{ $portofolio->links() }}
        </div>
    </div>

    {{-- Modals --}}
    <div id="imageModal" class="hidden fixed top-0 bottom-0 left-0 right-0 bg-gray-500 bg-opacity-80 z-10">
        <div class="pt-16 flex flex-col justify-center items-center">
            <div class="flex justify-center items-center w-1/3">
                <img id="modalImg" src="" alt="Bukti Image">
            </div>
            <button id="closeModal" class="mt-5 text-center w-full animate-bounce">
                <span class="bg-white py-2 px-3.5 rounded-full ">
                    <i class="fas fa-plus transform rotate-45"></i>
                </span>
            </button>
        </div>
    </div>

    <script>
        const openBukti = document.querySelectorAll('.openBukti');
        const image = document.getElementById('modalImg');
        const modal = document.getElementById('imageModal');
        const closeModal = document.getElementById('closeModal');

        openBukti.forEach(e => {
            e.addEventListener('click', function () {
                modal.classList.remove('hidden');
                modal.classList.add('block');
                let imgSource = e.parentElement.children[0].innerText;
                image.src = "/" + imgSource;
            })
        });

        closeModal.addEventListener('click', function() {
            modal.classList.add('hidden');
            modal.classList.remove('block');
        })

        modal.addEventListener('click', function() {
            modal.classList.add('hidden');
            modal.classList.remove('block');
        })
    </script>
</x-app-layout>
