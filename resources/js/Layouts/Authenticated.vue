<template>
    <div :data-theme="theme">
        <sidebar-component></sidebar-component>
        <div class="relative md:ml-64 bg-base-200">
            <navbar-component :name="name" @changeTheme="setTheme"></navbar-component>
            <!-- <div class="relative bg-pink-600 md:pt-32 pb-32 pt-12"></div> -->
            <div class="px-4 md:px-10 mx-auto w-full -m-24">
                <div class="relative md:pt-32 pb-32 pt-12 min-h-screen">
                    <slot />
                </div>

                <footer class="block py-4">
                    <div class="container mx-auto px-4">
                        <hr class="mb-4 border-b-1 border-gray-200" />
                        <div
                            class="
                                flex flex-wrap
                                items-center
                                md:justify-between
                                justify-center
                            "
                        >
                            <div class="w-full md:w-4/12 px-4">
                                <div
                                    class="
                                        text-sm text-gray-500
                                        font-semibold
                                        py-1
                                    "
                                >
                                    Copyright © {{ date }}
                                    <a
                                        href="https://www.creative-tim.com"
                                        class="
                                            text-gray-500
                                            hover:text-gray-700
                                            text-sm
                                            font-semibold
                                            py-1
                                        "
                                    >
                                        Creative Tim
                                    </a>
                                </div>
                            </div>
                            <div class="w-full md:w-8/12 px-4">
                                <ul
                                    class="
                                        flex flex-wrap
                                        list-none
                                        md:justify-end
                                        justify-center
                                    "
                                >
                                    <li>
                                        <a
                                            href="https://www.creative-tim.com"
                                            class="
                                                text-gray-600
                                                hover:text-gray-800
                                                text-sm
                                                font-semibold
                                                block
                                                py-1
                                                px-3
                                            "
                                        >
                                            Creative Tim
                                        </a>
                                    </li>
                                    <li>
                                        <a
                                            href="https://www.creative-tim.com/presentation"
                                            class="
                                                text-gray-600
                                                hover:text-gray-800
                                                text-sm
                                                font-semibold
                                                block
                                                py-1
                                                px-3
                                            "
                                        >
                                            About Us
                                        </a>
                                    </li>
                                    <li>
                                        <a
                                            href="http://blog.creative-tim.com"
                                            class="
                                                text-gray-600
                                                hover:text-gray-800
                                                text-sm
                                                font-semibold
                                                block
                                                py-1
                                                px-3
                                            "
                                        >
                                            Blog
                                        </a>
                                    </li>
                                    <li>
                                        <a
                                            href="https://github.com/creativetimofficial/tailwind-starter-kit/blob/main/LICENSE.md"
                                            class="
                                                text-gray-600
                                                hover:text-gray-800
                                                text-sm
                                                font-semibold
                                                block
                                                py-1
                                                px-3
                                            "
                                        >
                                            MIT License
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>
</template>
<script>
import NavbarComponent from "@/Components/Navbar.vue";
import SidebarComponent from "@/Components/Sidebar.vue";
import LineChartComponent from "@/Components/LineChart.vue";
import BarChartComponent from "@/Components/BarChart.vue";
export default {
    components: {
        NavbarComponent,
        SidebarComponent,
        LineChartComponent,
        BarChartComponent,
    },
    data() {
        return {
            date: new Date().getFullYear(),
        };
    },
    props: ['name'],
    methods: {
        setTheme() {
            this.theme = (this.theme == 'dracula')
                ? 'cmyk'
                : 'dracula';
        }
    }
};
</script>
