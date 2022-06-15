<template>
    <AuthenticatedLayout name="Surat">
        <div v-if="$page.props.flash.message" class="alert alert-success mb-6">
            <div>
                <i class="far fa-check-circle"></i>
                <span>{{ $page.props.flash.message }}</span>
            </div>
        </div>
        <div class="mb-2">
            <Link
                class="btn btn-primary btn-wide text-white rounded-xl"
                :href="route('letters.create')"
                ><i class="fas fa-plus"></i>&nbsp; Tambah</Link
            >
        </div>
        <div
            :class="[
                selectedLetter == null
                    ? 'grid grid-cols-1'
                    : 'grid grid-cols-1 lg:grid-cols-2 gap-5',
            ]"
        >
            <div class="flex w-fit gap-10 flex-wrap h-[45vh] overflow-y-auto cursor-pointer">
                <CardLetter
                    @dblclick="setSelectedLetter(letter)"
                    v-for="letter in letters"
                    :key="letter.id"
                    :letter="letter"
                />
            </div>
            <div
                v-if="selectedLetter != null"
                class="w-full flex flex-col justify-start items-end p-4 lg:h-screen bg-white rounded-lg"
            >
                <button @click="closePreview" class="text-gray-400 hover:text-red-600">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-8 w-8"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M6 18L18 6M6 6l12 12"
                        />
                    </svg>
                </button>
                <img
                    v-if="
                        selectedLetter.path_file.includes('png') ||
                        selectedLetter.path_file.includes('jpeg') ||
                        selectedLetter.path_file.includes('jpg')
                    "
                    class="w-full mx-auto"
                    :src="selectedLetter.path_file"
                    alt=""
                />
                <embed
                    v-else-if="selectedLetter.path_file.includes('pdf')"
                    class="w-full mx-auto h-[800px] overscroll-contain"
                    :src="selectedLetter.path_file"
                />
                <div v-else-if="selectedLetter.path_file.includes('doc')"
                    class="w-full text-gray-400 capitalize text-center text-xl italic">
                    File Tidak dapat Ditampilkan
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
<script>
import { Link } from "@inertiajs/inertia-vue3";
import AuthenticatedLayout from "@/Layouts/Authenticated.vue";
import CardLetter from "@/Components/CardLetter.vue";
import { Inertia } from "@inertiajs/inertia";

export default {
    components: {
        Link,
        AuthenticatedLayout,
        CardLetter,
    },
    props: ["letters"],
    data() {
        return {
            date: new Date().getFullYear(),
            selectedLetter: null,
        };
    },
    methods: {
        setSelectedLetter(letter) {
            this.selectedLetter = letter;
        },
        closePreview() {
            this.selectedLetter = null;
        }
    },
};
</script>
