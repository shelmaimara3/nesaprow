<div class="nav flex justify-between p-5 border-b border-[#EEEEEE]">
    <form class="search flex items-center w-[400px] h-[52px] p-[10px_16px]">
        <input type="hidden" class="font-semibold placeholder:text-[#7F8190] placeholder:font-normal w-full outline-none">
    </form>
    <div class="flex items-center gap-[30px]">
        <div class="flex gap-[14px]">
            <a href="" class="w-[46px] h-[46px] flex shrink-0 items-center justify-center">
            </a>
            <a href="" class="w-[46px] h-[46px] flex shrink-0 items-center justify-center">
            </a>
        </div>
        <div class="h-[46px] w-[1px] flex shrink-0 border border-[#EEEEEE]"></div>
        <div class="flex gap-3 items-center">
            <div class="flex flex-col text-right">
                <p class="text-sm text-[#7F8190]">Hello</p>
                <p class="font-semibold">{{ Auth::user()->name }}</p>
            </div>
            <div class="w-[46px] h-[46px]">
                <img src="{{ Storage::url(Auth::user()->avatar) }}" alt="photo">
            </div>
        </div>
    </div>
</div>