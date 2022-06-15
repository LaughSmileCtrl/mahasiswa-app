<script setup>
import { Head, Link } from "@inertiajs/inertia-vue3";

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});
</script>

<template>
    <Head title="Welcome" />

    <div
        class="
            relative
            flex
            items-top
            justify-center
            min-h-screen
            bg-gray-100
            sm:items-center sm:pt-0
        "
    >
        <div
            v-if="canLogin"
            class="fixed top-0 right-0 px-6 py-4 block"
        >
            <Link
                v-if="$page.props.auth.user"
                :href="route('dashboard')"
                class="text-sm text-gray-700 underline"
            >
                Dashboard
            </Link>

            <template v-else>
                <Link
                    :href="route('login')"
                    class="text-sm text-gray-700 underline"
                >
                    Log in
                </Link>

                <Link
                    v-if="canRegister"
                    :href="route('register')"
                    class="ml-4 text-sm text-gray-700 underline"
                >
                    Register
                </Link>
            </template>
        </div>

        <section class="body-font">
            <div
                class="
                    container
                    mx-auto
                    flex
                    px-5
                    py-24
                    md:flex-row
                    flex-col
                    items-center
                "
            >
                <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6 mb-10 md:mb-0">
                    <img
                        class="object-cover object-center rounded"
                        alt="hero"
                        src="/images/hero.png"
                    />
                </div>
                <div
                    class="
                        lg:flex-grow
                        md:w-1/2
                        lg:pl-24
                        md:pl-16
                        flex flex-col
                        md:items-start md:text-left
                        items-center
                        text-center
                    "
                >
                    <h1
                        class="
                            title-font
                            sm:text-4xl
                            text-3xl
                            mb-4
                            font-medium
                            text-gray-900
                        "
                    >
                        Aplikasi Mahasiswa
                    </h1>
                    <p class="mb-8 leading-relaxed">
                        Ini merupakan aplikasi mahasiswa yang dibuat dengan laravel + vue.js.
                        aplikasi ini memuat operasi dasar Create, Read, Update, Delete (CRUD).
                        Untuk menggunakan aplikasi ini anda harus memiliki akun. Jika anda tidak 
                        memiliki akun silahkan lakukan register terlebih dahulu
                    </p>
                    <div class="flex justify-center">
                        <Link
                            :href="route('login')"
                            class="
                                inline-flex
                                text-white
                                bg-pink-500
                                border-0
                                py-2
                                px-6
                                focus:outline-none
                                hover:bg-pink-600
                                rounded
                                text-lg
                            "
                        >
                            Login
                        </Link>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

