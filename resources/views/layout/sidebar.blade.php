<div>
    <button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar"
        type="button"
        class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
        <span class="sr-only">Open sidebar</span>
        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path clip-rule="evenodd" fill-rule="evenodd"
                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
            </path>
        </svg>
    </button>

    <aside id="default-sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0 border-r shadow-xl"
        aria-label="Sidebar">
        <div class="h-full px-3 py-4 overflow-y-auto bg-blue-500">
            <img src="logo.png" alt="Ikatan Notaris Indonesia" class="p-8">
            <div class="h-[2px] bg-white rounded-lg mb-4"></div>
            <ul class="space-y-2 font-medium">
                <li>
                    <a href="/"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-500 dark:hover:bg-gray-700 group">
                        <svg class="w-5 h-5 text-white transition duration-75 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                            <path
                                d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                            <path
                                d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                        </svg>
                        <span class="ms-3 text-white">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.permohonan.index') }}"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-500 dark:hover:bg-gray-700 group">
                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                            class="flex-shrink-0 w-5 h-5 text-white transition duration-75 dark:text-gray-400">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12ZM15 9C15 10.6569 13.6569 12 12 12C10.3431 12 9 10.6569 9 9C9 7.34315 10.3431 6 12 6C13.6569 6 15 7.34315 15 9ZM12 20.5C13.784 20.5 15.4397 19.9504 16.8069 19.0112C17.4108 18.5964 17.6688 17.8062 17.3178 17.1632C16.59 15.8303 15.0902 15 11.9999 15C8.90969 15 7.40997 15.8302 6.68214 17.1632C6.33105 17.8062 6.5891 18.5963 7.19296 19.0111C8.56018 19.9503 10.2159 20.5 12 20.5Z"
                                    fill="#ffffff"></path>
                            </g>
                        </svg>
                        <span class="flex-1 ms-3 text-white whitespace-nowrap">Permohonan</span>
                    </a>
                </li>
                <li>
                    <a href="#"
                        class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-500 dark:hover:bg-gray-700 group">
                        <svg fill="#ffffff" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" stroke="#ffffff"
                            class="w-5 h-5 text-white transition duration-75 dark:text-gray-400">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                            <g id="SVGRepo_iconCarrier">
                                <path
                                    d="M30,25.11H29v-.89a2,2,0,0,0-2-2H26V14.11h1a2,2,0,0,0,2-2v-.89h2a1,1,0,0,0,.43-1.9l-15-7.22a1,1,0,0,0-.86,0L.57,9.32A1,1,0,0,0,1,11.22H3v.89a2,2,0,0,0,2,2H6v8.11H5a2,2,0,0,0-2,2v.89H2a2,2,0,0,0-2,2V29a1,1,0,0,0,1,1H31a1,1,0,0,0,1-1V27.11A2,2,0,0,0,30,25.11Zm-14-21L26.62,9.22H5.38Zm-11,8v-.89H27v.89H5Zm19,2v8.11H21.5V14.11Zm-4.5,0v8.11H17V14.11Zm-4.5,0v8.11H12.5V14.11Zm-4.5,0v8.11H8V14.11ZM5,24.22H27v.89H5ZM30,28H2v-.89H30Z">
                                </path>
                            </g>
                        </svg>
                        <span class="flex-1 ms-3 text-white whitespace-nowrap">Cetak Laporan</span>
                        {{-- <span
                            class="inline-flex items-center justify-center w-3 h-3 p-3 ms-3 text-sm font-medium text-blue-800 bg-blue-100 rounded-full dark:bg-blue-900 dark:text-blue-300">3</span> --}}
                    </a>
                </li>
            </ul>
        </div>
    </aside>
</div>
