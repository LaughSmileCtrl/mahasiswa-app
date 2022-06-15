<template>
    <AuthenticatedLayout name="Mahasiswa">
        <div class="mb-6">
            <Link
                class="btn btn-wide text-white rounded-xl"
                :href="route('letters.index')"
            >
                <i class="fas fa-chevron-left"></i>
                &nbsp; Kembali
            </Link>
        </div>
        <form @submit.prevent="submit">
            <div
                class="
                    w-full
                    lg:w-1/2
                    rounded-2xl
                    p-8
                    shadow-lg
                    bg-white
                    border
                "
            >
                <div class="form-control w-full">
                    <label class="label">
                        <span class="label-text">Nama</span>
                    </label>
                    <input
                        type="text"
                        placeholder="Nama"
                        class="input input-bordered w-full"
                        v-model="form.name"
                    />
                    <label class="label">
                        <span
                            v-if="form.errors.name"
                            class="text-xs text-red-500"
                        >
                            {{ form.errors.name }}</span
                        >
                    </label>
                </div>
                <div class="form-control w-full">
                    <label class="label">
                        <span class="label-text"
                            >Masukkan File</span
                        >
                    </label>
                    <input
                        @change="addFilePath($event)"
                        type="file"
                        accept=".jpg, .jpeg, .png, .doc, .docx, .pdf"
                    />
                    <label class="label">
                        <span
                            v-if="form.errors.file"
                            class="text-xs text-red-500"
                        >
                            {{ form.errors.file }}</span
                        >
                    </label>
                </div>
                <button type="submit" class="btn btn-secondary">Simpan</button>
            </div>
        </form>
    </AuthenticatedLayout>
</template>
<script>
import AuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Link, useForm } from "@inertiajs/inertia-vue3";

export default {
    components: {
        AuthenticatedLayout,
        Link,
    },
    data() {
        return {
            date: new Date().getFullYear(),
            form: useForm({
                name: null,
                file: null,
            }),
        };
    },
    methods: {
        addFilePath(event) {
            this.form.file = event.target.files[0];
        },
        submit() {
            this.form.post(route("letters.store"), {
                preserveScroll: true,
                onSuccess: () => {
                    this.form.reset();
                },
            });
        },
    },
};
</script>
