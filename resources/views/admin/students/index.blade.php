@extends('layouts.main')

@section('container')

        <div id="menu-content" class="flex flex-col w-full pb-[30px]">
            @include('layouts.partials.navbar')
            <div class="flex flex-col px-5 mt-5">
                <div class="w-full flex justify-between items-center">
                    <div class="flex flex-col gap-1">
                        <p class="font-extrabold text-[30px] leading-[45px]">Manage Students</p>
                    </div>
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

                <div class="list-items flex flex-nowrap justify-between pr-10">
                    <div class="flex shrink-0 w-[300px]">
                        <div class="flex items-center gap-4">
                            <div class="w-16 h-16 flex shrink-0 overflow-hidden rounded-full">
                                <img src="" class="object-cover" alt="avatar">
                            </div>
                            <div class="flex flex-col gap-[2px]">
                                <p class="font-bold text-lg">Nama Murid</p>
                                <p class="font-bold text-lg">Email Murid</p>
                            </div>
                        </div>
                    </div>
                    <div class="flex shrink-0 w-[150px] items-center justify-center">
                        <p class="font-semibold">7 Mei 2024
                        </p>
                    </div>

                    <div class="flex shrink-0 w-[120px] items-center">
                        <div class="relative h-[41px]">
                                <form method="POST" action="">
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

        </div>
@endsection

