@extends('app')

@section('content')
    <div>
        <div class="flex justify-between m-8 items-center">
            <div class="flex items-center space-x-2">
                <img src="logo.png" alt="Ikatan Notaris Indonesia" class="w-14 h-14">
                <div>
                    <div>Notaris & PPAT</div>
                    <div>Tiara Vita S.H., M.Kn.</div>
                </div>
            </div>
            <div class="space-x-2">
                <span class="text-red-400 px-4 py-2 rounded-sm">DAFTAR</span>
                <a href="{{ route('login') }}" class="hover:text-white hover:bg-red-200 px-4 py-2 rounded-sm">LOGIN</a>
            </div>
        </div>
        <div class="text-center text-lg font-medium">
            Registrasi Akun
        </div>
        <div class="max-w-[600px] mx-auto">
            <form action="{{route('doRegister')}}" method="post" class="space-y-4 mt-4">
                @csrf
                <div class="w-full flex items-center">
                    <span class="md:w-40">Nama Lengkap</span>
                    <input type="text" name="full_name" id="full_name" required class="w-full py-1 px-2" autofocus>
                </div>
                <div class="w-full flex items-center">
                    <span class="md:w-40">Nama Panggilan</span>
                    <input type="text" name="name" id="name" required class="w-full py-1 px-2">
                </div>
                <div class="w-full flex items-center">
                    <span class="md:w-40">Email</span>
                    <input type="email" name="email" id="email" required class="w-full py-1 px-2">
                </div>
                <div class="w-full flex items-center">
                    <span class="md:w-40">Password</span>
                    <input type="password" name="password" id="password" required class="w-full py-1 px-2">
                </div>
                <div class="w-full flex items-center">
                    <span class="md:w-40">Konfirmasi Password</span>
                    <input type="password" name="password_confirmation" id="password_confirmation" required
                        class="w-full py-1 px-2">
                </div>
                <div class="text-center">
                    <button type="submit" class="bg-black text-white px-4 py-2 w-full">Register</button>
                </div>
            </form>
        </div>
    </div>
@endsection
