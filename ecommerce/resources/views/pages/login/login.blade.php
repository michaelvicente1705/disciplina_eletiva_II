@extends("pages.template.template")

@section('title')
    Login - Ecommerce
@endsection()

@section('body')
<div class="h-screen overflow-hidden flex items-center justify-center" style="background: #edf2f7;">
    <!-- Ajustar o tamanho do display -->
    <form action="">
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4  flex flex-col">
            <div class="mb-4">
                <label class="block text-grey-darker text-sm font-bold mb-2" for="username">
                    Username
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker" id="username" type="text" placeholder="Username">
            </div>
            <div class="mb-6">
                <label class="block text-grey-darker text-sm font-bold mb-2" for="password">
                    Password
                </label>
                <input class="shadow appearance-none border border-red rounded w-full py-2 px-3 text-grey-darker mb-3" id="password" type="password" placeholder="******************">

            </div>
            <!-- <div class="flex items-center justify-between"> -->
                    <input type="submit"  type="button" placeholder="Sing in"/>
                    <a class="inline-block align-baseline font-bold text-sm text-blue hover:text-blue-darker" href="#">
                        Forgot Password?
                    </a>
             <!-- </div> -->
        </div>
    </form>
</div>
@endsection()
