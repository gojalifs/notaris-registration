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
                <a href="{{ route('register') }}" class="hover:text-white hover:bg-red-200 px-4 py-2 rounded-sm">DAFTAR</a>
                <span class="text-red-400 px-4 py-2 rounded-sm">LOGIN</span>
            </div>
        </div>
        <div class="text-center text-lg font-medium">
            Login
        </div>
        <div class="max-w-[600px] mx-auto">
            @if (Session::get('success'))
                <div class="ps-4 text-sm font-normal text-green-500">{{ Session::get('success') }}</div>
            @endif
            @if (Session::get('status'))
                <div class="ps-4 text-sm font-normal text-green-500">{{ Session::get('status') }}</div>
            @endif
            @if ($errors->has('error'))
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="ps-4 text-sm font-normal text-red-500">{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form action="" method="post" class="space-y-4 mt-4">
                @csrf
                <div class="w-full flex items-center">
                    <span class="md:w-40">Email</span>
                    <input type="email" name="email" id="email" required autofocus class="w-full py-1 px-2">
                </div>
                <div class="w-full flex items-center">
                    <span class="md:w-40">Password</span>
                    <input type="password" name="password" id="password" required class="w-full py-1 px-2">
                </div>
                <div class="w-full flex items-center">
                    <div class="md:w-40"></div>
                    <div class="text-center w-full py-1 px-2">
                        <button type="submit" class="bg-black text-white px-3 py-px">Log in</button>
                    </div>
                </div>
            </form>
            <a href="{{ route('forgot') }}" class="hover:text-blue-700">Lupa password?</a>
        </div>
    </div>
@endsection
