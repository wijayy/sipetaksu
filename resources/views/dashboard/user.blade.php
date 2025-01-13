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
                        <th class="text-start">Verified</th>
                        <th class="text-start">Terakhir login</th>
                        <th class="text-start">Jumlah UMKM</th>
                        <th class="text-start">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $item)
                        <tr class="h-12 odd:bg-white">
                            <td class="pr-1">{{ $loop->iteration }}</td>
                            <td class="pr-2">{{ $item->name }}</td>
                            <td class="pr-2">{{ $item->email }}</td>
                            <td class="pr-2">
                                <div class="">
                                    @if (!is_null($item->verified_at))
                                        <div
                                            class="flex items-center justify-center bg-red-200 border border-red-500 rounded-lg size-10">
                                            <i class="text-2xl font-bold bx bx-x"></i>
                                        </div>
                                    @else
                                        <div
                                            class="flex items-center justify-center bg-teal-200 border border-teal-500 rounded-lg size-10">
                                            <i class="text-2xl font-bold bx bx-check"></i>
                                        </div>
                                    @endif
                                </div>
                            </td>
                            <td class="pr-2">{{ $item->last_login->diffForHumans() }}</td>
                            <td class="pr-2">{{ $item->umkm->count() }}</td>
                            <td class="pr-2">
                                <div class="">
                                    @if ($item->id !== Auth::user()->id)
                                        <form method="POST" action="route"
                                            class="flex items-center justify-center bg-red-200 border border-red-500 rounded-lg size-10">
                                            <i class="text-2xl font-bold bx bx-trash"></i>
                                        </form>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</x-auth-layout>
