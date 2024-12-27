<x-auth-layout :title="'List Users'">
    <div class="w-full mt-6">
        <div class="flex justify-between">
            <h3 class="text-2xl font-bold">List Users</h3>
        </div>

        <div class="overflow-x-auto ">
            <table class="min-w-full px-2 mt-4 overflow-x-auto table-auto w-fit text-start">
                <thead>
                    <tr>
                        <th class="text-start">#</th>
                        <th class="text-start">Nama</th>
                        <th class="text-start">Email</th>
                        <th class="text-start">Jumlah UMKM</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $item)
                        <tr class="h-12 odd:bg-white">
                            <td class="pr-1">{{ $loop->iteration }}</td>
                            <td class="pr-2">{{ $item->name }}</td>
                            <td class="pr-2">{{ $item->email }}</td>
                            <td class="pr-2">{{ $item->umkm->count() }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</x-auth-layout>
