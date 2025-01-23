@extends('template.auth')
@section('title','Register')
@section('form')
<form class="space-y-4 md:space-y-6" action="{{route('auth.register')}}" method="POST" id="registerForm">
    @csrf
    @csrf
    @if (session('error'))
    <div>
        {{session('error')}}
    </div>
    @endif
    <div>
        <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
        <input type="username" name="username" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan Username" required="">
    </div>
    <div>
        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
        <input type="name" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan Nama" required="">
    </div>
    <div>
        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
        <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@company.com" required="">
    </div>
    <div>
        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
        <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
    </div>
    <div>
        <label for="gender" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gender</label>
        <input type="gender" name="gender" id="gender" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Male/Female" required="">
    </div>
    <div>
        <label for="religion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Religion</label>
        <input type="religion" name="religion" id="religion" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukkan Agama" required="">
    </div>

    <button type="submit" class="w-full text-white bg-blue-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Sign up</button>
    <p class="text-sm font-light text-gray-500 dark:text-gray-400">
        Sudah Punya Akun? <a href="{{url('/auth-login')}}" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Sign in</a>
    </p>
</form>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    document.getElementById('registerForm').addEventListener('submit', async function(event){
        event.preventDefault();
        const username = document.getElementById('username').value;
        const name = document.getElementById('name').value;
        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;
        const gender = document.getElementById('gender').value;

        try{
            const response = await axios.post('/api/register', { username, name, email, password, gender });
            const token = response.data.token;
            const redirectTo = response.data.redirect_to;

            // Menyimpan token di localStorage
            localStorage.setItem('jwtToken', token);

            // Redirect ke URL yang sesuai berdasarkan response backend
            window.location.href = redirectTo;
        } catch (error) {
            console.error("Register failed", error);
        }
    })
</script>
@endsection
