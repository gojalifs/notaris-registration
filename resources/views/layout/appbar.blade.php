<div class="flex justify-between text-lg border-b shadow-sm pb-4">
    <div class="flex items-center">
        <img src="static_img/profile.svg" width="40" height="40">
        <div class="ml-2">{{ $user }}</div>
    </div>
    <a href="" class="hover:text-red-400 hover:scale-95 content-center">
        <div class="flex space-x-2 items-center">
            <div>Logout</div>
            <div>
                <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                    class="text-yellow-200">
                    <path d="M21 12L13 12" stroke="#323232" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" />
                    <path d="M18 15L20.913 12.087V12.087C20.961 12.039 20.961 11.961 20.913 11.913V11.913L18 9"
                        stroke="#323232" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    <path
                        d="M16 5V4.5V4.5C16 3.67157 15.3284 3 14.5 3H5C3.89543 3 3 3.89543 3 5V19C3 20.1046 3.89543 21 5 21H14.5C15.3284 21 16 20.3284 16 19.5V19.5V19"
                        stroke="#323232" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </div>
        </div>
    </a>
</div>
