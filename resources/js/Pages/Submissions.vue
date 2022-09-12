<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head } from '@inertiajs/inertia-vue3';
import Pagination from '@/Components/Pagination.vue';

export default {
  components: {
    Pagination,
    BreezeAuthenticatedLayout,
    Head,
  },
  props: {
    items: Object,
  },
}
</script>

<template>
    <BreezeAuthenticatedLayout>
        <Head title="Submissions" />

        <h2 class="font-semibold text-xl text-gray-800 leading-tight p-4">
            Contact Form Submissions
        </h2>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <table claas="table-auto border-collapse border border-slate-400">
                            <thead><tr><th>Id</th><th>Name</th><th>Email</th><th>Comment</th><th>Date</th></tr></thead>
                            <tbody v-for="item in items.data" :key="item.id">
                                <td class="p-4">{{ item.id }}</td>
                                <td class="p-4">{{ item.name }}</td>
                                <td class="p-4">{{ item.email }}</td>
                                <td class="p-4">{{ item.comment }}</td>
                                <td class="p-4">{{ item.created }}</td>
                            </tbody>
                        </table>
                    </div>
                </div>
                <pagination :links="items.links" />
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>
