<x-admin-layout>
    <div class="flex-grow w-full p-5">
        <div class="breadcrumbs text-sm">
            <ul>
                <li><a href="{{ route('admin.contacts.index') }}">Danh sách liên hệ</a></li>
                <li><a class="text-teal-600">Xem</a></li>
            </ul>
        </div>
        
        <div class="mt-6">
            <input type="hidden" name="user_id" value="{{ auth()->id() }}">
            <a href="{{ route('admin.contacts.index') }}"
                class="bg-gray-300 text-gray-700 hover:bg-gray-400 active:bg-gray-500 focus:border-gray-500 focus:ring-gray-300 inline-flex items-center rounded-md px-4 py-2 text-xs font-semibold uppercase tracking-widest transition focus:outline-none focus:ring disabled:opacity-25">
                <i class="far fa-arrow-circle-left mr-2"></i> 
                @lang('admin.back')
            </a>
            <div class="grid grid-cols-3 gap-4 mt-7">
                <div class="col-span-2 ...">
                    <div class="bg-base-100 shadow-xl form-control p-2 rounded-lg">
                        <div class="rounded border-l-4 border-red-500 bg-white p-5">
                            <div class="flex items-center text-sm">
                                <svg class="mr-2 h-4 w-4 flex-none" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                <span>{{ $contact->full_name }}</span>
                            </div>
                            <div class="flex items-center text-sm">
                                <svg class="mr-2 h-4 w-4 flex-none" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                <span>{{ $contact->email }}</span>
                            </div>
                            <div class="flex items-center text-sm">
                                <svg class="mr-2 h-4 w-4 flex-none" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                                <span>{{ $contact->phone }}</span>
                            </div>
                            <div class="mt-1 flex items-center text-sm">
                                <svg class="mr-2 h-4 w-4 flex-none text-red-500" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <div class="rounded bg-red-100 p-2 text-gray-900 font-semibold">
                                    {!! nl2br($contact->content) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="...">
                    <div class="bg-base-100 shadow-xl form-control p-2 rounded-lg">
                        <div class="sticky top-4 h-fit gap-4 space-y-5 rounded-lg border bg-white p-2">
                            <div class="">
                                <h3 class="text-sm font-semibold">
                                    Nhận lúc
                                </h3>
                                <p class="text-normal">{{ $contact->createdAtVi }}</p>
                            </div>
                            <div class="mt-5">
                                <h3 class="text-sm font-semibold">
                                    Xem lúc
                                </h3>
                                <p class="text-normal">{{ $contact->readAtVi ? $contact->readAtVi : 'Chưa xem' }}</p></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
