<template>
    <AuthenticatedLayout name="Mahasiswa">
        <div
            v-if="$page.props.flash.message"
            class="alert alert-success mb-6"
        >
            <div>
                <i class="far fa-check-circle"></i>
                <span>{{ $page.props.flash.message }}</span>
            </div>
        </div>
        <div class="mb-6">
            <Link
                class="btn btn-primary btn-wide text-white rounded-xl"
                :href="route('students.create')"
                ><i class="fas fa-plus"></i>&nbsp; Tambah</Link
            >
        </div>
        <div class="overflow-x-auto rounded-2xl shadow-xl border border-base-300">
            <table class="table table-zebra w-full">
                <!-- head -->
                <thead>
                    <tr>
                        <th>#</th>
                        <th>NRP</th>
                        <th>Nama</th>
                        <th>Tahun Masuk</th>
                        <th>Jurusan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- row 1 -->
                    <tr v-for="(student, i) in students.data" :key="student">
                        <th>{{ i + students.from }}</th>
                        <td>{{ student.nrp }}</td>
                        <td>{{ student.name }}</td>
                        <td>{{ student.year }}</td>
                        <td>{{ student.major }}</td>
                        <th class="">
                            <div class="flex flex-row gap-4">
                                <Link :href="route('students.show', student.id)">
                                    <i
                                        class="
                                            fas
                                            fa-info
                                            text-lg text-teal-500
                                        "
                                    ></i>
                                </Link>
                                <Link :href="route('students.edit', student.id)">
                                    <i
                                        class="
                                            fas
                                            fa-edit
                                            text-lg text-amber-400
                                        "
                                    ></i>
                                </Link>
                                <button @click="deleteConfirmation(student.id)">
                                    <i
                                        class="
                                            fas
                                            fa-trash
                                            text-lg text-red-500
                                        "
                                    ></i>
                                </button>
                            </div>
                        </th>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="mt-8 w-full flex justify-center">
            <div class="mx-auto">
                <Pagination :links="students.links" />
            </div>
        </div>
    </AuthenticatedLayout>
</template>
<script>
import { Link } from "@inertiajs/inertia-vue3";
import AuthenticatedLayout from "@/Layouts/Authenticated.vue";
import Pagination from "@/Components/Pagination.vue";
import { Inertia } from '@inertiajs/inertia';

export default {
    name: "dashboard-page",
    components: {
        Link,
        AuthenticatedLayout,
        Pagination,
    },
    data() {
        return {
            date: new Date().getFullYear(),
        };
    },
    props: ["students"],
    methods: {
        deleteConfirmation(id) {
            this.$swal({
                title: `Anda Yakin akan menghapus ${id}`,
                showCancelButton: true,
                confirmButtonText: 'ya',
                showCloseButton: true,
                cancelButtonText: 'tidak',
                icon: 'warning',
                customClass: {
                    container: 'bg-red-300',
                    popup: 'bg-red-300 rounded-2xl',
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    Inertia.delete(route('students.destroy', id), {
                        onSuccess: () => {
                            this.$swal('Berhasil terhapus!', '', 'success')
                        }
                    });
                }
            });
        }
    }
};
</script>
