<div x-data="{ open: true }">
    <div @click="open =! open" :class="{ 'bg-slate-100': open } '" class="flex cursor-pointer items-center justify-between px-4 py-2 text-sm font-bold tracking-tight text-slate-700 hover:bg-slate-100">
        <div class="flex items-start">
            <span class="mr-2 h-5 w-5 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5">
                    <path fill-rule="evenodd" d="M4.5 2.25a.75.75 0 000 1.5v16.5h-.75a.75.75 0 000 1.5h16.5a.75.75 0 000-1.5h-.75V3.75a.75.75 0 000-1.5h-15zM9 6a.75.75 0 000 1.5h1.5a.75.75 0 000-1.5H9zm-.75 3.75A.75.75 0 019 9h1.5a.75.75 0 010 1.5H9a.75.75 0 01-.75-.75zM9 12a.75.75 0 000 1.5h1.5a.75.75 0 000-1.5H9zm3.75-5.25A.75.75 0 0113.5 6H15a.75.75 0 010 1.5h-1.5a.75.75 0 01-.75-.75zM13.5 9a.75.75 0 000 1.5H15A.75.75 0 0015 9h-1.5zm-.75 3.75a.75.75 0 01.75-.75H15a.75.75 0 010 1.5h-1.5a.75.75 0 01-.75-.75zM9 19.5v-2.25a.75.75 0 01.75-.75h4.5a.75.75 0 01.75.75v2.25a.75.75 0 01-.75.75h-4.5A.75.75 0 019 19.5z" clip-rule="evenodd" />
                </svg>
            </span>
            <span>@lang('website.layer_companies')</span>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-4 w-4">
            <path x-cloak x-show="open" fill-rule="evenodd" d="M11.47 7.72a.75.75 0 011.06 0l7.5 7.5a.75.75 0 11-1.06 1.06L12 9.31l-6.97 6.97a.75.75 0 01-1.06-1.06l7.5-7.5z" clip-rule="evenodd" />
            <path x-show="!open" fill-rule="evenodd" d="M12.53 16.28a.75.75 0 01-1.06 0l-7.5-7.5a.75.75 0 011.06-1.06L12 14.69l6.97-6.97a.75.75 0 111.06 1.06l-7.5 7.5z" clip-rule="evenodd" />
        </svg>
    </div>
    <ul x-show="open" x-transition class="ml-6 space-y-2 border-l border-slate-300 border-l-slate-300 p-2">
        {{-- @foreach ($types as $type)
            <li>
                <div class="flex items-start">
                    <input value="{{ $type->id }}" id="company-type-checkbox-{{ $type->id }}" type="checkbox" name="company-type" class="h-4 w-4 rounded border-slate-300 bg-slate-200 text-blue-600 focus:ring-2 focus:ring-blue-500">
                    <label for="company-type-checkbox-{{ $type->id }}" class="ml-2 text-sm font-medium text-slate-900">{{ $type->name }} <span class="text-xs italic text-lime-700">({{ $type->companies_count }})</span></label>
                </div>
            </li>
        @endforeach --}}
    </ul>
</div>
