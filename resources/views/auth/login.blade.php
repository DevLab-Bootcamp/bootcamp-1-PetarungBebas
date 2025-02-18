@extends('template.auth')

@section('title', 'Login')

@section('form')
<form class="space-y-4 md:space-y-6" id="loginForm">
    @csrf
    @if (session('error'))
        <div>
            {{ session('error') }}
        </div>
    @endif

    <div>
        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
        <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@company.com" required="">
    </div>
    <div>
        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
        <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
    </div>
    <div class="flex items-center justify-between">
        <div class="flex items-start">
            <div class="flex items-center h-5">
                <input id="remember" aria-describedby="remember" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800" required="">
            </div>
            <div class="ml-3 text-sm">
                <label for="remember" class="text-gray-500 dark:text-gray-300">Remember me</label>
            </div>
        </div>
        <a href="#" class="text-sm font-medium text-primary-600 hover:underline dark:text-primary-500">Forgot password?</a>
    </div>
    <button type="submit" class="w-full text-white bg-blue-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Sign in</button>
    <p class="text-sm font-light text-gray-500 dark:text-gray-400">
        Don't have an account yet? <a href="{{url('/auth-register')}}" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Sign up</a>
    </p>
</form>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    // Mencegah default behavior dari form submit
    document.getElementById('loginForm').addEventListener('submit', async function(event) {
        event.preventDefault(); // Mencegah form submit default
        
        const email = document.getElementById('email').value;
        const password = document.getElementById('password').value;
        
        try {
            const response = await axios.post('/api/login', { email, password });

            const token = response.data.token;
            const redirectTo = response.data.redirect_to;

            // Menyimpan token di localStorage
            localStorage.setItem('jwtToken', token);

            // Redirect ke URL yang sesuai berdasarkan response backend
            window.location.href = redirectTo;
        } catch (error) {
            console.error("Login failed", error);
            // Menampilkan pesan error jika login gagal
            alert('Login failed. Please check your credentials.');
        }
    });
</script>

@endsection
