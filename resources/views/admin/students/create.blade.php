@extends('layouts.main')

@section('container')
        <div id="menu-content" class="flex flex-col w-full pb-[30px]">
            @include('layouts.partials.navbar')
            <div class="flex flex-col gap-10 px-5 mt-5">
                <div class="breadcrumb flex items-center gap-[30px]">
                    <a href="#" class="text-[#7F8190] last:text-[#0A090B] last:font-semibold">Home</a>
                    <span class="text-[#7F8190] last:text-[#0A090B]">/</span>
                    <a href="{{ route('dashboard.students.index') }}" class="text-[#7F8190] last:text-[#0A090B] last:font-semibold">Manage Students</a>
                    <span class="text-[#7F8190] last:text-[#0A090B]">/</span>
                    <a href="#" class="text-[#7F8190] last:text-[#0A090B] last:font-semibold ">New Student</a>
                </div>
            </div>

            @if($errors->any())
            <ul>
                @foreach($errors->all() as $error)
                <li class="py-5 px-5 bg-red-700 text-white mt-3">
                    {{ $error }}
                </li>
                @endforeach
            </ul>
            @endif

            <form method="POST" action="{{ route('dashboard.students.store') }}" class="mx-[70px] mt-[30px] flex flex-col gap-5">
                @csrf
                <h2 class="font-bold text-2xl">Add New Student</h2>
                <div class="flex flex-col gap-[10px]">
                    <p class="font-semibold">Email Address</p>
                    <div
                        class="flex items-center w-[500px] h-[52px] p-[14px_16px] rounded-full border border-[#EEEEEE] focus-within:border-2 focus-within:border-[#0A090B]">
                        <div class="mr-[14px] w-6 h-6 flex items-center justify-center overflow-hidden">
                            <img src="{{asset('images/icons/sms.svg')}}" class="h-full w-full object-contain" alt="icon">
                        </div>
                        <input type="text"
                            class="font-semibold placeholder:text-[#7F8190] placeholder:font-normal w-full outline-none"
                            placeholder="Write email address" name="email">
                    </div>
                </div>
                <button type="submit"
                    class="w-[500px] h-[52px] p-[14px_20px] bg-[#6436F1] rounded-full font-bold text-white transition-all duration-300 hover:shadow-[0_4px_15px_0_#6436F14D] text-center">Add</button>
            </form>

        </div>
@endsection
