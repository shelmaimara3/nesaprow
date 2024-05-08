@extends('layouts.main')

@section('container')

        <div id="menu-content" class="flex flex-col w-full pb-[30px]">
            @include('layouts.partials.navbar')
            <div class="flex flex-col px-5 mt-5">
                <div class="w-full flex justify-between items-center">
                    <div class="flex flex-col gap-1">
                        <p class="font-extrabold text-[30px] leading-[45px]">Manage Category</p>
                    </div>
                    <a href="{{ route('dashboard.categories.create') }}" class="h-[52px] p-[14px_20px] bg-[#6436F1] rounded-full font-bold text-white transition-all duration-300 hover:shadow-[0_4px_15px_0_#6436F14D]">Add New Category</a>
                </div>
            </div>
            <div class="course-list-container flex flex-col px-5 mt-[30px] gap-[30px]">
                <div class="course-list-header flex flex-nowrap justify-between pb-4 pr-10 border-b border-[#EEEEEE]">
                    <div class="flex shrink-0 w-[300px]">
                        <p class="text-[#7F8190]">Name</p>
                    </div>
                    <div class="flex justify-center shrink-0 w-[150px]">
                        <p class="text-[#7F8190]">Date Created</p>
                    </div>
                    <div class="flex justify-center shrink-0 w-[120px]">
                        <p class="text-[#7F8190]">Action</p>
                    </div>
                </div>

                @forelse($categories as $category)
                <div class="list-items flex flex-nowrap justify-between pr-10">
                    <div class="flex shrink-0 w-[300px]">
                        <div class="flex items-center gap-4">
                            <div class="w-16 h-16 flex shrink-0 overflow-hidden rounded-full">
                                <img src="{{Storage::url($category->icon)}}" class="object-cover" alt="icon">
                            </div>
                            <div class="flex flex-col gap-[2px]">
                                <p class="font-bold text-lg">{{ $category->name }}</p>
                                <p>{{ $category->slug }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="flex shrink-0 w-[150px] items-center justify-center">
                        <p class="font-semibold">
                            {{ \Carbon\Carbon::parse($category->created_at)->format('F j, Y') }}
                        </p>
                    </div>

                    <div class="flex shrink-0 w-[120px] items-center">
                        <div class="relative h-[41px]">
                            <div class="menu-dropdown w-[120px] max-h-[41px] overflow-hidden absolute top-0 p-[10px_16px] bg-white flex flex-col gap-3 border border-[#EEEEEE] transition-all duration-300 hover:shadow-[0_10px_16px_0_#0A090B0D] rounded-[18px]">
                                <button onclick="toggleMaxHeight(this)" class="flex items-center justify-between font-bold text-sm w-full">
                                    menu
                                    <img src="{{asset('images/icons/arrow-down.svg')}}" alt="icon">
                                </button>
                                <a href="{{ route('dashboard.categories.edit', $category) }}" class="flex items-center justify-between font-bold text-sm w-full">
                                    Edit
                                </a>

                                <form method="POST" action="{{ route('dashboard.categories.destroy', $category) }}">
                                    @csrf
                                    @method('DELETE')
                                <button type="submit" class="flex items-center justify-between font-bold text-sm w-full text-[#FD445E]">
                                    Delete
                                </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <p>
                    Belum ada kategori yang ditambahkan
                </p>
                @endforelse
            </div>
        </div>
@endsection