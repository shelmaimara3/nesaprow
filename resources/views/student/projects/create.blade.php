@extends('layouts.main')

@section('container')

        <div id="menu-content" class="flex flex-col w-full pb-[30px]">
            @include('layouts.partials.navbar')
            <div class="flex flex-col px-5 mt-5">
                <div class="w-full flex justify-between items-center">
                    <div class="flex flex-col gap-1">
                        <p class="font-extrabold text-[30px] leading-[45px]">New Project</p>
                    </div>
                    </div>
            </div>

            <form method="POST" enctype="multipart/form-data" action="{{ route('dashboard.project.store') }}" class="flex flex-col gap-[30px] w-[500px] mx-[70px] mt-10">
                @csrf

                <div class="flex flex-col gap-[10px]">
                    <p class="font-semibold">Nama Kelompok</p>
                    <div class="flex items-center w-[500px] h-[52px] p-[14px_16px] rounded-full border border-[#EEEEEE] transition-all duration-300 focus-within:border-2 focus-within:border-[#0A090B]">
                        <div class="mr-[14px] w-6 h-6 flex items-center justify-center overflow-hidden">
                            <img src="{{asset('images/icons/note-favorite-outline.svg')}}" class="w-full h-full object-contain" alt="icon">
                        </div>
                        <input type="text" class="font-semibold placeholder:text-[#7F8190] placeholder:font-normal w-full outline-none" placeholder="Tuliskan nomor kelompokmu mulai Kelompok 1 - dst " name="name_team" required>
                    </div>
                </div>
                <div class="group/category flex flex-col gap-[10px]">
                    <p class="font-semibold">Jabatan dalam Kelompok</p>
                    <div class="peer flex items-center p-[12px_16px] rounded-full border border-[#EEEEEE] transition-all duration-300 focus-within:border-2 focus-within:border-[#0A090B]">
                        <div class="mr-[10px] w-6 h-6 flex items-center justify-center overflow-hidden">
                            <img src="{{asset('images/icons/bill.svg')}}" class="w-full h-full object-contain" alt="icon">
                        </div>
                        <select id="occupation" class="pl-1 font-semibold focus:outline-none w-full text-[#0A090B] invalid:text-[#7F8190] invalid:font-normal appearance-none bg-[url('{{asset('images/icons/arrow-down.svg')}}')] bg-no-repeat bg-right" name="occupation_id" required>
                            <option value="" disabled selected hidden>Choose one of occupation</option>
                            @forelse ($occupations as $occupation)
                            <option value="{{ $occupation->id }}" class="font-semibold">{{ $occupation->name }}</option>
                            @empty
                            @endforelse
                            
                        </select>
                    </div>
                </div>

                <div class="flex flex-col gap-[10px]">
                    <p class="font-semibold">Anggota Kelompok</p>
                    <div class="flex items-center w-[500px] h-[52px] p-[14px_16px] rounded-full border border-[#EEEEEE] transition-all duration-300 focus-within:border-2 focus-within:border-[#0A090B]">
                        <div class="mr-[14px] w-6 h-6 flex items-center justify-center overflow-hidden">
                            <img src="{{asset('images/icons/note-favorite-outline.svg')}}" class="w-full h-full object-contain" alt="icon">
                        </div>
                        <input type="textarea" class="font-semibold placeholder:text-[#7F8190] placeholder:font-normal w-full outline-none" placeholder="Anggota Kelompok" name="member" required>
                    </div>
                </div>

                <div class="flex flex-col gap-[10px]">
                    <p class="font-semibold">Tema Proyek</p>
                    <div class="flex items-center w-[500px] h-[52px] p-[14px_16px] rounded-full border border-[#EEEEEE] transition-all duration-300 focus-within:border-2 focus-within:border-[#0A090B]">
                        <div class="mr-[14px] w-6 h-6 flex items-center justify-center overflow-hidden">
                            <img src="{{asset('images/icons/note-favorite-outline.svg')}}" class="w-full h-full object-contain" alt="icon">
                        </div>
                        <input type="text" class="font-semibold placeholder:text-[#7F8190] placeholder:font-normal w-full outline-none" placeholder="Tema Proyek Kelompok" name="title_project" required>
                    </div>
                </div>
                
                <div class="flex flex-col gap-[10px]">
                    <p class="font-semibold">Unggah Proyek Format *(.zip) ukuran < 1 GB</p>
                    <div class="flex items-center w-[500px] h-[52px] p-[14px_16px] rounded-full border border-[#EEEEEE] transition-all duration-300 focus-within:border-2 focus-within:border-[#0A090B]">
                        <button type="button" onclick="document.getElementById('file').click()">
                            <div class="mr-[14px] w-6 h-6 flex items-center justify-center overflow-hidden">
                                <img src="{{asset('images/icons/note-favorite-outline.svg')}}" class="w-full h-full object-contain" alt="icon">                        
                                
                            </div>
                        </button>
                        <input id="file" type="file" class="font-semibold placeholder:text-[#7F8190] placeholder:font-normal w-full outline-none" name="proof_project" class="hidden" onchange="updateFileName(this)">
                    </div>
                </div>

                <div class="flex items-center gap-5">
                    <button type="submit" class="w-full h-[52px] p-[14px_20px] bg-[#6436F1] rounded-full font-bold text-white transition-all duration-300 hover:shadow-[0_4px_15px_0_#6436F14D] text-center">Save Project</button>
                </div>
            </form>

        </div>
    <script
        src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
        crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/main.js') }}"></script>
@endsection