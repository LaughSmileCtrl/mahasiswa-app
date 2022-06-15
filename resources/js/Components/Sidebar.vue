<template>
    <nav
        class="
            md:left-0
            md:block
            md:fixed
            md:top-0
            md:bottom-0
            md:overflow-y-auto
            md:flex-row
            md:flex-nowrap
            md:overflow-hidden
            shadow-xl
            bg-base-100
            flex flex-wrap
            items-center
            justify-between
            relative
            md:w-64
            z-10
            py-4
            px-6
        "
    >
        <div
            class="
                md:flex-col md:items-stretch md:min-h-full md:flex-nowrap
                px-0
                flex flex-wrap
                items-center
                justify-between
                w-full
                mx-auto
            "
        >
            <!-- Toggler -->
            <button
                class="
                    cursor-pointer
                    text-black
                    opacity-50
                    md:hidden
                    px-3
                    py-1
                    text-xl
                    leading-none
                    bg-transparent
                    rounded
                    border border-solid border-transparent
                "
                type="button"
                v-on:click="toggleCollapseShow('bg-white m-2 py-3 px-6')"
            >
                <i class="fas fa-bars"></i>
            </button>
            <!-- Brand -->
            <Link
                class="
                    md:block
                    text-left
                    md:pb-2
                    text-blueGray-600
                    mr-0
                    inline-block
                    whitespace-nowrap
                    text-sm
                    uppercase
                    font-bold
                    p-4
                    px-0
                "
                href="javascript:void(0)"
            >
                Mahasiswa App
            </Link>
            <!-- User -->
            <ul class="md:hidden items-center flex flex-wrap list-none">
                <li class="inline-block relative">
                    <notification-dropdown-component></notification-dropdown-component>
                </li>
                <li class="inline-block relative">
                    <user-dropdown-component></user-dropdown-component>
                </li>
            </ul>
            <!-- Collapse -->
            <div
                class="
                    md:flex
                    md:flex-col
                    md:items-stretch
                    md:opacity-100
                    md:relative
                    md:mt-4
                    md:shadow-none
                    shadow
                    absolute
                    top-0
                    left-0
                    right-0
                    z-40
                    overflow-y-auto overflow-x-hidden
                    h-auto
                    items-center
                    flex-1
                    rounded
                "
                v-bind:class="collapseShow"
            >
                <!-- Collapse header -->
                <div
                    class="
                        md:min-w-full md:hidden
                        block
                        pb-4
                        mb-4
                        border-b border-solid border-blueGray-200
                    "
                >
                    <div class="flex flex-wrap">
                        <div class="w-6/12">
                            <Link
                                class="
                                    md:block
                                    text-left
                                    md:pb-2
                                    text-blueGray-600
                                    mr-0
                                    inline-block
                                    whitespace-nowrap
                                    text-sm
                                    uppercase
                                    font-bold
                                    p-4
                                    px-0
                                "
                                href="javascript:void(0)"
                            >
                                Mahasiswa App
                            </Link>
                        </div>
                        <div class="w-6/12 flex justify-end">
                            <button
                                type="button"
                                class="
                                    cursor-pointer
                                    text-black
                                    opacity-50
                                    md:hidden
                                    px-3
                                    py-1
                                    text-xl
                                    leading-none
                                    bg-transparent
                                    rounded
                                    border border-solid border-transparent
                                "
                                v-on:click="toggleCollapseShow('hidden')"
                            >
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- Navigation -->
                <ul class="md:flex-col md:min-w-full flex flex-col list-none">
                    <li class="items-center">
                        <Link
                            :class="activeClass(route().current('dashboard'))"
                            :href="route('dashboard')"
                            ><i class="fas fa-tv opacity-75 mr-2 text-sm"></i>
                            Dashboard</Link
                        >
                    </li>
                    <li class="items-center">
                        <Link
                            :class="activeClass(route().current('students.index'))"
                            :href="route('students.index')"
                            ><i
                                class="
                                    fas
                                    fa-user-graduate
                                    opacity-75
                                    mr-2
                                    text-sm
                                "
                            ></i>
                            Mahasiswa</Link
                        >
                    </li>
                    <li class="items-center">
                        <Link
                            :class="activeClass(route().current('letters.index'))"
                            :href="route('letters.index')"
                            ><i
                                class="
                                    fas
                                    fa-envelope 
                                    opacity-75
                                    mr-2
                                    text-sm
                                "
                            ></i>
                            Surat</Link
                        >
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>
<script>
import NotificationDropdownComponent from "./NotificationDropdown.vue";
import UserDropdownComponent from "./UserDropdown.vue";
import { Link } from '@inertiajs/inertia-vue3';

export default {
    data() {
        return {
            collapseShow: "hidden",
        };
    },
    methods: {
        toggleCollapseShow: function (classes) {
            this.collapseShow = classes;
        },
        activeClass(isActive) {
            return (isActive) 
                ? 'text-pink-500 hover:text-pink-600 text-xs uppercase py-3 font-bold block'
                : 'text-gray-400 hover:text-gray-500 text-xs uppercase py-3 font-bold block';
        }
    },
    components: {
        NotificationDropdownComponent,
        UserDropdownComponent,
        Link,
    },
    computed: {
        
    }
};
</script>
