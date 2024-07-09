@extends('app')
@section('content')

    <div class="flex items-center justify-center h-screen">
        <div class="bg-white p-8 rounded shadow-md w-full sm:w-1/2 md:w-1/3 lg:w-1/4 max-w-sm">
            <h2 class="text-2xl font-bold mb-6 text-center">Register</h2>
            <form action="{{route('register.perform')}}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Username</label>
                    <input type="text" id="name" name="name" autocomplete="off" class="mt-1 block w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                </div>
                <div class="mb-4">
                    <label for="email"  class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email" autocomplete="off" class="mt-1 block w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                </div>
                <div class="mb-6">
                    <label for="password"  class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" id="password" name="password" autocomplete="off" class="mt-1 block w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                </div>
                <button type="submit" class="w-full bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-opacity-50">Register</button>
            </form>
            <p class="text-center mt-4">already have an account ? <a href="{{route('login')}}" class="text-blue-500 hover:text-blue-700">Sign In</a></p>
        </div>
    </div>
@endsection

