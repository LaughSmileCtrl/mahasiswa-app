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

        <div class="grid grid-cols-1 xl:grid-cols-2 gap-4">
            <div class="w-full rounded-2xl p-8 shadow-lg bg-white border">
                <div class="form-control w-full">
                    <label class="label">
                        <span class="label-text">NRP</span>
                    </label>
                    <span
                        type="text"
                        disabled
                        placeholder="NRP"
                        class="text-lg border-0 px-1"
                        v-html="form.nrp"
                    />
                </div>
                <div class="form-control w-full">
                    <label class="label">
                        <span class="label-text">Nama</span>
                    </label>
                    <span
                        type="text"
                        disabled
                        placeholder="Nama"
                        class="text-lg border-0 px-1"
                        v-html="form.name"
                    />
                </div>
                <div class="form-control w-full">
                    <label class="label">
                        <span class="label-text">Tahun Masuk</span>
                    </label>
                    <span
                        type="text"
                        disabled
                        placeholder="Tahun Masuk"
                        class="text-lg border-0 px-1"
                        v-html="form.year"
                    />
                </div>
                <div class="form-control w-full">
                    <label class="label">
                        <span class="label-text">Jurusan</span>
                    </label>
                    <span
                        type="text"
                        disabled
                        placeholder="Tahun Masuk"
                        class="text-lg border-0 px-1"
                        v-html="form.major"
                    />
                </div>
                <a v-if="student.certificate_path != '/storage/'" :href="student.certificate_path" class="btn btn-primary"
                    >Download Sertifikat</a
                >
            </div>
            <div
                class="
                    w-full
                    h-fit
                    grid
                    gap-4
                    rounded-2xl
                    p-8
                    shadow-lg
                    bg-white
                    border
                "
            >
                <h2>Sertifikat</h2>
                <img
                    v-if="
                        student.certificate_path.includes('png') ||
                        student.certificate_path.includes('jpeg') ||
                        student.certificate_path.includes('jpg')
                    "
                    class="w-full"
                    :src="student.certificate_path"
                    alt=""
                />
                <embed
                    v-else-if="student.certificate_path.includes('pdf')"
                    class="w-full h-[1200px]"
                    :src="student.certificate_path"
                />
                 <div v-else-if="student.certificate_path.includes('doc')"
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
                nrp: this.student.nrp,
                name: this.student.name,
                year: this.student.year,
                major: this.student.major,
            }),
        };
    },
    props: ["student"],
};
</script>
