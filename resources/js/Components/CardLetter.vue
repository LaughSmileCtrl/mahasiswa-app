<template>
    <div
        class="
            w-fit
            h-fit
            rounded-lg
            border-gray-300
            text-red-300
            hover:bg-pink-100 hover:text-red-400
        "
    >
        <div class="px-2 pt-2">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-24 w-24 text-red-500"
                viewBox="0 0 20 20"
                fill="currentColor"
            >
                <path
                    fill-rule="evenodd"
                    d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z"
                    clip-rule="evenodd"
                />
            </svg>
        </div>
        <div class="flex w-full justify-between flex-row px-2">
            <div class="shrink max-w-min">
                <p class="line-clamp-3 hover:line-clamp-none text-sm">
                    {{ letter.name }}
                </p>
            </div>
            <div class="">
                <button @click="toggleDropdown">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-6 w-6 hover:text-red-600"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"
                        />
                    </svg>
                </button>
                <div
                    :class="[
                        dropdownPopoverShow
                            ? 'absolute grid h-fit gap-1 rounded border bg-white p-1 text-sm'
                            : 'hidden h-fit gap-1 rounded border bg-white p-1 text-sm',
                    ]"
                >
                    <ul>
                        <li
                            class="
                                cursor-pointer
                                rounded
                                border-b
                                p-2
                                text-left
                                hover:bg-red-200
                            "
                        >
                            <Link
                                :href="route('letters.edit', letter.id)"
                                class="w-full"
                            >
                                Edit
                            </Link>
                        </li>
                        <li
                            class="
                                cursor-pointer
                                rounded
                                border-b
                                p-2
                                text-left
                                hover:bg-red-200
                            "
                        >
                            <a :href="letter.path_file" class="w-full"
                                >Download</a
                            >
                        </li>
                        <li
                            @click="deleteConfirmation"
                            class="
                                cursor-pointer
                                rounded
                                p-2
                                text-left
                                hover:bg-red-200
                            "
                        >
                            Delete
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";

export default {
    props: ["letter"],
    components: { Link },
    data() {
        return {
            dropdownPopoverShow: false,
        };
    },
    methods: {
        toggleDropdown() {
            this.dropdownPopoverShow = !this.dropdownPopoverShow;
        },
        deleteConfirmation() {
            this.$swal({
                title: `Anda Yakin akan menghapus ${this.letter.id}`,
                showCancelButton: true,
                confirmButtonText: "ya",
                showCloseButton: true,
                cancelButtonText: "tidak",
                icon: "warning",
                customClass: {
                    container: "bg-red-300",
                    popup: "bg-red-300 rounded-2xl",
                },
            }).then((result) => {
                if (result.isConfirmed) {
                    this.$inertia.delete(route("letters.destroy", this.letter.id), {
                        onSuccess: () => {
                            this.$swal("Berhasil terhapus!", "", "success");
                        },
                    });
                }
            });
        },
    },
};
</script>