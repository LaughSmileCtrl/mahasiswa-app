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
        <div class="grid grid-cols-1 xl:grid-cols-2 gap-4">
            <form @submit.prevent="submit">
                <div class="w-full rounded-2xl p-8 shadow-lg bg-white border">
                    
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
                            @change="addCertificatePath($event)"
                            type="file"
                            accept=".jpg, .jpeg, .png, .doc, .docx, .pdf"
                        />
                        <label class="label">
                            <span
                                v-if="form.errors.path_file"
                                class="text-xs text-red-500"
                            >
                                {{ form.errors.path_file }}</span
                            >
                        </label>
                    </div>
                    <button type="submit" class="btn btn-secondary">Simpan</button>
                </div>
            </form>
            <div
                class="w-full h-fit grid gap-4 rounded-2xl p-8 shadow-lg bg-white border"
            >
                <h2>Sertifikat</h2>
                <img
                    v-if="
                        letter.path_file.includes('png') ||
                        letter.path_file.includes('jpeg') ||
                        letter.path_file.includes('jpg')
                    "
                    class="w-full"
                    :src="letter.path_file"
                    alt=""
                />
                <embed
                    v-else-if="letter.path_file.includes('pdf')"
                    class="w-full h-[1200px]"
                    :src="letter.path_file"
                />
                <div v-else-if="letter.path_file.includes('doc')"
                    class="text-gray-400 capitalize text-xl italic">
                    Sertifikat Tidak dapat Ditampilkan
                </div>
                <div v-else
                    class="text-gray-500 capitalize text-xl italic">
                    Sertifikat Tidak Ada
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
<script>
import AuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Link, useForm } from "@inertiajs/inertia-vue3";

export default {
    name: "dashboard-page",
    components: {
        AuthenticatedLayout,
        Link,
    },
    data() {
        return {
            date: new Date().getFullYear(),
            form: useForm({
                name: this.letter.name,
                file: null,
            }),
        };
    },
    props: ["letter"],
    methods: {
        addCertificatePath(event) {
            this.form.file = event.target.files[0];
        },
        submit() {
            this.form._method = "put";
            this.$inertia.post(
                route("letters.update", this.letter.id),
                this.form,
                {
                    onSuccess: () => {
                        this.form.reset();
                    },
                }
            );
        },
    },
};
</script>
