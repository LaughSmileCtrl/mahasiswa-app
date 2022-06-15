<template>
    <AuthenticatedLayout name="Mahasiswa">
        <div
            class="
                grid
                gap-5
                bg-base-100
                border-base-300
                w-full
                rounded-2xl
                border
                p-8
                shadow-xl
                md:w-1/2
                lg:w-1/3
            "
        >
            <h2 class="text-xl">Informasi Akun Anda</h2>
            <div class="mx-auto w-fit">
                <div class="w-fit h-fit rounded-3xl bg-pink-500">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-24 w-24 text-gray-100"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                        />
                    </svg>
                </div>
            </div>
            <div class="w-full">
                <div class="grid grid-cols-1 gap-4">
                    <div class="">
                        <h3 class="text-sm">Nama</h3>
                        <h2 class="text-lg">{{ $page.props.auth.user.name }}</h2>
                    </div>
                    <div class="">
                        <h3 class="text-sm">Email</h3>
                        <h2 class="text-lg">{{ $page.props.auth.user.email }}</h2>
                    </div>
                    <div class="">
                        <h3 class="text-sm">Terakhir Berubah</h3>
                        <h2 class="text-lg">{{ new Date($page.props.auth.user.updated_at).toLocaleString("ID-id",{timezone: "Asia/Jakarta",weekday: "long",year: "numeric",month: "long",day: "numeric",}) }}</h2>
                        
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
<script>
import { Link } from "@inertiajs/inertia-vue3";
import AuthenticatedLayout from "@/Layouts/Authenticated.vue";
import Pagination from "@/Components/Pagination.vue";

export default {
    name: "dashboard-page",
    components: {
        Link,
        AuthenticatedLayout,
        Pagination,
    },
};
</script>
