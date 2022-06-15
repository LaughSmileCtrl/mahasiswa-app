<template>
    <AuthenticatedLayout name="Mahasiswa">
        <div class="mb-6">
            <Link
                class="btn btn-wide text-white rounded-xl"
                :href="route('students.index')"
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
                        <span class="label-text">NRP</span>
                    </label>
                    <input
                        type="text"
                        placeholder="NRP"
                        class="input input-bordered w-full"
                        v-model="form.nrp"
                    />
                    <label class="label">
                        <span
                            v-if="form.errors.nrp"
                            class="text-xs text-red-500"
                        >
                            {{ form.errors.nrp }}</span
                        >
                    </label>
                </div>
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
                        <span class="label-text">Tahun Masuk</span>
                    </label>
                    <input
                        type="text"
                        placeholder="Tahun Masuk"
                        class="input input-bordered w-full"
                        v-model="form.year"
                    />
                    <label class="label">
                        <span
                            v-if="form.errors.year"
                            class="text-xs text-red-500"
                        >
                            {{ form.errors.year }}</span
                        >
                    </label>
                </div>
                <div class="form-control w-full">
                    <label class="label">
                        <span class="label-text">Pilih Jurusan</span>
                    </label>
                    <select class="select select-bordered" v-model="form.major">
                        <option disabled selected>Pilih salah satu</option>
                        <option>Teknik Informatika</option>
                        <option>Multimedia Broadcating</option>
                        <option>Teknik Elektronika</option>
                        <option>Teknik Telekomunikasi</option>
                        <option>Teknik Elektro Industri</option>
                        <option>Teknik Mekatronika</option>
                        <option>Teknik Komputer</option>
                    </select>
                    <label class="label">
                        <span
                            v-if="form.errors.major"
                            class="text-xs text-red-500"
                        >
                            {{ form.errors.major }}</span
                        >
                    </label>
                </div>
                <div class="form-control w-full">
                    <label class="label">
                        <span class="label-text"
                            >Masukkan Sertifikat (Optional)</span
                        >
                    </label>
                    <input
                        @change="addCertificatePath($event)"
                        type="file"
                        accept=".jpg, .jpeg, .png, .doc, .docx, .pdf"
                    />
                    <label class="label">
                        <span
                            v-if="form.errors.certificate_path"
                            class="text-xs text-red-500"
                        >
                            {{ form.errors.certificate_path }}</span
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
    name: "dashboard-page",
    components: {
        AuthenticatedLayout,
        Link,
    },
    data() {
        return {
            date: new Date().getFullYear(),
            form: useForm({
                nrp: null,
                name: null,
                year: null,
                major: null,
                certificate_path: null,
            }),
        };
    },
    methods: {
        addCertificatePath(event) {
            this.form.certificate_path = event.target.files[0];
        },
        submit() {
            this.form.post(route("students.store"), {
                preserveScroll: true,
                onSuccess: () => {
                    this.form.reset();
                },
            });
        },
    },
};
</script>
